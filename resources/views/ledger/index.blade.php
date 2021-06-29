@extends('layouts.app')

@section('header')
    Ledger
@endsection

@section('headerColor')
    orange
@endsection

@section('content')

    <h2 class="mb-10">Overview</h2>

    <table class="table table-hover table-striped align-middle">
        <thead>
            <tr>
                <th scope="col" style="width: 50%">Description</th>
                <th scope="col" style="width: 25%">Credit</th>
                <th scope="col" style="width: 25%">Debit</th>
                <th scope="col" colspan="2">
                    {{ Form::open(['action' => ['LedgerController@destroy', $ledger->id], 'method' => 'POST']) }}

                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Destroy Ledger', ['class' => 'btn btn-danger btn-sm']) }}

                    {{ Form::close() }}
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($ledger->items()->where('type', 1)->orderBy('amount', 'desc')->get() as $item)
            <tr class="table-success">
                <td>{{ $item->description }}</td>
                <td>{{ $item->amount }}</td>
                <td></td>
                <td>
                    <a href="/ledger/item/{{ $item->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                    {{ Form::open(['action' => ['LedgerItemController@destroy', $item->id], 'method' => 'POST']) }}

                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Remove', ['class' => 'btn btn-warning btn-sm']) }}

                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        @foreach($ledger->items()->where('type', 2)->orderBy('amount', 'desc')->get() as $item)
            <tr class="table-danger">
                <td>{{ $item->description }}</td>
                <td></td>
                <td>{{ $item->amount }}</td>
                <td>
                    <a href="/ledger/item/{{ $item->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                    {{ Form::open(['action' => ['LedgerItemController@destroy', $item->id], 'method' => 'POST']) }}

                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Remove', ['class' => 'btn btn-warning btn-sm']) }}

                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        <tr>
            <th scope="row">Total</td>
            <td>{{ $ledger->items()->where('type', 1)->sum('amount') }}</td>
            <td>{{ $ledger->items()->where('type', 2)->sum('amount') }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">Balance</td>
            <td></td>
            <td></td>
            <td colspan="2"><strong>{{ $ledger->items()->where('type', 1)->sum('amount') - $ledger->items()->where('type', 2)->sum('amount') }}</strong></td>
        </tr>
        </tbody>
    </table>

    <a href="/ledger/item/create" class="btn btn-primary btn-lg">Add Item</a>

@endsection
