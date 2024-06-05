@extends('admin.layout.layout')

@section('content')
<!-- Add any custom styles here -->
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    color: #fff;
    background: #c5c5c5;
    border-width: 0;
    border-bottom: 1px solid #000;
    font-weight: normal !important;
    padding: 15px;
    text-align: left;
    vertical-align: middle;
  }

  tr {
    &.bg-shade-1 {

      td,
      th {
        background: #ff3360;
      }
    }

    &.bg-shade-2 {

      td,
      th {
        background: #c21749;
      }
    }

    &.bg-shade-3 {

      td,
      th {
        background: #911546;
      }
    }

    &.bg-shade-4 {

      td,
      th {
        background: #66203C;
      }
    }

    &.bg-shade-5 {

      td,
      th {
        background: #4C1A2E;
      }
    }
  }

  thead,
  tfoot {
    text-transform: uppercase;

    th {
      background: #1ab978;
      font-size: 13px;
    }
  }

  body {
    color: #111;
    font-size: 16px;
    font-family: sans-serif;
  }

  .icon_menu {
    display: block;
    height: 10px;
    margin: auto;
    position: relative;
    width: 16px;

    .icon_menu__solid,
    &:before,
    &:after {
      background: #fff;
      display: block;
      height: 2px;
    }

    .icon_menu__solid {
      position: relative;
      top: 50%;
      transform: translateY(-50%);
    }

    &:before,
    &:after {
      content: "";
      left: 0;
      position: absolute;
      right: 0;
    }

    &:before {
      top: 0;
    }

    &:after {
      bottom: 0;
    }
  }

  .gu-mirror {
    position: fixed !important;
    margin: 0 !important;
    z-index: 9999 !important;
  }

  .gu-hide {
    display: none !important;
  }

  .gu-transit {
    opacity: 0.2;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
    filter: alpha(opacity=20);
  }

  .gu-mirror {
    opacity: 0.8;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
    filter: alpha(opacity=80);
  }


  /* Style the container with white background */
  .container-fluid {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
</style>
<div class="container-fluid">

  <h1>Sort Category</h1>
  <div class="row mb-3 d-flex justify-content-center">
    <div class="col-12">
      <div class="alert alert-success rearranged" role="alert" style="display: none;">
        Categories have been rearranged
      </div>
    </div>
  </div>
  <table id="dragula-table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Sort Number</th>
      </tr>
    </thead>
    <tbody id="container">
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->sort_order }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
<!-- Load Dragula script -->
<script src="{{ asset('js/dragula.min.js') }}"></script>

<script>
  var nodeListForEach = function(array, callback, scope) {
    for (var i = 0; i < array.length; i++) {
      callback.call(scope, i, array[i]);
    }
  };

  var sortableTable = dragula([container]);


  sortableTable.on('dragend', function() {
    var rows = document.querySelectorAll('#container tr');
    var data = [];
    rows.forEach(function(row, index) {
      var id = row.querySelector('td:first-child').textContent;
      var sort_order = index + 1;
      data.push({
        id: id,
        sort_number: sort_order
      });
    });



    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: "{{ route('confirm.sort_category') }}",
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(data),
      success: function(response) {
        $('.rearranged').show();

        setTimeout(function() {
          $('.rearranged').hide();
        }, 3000);

        // console.log('Data sent successfully:', response);
      },
      error: function(error) {
        // console.error('Error sending data:', error);
      }
    });

  });
</script>

@endsection