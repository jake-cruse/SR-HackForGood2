@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Threads</div>

                <ul class="threads">
                    @foreach($threads as $thread)
                        <li><a href="{{ url('chat/' . $thread->id) }}">{{ $thread->name }}</a></li>
                    @endforeach
                </ul>
                <div class="panel-footer">
                    <button>Create new thread</button>
                    <form action="{{ route('do-add-thread') }}" method="post" class="create-thread hidden">
                        @csrf
                        <input type="text" name="name">
                        <input type="submit" value="create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection