<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth

        <p>Congrats, you are logged in!</p>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

    @else

    {{-- REGISTER --}}
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Register</button>
        </form>
    </div>

    {{-- LOGIN --}}

    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginname" placeholder="name">
            <input type="password" name="loginpassword" placeholder="password">
            <button type="submit">Log in</button>
        </form>
    </div>

    @endauth

</body>
</html>