@extends('layouts.master')

@section("content")
    <div id="urls" class="row index">
        <div class="col-md-12">
            <h1>
                Urls
                @if(has_disk_space())
                    <a class="btn btn-success btn-xs" href="{{ route('urls.create') }}">Create new</a>
                @else
                    <a class="btn btn-danger disabled btn-xs" href="{{ route('urls.create') }}">No diskspace..</a>
                @endif
            </h1>

            <hr/>

            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="3%"/>
                    <col width="20%"/>
                    <col width="20%"/>
                    <col width="35%"/>
                    <col width="5%"/>
                    <col width="17%"/>
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>By</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Mode</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($urls as $url)
                <tr>
                    <td>{{ $url->id }}</td>
                    <td class="text-primary">
                        {{ $url->user->username or "Anon" }}
                    </td>
                    <td><a href="{{ route('urls.show', $url->id)  }}">{{ $url->title }}</a></td>
                    <td>{{ str_limit($url->body) }}</td>
                    <td>{{ $url->mode }}</td>
                    <td>
                        @if( $url->userHasAccess() )
                        {!! Form::open(['route' => ['urls.destroy', $url->id], 'method' => 'delete', 'class' => 'text-center']) !!}
                            <a class="btn btn-info btn-sm" href="{{ route('urls.show', $url->id) }}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('urls.edit', $url->id) }}">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <button class="btn btn-danger btn-sm" type="submit">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        {!! Form::close() !!}
                        @else
                            <button class="btn btn-default btn-block disabled">
                                <span class="glyphicon glyphicon-lock"></span>
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
