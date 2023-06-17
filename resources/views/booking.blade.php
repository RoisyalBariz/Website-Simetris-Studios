@extends('layouts.home')
@section('booking')
    <div class="container-fluid" id="booking">
        <h1>Booking Form</h1>
        <p>
            Book your next grooming appointment quickly and easily! Choose from a
            range of services and select your preferred date and time.
        </p>

        <button class="btn btn-price" data-bs-toggle="modal" data-bs-target="#pricelist">
            See Pricelist
        </button>

        @if (Session::has('message'))
            <div class="alert alert-danger mt-3" role="alert">{{ Session::get('message') }}</div>
        @endif

        <div class="modal fade" id="pricelist" tabindex="-1" aria-labelledby="pricelistLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>Pricelist</h1>
                        <div class="row">
                            <div class="col-6 kiri">
                                <h5>Haircuts</h5>
                                <p>Men's Haircut</p>
                                <p>Dry Shaving</p>
                                <p>Traditional Shaving</p>
                                <p>Styling</p>
                                <p>Hairmask</p>
                                <p>Perming</p>
                            </div>
                            <div class="col-6 kanan">
                                <br />
                                <p>Rp60.000</p>
                                <p>Rp20.000</p>
                                <p>Rp35.000</p>
                                <p>Rp35.000</p>
                                <p>Rp60.000</p>
                                <p>Rp300.000</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 kiri">
                                <h5>Coloring</h5>
                                <p>Basic Color Black</p>
                                <p>Basic Color Brown</p>
                                <p>Highlight Bleach</p>
                                <p>Highlight Color</p>
                                <p>Fashion Color</p>
                            </div>
                            <div class="col-6 kanan">
                                <br />
                                <p>Rp70.000</p>
                                <p>Rp80.000</p>
                                <p>Rp150.000</p>
                                <p>Rp300.000</p>
                                <p>Rp300.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mx-auto">
            <div class="card-body">
                <form action="/booking" method="post" enctype="multipart/form-data" >
                    @csrf

                    <div class="mb-3">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input name="fullname" type="text" class="form-control" id="fullname"
                            placeholder="Fill with your full name" required / >
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="form-label">Whatsapp Number</label>
                        <input name="phone" type="number" class="form-control" id="whatsapp"
                            placeholder="Fill with your Whatsapp Number" required />
                    </div>
                    <div class="mb-3">
                        <label for="services" class="form-label">Services</label>

                        <select name="service" class="form-select" aria-label="Default select example" required>
                            <option value="7" selected>Select service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->nama_service }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="coloring" class="form-label">Coloring</label>
                        <select name="coloring" class="form-select" aria-label="Default select example" required>
                            <option value="6" selected>Select Coloring</option>
                            @foreach ($colorings as $coloring)
                                <option value="{{ $coloring->id }}">{{ $coloring->nama_coloring }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3 mt-3">
                            <label for="reservation-date" class="form-label">Reservation Date</label>
                            <input name="tanggal_reservasi" type="date" class="form-control calendar" id="reservation-date"
                                onfocus="(this.type='date')" onblur="(this.type='text')"
                                placeholder="dd-mm-yyyy" required />
                                @error('tanggal_reservasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                        </div>
                        <div class="mb-3">
                            <label for="reservation-hour" class="form-label">Reservation Hour</label>
                            <input name="jam_reservasi" type="time" class="form-control time" id="reservation-hour"
                                onfocus="(this.type='time')" onblur="(this.type='text')"
                                placeholder="Select reservation hour" required />
                        </div>
                        <div class="mb-3">
                            <label for="hair-artist" class="form-label">Choose Hair Artist</label>

                            <div class="row">
                                @foreach ($hairartists as $hairartist)
                                    <div class="col-lg-3 col-md-3">
                                        <label class="form-check-label" for="{{ $hairartist->name }}">
                                            <input class="form-check-input" type="radio" name="hair_artist"
                                                id="{{ $hairartist->name }}" value="{{ $hairartist->name }}" required />
                                            <img src="{{ asset('source/img') }}/{{ $hairartist->image }}"
                                                alt="" />
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-book">
                            Reserve Now
                        </button>
                </form>
            </div>
        </div>
    </div>
@endsection
