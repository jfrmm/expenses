@extends('layouts.app')
@section('content')
<h1>Movements - Edit {{ $movement->description }}</h1>

<div class="form">
    {!! Form::open(['route' => ['account.accounts.movements.update', $account, $movement], 'method' => 'put']) !!} {!! Form::token()
    !!}
    <div class="row">
        <div class="form-group col">
            {!! Form::label('date', 'Date') !!} {!! Form::date('date', $movement->date, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('amount', 'Amount') !!} {!! Form::number('amount', $movement->amount, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!} {!! Form::text('description', $movement->description, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form__errors">
        @component('alerts.errors') @endcomponent
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
</div>
@endsection
