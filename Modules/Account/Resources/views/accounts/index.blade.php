@extends('layouts.app')
@section('content')

<div class="row justify-content-between">
    <div class="col">
        <h1>Accounts</h1>
    </div>
    <div class="col">
        <div class="d-flex justify-content-end">
            <div class="btn-group" role="group">
                <a class="btn btn-primary" role="button" href="{{ route('account.accounts.create') }}">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">IBAN</th>
            <th scope="col">Owner</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accounts as $account)
        <tr>
            <th scope="row">{{ $account->id }}</th>
            <td>{{ $account->name }}</td>
            <td>{{ $account->iban }}</td>
            <td>{{ $account->owner->name }}</td>
            <td>
                <div class="btn-group" role="group">
                    {{-- Edit button --}}
                    <a class="btn btn-light btn-sm" role="button" href="{{ route('account.accounts.edit', ['account' => $account]) }}">
                        <i class="fas fa-edit"></i>
                    </a> {{-- Delete button --}}
                    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $account->id }}"
                        data-subject="account {{ $account->name }}" data-route="{{ route('account.accounts.destroy', ['account' => $account]) }}">
                        <i class="fas fa-trash"></i>
                    </button> {{-- Movements button --}}
                    <a class="btn btn-light btn-sm" role="button" href="{{ route('account.accounts.movements.index', ['account' => $account]) }}">
                        <i class="fas fa-chart-bar"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Delete Modal -->
@component('modals.delete') @endcomponent
@endsection
