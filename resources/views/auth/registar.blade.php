<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register (Dark) · Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        html, body {
            height: 100%;
        }

        body {
            background-color: #121212 !important;
        }

        .form-register {
            max-width: 400px;
            padding: 2rem;
            background-color: #1e1e1e;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .form-register .form-floating:focus-within {
            z-index: 2;
        }

        .form-control {
            background-color: #2b2b2b;
            border: 1px solid #3d3d3d;
            color: #ffffff;
        }

        .form-control:focus {
            background-color: #333333;
            border-color: #0d6efd;
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* تجميع الحقول بشكل متصل */
        .form-register input {
            margin-bottom: -1px;
            border-radius: 0;
        }

        .form-register .input-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-register .input-bottom {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-bottom: 15px;
        }

        .logo-placeholder {
            font-size: 3rem;
            color: #3d8bfd;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 10px;
        }

        .text-body-secondary {
            color: #a0a0a0 !important;
        }

        .invalid-feedback {
            font-size: 0.8rem;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="d-flex align-items-center py-4">

    <main class="form-register w-100 m-auto text-center">
        <form action="{{ route('register') }}" method="POST" novalidate>
            @csrf

            <div class="logo-placeholder">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                </svg>
            </div>

            <h1 class="h3 mb-4 fw-bold text-white">Create Account</h1>

            @if(session('msg'))
                <div class="alert alert-danger py-2 small border-0 bg-danger bg-opacity-25 text-danger">
                    {{ session('msg') }}
                </div>
            @endif

            <!-- Name -->
            <div class="form-floating">
                <input name="name" type="text"
                    class="form-control input-top @error('name') is-invalid @enderror"
                    id="floatingName" placeholder="Full Name" value="{{ old('name') }}" required autofocus />
                <label for="floatingName">Full Name</label>
                @error('name')
                    <div class="invalid-feedback text-start">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-floating">
                <input name="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="floatingEmail" placeholder="name@example.com" value="{{ old('email') }}" required />
                <label for="floatingEmail">Email address</label>
                @error('email')
                    <div class="invalid-feedback text-start">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-floating">
                <input name="phone" type="tel"
                    class="form-control @error('phone') is-invalid @enderror"
                    id="floatingPhone" placeholder="Phone Number" value="{{ old('phone') }}" required />
                <label for="floatingPhone">Phone Number</label>
                @error('phone')
                    <div class="invalid-feedback text-start">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-floating">
                <input name="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="floatingPassword" placeholder="Password" required />
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback text-start">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-floating">
                <input name="password_confirmation" type="password"
                    class="form-control input-bottom @error('password_confirmation') is-invalid @enderror"
                    id="floatingConfirmPassword" placeholder="Confirm Password" required />
                <label for="floatingConfirmPassword">Confirm Password</label>
                @error('password_confirmation')
                    <div class="invalid-feedback text-start">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary w-100 py-2 mb-3" type="submit">Create Account</button>

            <p class="mb-0 text-body-secondary">
                Already have an account? <a href="{{ route('login') }}" class="text-decoration-none fw-medium">Login</a>
            </p>

            <p class="mt-4 mb-0 text-body-secondary small">&copy; {{ date('Y') }} Secure Registration</p>
        </form>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
