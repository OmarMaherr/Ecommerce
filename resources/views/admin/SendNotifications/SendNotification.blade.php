@extends('admin.layout.layout')


@section('content')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create Notification</div>
                    <div class="card-body">
                        <form action="{{ route('send_notification.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Notification Title:</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Notification Title" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Notification Body:</label>
                                <input type="text" class="form-control" id="body" name="body" placeholder="Enter Notification Body" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Notification</button>
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
