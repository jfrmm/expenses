@extends('layouts.app')
@section('content')
<h1>Movements - Import</h1>

<div class="form">
    {!! Form::open(
    ['route' => ['account.accounts.movements.import', $account],
    'method' => 'post',
    'files' => true]
    )
    !!}
    {!! Form::token() !!}

    <div class="form-group">
        {!! Form::label('movements', 'Movements CSV file') !!}
        {!! Form::file('movements') !!}
    </div>

    <div class="form__errors">
        @component('alerts.errors') @endcomponent
    </div>

    {!! Form::submit('Import', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
