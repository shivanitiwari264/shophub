<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHub | Login/Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            background: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .auth-card {
            width: 900px;
            max-width: 100%;
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: flex;
            flex-wrap: wrap;
        }
        .auth-image {
            flex: 1;
            min-width: 300px;
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 30px;
        }
        .auth-image i {
            font-size: 3rem;
            color: rgba(255,255,255,0.8);
            transition: transform 0.3s;
        }
        .auth-image i:hover {
            transform: scale(1.2);
        }
        .auth-forms {
            flex: 1;
            padding: 40px;
            min-width: 300px;
        }
        .auth-forms h2 {
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }
        .toggle-btns {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .toggle-btns button {
            border: none;
            background: none;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
        }
        .toggle-btns button.active {
            color: #2575fc;
            border-bottom: 2px solid #2575fc;
            padding-bottom: 2px;
        }
        .form-control {
            border-radius: 50px;
        }
        .btn-custom {
            border-radius: 50px;
        }
        .social-login {
            text-align: center;
            margin-top: 20px;
        }
        .social-login button {
            margin: 5px;
            border-radius: 50px;
        }
        .error {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        @media(max-width: 768px) {
            .auth-card {
                flex-direction: column;
            }
            .auth-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card">

        <!-- Left Icon Panel -->
        <div class="auth-image">
            <i class="fas fa-shopping-cart"></i>
            <i class="fas fa-box"></i>
            <i class="fas fa-tags"></i>
            <i class="fas fa-credit-card"></i>
            <i class="fas fa-gift"></i>
        </div>

        <!-- Right Forms -->
        <div class="auth-forms">
            <h2>Welcome to ShopHub</h2>

            <!-- Toggle Buttons -->
            <div class="toggle-btns">
                <button id="loginBtn" class="active">Login</button>
                <button id="registerBtn">Register</button>
            </div>

            <!-- LOGIN FORM -->
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf

                @if ($errors->any() && session()->has('login'))
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="{{ old('email') }}" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
   {{-- <a href="{{ route('password.request') }}" class="d-block text-center mb-3">Forgot Password?</a> --}}

                <button type="submit" class="btn btn-primary w-100 btn-custom">Login</button>

                <div class="social-login">
                    <button type="button" class="btn btn-outline-primary btn-sm">Login with Google</button>
                    <button type="button" class="btn btn-outline-dark btn-sm">Login with Facebook</button>
                </div>
            </form>

            <!-- REGISTER FORM -->
            <form id="registerForm" method="POST" action="{{ route('register') }}" class="d-none">
                @csrf

                @if ($errors->any() && session()->has('register'))
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" value="{{ old('name') }}" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="{{ old('email') }}" required>
                <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password" required>
                <div id="passwordError" class="error d-none">Passwords do not match.</div>
                <button type="submit" class="btn btn-success w-100 btn-custom">Register</button>

                <div class="social-login">
                    <button type="button" class="btn btn-outline-primary btn-sm">Register with Google</button>
                    <button type="button" class="btn btn-outline-dark btn-sm">Register with Facebook</button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer>&copy; 2025 ShopHub. All rights reserved.</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const passwordError = document.getElementById('passwordError');

    loginBtn.addEventListener('click', () => {
        loginForm.classList.remove('d-none');
        registerForm.classList.add('d-none');
        loginBtn.classList.add('active');
        registerBtn.classList.remove('active');
    });

    registerBtn.addEventListener('click', () => {
        loginForm.classList.add('d-none');
        registerForm.classList.remove('d-none');
        registerBtn.classList.add('active');
        loginBtn.classList.remove('active');
    });

    passwordConfirmation.addEventListener('input', () => {
        if (password.value !== passwordConfirmation.value) {
            passwordError.classList.remove('d-none');
        } else {
            passwordError.classList.add('d-none');
        }
    });
</script>

</body>
</html>
