@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="messages-container" id="messages-container">
            	
            </div>
            <div class="input">
            	<input type="text" name="user_message" id="user-message">
            	<button onclick="sendFakeMessage()">Send</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add-js')
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script type="text/javascript">
		function sendFakeMessage()
		{
			var message = $('#user-message').val();
			$('.messages-container').append('<div class="message"><h4>{{ Auth::user()->name }}</h4><p>' + message + '</p></div>');
			setTimeout(function() {
				$('.messages-container').append('<div class="message admin"><h4>Administrator</h4><p>We are sorry to hear that you are having issues at the moment, we will be in touch as soon as possible to see how we can help you.</p></div>');
			}, 2000);
		}
	</script>
@endsection