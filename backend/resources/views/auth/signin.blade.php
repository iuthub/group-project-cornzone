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

    <form method="POST" action="{{ route('auth.signin') }}">
        @csrf
        <label for="email">Email address</label>
        <input type="email" name="email" id="email">
        @if ($errors->has('email'))
            email йокмайапти
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

