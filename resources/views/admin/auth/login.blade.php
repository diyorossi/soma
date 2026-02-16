<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | SMAgency</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a4d2e 0%, #143d24 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }

        .login-card {
            background: #fff;
            border-radius: 15px;
            padding: 3rem 2rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: #1a4d2e;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #666;
        }

        .form-control {
            padding: 0.875rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #1a4d2e;
            box-shadow: 0 0 0 0.2rem rgba(26, 77, 46, 0.25);
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
            color: #1a4d2e;
        }

        .form-control {
            border-left: none;
        }

        .btn-login {
            background: #1a4d2e;
            color: #fff;
            padding: 0.875rem;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #143d24;
            transform: translateY(-2px);
        }

        .form-check-input:checked {
            background-color: #1a4d2e;
            border-color: #1a4d2e;
        }

        .alert {
            border-radius: 10px;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: #fff;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .back-link a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1><i class="fas fa-layer-group me-2"></i>SMAgency</h1>
            <p>Admin Panel Login</p>
        </div>
        
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        
        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
        </form>
    </div>
    
    <div class="back-link">
        <a href="{{ route('landing') }}"><i class="fas fa-arrow-left me-2"></i>Back to Website</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>