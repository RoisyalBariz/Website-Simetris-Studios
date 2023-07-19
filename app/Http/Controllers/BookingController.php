<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Coloring;
use App\Models\HairArtist;
use App\Models\Service;
use Illuminate\Http\Request;
use PDF;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking', [
            'hairartists' => HairArtist::all(), // mengambil semua data HairArtist dari model HairArtist dan menempatkannya dalam elemen array dengan kunci 'hairartists'.
            'services' => Service::all(), // mengambil semua data Service dari model Service dan menempatkannya dalam elemen array dengan kunci 'services'
            'colorings' => Coloring::all() // mengambil semua data Service dari model Service dan menempatkannya dalam elemen array dengan kunci 'services'
        ]);
    }

    // digunakan untuk mengakses data yang dikirim oleh pengguna melalui permintaan HTTP.
    public function store(Request $request)
    {
        $validatedData = $request->validate([ // digunakan untuk memvalidasi data yang diterima dari pengguna.
            'fullname' => 'required',
            'phone' => 'required|digits_between:10,12',
            'service' => 'required',
            'coloring' => 'required',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'hair_artist' => 'required',
        ]);

        $validatedData['service_id'] = $request->service; // berguna untuk menyimpan ID layanan yang dipilih oleh pengguna
        $validatedData['coloring_id'] = $request->coloring; // berguna untuk menyimpan ID jenis pewarnaan rambut yang dipilih oleh pengguna
        $validatedData['ordernumber'] = rand(); // berguna untuk memberikan nomor pesanan yang unik untuk setiap pemesanan

        $validatedData['status_pembayaran'] = "Unpaid"; // menunjukkan bahwa status pembayaran untuk pesanan belum dibayar.

        $service = Service::find($validatedData['service_id']); // Mengambil data layanan (Service) dari database berdasarkan ID layanan yang disimpan dalam $validatedData['service_id'] dan menyimpannya dalam variabel $service. Ini memungkinkan akses ke informasi terkait layanan yang dipilih oleh pengguna.
        $coloring = Coloring::find($validatedData['coloring_id']); // Mengambil data jenis pewarnaan rambut (Coloring) dari database berdasarkan ID jenis pewarnaan rambut yang disimpan dalam $validatedData['coloring_id'] dan menyimpannya dalam variabel $coloring. Ini memungkinkan akses ke informasi terkait jenis pewarnaan rambut yang dipilih oleh pengguna.

        $validatedData['harga'] = $service->harga_service + $coloring->harga_coloring; // Menghitung total harga pesanan dengan menambahkan harga layanan ($service->harga_service) dan harga pewarnaan rambut ($coloring->harga_coloring) dan menetapkan hasilnya ke dalam array $validatedData dengan kunci 'harga'. Ini akan digunakan untuk menyimpan informasi harga pesanan.

        if ($validatedData['harga'] <= 0) { // Melakukan pengecekan apakah harga pesanan yang dihitung sebelumnya ($validatedData['harga']) kurang dari atau sama dengan 0.
            return redirect('/booking')->with('message', 'SERVICE ATAU COLORING TIDAK BOLEH KOSONG !!!'); //  Jika kondisi ini terpenuhi, artinya harga pesanan tidak valid (misalnya karena tidak ada layanan atau pewarnaan yang dipilih), maka pengguna akan diarahkan kembali ke halaman 'booking' dengan pesan kesalahan yang disertakan.
        } else {
            if (Booking::where('hair_artist', $request['hair_artist'])->exists()) { // Melakukan pengecekan apakah sudah ada pemesanan dengan hair_artist yang sama
                if (Booking::where('tanggal_reservasi', $request['tanggal_reservasi'])->exists()) { //  Melakukan pengecekan apakah sudah ada pemesanan dengan tanggal_reservasi yang sama
                    if (Booking::where('jam_reservasi', $request['jam_reservasi'])->exists()) { //  Melakukan pengecekan apakah sudah ada pemesanan dengan jam_reservasi yang sama
                        return redirect('/booking')->with('message', 'JADWAL SUDAH TERISI, SILAHKAN BOOKING ULANG !!!');
                    } else {
                        booking::create($validatedData); // Membuat objek baru dari model Booking dengan menggunakan data yang telah divalidasi ($validatedData) dan menyimpannya ke dalam database.

                        $booking = booking::where('ordernumber', $validatedData['ordernumber'])->first(); // engambil objek Booking dari database berdasarkan nomor pesanan ($validatedData['ordernumber']) yang baru saja dibuat.

                        $total_harga =  $validatedData['harga']; // Mengambil nilai total harga dari $validatedData['harga'] dan menyimpannya dalam variabel $total_harga.

                        $pdf = PDF::loadView('cetak_resi', ['booking' => $booking, 'harga' => $total_harga]); // Membuat file PDF dari tampilan 'cetak_resi' dengan menyediakan data $booking dan $total_harga.
                        return $pdf->stream('data-reservation.pdf'); // Mengembalikan file PDF yang telah dibuat ke pengguna untuk ditampilkan di browser.

                        return redirect('/'); // Jika pengguna tidak memerlukan file PDF, maka pengguna akan diarahkan kembali ke halaman utama dengan menggunakan fungsi redirect('/').
                    }
                } else {
                    booking::create($validatedData);

                    $booking = booking::where('ordernumber', $validatedData['ordernumber'])->first();

                    $total_harga =  $validatedData['harga'];

                    $pdf = PDF::loadView('cetak_resi', ['booking' => $booking, 'harga' => $total_harga]);
                    return $pdf->stream('data-reservation.pdf');

                    return redirect('/');
                }
            } else {
                booking::create($validatedData);

                $booking = booking::where('ordernumber', $validatedData['ordernumber'])->first();

                $total_harga =  $validatedData['harga'];

                $pdf = PDF::loadView('cetak_resi', ['booking' => $booking, 'harga' => $total_harga]);
                return $pdf->stream('data-reservation.pdf');

                return redirect('/');
            }
        }
    }

    // Menghasilkan Tampilan Reservasi yang Belum Bayar
    public function reservation()
    {
        return view('reservation', [
            'bookings' => booking::where('status_pembayaran', "Unpaid")->get()
        ]);
    }

    // Menghasilkan Tampilan Dashboard
    public function dashboard()
    {
        return view('dashboard', [
            'total_booking' => booking::all(),
            'bookings' => booking::where('status_pembayaran', "Paid")->get()
        ]);
    }

    // Menghapus Data Reservasi
    public function destroy(booking $booking)
    {

        Booking::destroy($booking->id);

        return redirect('/reservation')->with('success', 'booking has Been deleted');
    }

    // Mengubah Status Pembayaran
    public function sudah_bayar(Request $request, booking $booking)
    {
        $rules = [
            'fullname' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['status_pembayaran'] = "Paid";

        Booking::where('id', $booking->id)->update($validatedData);

        return redirect('/reservation')->with('success', 'Event has Been Updated');
    }

    // Menghasilkan Tampilan Income
    public function income()
    {
        return view('income', [
            // Mengambil total pendapatan (sum('harga')) dari booking dengan hair artist 'MangFeb' yang status pembayarannya 'paid'. Nilai ini akan tersedia di tampilan dengan nama variabel 'total_mangfeb'.
            'total_mangfeb' => booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid')->sum('harga'),
            'total_allan' => booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid')->sum('harga'),
            'total_andes' => booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid')->sum('harga'),
            'total_aris' => booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid')->sum('harga'),
            'total' => booking::where('status_pembayaran', 'paid')->sum('harga'),

            // Mengambil daftar pesanan (booking) dengan hair artist 'MangFeb' yang status pembayarannya 'paid'. Nilai ini akan tersedia di tampilan dengan nama variabel 'pesanan_mangfeb'.
            'pesanan_mangfeb' => booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid'),
            'pesanan_allan' => booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid'),
            'pesanan_andes' => booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid'),
            'pesanan_aris' => booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid')
        ]);
    }

    // Menghasilkan PDF Reservation
    public function reservation_pdf()
    {
        $bookings = booking::where('status_pembayaran', "Paid")->get(); // Mengambil daftar reservasi (booking) yang memiliki status pembayaran "Paid" dari database. Data ini disimpan dalam variabel $bookings.
        $pdf = PDF::loadView('cetak_reservation', ['bookings' => $bookings]); // Menghasilkan file PDF dengan menggunakan tampilan 'cetak_reservation' dan menyediakan data reservasi ($bookings) ke dalam tampilan tersebut. Fungsi loadView() digunakan untuk menghasilkan file PDF berdasarkan tampilan yang ditentukan.
        return $pdf->stream('data-reservation.pdf'); // Mengirimkan file PDF yang telah dihasilkan kepada pengguna melalui metode stream(). Pengguna akan melihat file PDF dalam tampilan web atau memiliki pilihan untuk mengunduhnya.
    }

    // Menghasilkan PDF Income
    public function income_pdf()
    {
        $bookings =  booking::query()->latest()->get(); // Mengambil daftar reservasi dari database dengan urutan terbaru dan menyimpannya dalam variabel $bookings.

        // Menghitung total pendapatan (sum('harga')) dari reservasi yang memiliki hair artist 'MangFeb' dan status pembayaran 'paid'. Nilai ini disimpan dalam variabel $total_mangfeb.
        $total_mangfeb = booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid')->sum('harga');
        $total_allan = booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid')->sum('harga');
        $total_andes = booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid')->sum('harga');
        $total_aris = booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid')->sum('harga');

        // Mengambil daftar pesanan (booking) yang memiliki hair artist 'MangFeb' dan status pembayaran 'paid'. Nilai ini disimpan dalam variabel $pesanan_mangfeb.
        $pesanan_mangfeb = booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid');
        $pesanan_allan = booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid');
        $pesanan_andes = booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid');
        $pesanan_aris = booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid');

        // Menghasilkan file PDF dengan menggunakan tampilan 'cetak_income' dan menyediakan data-data pendapatan (total_mangfeb, total_allan, total_andes, total_aris, pesanan_mangfeb, pesanan_allan, pesanan_andes)
        $pdf = PDF::loadView('cetak_income', [
            'total_mangfeb' => $total_mangfeb,
            'total_allan' => $total_allan,
            'total_andes' => $total_andes,
            'total_aris' => $total_aris,

            'pesanan_mangfeb' => $pesanan_mangfeb,
            'pesanan_allan' => $pesanan_allan,
            'pesanan_andes' => $pesanan_andes,
            'pesanan_aris' => $pesanan_aris,

        ]);
        return $pdf->stream('data-reservation.pdf');
    }
}
