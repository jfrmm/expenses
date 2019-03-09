@extends('layouts.app')
@section('content')
<h1>Accounts - Edit {{ $account->name }}</h1>

<div class="form">
    {!! Form::open(['route' => ['account.accounts.update', $account], 'method' => 'put']) !!} {!! Form::token() !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!} {!! Form::text('name', $account->name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('iban', 'IBAN') !!} {!! Form::text('iban', $account->iban, ['class' => 'form-control']) !!}
    </div>

    <div class="form__errors">
        @component('forms.errors') @endcomponent
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
</div>
@endsection
