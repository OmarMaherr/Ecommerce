@foreach($subcategories as $subcategory)
    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $category->parent_id ? 'selected' : '' }} >{{ $prefix }} {{ $subcategory->name }} </option>
    @if(count($subcategory->children))
        @include('admin.categories.sub_category_options', ['subcategories' => $subcategory->children, 'prefix' => $prefix . '-'])
    @endif
@endforeach
