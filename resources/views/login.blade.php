<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('final.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
            </div>
            
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @if($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                @endif
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
