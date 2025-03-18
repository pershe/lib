<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>libra.page</title>

    <style>
         * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
    background-color: white;
    border-bottom: 1px solid #eaeaea;
}

.logo {
    font-size: 24px;
    font-weight: bold;
    font-family: 'Brush Script MT', cursive; /* Optional: for a handwritten effect */
}

.nav-links {
    list-style: none;
    display: flex;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    text-decoration: none;
    color: #333;
}

.auth-buttons {
    display: flex;
}

.auth-buttons a {
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
}

.login {
    color: #333;
    margin-right: 10px;
}

.signup {
    color: white;
    background-color: #1abc9c;
}
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Libra⚖️</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        @auth
        <form action="{{ route("logout") }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @else
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="login">Login</a>
            <a href="{{ route('register') }}" class="signup">Sign Up</a>
        </div>
        @endauth
    </nav>

    <main>
        @yield('content') {{-- This is where content from other views will be injected --}}
    </main>
</body>
</html>
