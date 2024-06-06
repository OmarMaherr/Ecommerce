@extends('layout.layout')


@section('content')

    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">

                @if (session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif

                <h1>Log in</h1>
                <form action="{{route('login')}}" name="login_form" class="row tracking_form" method="POST" >
                    @csrf
                    <div class="col-md-12 form-group">
                        <label for="phone_number">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="phone_number">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                               required>
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="btn submit_btn">Log in</button>
                    </div>
                    <div class="col-md-12 form-group">
                        @include('alerts.error-alert')
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="alert alert-danger login_error alert-dismissible fade" role="alert">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <p>Don't have an Account? <a href="{{route('register')}}"> Register Now!</a></p>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script>
        var loginRoute = "{{ route('check_login') }}";
    </script>
@endsection
