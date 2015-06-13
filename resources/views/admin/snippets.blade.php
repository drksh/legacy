@extends('layouts.master')

@section("content")
    <div id="snippets" class="row index">
        <div class="col-md-12">
            <h1>
                Snippets
                @if(has_disk_space())
                    <a class="btn btn-success btn-xs" href="{{ route('snippets.create') }}">Create new</a>
                @else
                    <a class="btn btn-danger disabled btn-xs" href="{{ route('snippets.create') }}">No diskspace..</a>
                @endif
            </h1>

            <hr/>

            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="20%"/>
                    <col width="20%"/>
                    <col width="35%"/>
                    <col width="5%"/>
                    <col width="22%"/>
                </colgroup>
                <thead>
                <tr>
                    <th>By</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Mode</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($snippets as $snippet)
                <tr>
                    <td class="text-primary">
                        {{ $snippet->user->username or "Anon" }}
                    </td>
                    <td><a href="{{ route('snippets.show', $snippet->slug->slug)  }}">{{ $snippet->title }}</a></td>
                    <td>{{ str_limit($snippet->body) }}</td>
                    <td>{{ $snippet->mode }}</td>
                    <td>
                        @if( $snippet->userHasAccess() )
                        {!! Form::open(['route' => ['snippets.destroy', $snippet->slug->slug], 'method' => 'delete', 'class' => 'text-center']) !!}
                            <a class="btn btn-info btn-sm" href="{{ route('snippets.show', $snippet->slug->slug) }}">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('snippets.edit', $snippet->slug->slug) }}">
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
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <strong>No snippets, yet!</strong>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
