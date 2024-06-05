@extends('admin.layout.layout')

@section('content')
<link href="{{ asset('assets/libs/jquery-steps/jquery.steps.css') }} " rel="stylesheet" />
<link href="{{ asset('assets/libs/jquery-steps/steps.css') }} " rel="stylesheet" />
<link href="{{ asset('dist/css/style.min.css') }} " rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
  .alert {
    display: none;
    position: relative;
    margin-top: 8px;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    max-width: 255px;
    box-shadow: 0 1px 15px #00000027;
  }

  .triangle {
    position: absolute;
    top: -9px;
    left: 10px;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #ffe2e4db;
  }

  .alert-danger {
    color: #721c24;
    background-color: #ffe2e4db;
    border-color: #ffe2e4db;
  }



  .is-invalid {
    border: 1px solid rgb(250, 95, 95);
  }

  /****/
  .is-invalid+.alert {
    display: block;
  }

  .is-valid {
    border: 1px solid #3cb88f;
    box-shadow: 0 0 3px #80fbd2;
  }

  .is-valid:focus {
    border-color: #3cb88f;
    box-shadow: 0 0 5px #6eefc4;
  }


  .specification {
    display: flex;
  }

  .specification-div {
    max-width: 52%;
    margin: auto;
  }
</style>

<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="card">
  <div class="card-body wizard-content">
    <h4 class="card-title">Basic Form Example</h4>
    <h6 class="card-subtitle"></h6>
    <form id="example-form" action="{{ route('product.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
      @csrf
      <div>
        <h3>Product Details</h3>
        <section>

          <label for="name">Product Name</label>
          <input id="name" name="name" type="text" class="required form-control" data-tr-rules="required|between:2,250" />
          <div class="alert alert-danger" role="alert">
            <div class="triangle"></div>
            <div data-tr-feedback="name"></div>
          </div>
          <label for="price">Price JOD</label>
          <input id="price" name="price" type="number" class="required form-control" />
          <label for="description">Description</label>
          <textarea id="description" name="description"></textarea>

        </section>
        <h3> Product Type</h3>
        <section>

          <div class="row">
            <div class="col-3">
              <label for="category_id">Category</label>
              <select name="category_id" class="form-control select2">


                <option value="">Select Category</option>

                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @if(count($category->children))
                @include('admin.categories.sub_category_options', ['subcategories' => $category->children, 'prefix' => '-'])
                @endif
                @endforeach


              </select>
            </div>
            <div class="col-3">
              <label for="color_id">Color</label>
              <select name="color_id" class="form-control select2">
                <option value="">Select Color</option>
                @foreach($colors as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-3">
              <label for="brand_id">Brand</label>
              <select name="brand_id" class="form-control select2">
                <option value="">Select Brand</option>
                @foreach($brands as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-3">
              <input type="hidden" value="" id="flexCheckDefault" name="is_featured">
              <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="is_featured">
              <label class="form-check-label" for="flexCheckDefault">
                Is Featured
              </label>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <div class="specification-div">
                <h3>Product Specification</h3>
                <div id="specification-form">
                  <div class="specification">
                    <input type="text" class="required form-control" name="key[]" placeholder="Key">
                    <input type="text" class="required form-control" name="value[]" placeholder="Value">
                  </div>
                </div>
                <button type="button" id="add-btn" class="btn btn-success mt-1">Add More</button>
              </div>
            </div>
          </div>

        </section>
        <h3> Product Images</h3>
        <section>
          <div class="container mt-4">
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h4 class="mb-0">Drop Multiple Product Images</h4>
                  </div>
                  <div class="col-md-12 form-group">
                    @include('alerts.error-alert')
                  </div>
                  <div class="col-md-12 form-group">
                    @include('alerts.success-alert')
                  </div>
                  <div class="card-body">
                    <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>


                    <div id="myDropzone" class="dropzone">
                      <!-- Dropzone will automatically add file upload functionality here -->
                    </div>
                    <h5 id="message"></h5>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </form>
  </div>
</div>
<!-- Include jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


@endsection


@section('added_script')



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: 'Select an option',
      allowClear: true
    });
  });
</script>

<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->


<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<!-- this page js -->

<script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  var myDropzone;

  // Initialize Dropzone
  Dropzone.options.myDropzone = {
    url: "{{ route('product.store') }}",
    autoProcessQueue: false,
    paramName: "product_images",
    maxFilesize: 2, // MB
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    dictDefaultMessage: "Drop files here or click to upload.",
    init: function() {
      // Save Dropzone instance to myDropzone variable
      myDropzone = this;

      this.on("complete", function() {
        if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
          var _this = this;
          _this.removeAllFiles();
        }
      });
    }
  };

  // Rest of your script...




  // Basic Example with form
  var form = $("#example-form");
  form.validate({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      confirm: {
        equalTo: "#password",
      },
    },
  });
  form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
      form.validate().settings.ignore = ":disabled,:hidden";
      return form.valid();
    },
    onFinishing: function(event, currentIndex) {
      form.validate().settings.ignore = ":disabled";
      return form.valid();
    },
    onFinished: function(event, currentIndex) {
      // alert("Submitted!");
      // $('#example-form').submit(function() {
      //   $('#description_input').val(simplemde.value());
      //   myDropzone.processQueue();

      // });
      // form.submit();


      var formData = new FormData($('#example-form')[0]);
      formData.append('description', simplemde.value());


      // Get Dropzone files
      var dropzoneFiles = [];
      var myDropzoneFiles = myDropzone.files;
      for (var i = 0; i < myDropzoneFiles.length; i++) {
        formData.append('product_images[]', myDropzoneFiles[i]);
      }

      // Submit form data with Dropzone files
      $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          // Handle success response
          console.log(response);

          let timerInterval;
          Swal.fire({
            title: "Product Successfully Added",
            // html: "I will close in <b></b> milliseconds.",
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
              const timer = Swal.getPopup().querySelector("b");
              timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
              }, 100);
            },
            willClose: () => {
              clearInterval(timerInterval);
            }
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
              console.log("I was closed by the timer");
              window.location.href = "{{ route('product.index') }}";
            }
          });


        },
        error: function(xhr, textStatus, errorThrown) {
          // Handle error
          console.error(textStatus);
        }
      });
    },
  });
</script>

<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
  var simplemde = new SimpleMDE({
    element: document.getElementById("description")
  });
</script>

<script>
  const tr = new Trivule();
  tr.init();
</script>


<script>
  $(document).ready(function() {
    $('#add-btn').click(function() {
      const newSpec = $('<div class="specification mt-1"><input type="text" class="required form-control" name="key[]" placeholder="Key"><input type="text" class="required form-control" name="value[]" placeholder="Value"><button type="button" class="remove-btn btn btn-danger">Remove</button></div>');
      $('#specification-form').append(newSpec);
    });

    // Use event delegation to handle click events for dynamically added elements
    $('#specification-form').on('click', '.remove-btn', function() {
      $(this).parent('.specification').remove();
    });
  });
</script>






@endsection