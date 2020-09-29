<html>

<head>
    <title>Look at me Login</title>
</head>

<body>
    <form method="POST" action="loginController">
        @csrf
        <label for="name">Username</label>
        <input id="name" name="name" type="text" class="@error('name') is-invalid @enderror">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password">Password</label>
        <input id="password" name="password" type="password" class="@error('password') is-invalid @enderror">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-dark btn-block">Submit</button>

    </form>

</body>

</html>