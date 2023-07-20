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
                        <label for="pictures" class="form-label">Picture</label>
                        <input name="pictures" type="file" class="form-control" id="pictures" />
                        <input type="hidden" name="image" id="imageContainer">
                    </div>

                    <button type="submit" class="btn btn-book" id="submitBtn">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const upload = document.getElementById("pictures");
        const image = document.getElementById("imageContainer");
        const button = document.getElementById("submitBtn");

        upload.addEventListener("change", () => {
            const fileInput = document.getElementById("pictures");
            const file = fileInput.files[0];

            const formData = new FormData();
            formData.append("image", file);

            const apiKey = "76eefb47cf7e390da38ad8d5570f4a2f";
            const apiUrl = `https://api.imgbb.com/1/upload?key=${apiKey}`;

            button.disabled = true;
            fetch(apiUrl, {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const imageUrl = data.data.url;
                    image.value = imageUrl
                    button.disabled = false;
                })
                .catch(error => {
                    button.disabled = false;
                    console.error("Error uploading the image:", error);
                });
        });
    </script>
@endpush
