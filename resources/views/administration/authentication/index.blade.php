@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('administration.authentication.login') }}" method="post">
                {!! csrf_field() !!}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Login
                        </h3>
                    </div>
                    <div class="panel-body">

                        @include('layout.partials.messages')

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="submit" class="btn btn-success btn-block" value="Login">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection