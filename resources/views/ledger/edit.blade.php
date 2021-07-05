@extends('layouts.app')

@section('header')
    Ledger
@endsection

@section('headerColor')
    orange
@endsection

@section('content')
    <h2 class="mb-10">Edit Ledger Item</h2>

    {{ Form::open(['action' => ['LedgerItemController@update', $item->id], 'method' => 'POST']) }}

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', $item->description, ['class' => 'form-control mt-1', 'placeholder' => 'Description']) }}
    </div>

    <div class="form-group mt-3">
        {{ Form::label('type', 'Type') }}
        {{ Form::select('type', ['1' => 'Credit', '2' => 'Debit'], $item->type, ['class' => 'form-control mt-1', 'placeholder' => 'Select the type']) }}
    </div>

    <div class="form-group mt-3">
        {{ Form::label('amount', 'Amount') }}
        {{ Form::number('amount', $item->amount, ['class' => 'form-control mt-1', 'placeholder' => 'Amount']) }}
    </div>

    {{ Form::hidden('_method', 'PUT') }}

    {{ Form::submit('Save', ['class' => 'btn btn-primary mt-4']) }}

    {{ Form::close() }}
@endsection
