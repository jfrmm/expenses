@extends('layouts.app')
@section('content')
<h1>Movements</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movements as $movement)
        <tr>
            <th scope="row">{{ $movement->id }}</th>
            <td>{{ $movement->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
