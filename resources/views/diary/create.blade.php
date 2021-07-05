@extends('layouts.app')

@section('header')
    Diary
@endsection

@section('headerColor')
    blue
@endsection

@section('content')

    <h2 class="mb-10">Write Diary Entry</h2>

    {{ Form::open(['action' => 'DiaryEntryController@store', 'method' => 'POST']) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control mt-1', 'placeholder' => 'Title']) }}
        </div>

        <div class="form-group mt-3">
            {{ Form::textarea('content', '', ['class' => 'ckeditor form-control mt-1', 'placeholder' => 'Content']) }}
        </div>

        {{ Form::submit('Create', ['class' => 'btn btn-primary mt-4']) }}

    {{ Form::close() }}

@endsection
