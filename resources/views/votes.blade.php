@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           	<div class="vote-box">

           		@if (Auth::user()->topic_id == NULL)
           			{{-- Not voted yet --}}
       				<h1>Vote for a topic for the week</h1>
	           		@foreach($topics as $topic)
	           			<div class="topic">
	           				<a href="{{ route('vote-for-topic', $topic->id) }}">{{ $topic->name }}</a>
	           			</div>
	           		@endforeach
           		@else
           			{{-- Already voted so show graph --}}
           			<h1>Vote so far</h1>
           			@foreach($topics as $topic)
						<div class="vote-count">{{ $topic->name }} - {{ $topic->getPercentageVotes() }}% ({{ $topic->getVotes() }} votes)</div>
           			@endforeach
           		@endif

           	</div>
        </div>
    </div>
</div>
@endsection