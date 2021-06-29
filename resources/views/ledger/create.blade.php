@extends('layouts.app')

@section('header')
    Ledger
@endsection

@section('headerColor')
    orange
@endsection

@section('content')

    <h2 class="mb-10">Create Ledger Item</h2>

    {{ Form::open(['action' => 'LedgerItemController@store', 'method' => 'POST']) }}

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', '', ['class' => 'form-control mt-1', 'placeholder' => 'Description']) }}
        </div>

        <div class="form-group mt-3">
            {{ Form::label('type', 'Type') }}
            {{ Form::select('type', ['1' => 'Credit', '2' => 'Debit'], null, ['class' => 'form-control mt-1', 'placeholder' => 'Select the type']) }}
        </div>

        <div class="form-group mt-3">
            {{ Form::label('amount', 'Amount') }}
            {{ Form::number('amount', '', ['class' => 'form-control mt-1', 'placeholder' => 'Amount']) }}
        </div>

        {{ Form::submit('Create', ['class' => 'btn btn-primary mt-4']) }}

    {{ Form::close() }}

@endsection
