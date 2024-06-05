@extends('admin.layout.layout')

@section('content')

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="mb-0">Drop Multiple Images</h4>
                    </div>
                    <div class="col-md-12 form-group">
                        @include('alerts.error-alert')
                    </div>
                    <div class="col-md-12 form-group">
                        @include('alerts.success-alert')
                    </div>
                    <div class="card-body">
                        <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>

                        <!-- Dropzone container -->
                        <form action="{{ route('category_slider.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="myDropzone">
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            @csrf
                        </form>

                        <h5 id="message"></h5>

                        <!-- Display existing images -->
                        <div class="row mt-4" id="imageGallery">
                            @foreach($category_sliders as $image)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ asset($image->image_name) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <form action="{{ route('category_slider.destroy', $image->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger delete-image" type="submit">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Dropzone
            var myDropzone = new Dropzone("#myDropzone", {
                paramName: "file",
                maxFilesize: 12, // MB
                resizeQuality: 1.0,
                acceptedFiles: ".jpeg,.jpg,.png,.webp",
                addRemoveLinks: false,
                timeout: 60000,
                dictDefaultMessage: "Drop your files here or click to upload",
                dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
                dictFileTooBig: "File is too big. Max filesize: 12MB.",
                dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
                dictMaxFilesExceeded: "You can only upload up to 5 files.",
                maxFiles: 5,
                success: function(file, response) {
                    $('#message').text(response.success);
                    console.log(response.success);
                    console.log(response);
                },
                error: function(file, response) {
                    console.log(response); // Log the response object to the console
                    $('#message').text('Something Went Wrong! ' + JSON.stringify(response));
                    return false;
                }
            });

            // Delete image handler
            $(document).on('click', '.delete-image', function() {
                var imageId = $(this).data('id');
                var imageUrl = $(this).data('url');

                // AJAX request to delete the image
                $.ajax({
                    url: imageUrl,
                    type: 'DELETE',
                    success: function(response) {
                        // Remove the image from the gallery
                        $('#imageGallery').find('[data-id="' + imageId + '"]').closest('.col-md-3').remove();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
