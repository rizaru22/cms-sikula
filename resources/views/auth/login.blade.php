<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | CMS Sikula</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Di lingkungan Laravel, pastikan helper asset tetap digunakan -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        /* Main Theme Overrides */
        :root {
            --brand-color: #20C997;
            --brand-hover: #19a179;
        }

        body.login-page {
            background: linear-gradient(135deg, #f4f6f9 0%, #d1d9e0 100%);
            height: 100vh;
        }

        .login-logo b {
            color: var(--brand-color);
        }

        /* Card Customization */
        .card {
            border-top: 3px solid var(--brand-color);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Button Customization */
        .btn-primary {
            background-color: var(--brand-color) !important;
            border-color: var(--brand-color) !important;
            transition: all 0.3s ease;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--brand-hover) !important;
            border-color: var(--brand-hover) !important;
        }

        /* Input Focus Glow */
        .form-control:focus {
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.2rem rgba(32, 201, 151, 0.25);
        }

        .input-group-text {
            color: var(--brand-color);
        }

        /* Show Password Toggle Styling */
        .password-toggle {
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }
        
        .password-toggle:hover {
            color: var(--brand-hover);
        }
    </style>
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <b>CMS</b>Sikula
        <h4 class="text-muted">{{ $profile->short_name }}</h4>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silakan login sebagai Admin</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="input-group mb-3">
                    <input type="email" 
                           name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           placeholder="Email" 
                           value="{{ old('email') }}" 
                           required autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Password Input with Toggle -->
                <div class="input-group mb-3">
                    <input type="password" 
                           id="password"
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Password" 
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text password-toggle" id="togglePassword">
                            <span class="fas fa-eye" id="eyeIcon"></span>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback d-block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block shadow-sm">
                            <b>LOGIN</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#togglePassword').click(function() {
            const passwordInput = $('#password');
            const eyeIcon = $('#eyeIcon');
            
            // Toggle the type attribute
            const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);
            
            // Toggle the eye / eye-slash icon
            eyeIcon.toggleClass('fa-eye fa-eye-slash');
        });
    });
</script>

</body>
</html>