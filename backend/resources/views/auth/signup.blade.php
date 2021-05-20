<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="{{ route('auth.signup') }}">
        @csrf
        <label for="email">Email address</label>
        <input type="emil" name="email" id="email">
        @if ($errors->has('email'))
            email йокмайапти
        @endif

        <label for="first_name">first name</label>
        <input type="first_name" name="first_name" id="first_name">
        @if ($errors->has('first_name'))
            first_name йокмайапти
        @endif

        <label for="last_name">last name</label>
        <input type="last_name" name="last_name" id="last_name">
        @if ($errors->has('last_name'))
            last_name йокмайапти
        @endif

        <label for="password">password</label>
        <input type="password" name="password" id="password">
        @if ($errors->has('password'))
            password йокмайапти
        @endif
    
        <button type="submit">Submit</button>
    
    </form>

    
</body>
</html>

