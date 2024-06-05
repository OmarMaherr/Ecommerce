@extends('admin.layout.layout')

@section('content')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
          <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Category Name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Enter category name" required>
            </div>
            <div class="form-group">
              <label for="parent_id">Parent Category:</label>
              <select class="form-control" name="parent_id" id="parent_id">
                <option value="0">Main Category</option>
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>
                    {{ $cat->name }}
                  </option>
                  @if(count($cat->children))
                    @include('admin.categories.sub_category_options', ['subcategories' => $cat->children, 'prefix' => '-'])
                  @endif
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
