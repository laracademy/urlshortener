@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('administration.link.insert') }}" method="post" autocomplete="off">
                {!! csrf_field() !!}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create New Link
                        </h3>
                    </div>
                    <div class="panel-body">

                        @include('layout.partials.messages')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Full URL</label>
                            <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                        </div>

                        <div class="form-group">
                            <label>Short URL *optional</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                        </div>
                    </div>
                    <!-- /panel-body -->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="submit" class="btn-btn-success btn-block" value="Create Link">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection