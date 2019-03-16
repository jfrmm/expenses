@extends('layouts.app')
@section('content')
<h1>Movements - Create</h1>

<div class="form">
    {!! Form::open(['route' => ['account.accounts.movements.store', $account], 'method' => 'post']) !!} {!! Form::token() !!}
    <div class="row">
        <div class="form-group col">
            {!! Form::label('date', 'Date') !!} {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('amount', 'Amount') !!} {!! Form::number('amount', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!} {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form__errors">
        @component('alerts.errors') @endcomponent
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
</div>
@endsection
