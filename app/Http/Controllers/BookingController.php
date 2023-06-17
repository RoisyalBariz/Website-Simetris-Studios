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
            'hairartists' => HairArtist::all(),
            'services' => Service::all(),
            'colorings' => Coloring::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'phone' => 'required|digits_between:10,12',
            'service' => 'required',
            'coloring' => 'required',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'hair_artist' => 'required',
        ]);

        $validatedData['service_id'] = $request->service;
        $validatedData['coloring_id'] = $request->coloring;
        $validatedData['ordernumber'] = rand();

        $validatedData['status_pembayaran'] = "Unpaid";

        $service = Service::find($validatedData['service_id']);
        $coloring = Coloring::find($validatedData['coloring_id']);

        $validatedData['harga'] = $service->harga_service + $coloring->harga_coloring;

        if ($validatedData['harga'] <= 0) {
            return redirect('/booking')->with('message', 'SERVICE ATAU COLORING TIDAK BOLEH KOSONG !!!');
        } else {
            if (Booking::where('hair_artist', $request['hair_artist'])->exists()) {
                if (Booking::where('tanggal_reservasi', $request['tanggal_reservasi'])->exists()) {
                    if (Booking::where('jam_reservasi', $request['jam_reservasi'])->exists()) {
                        return redirect('/booking')->with('message', 'JADWAL SUDAH TERISI, SILAHKAN BOOKING ULANG !!!');
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

    public function reservation()
    {
        return view('reservation', [
            'bookings' => booking::where('status_pembayaran', "Unpaid")->get()
        ]);
    }

    public function dashboard()
    {
        return view('dashboard', [
            'total_booking' => booking::all(),
            'bookings' => booking::where('status_pembayaran', "Paid")->get()
        ]);
    }

    public function destroy(booking $booking)
    {

        Booking::destroy($booking->id);

        return redirect('/reservation')->with('success', 'booking has Been deleted');
    }

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

    public function income()
    {
        return view('income', [
            'total_mangfeb' => booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid')->sum('harga'),
            'total_allan' => booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid')->sum('harga'),
            'total_andes' => booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid')->sum('harga'),
            'total_aris' => booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid')->sum('harga'),
            'total' => booking::where('status_pembayaran', 'paid')->sum('harga'),

            'pesanan_mangfeb' => booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid'),
            'pesanan_allan' => booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid'),
            'pesanan_andes' => booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid'),
            'pesanan_aris' => booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid')
        ]);
    }

    public function reservation_pdf()
    {
        $bookings = booking::where('status_pembayaran', "Paid")->get();
        $pdf = PDF::loadView('cetak_reservation', ['bookings' => $bookings]);
        return $pdf->stream('data-reservation.pdf');
    }

    public function income_pdf()
    {
        $bookings =  booking::query()->latest()->get();

        $total_mangfeb = booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid')->sum('harga');
        $total_allan = booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid')->sum('harga');
        $total_andes = booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid')->sum('harga');
        $total_aris = booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid')->sum('harga');

        $pesanan_mangfeb = booking::where('hair_artist', 'MangFeb')->where('status_pembayaran', 'paid');
        $pesanan_allan = booking::where('hair_artist', 'Allan')->where('status_pembayaran', 'paid');
        $pesanan_andes = booking::where('hair_artist', 'Andes')->where('status_pembayaran', 'paid');
        $pesanan_aris = booking::where('hair_artist', 'Aris')->where('status_pembayaran', 'paid');


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
