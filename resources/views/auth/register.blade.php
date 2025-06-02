<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <link rel="stylesheet" href="{{ asset('SignUp_Login_Form.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="container">
    {{-- LOGIN FORM --}}
    <div class="form-box login">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1>Login</h1>

            @if ($errors->has('login'))
                <p style="color: red;">{{ $errors->first('login') }}</p>
            @endif

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>or login with social platforms</p>
            <div class="social-icons">
                <a href="mailto:namakamu@gmail.com" target="_blank"><i class='bx bxl-google'></i></a>
                <a href="https://www.facebook.com/namakamu" target="_blank"><i class='bx bxl-facebook'></i></a>
                <a href="https://github.com/namakamu" target="_blank"><i class='bx bxl-github'></i></a>
                <a href="https://www.linkedin.com/in/namakamu" target="_blank"><i class='bx bxl-linkedin'></i></a>
            </div>

        </form>
    </div>

    {{-- REGISTER FORM --}}
    <div class="form-box register">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1>Registration</h1>

            @if ($errors->any())
                <ul style="color: red; margin-bottom: 1rem;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <p>or register with social platforms</p>
            <div class="social-icons">
                <a href="mailto:namakamu@gmail.com" target="_blank"><i class='bx bxl-google'></i></a>
                <a href="https://www.facebook.com/namakamu" target="_blank"><i class='bx bxl-facebook'></i></a>
                <a href="https://github.com/namakamu" target="_blank"><i class='bx bxl-github'></i></a>
                <a href="https://www.linkedin.com/in/namakamu" target="_blank"><i class='bx bxl-linkedin'></i></a>
            </div>
        </form>
    </div>

    {{-- TOGGLE PANEL --}}
    <div class="toggle-box">
        <div class="toggle-panel toggle-left">
            <h1>Hello, Welcome!</h1>
            <p>Don't have an account?</p>
            <button class="btn register-btn">Register</button>
        </div>
        <div class="toggle-panel toggle-right">
            <h1>Welcome Back!</h1>
            <p>Already have an account?</p>
            <button class="btn login-btn">Login</button>
        </div>
    </div>
</div>

<script src="{{ asset('SignUp_Login_Form.js') }}"></script>
</body>
</html>
