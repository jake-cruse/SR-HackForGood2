@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $thread->name }} thread</div>

                <div class="panel-body">
                    <chat-messages :messages="messages" :thread_id="{{ $thread->id }}"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                        :thread_id="{{ $thread->id }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection