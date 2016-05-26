@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('administration.link.update') }}" method="post" autocomplete="off">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{ $link->id }}">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Editing Link {{ $link->name }}
                        </h3>
                    </div>
                    <div class="panel-body">

                        @include('layout.partials.messages')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $link->name) }}">
                        </div>

                        <div class="form-group">
                            <label>Full URL</label>
                            <input type="text" class="form-control" name="url" value="{{ old('url', $link->url) }}">
                        </div>

                        <div class="form-group">
                            <label>Short URL *optional</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug', $link->slug) }}">
                        </div>
                    </div>
                    <!-- /panel-body -->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="submit" class="btn-btn-success btn-block" value="Update Link">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection