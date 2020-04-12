@extends('layout')

@section('content')
<div class="container">
    <div class="content">
        <h1>Hahaha {{ $foo }}</h1>
        <ul>
            @foreach ($taskis as $task)
            <li>{{ $task }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection