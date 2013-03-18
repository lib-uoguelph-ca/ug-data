{{ Form::open('login') }}
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username') }}
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
    {{ Form::submit('Log In') }}
{{ Form::close() }}