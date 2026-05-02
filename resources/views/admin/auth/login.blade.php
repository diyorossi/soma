<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | SOMA</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Neo-Brutalist -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-bg: #FFFDF5;
            --color-black: #0D0D0D;
            --color-pink: #FF5277;
            --color-yellow: #FFE156;
            --color-cyan: #00C2FF;
            --border: 3px solid var(--color-black);
            --shadow: 5px 5px 0px var(--color-black);
            --shadow-lg: 8px 8px 0px var(--color-black);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--color-black);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background geometric decoration */
        body::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 250px;
            height: 250px;
            background: var(--color-pink);
            border: var(--border);
            transform: rotate(15deg);
            z-index: 0;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -40px;
            width: 200px;
            height: 200px;
            background: var(--color-cyan);
            border: var(--border);
            transform: rotate(-12deg);
            z-index: 0;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: var(--color-bg);
            border: var(--border);
            border-radius: 0;
            padding: 2.5rem 2rem;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        /* Yellow decorative element */
        .login-card::before {
            content: '';
            position: absolute;
            top: -12px;
            right: -12px;
            width: 60px;
            height: 60px;
            background: var(--color-yellow);
            border: var(--border);
            z-index: -1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-family: 'Space Mono', monospace;
            color: var(--color-black);
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            letter-spacing: -0.02em;
        }

        .login-header p {
            font-family: 'Space Mono', monospace;
            color: #666;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-label {
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--color-black);
        }

        .form-control {
            padding: 0.8rem 1rem;
            border: 2px solid var(--color-black);
            border-radius: 0;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.95rem;
            background: var(--color-bg);
            transition: all 0.15s ease;
        }

        .form-control:focus {
            border-color: var(--color-pink);
            box-shadow: 3px 3px 0 var(--color-pink);
            background: #FFFFFF;
            outline: none;
        }

        .input-group-text {
            background: var(--color-black);
            border: 2px solid var(--color-black);
            border-right: none;
            color: var(--color-yellow);
            border-radius: 0;
            font-size: 0.9rem;
        }

        .input-group .form-control {
            border-left: none;
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--color-pink);
            background: var(--color-pink);
            color: var(--color-white, #fff);
        }

        .input-group:focus-within .form-control {
            border-left: none;
        }

        .btn-login {
            background: var(--color-black);
            color: var(--color-yellow);
            padding: 0.85rem;
            border-radius: 0;
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            font-size: 0.9rem;
            border: var(--border);
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            box-shadow: var(--shadow);
            transition: all 0.15s ease;
            cursor: pointer;
        }

        .btn-login:hover {
            background: var(--color-pink);
            color: #FFFFFF;
            transform: translate(-2px, -2px);
            box-shadow: 7px 7px 0 var(--color-black);
        }

        .btn-login:active {
            transform: translate(5px, 5px);
            box-shadow: none;
        }

        .form-check-input {
            border: 2px solid var(--color-black);
            border-radius: 0;
        }

        .form-check-input:checked {
            background-color: var(--color-black);
            border-color: var(--color-black);
        }

        .form-check-input:focus {
            box-shadow: 2px 2px 0 var(--color-pink);
        }

        .form-check-label {
            font-size: 0.85rem;
            color: #555;
        }

        .alert {
            border: 2px solid var(--color-black);
            border-radius: 0;
            box-shadow: 3px 3px 0 var(--color-black);
            font-size: 0.85rem;
        }

        .alert-danger {
            background: var(--color-pink);
            color: #FFFFFF;
            border-color: var(--color-black);
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        .back-link {
            text-align: center;
            margin-top: 1.25rem;
        }

        .back-link a {
            display: inline-block;
            color: var(--color-yellow);
            text-decoration: none;
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.5rem 1rem;
            border: 2px solid var(--color-yellow);
            transition: all 0.15s ease;
        }

        .back-link a:hover {
            background: var(--color-yellow);
            color: var(--color-black);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                padding: 1.25rem;
            }

            .login-card {
                padding: 2rem 1.5rem;
            }

            .login-header h1 {
                font-size: 1.5rem;
            }

            body::before {
                width: 150px;
                height: 150px;
                top: -30px;
                right: -30px;
            }

            body::after {
                width: 130px;
                height: 130px;
                bottom: -30px;
                left: -30px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1rem;
            }

            .login-card {
                padding: 1.5rem 1.25rem;
                box-shadow: var(--shadow);
            }

            .login-header h1 {
                font-size: 1.3rem;
            }

            .login-header p {
                font-size: 0.7rem;
            }

            .form-control {
                padding: 0.7rem 0.85rem;
                font-size: 0.9rem;
            }

            .btn-login {
                padding: 0.75rem;
                font-size: 0.8rem;
            }

            .login-card::before {
                width: 40px;
                height: 40px;
                top: -8px;
                right: -8px;
            }

            body::before {
                width: 100px;
                height: 100px;
            }

            body::after {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1><i class="fas fa-s me-2"></i>SOMA</h1>
            <p>Admin Panel</p>
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
            
            <div class="mb-4 form-check">
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