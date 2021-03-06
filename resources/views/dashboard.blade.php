@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        Take me to my <a href="{{ route('account.accounts.index') }}">accounts.</a>
    </div>
</div>
@endsection
