@extends('layouts.app')
@section('content')

<div class="row justify-content-between">
    <div class="col">
        <h1>Users</h1>
    </div>
    <div class="col">
        <div class="d-flex justify-content-end">
            <div class="btn-group" role="group">
                <a class="btn btn-primary" role="button" href="{{ route('account.accounts.users.create', ['account' => $account]) }}">
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
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <div class="btn-group" role="group">
                    <!-- Delete button -->
                    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $account->id }}"
                        data-subject="user {{ $user->name }}" data-route="{{ route('account.accounts.users.destroy', ['account' => $account, 'user' => $user]) }}">
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
@endsection
