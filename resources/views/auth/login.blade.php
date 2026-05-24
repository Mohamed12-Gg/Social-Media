<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign-in (Dark) · Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-color: #121212 !important;
        }

        .form-signin {
            max-width: 350px;
            padding: 2rem;
            background-color: #1e1e1e;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-control {
            background-color: #2b2b2b;
            border: 1px solid #3d3d3d;
            color: #ffffff;
        }

        /* إصلاح ظهور الأخطاء في Bootstrap: يجب أن يكون العنصر مرئياً عند وجود كلاس is-invalid */
        .form-control.is-invalid {
            border-color: #dc3545;
            background-image: none;
            /* إزالة أيقونة التنبيه الافتراضية إذا كانت تشوه الشكل */
        }

        .invalid-feedback {
            display: block;
            /* التأكد من أن النص يظهر */
            text-align: left;
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #ea868f;
            /* لون أحمر فاتح يتناسب مع الوضع الداكن */
        }

        .form-control:focus {
            background-color: #333333;
            border-color: #0d6efd;
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .logo-placeholder {
            font-size: 3.5rem;
            color: #3d8bfd;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            font-weight: 600;
            padding: 0.75rem;
        }

        .text-body-secondary {
            color: #a0a0a0 !important;
        }

        a {
            color: #3d8bfd;
        }
    </style>
</head>

<body class="d-flex align-items-center py-4">

    <main class="form-signin w-100 m-auto text-center">


        <!-- Logo -->
        <div class="logo-placeholder">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                class="bi bi-person-lock" viewBox="0 0 16 16">
                <path
                    d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m7 8.5v-2a1.5 1.5 0 0 0-1.5-1.5h-6A1.5 1.5 0 0 0 6 13.5v2a.5.5 0 0 0 1 0v-2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0m-9-7a1 1 0 0 0 1 1h.01a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 3a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h.01a3 3 0 0 1 3 3v1a3 3 0 0 1-3 3z" />
            </svg>
        </div>

        <h1 class="h3 mb-4 fw-bold text-white">Welcome Back</h1>


        @if (session('msg'))
            <div class="alert alert-danger py-2 small border-0 bg-danger bg-opacity-25 text-danger mb-3">
                {{ session('msg') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="post" novalidate>
            @csrf
            <!-- Email Input -->
            <div class="form-floating">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                <label for="floatingInput">Email address</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-floating">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="form-check text-start my-3">
                <input name="remember_me" class="form-check-input" type="checkbox" value="1" id="rememberMe">
                <label class="form-check-label text-body-secondary" for="rememberMe">
                    Keep me logged in
                </label>
            </div>

            <!-- Submit Button -->
            <button class="btn btn-primary w-100 py-2 mb-4" type="submit">
                Sign in
            </button>

            <!-- Register Link -->
            <p class="mb-0 text-body-secondary">
                New here? <a href="{{ route('register') }}" class="text-decoration-none fw-medium">Create account</a>
            </p>

            <p class="mt-5 mb-0 text-body-secondary small">&copy; {{ date('Y') }} Secure Access</p>
        </form>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
