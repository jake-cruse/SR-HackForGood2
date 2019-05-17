@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Class Leaderboard</h1>
            @foreach($classes as $class)
                <div class="item">{{ $class->name }} - {{ $class->score }} points</div>
            @endforeach
        </div>
    </div>
</div>
@endsection