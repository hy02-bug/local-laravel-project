
<!DOCTYPE html>
<html>
<head>
<title>Grant Management Login</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.box {
    width: 600px;
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
   }
   .box h3 {
    font-size: 24px;
    margin-bottom: 20px;
   }
   .form-control {
    border-radius: 5px;
   }
   .btn-primary {
    width: 100%;
    border-radius: 5px;
    padding: 10px;
}
</style>
</head>
<body>
<br />
<div class="container box">
<h3 align="center">Welcome Back</h3>
<p align="center" class="text-muted">Log in to your account</p>

<!-- Session Status -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<!-- Error Messages -->
@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<!-- Validation Errors -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
    <label for="email">Email Address</label>
    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
    @error('email')
    <span class="text-danger small">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label for="password">Password</label>
    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
    @error('password')
    <span class="text-danger small">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label>
    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    </label>
    </div>

    <div class="form-group">
    <input type="submit" name="login" class="btn btn-primary" value="Log In">
    </div>
{{-- 
    <div class="text-center">
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}" class="text-primary small">Forgot Your Password?</a>
    @endif
    </div> --}}

    {{-- <div class="text-center mt-3">
    <p class="small">Don't have an account?
    <a href="{{ route('register') }}" class="text-primary">Register here</a>
    </p>
    </div> --}}
</form>
</div>
</body>
</html>



