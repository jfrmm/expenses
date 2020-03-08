@extends('layouts.app')
@section('content')

<div class="row justify-content-between">
    <div class="col">
        <h1>Movements</h1>
    </div>
    <div class="col">
        <div class="d-flex justify-content-end">
            <div class="btn-group" role="group">
                <a class="btn btn-primary" role="button"
                    href="{{ route('account.accounts.movements.create', ['account' => $account]) }}">
                    <i class="fas fa-plus"></i> Add
                </a>
                <a class="btn btn-primary" role="button"
                    href="{{ route('account.accounts.movements.import', ['account' => $account]) }}">
                    <i class="fas fa-plus"></i> Import
                </a>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">
                    Import
                </button> --}}
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movements as $movement)
        <tr>
            <th scope="row">{{ $movement->id }}</th>
            <td>{{ $movement->date }}</td>
            <td>@currency($movement->amount)</td>
            <td>{{ $movement->description }}</td>
            <td>
                <div class="btn-group" role="group">
                    {{-- Edit button --}}
                    <a class="btn btn-light btn-sm" role="button"
                        href="{{ route('account.accounts.movements.edit', ['account' => $account, 'movement' => $movement]) }}">
                        <i class="fas fa-edit"></i>
                    </a> {{-- Delete button --}}
                    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#deleteModal"
                        data-id="{{ $movement->id }}" data-subject="movement {{ $movement->description }}"
                        data-route="{{ route('account.accounts.movements.destroy', ['account' => $account, 'movement' => $movement]) }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Delete Modal -->
@component('modals.delete') @endcomponent

<!-- Import Modal -->
{{-- @component('account::accounts.movements.import') @endcomponent --}}

@endsection
