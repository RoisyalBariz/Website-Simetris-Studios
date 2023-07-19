@extends('layouts.admin') @section('dashboard')
<div class="container" id="isi">
    <div class="row" id="section1">
        <div class="d-flex flex-row mb-3">
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-calendar"></i>
                    <h2>Friday,</h2>
                    <h6>24 January 2023</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <img
                        src="{{ 'source/img/receipt_long_card.svg' }}"
                        alt=""
                    />
                    <h2>0</h2>
                    <h6>Reservation Today</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <img
                        src="{{ 'source/img/receipt_long_card.svg' }}"
                        alt=""
                    />
                    <h2>{{ $total_booking->count() }}</h2>
                    <h6>Total Reservation</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="section2">
        <div class="d-flex flex-row mb-3">
            <h4 class="me-auto">Customer Reservation List</h4>
            <a target="_blank" href="/reservation/cetak_reservation">
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
                        <td>Rp.{{moneyFormat($booking->harga)}}</td>
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
        </div>
    </div>
</div>
@endsection
