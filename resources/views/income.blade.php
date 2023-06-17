@extends('layouts.admin') @section('dashboard')
<div class="container" id="income">
    <div class="row">
        <div class="d-flex flex-row mb-3">
            <h4 class="me-auto">Income List</h4>
            <a target="_blank" href="/income/cetak_income">
                <button class="btn btn-print">
                    <i class="bi bi-printer"></i> Print PDF
                </button>
            </a>
        </div>
        <div>
            <table class="table table-responsive text-center">
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
                    <tr>
                        <td><b>TOTAL</b></td>
                        <td></td>
                        <td></td>
                        <td>
                            <b>Rp.{{ moneyFormat($total) }}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
