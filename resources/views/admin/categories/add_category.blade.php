@extends('admin.layout.layout')


@section('content')


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Create Category</div>
        <div class="card-body">
          <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Category Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
            </div>


            
            <div class="form-group">
              <label for="parent_id">Parent Category:</label>
              <select class="form-control" name="parent_id" id="parent_id">
                <option value="0">Main Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @if(count($category->children))
                @include('admin.categories.sub_category_options', ['subcategories' => $category->children, 'prefix' => '-'])
                @endif
                @endforeach
              </select>
            </div>



            <button type="submit" class="btn btn-primary">Create Category</button>
            <div class="col-md-12 form-group">
              @include('alerts.error-alert')
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection