<!DOCTYPE html>
<html>
    <head>
        <title>Download My Resi</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <style type="text/css">
            <style type="text/css" > .table,
            tr,
            th,
            td {
                border-collapse: collapse;
                padding: 2px;
                font-size: 14pt;
            }
            th {
                text-align: left;
            }
            h1 {
                margin-bottom: 3rem;
            }
            h2 {
                margin-bottom: 1rem;
            }
            li {
                font-size: 12pt;
            }
            .bawah {
                border-top: 4px solid black;
            }
        </style>
        <center>
            <h1>Thanks for booking here!</h1>
        </center>
        <div
            id="book"
            tabindex="-1"
            aria-labelledby="bookLabel"
            aria-hidden="true"
        >
            <h2>Your order</h2>
            <table class="table table-borderless">
                <thead>
                    <tr class="table-light">
                        <td scope="col">Order Number</td>
                        <th scope="col">{{ $booking->ordernumber}}</th>
                    </tr>
                </thead>
                <tr class="table-light">
                    <td scope="col">Fullname</td>
                    <th scope="col">{{ $booking->fullname}}</th>
                </tr>
                <tr class="table-light">
                    <td scope="col">Whatsapp Number</td>
                    <th scope="col">{{ $booking->phone}}</th>
                </tr>
                <tr class="table-light">
                    <td scope="col">Hair Artist</td>
                    <th scope="col">{{ $booking->hair_artist}}</th>
                </tr>
                <tr class="table-light">
                    <td scope="col">Services</td>
                    <th scope="col">
                        {{ $booking->foreign_service->nama_service}}
                    </th>
                </tr>
                <tr class="table-light">
                    <td scope="col">Coloring</td>
                    <th scope="col">
                        {{ $booking->foreign_color->nama_coloring}}
                    </th>
                </tr>
                <tr class="table-light">
                    <td scope="col">Reservation Date</td>
                    <th scope="col">{{ $booking->tanggal_reservasi}}</th>
                </tr>
                <tr class="table-light">
                    <td scope="col">Reservation Hour</td>
                    <th scope="col">{{ $booking->jam_reservasi}}</th>
                </tr>
                <tr class="table-light">
                    <td scope="col">Total Price</td>
                    <th scope="col">Rp.{{ moneyFormat($harga) }}</th>
                </tr>
            </table>
            <hr />
            <div class="bawah">
                <div class="hl mx-auto"></div>
                <h2 class="pt-2">Important Notes</h2>
                <ul>
                    <li>
                        Wajib datang paling lambat
                        <b>15 menit</b> sebelulm jam reservasi, atau reservasi
                        akan otomatis hangus
                    </li>
                    <li>
                        Setelah datang diharapkan untuk segera konfirmasi
                        reservasi kepada kasir
                    </li>
                    <li>
                        Tidak ada biaya tambahan karena
                        <b>tidak ada biaya resevasi</b>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
