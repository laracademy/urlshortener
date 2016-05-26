@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">
                        Current Links
                        <span class="pull-right"><a href="{{ route('administration.link.create') }}" class="btn btn-primary">New Link</a></span>
                    </h3>
                </div>
                <!-- heading -->
                <div class="panel-body">
                    @include('layout.partials.messages')
                </div>
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Short URL
                            </th>
                            <th class="text-right">
                                Visit
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                            <tr>
                                <td>
                                    {{ $link->name }}
                                </td>
                                <td>
                                    <a href="{{ route('redirect', $link->slug) }}">{{ route('redirect', $link->slug) }}</a>
                                </td>
                                <td class="text-right">
                                    {{ number_format($link->statistics()->count(), 0) }}
                                </td>
                                <td>
                                    <div class="btn-group btn-group-justifed">
                                        <a href="{{ route('administration.link.destroy', $link) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="{{ route('administration.statistic.view', $link) }}" class="btn btn-info"><i class="fa fa-line-chart"></i></a>
                                        <a href="{{ route('administration.link.edit', $link) }}" class="btn btn-primary">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection