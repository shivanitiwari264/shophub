<!DOCTYPE html>
<html>
<head>
<title>Register | ShopHub</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg,#141e30,#243b55);
    height: 100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}
.card {
    width:420px;
    padding:25px;
    border-radius:10px;
}
</style>
</head>
<body>

<div class="card shadow">
    <h3 class="text-center mb-3">Create Account</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input class="form-control mb-3" name="name" placeholder="Full Name" required>
        <input class="form-control mb-3" name="email" type="email" placeholder="Email" required>
        <input class="form-control mb-3" name="password" type="password" placeholder="Password" required>
        <input class="form-control mb-3" name="password_confirmation" type="password" placeholder="Confirm Password" required>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <button class="btn btn-success w-100">Register</button>
    </form>

    <p class="mt-3 text-center">
        Already have an account? <a href="{{ route('login') }}">Login</a>
    </p>
</div>

</body>
</html>
