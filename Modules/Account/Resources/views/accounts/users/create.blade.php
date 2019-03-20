@extends('layouts.app')
@section('content')
<h1>Users - Attach</h1>

<div class="form">
    {!! Form::open(['route' => ['account.accounts.users.store'], 'method' => 'post']) !!} {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('email', 'Email') !!} {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form__errors">
        @component('alerts.errors') @endcomponent
    </div>

    {!! Form::submit('Attach', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
</div>
@endsection
