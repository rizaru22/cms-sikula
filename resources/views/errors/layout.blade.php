<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $code ?? 'Error' }} - {{ $title ?? config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}" />

    @if(file_exists(public_path('css/theme.css')))
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    @endif
    <style>
        :root {
           
            --text-light: #ffffff;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            text-align: center;
        }

        .error-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 60px 40px;
            border-radius: 20px;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
        }

        .error-code {
            font-size: 110px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 15px;
        }

        .error-title {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .error-message {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .btn-home {
            display: inline-block;
            padding: 12px 30px;
            background: #ffffff;
            color: var(--primary);
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-home.primary {
            background: var(--primary);
            color: #ffffff;
        }

        .btn-home:hover {
            transform: translateY(-3px);
            opacity: 0.9;
        }

        .footer-text {
            margin-top: 30px;
            font-size: 13px;
            opacity: 0.7;
        }

        @media (max-width: 576px) {
            .error-code {
                font-size: 80px;
            }
        }
    </style>
</head>
<body>

<div class="error-container">
    <div class="error-code">{{ $code ?? '500' }}</div>
    <div class="error-title">{{ $title ?? 'Terjadi Kesalahan' }}</div>
    <div class="error-message">
        {{ $message ?? 'Maaf, terjadi kesalahan pada sistem.' }}
    </div>

    <div style="display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">

        <a href="javascript:void(0)" onclick="goBack()" class="btn-home">
            ⬅ Kembali
        </a>

        <a href="{{ url('/') }}" class="btn-home primary">
            🏠 Beranda
        </a>

    </div>

    <div class="footer-text">
        © {{ date('Y') }} {{ $school->name ?? config('app.name') }}
    </div>
</div>

<script>
    function goBack() {
        if (document.referrer) {
            window.history.back();
        } else {
            window.location.href = "{{ url('/') }}";
        }
    }
</script>

</body>
</html>