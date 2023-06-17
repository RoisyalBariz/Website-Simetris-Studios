@extends('layouts.admin') @section('dashboard')
<div class="container" id="reservation">
    <div class="row">
        <div class="d-flex flex-row mb-3">
            <h4 class="me-auto">Reservation List</h4>
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$booking->fullname}}</td>
                        <td>{{$booking->phone}}</td>
                        <td>{{$booking->foreign_service->nama_service}}</td>
                        <td>Rp.{{moneyFormat($booking->harga)}}</td>
                        <td>{{$booking->tanggal_reservasi}}</td>
                        <td>{{$booking->jam_reservasi}}</td>
                        <td>{{$booking->hair_artist}}</td>
                        <td>
                            {{--
                            <p class="status-paid">Paid</p>
                            --}}
                            <p class="status-unpaid">
                                {{$booking->status_pembayaran}}
                            </p>
                        </td>
                        <td>
                            <div class="row btn-validasi">
                                <div class="col">
                                    <form
                                        action="/reservation/{{ $booking->id }}"
                                        method="post"
                                    >
                                        @method('put') @csrf

                                        <input
                                            type="hidden"
                                            name="fullname"
                                            value="{{$booking->fullname }}"
                                        />
                                        <button>
                                            <img
                                                src="{{
                                                    'source/img/ceklis.svg'
                                                }}"
                                                alt=""
                                            />
                                        </button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form
                                        action="/deleteBooking/{{ $booking->id }}"
                                        method="POST"
                                    >
                                        @method('delete') @csrf
                                        <button
                                            onclick="return confirm('are you sure?')"
                                            type="submit"
                                        >
                                            <img
                                                src="{{
                                                    'source/img/silang.svg'
                                                }}"
                                                alt=""
                                            />
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
