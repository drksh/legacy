@extends('layouts.master')

@section("content")
    <div id="snippets" class="row index">
        <div class="col-md-12">
            <h1>
                Files: <small>by {{ $user->username }}</small>
            </h1>

            @if(has_disk_space())
                <a class="btn btn-success btn-xs" href="{{ route('files.create') }}">Create new</a>
            @else
                <a class="btn btn-danger disabled btn-xs" href="{{ route('files.create') }}">No diskspace...</a>
            @endif

            <hr/>

            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="82%"/>
                    <col width="17%"/>
                </colgroup>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($files as $file)
                <tr>
                    <td><a href="{{ route('files.show', $file->slug->slug)  }}">{{ $file->title }}</a></td>
                    <td>
                        @if( $file->userHasAccess() )
                        {!! Form::open(['route' => ['files.destroy', $file->slug->slug], 'method' => 'delete', 'class' => 'text-center']) !!}
                            <a class="btn btn-info btn-sm" href="{{ route('files.show', $file->slug->slug) }}">
                                <span class="glyphicon glyphicon-eye-open"></span>
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
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            <strong>No files, yet!</strong>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
