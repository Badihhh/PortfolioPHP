<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Portfolio</title>
    <link rel="icon" href="{{ asset('assets/icon/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f5f5f5;
        }

        .login-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 203, 169, 0.15);
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
        }

        .login-icon {
            width: 64px;
            height: 64px;
            background: #00cba9;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        .login-icon i { color: white; font-size: 1.6rem; }

        .login-card h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 6px;
        }
        .login-card p.subtitle {
            text-align: center;
            color: #888;
            font-size: 0.85rem;
            margin-bottom: 32px;
        }

        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }
        .input-wrap { position: relative; }
        .input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 0.9rem;
        }
        .input-wrap input {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 1.5px solid #e5e5e5;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            color: #111;
            background: #fafafa;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .input-wrap input:focus {
            border-color: #00cba9;
            box-shadow: 0 0 0 3px rgba(0, 203, 169, 0.12);
            background: white;
        }
        .input-wrap .toggle-pw {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            left: auto;
            cursor: pointer;
            color: #bbb;
            font-size: 0.85rem;
        }
        .input-wrap .toggle-pw:hover { color: #00cba9; }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: #00cba9;
            color: white;
            border: none;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-login:hover { background: #00b89a; }
        .btn-login:active { transform: scale(0.98); }

        .back-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.82rem;
            color: #888;
        }
        .back-link a { color: #00cba9; text-decoration: none; font-weight: 500; }
        .back-link a:hover { text-decoration: underline; }

        .alert-error {
            background: #fff0f0;
            border: 1.5px solid #f87171;
            color: #dc2626;
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 0.83rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .field-error {
            color: #dc2626;
            font-size: 0.78rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <!-- Login Card -->
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h2>Admin Login</h2>
            <p class="subtitle">Masuk ke panel admin portfolio</p>

            {{-- Error dari Laravel (email/password salah) --}}
            @if ($errors->any())
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Email atau password salah. Coba lagi.
                </div>
            @endif

            {{-- Session status (misal setelah reset password) --}}
            @if (session('status'))
                <div style="background:#f0fdf4;border:1.5px solid #86efac;color:#166534;border-radius:8px;padding:11px 14px;font-size:0.83rem;margin-bottom:20px;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-envelope"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus
                            autocomplete="username"
                        />
                    </div>
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        />
                        <i class="fa-solid fa-eye toggle-pw" id="togglePw"></i>
                    </div>
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Login
                </button>
            </form>

            <div class="back-link">
                <a href="{{ url('/') }}"><i class="fa-solid fa-arrow-left"></i> Kembali ke Portfolio</a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePw').addEventListener('click', function () {
            const input = document.getElementById('password');
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
</html>