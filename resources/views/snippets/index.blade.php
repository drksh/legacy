@extends('layouts.master')

@section("content")
    <div id="snippets" class="row index">
        <div class="col-md-12">
            <h1>
                Snippets
                <a class="btn btn-success btn-xs" href="{{ route('snippets.create') }}">Create new</a>
            </h1>

            <hr/>

            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="3%"/>
                    <col width="20%"/>
                    <col width="50%"/>
                    <col width="10%"/>
                    <col width="17%"/>
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Mode</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($snippets as $snippet)
                <tr>
                    <td>{{ $snippet->id }}</td>
                    <td><a href="{{ route('snippets.show', $snippet->id)  }}">{{ $snippet->title }}</a></td>
                    <td>{{ str_limit($snippet->body) }}</td>
                    <td>{{ $snippet->mode }}</td>
                    <td>
                        @unless($snippet->hasAccess())
                        {!! Form::open(['route' => ['snippets.destroy', $snippet->id], 'method' => 'delete']) !!}
                            <a class="btn btn-primary btn-sm" href="{{ route('snippets.edit', $snippet->id) }}">Edit</a>
                            <button class="btn btn-danger btn-sm" type="submit">Destory</button>
                        {!! Form::close() !!}
                        @else
                            <em class="text-info">
                                Not authorized
                            </em>
                        @endunless
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
