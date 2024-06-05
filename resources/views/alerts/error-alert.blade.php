@if($errors->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $errors->first('error') }}
  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
</div>
@endif