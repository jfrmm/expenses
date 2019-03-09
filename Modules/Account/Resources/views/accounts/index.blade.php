@extends('layouts.app')
@section('content')
<h1>Accounts</h1>

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
                <a href="{{ route('account.accounts.edit', ['account' => $account]) }}">Edit</a>
                <a href="{{ route('account.accounts.movements.index', ['account' => $account]) }}">Movements</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
