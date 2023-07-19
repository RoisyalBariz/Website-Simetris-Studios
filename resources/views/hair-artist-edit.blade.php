@extends('layouts.admin') @section('dashboard')
    <div class="container" id="reservation">
        <div class="row">
            <div class="d-flex flex-row mb-3">
                <h4 class="me-auto">Update Hair Artist</h4>
            </div>
            <div>
                <form action="/hair-artist/{{ $hairArtist->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name"
                            placeholder="Fill with your full name" required value="{{ $hairArtist->name }}" />
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Url</label>
                        <input name="image" type="text" class="form-control" id="image"
                            placeholder="Fill with your image link" required value="{{ $hairArtist->image }}" />
                    </div>
                    {{-- <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input name="picture" type="file" class="form-control" id="picture"
                            placeholder="Fill with your Whatsapp Number" />
                    </div> --}}

                    <button type="submit" class="btn btn-book">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
