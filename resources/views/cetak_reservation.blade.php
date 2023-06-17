<!DOCTYPE html>
<html>
    <head>
        <title>Data Reservasi Barbershop</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <style type="text/css">
            .table,
            tr,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 2px;
                font-size: 12pt;
            }

            h1 {
                margin-bottom: 2rem;
            }
        </style>
        <center>
            <h1>Data Reservation</h1>
            <h1>Barbershop Simetris Studios</h1>
        </center>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Whatsapp</th>
                    <th scope="col">Service</th>
                    <th scope="col">Price</th>
                    <th scope="col">Reserve Date</th>
                    <th scope="col">Reserve Hour</th>
                    <th scope="col">Hair Artist</th>
                    <th scope="col">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $booking->fullname }}</td>
                    <td>{{ $booking->phone }}</td>
                    <td>{{ $booking->foreign_service->nama_service }}</td>
                    <td>Rp.{{moneyFormat ($booking->harga) }}</td>
                    <td>{{ $booking->tanggal_reservasi }}</td>
                    <td>{{ $booking->jam_reservasi }}</td>
                    <td>{{ $booking->hair_artist }}</td>
                    <td>
                        <p class="status">
                            {{ $booking->status_pembayaran }}
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
