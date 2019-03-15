@extends('layouts.app')
@section('content')
<h1>Accounts - Create</h1>

<div class="form">
    {!! Form::open(['route' => ['account.accounts.store'], 'method' => 'post']) !!} {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!} {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('iban', 'IBAN') !!} {!! Form::text('iban', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form__errors">
        @component('alerts.errors') @endcomponent
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
</div>
@endsection
