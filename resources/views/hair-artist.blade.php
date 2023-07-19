@extends('layouts.admin') @section('dashboard')
<div class="container" id="reservation">
    <div class="row">
        <div class="d-flex flex-row mb-3">
            <h4 class="me-auto">Hair Artist List</h4>
        </div>
        <div>
            <table class="table table-responsive text-center">
                <thead>
                    <tr class="table-light">
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>                        
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($hairArtists as $artist)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artist->name}}</td>
                        <td>
                            <img src="{{$artist->image}}" alt="artist image" height="80">
                        </td>
                        <td>
                            <a href="{{route("edit-artist", ["id" => $artist->id])}}">
                                <img src="{{ asset('source/img/edit.svg') }}" height="24" width="24" alt=""></a>
                            </td>                                                                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
