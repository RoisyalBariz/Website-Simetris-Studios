<!DOCTYPE html>
<html>
    <head>
        <title>Income Hair Artist</title>
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
            <h1>Income Hair Artist</h1>
            <h1>Barbershop Simetris Studios</h1>
        </center>

        <table class="table table-bordered">
            <thead>
                <tr class="table-light">
                    <th scope="col">No</th>
                    <th scope="col">Hair Artist</th>
                    <th scope="col">Order Count</th>
                    <th scope="col">Total Income</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mangfeb</td>
                    <td>{{ $pesanan_mangfeb->count() }}</td>
                    <td>Rp.{{ moneyFormat($total_mangfeb) }}</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Allan</td>
                    <td>{{ $pesanan_allan->count() }}</td>
                    <td>Rp.{{ moneyFormat($total_allan) }}</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Andes</td>
                    <td>{{ $pesanan_andes->count() }}</td>
                    <td>Rp.{{ moneyFormat($total_andes) }}</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Aris</td>
                    <td>{{ $pesanan_aris->count() }}</td>
                    <td>Rp.{{ moneyFormat($total_aris) }}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
