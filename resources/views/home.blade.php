<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth

        <h1>Welcome {{ auth()->user()->name }}</h1>
        <p>Congrats, you are logged in!</p>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div style="border: 3px solid black">
            <h2>Create new post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="title">
                <textarea name="body" placeholder="body content..."></textarea>
                <button type="submit">Save post</button>
            </form>
        </div>

        <div style="border: 3px solid black">
            <h2>All posts</h2>
            @foreach($posts as $post)
                <div style="background-color: grey; padding: 10px; margin: 10px;">
                    <h3>{{ $post['title'] }} by {{ $post['user']['name'] }}</h3>
                    {{ $post['body'] }}
                    <p><a href="/edit-post/{{ $post['id'] }}">Edit</a></p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete post</button>
                    </form>
                </div>
            @endforeach
        </div>

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
        <h2>Login</h2>
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