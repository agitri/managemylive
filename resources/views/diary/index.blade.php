@extends('layouts.app')

@section('header')
    Diary
@endsection

@section('headerColor')
    blue
@endsection

@section('content')

    <table>
        <tr>
            <td style="width: 100%">
                <a href="/diary/entry/create" class="btn btn-primary btn-lg mb-4">Add Entry</a>
            </td>
            <td>
                {{ Form::open(['action' => ['DiaryController@destroy', $diary->id], 'method' => 'POST', 'class' => 'float-right']) }}

                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Destroy Diary', ['class' => 'btn btn-danger btn-sm']) }}

                {{ Form::close() }}
            </td>
        </tr>
    </table>

    @foreach($diary->entries()->orderBy('created_at', 'desc')->get() as $entry)
        <div class="card bg-light mb-4">
            <div class="card-header">
                <h3 class="card-title mb-0 mt-2">{{ $entry->title }}</h3>
                <small>{{ $entry->created_at }}</small>
            </div>
            <div class="card-body text-dark">
                {!! $entry->content !!}
            </div>
            <div class="card-footer">
                <table>
                    <tr>
                        <td style="width: 100%">
                            <a href="/diary/entry/{{ $entry->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            {{ Form::open(['action' => ['DiaryEntryController@destroy', $entry->id], 'method' => 'POST', 'class' => 'pull-right']) }}

                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}

                            {{ Form::close() }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endforeach

@endsection
