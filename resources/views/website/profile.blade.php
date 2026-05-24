<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --fb-bg: #18191a;
            --fb-card: #242526;
            --fb-border: #3a3b3c;
            --fb-text: #e4e6eb;
            --fb-text-secondary: #b0b3b8;
            --fb-blue: #2374e1;
            --fb-hover: #3a3b3c;
        }

        body {
            background: var(--fb-bg);
            font-family: "Inter", sans-serif;
            color: var(--fb-text);
            min-height: 100vh;
        }

        /* Navbar */
        .fb-navbar {
            background: var(--fb-card);
            border-bottom: 1px solid var(--fb-border);
            padding: 0 16px;
            height: 56px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .fb-brand {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--fb-blue);
            text-decoration: none;
        }

        .fb-nav-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .fb-nav-btn {
            background: var(--fb-hover);
            border: none;
            color: var(--fb-text);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
        }

        .fb-nav-btn:hover {
            background: #4a4b4c;
            color: var(--fb-text);
        }

        /* Main Layout */
        .fb-main {
            padding-top: 70px;
            max-width: 680px;
            margin: 0 auto;
            padding-left: 16px;
            padding-right: 16px;
        }

        /* Post Card */
        .fb-post {
            background: var(--fb-card);
            border-radius: 8px;
            margin-bottom: 16px;
            border: 1px solid var(--fb-border);
        }

        .fb-post-header {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            gap: 10px;
        }

        .fb-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .fb-avatar-placeholder {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--fb-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .fb-post-meta strong {
            display: block;
            font-size: 0.95rem;
            color: var(--fb-text);
        }

        .fb-post-meta small {
            color: var(--fb-text-secondary);
            font-size: 0.8rem;
        }

        .fb-post-content {
            padding: 0 16px 12px;
            font-size: 0.95rem;
            line-height: 1.5;
            color: var(--fb-text);
        }

        .fb-post-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        .fb-post-stats {
            padding: 8px 16px;
            display: flex;
            justify-content: space-between;
            color: var(--fb-text-secondary);
            font-size: 0.85rem;
            border-top: 1px solid var(--fb-border);
            border-bottom: 1px solid var(--fb-border);
        }

        .fb-post-actions {
            display: flex;
            padding: 4px 8px;
            gap: 4px;
        }

        .fb-action-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px;
            border: none;
            background: transparent;
            color: var(--fb-text-secondary);
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: background 0.2s;
        }

        .fb-action-btn:hover {
            background: var(--fb-hover);
            color: var(--fb-text);
        }

        /* Comments */
        .fb-comments {
            padding: 8px 16px 12px;
            border-top: 1px solid var(--fb-border);
        }

        .fb-comment {
            display: flex;
            gap: 8px;
            margin-bottom: 8px;
        }

        .fb-comment-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .fb-comment-avatar-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--fb-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 0.75rem;
            flex-shrink: 0;
        }

        .fb-comment-bubble {
            background: var(--fb-hover);
            border-radius: 18px;
            padding: 8px 12px;
            font-size: 0.875rem;
        }

        .fb-comment-bubble strong {
            display: block;
            font-size: 0.8rem;
            color: var(--fb-text);
        }

        .fb-comment-bubble span {
            color: var(--fb-text-secondary);
        }

        textarea::placeholder,
        input::placeholder {
            color: #b0b3b8 !important;
        }

        .form-control:focus {
            box-shadow: none !important;
            border: none !important;
            background: var(--fb-hover) !important;
            color: white !important;
        }

        .fb-comment-time {
            font-size: 0.75rem;
            color: var(--fb-text-secondary);
            margin-top: 2px;
            padding-left: 4px;
        }

        /* Comment Input */
        .fb-comment-input {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .fb-comment-input input {
            flex: 1;
            background: var(--fb-hover);
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            color: var(--fb-text);
            font-size: 0.875rem;
            outline: none;
        }

        .fb-comment-input input::placeholder {
            color: var(--fb-text-secondary);
        }

        .fb-comment-input button {
            background: transparent;
            border: none;
            color: var(--fb-blue);
            font-size: 1.2rem;
            cursor: pointer;
        }

        /* User Info Bar */
        .fb-user-bar {
            background: var(--fb-card);
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            border: 1px solid var(--fb-border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fb-user-bar-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .fb-user-bar-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--fb-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="fb-navbar">
        <a href="{{ route('home') }}" class="fb-brand">Social Media</a>

        <div class="fb-nav-actions">
            <a href="{{ route('profile') }}" class="fb-nav-btn" title="Profile">
                <i class="bi bi-person-fill"></i>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="fb-nav-btn" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="container-fluid py-4">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-5">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-5">

                    <h2 class="text-white m-0">
                        <i class="bi bi-person-circle text-primary"></i>
                        User Details
                    </h2>

                    <a href="{{ route('home') }}" class="btn btn-outline-light">

                        <i class="bi bi-arrow-left"></i>
                        Back

                    </a>

                </div>

                <!-- User Info -->
                <div class="row g-4">

                   <!-- Avatar -->
<div class="col-12 text-center mb-4">

    <div class="mx-auto position-relative d-inline-block">

        @if ($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" alt="User Image"
                class="rounded-circle border border-3 border-light shadow"
                style="width: 140px; height: 140px; object-fit: cover;">
        @else
            <div class="rounded-circle border border-3 border-light shadow d-flex align-items-center justify-content-center"
                style="width: 140px; height: 140px; background: var(--fb-blue); font-size: 50px; font-weight: 700; color: white;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
        @endif

                            {{-- Edit Image Button --}}
                            <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle"
                                style="width: 32px; height: 32px; padding: 0;" data-bs-toggle="collapse"
                                data-bs-target="#editImage">
                                <i class="bi bi-camera-fill" style="font-size: 0.75rem;"></i>
                            </button>
                        </div>

                        <h3 class="text-white mt-3">{{ $user->name }}</h3>

                        {{-- Edit Image Form --}}
                        <div class="collapse mt-3" id="editImage">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <input type="file" name="image" accept="image/*"
                                        class="form-control form-control-sm bg-dark border-secondary text-white"
                                        style="max-width: 250px; border-radius: 10px;">
                                    <button type="submit" class="btn btn-sm btn-success text-nowrap">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>

                                         {{-- Success Alert --}}
                        @if (session('msg'))
                            <div class="alert alert-dismissible fade show d-flex align-items-center gap-2"
                                role="alert"
                                style="
            background: transparent;
            border: 1.5px solid #2ecc71;
            border-radius: 12px;
            color: #2ecc71;
            font-size: 0.9rem;
            padding: 12px 18px;
            width: 100%;
        ">
                                <i class="bi bi-check-circle" style="font-size: 1.1rem;"></i>
                                <span class="flex-grow-1">{{ session('msg') }}</span>
                                <button type="button" class="btn-close btn-close-white opacity-50"
                                    data-bs-dismiss="alert"></button>
                            </div>
                        @endif

<!-- Name -->
                    <div class="col-md-6">
                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-secondary">Full Name</small>
                                <button class="btn btn-sm btn-primary py-0 px-2" data-bs-toggle="collapse"
                                    data-bs-target="#editName">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                            <h5 class="text-white m-0">{{ $user->name }}</h5>
                            <div class="collapse mt-3 @error('name') show @enderror" id="editName">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column gap-1">
                                        <div class="d-flex gap-2">
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                                class="form-control form-control-sm bg-dark border-secondary text-white @error('name') border-danger @enderror"
                                                style="border-radius: 10px;">
                                            <button type="submit" class="btn btn-sm btn-success text-nowrap">Save</button>
                                        </div>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-secondary">Email</small>
                                <button class="btn btn-sm btn-primary py-0 px-2" data-bs-toggle="collapse"
                                    data-bs-target="#editEmail">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                            <h5 class="text-white m-0">{{ $user->email }}</h5>
                            <div class="collapse mt-3 @error('email') show @enderror" id="editEmail">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column gap-1">
                                        <div class="d-flex gap-2">
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                                class="form-control form-control-sm bg-dark border-secondary text-white @error('email') border-danger @enderror"
                                                style="border-radius: 10px;">
                                            <button type="submit" class="btn btn-sm btn-success text-nowrap">Save</button>
                                        </div>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-secondary">Phone</small>
                                <button class="btn btn-sm btn-primary py-0 px-2" data-bs-toggle="collapse"
                                    data-bs-target="#editPhone">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                            <h5 class="text-white m-0">{{ $user->phone }}</h5>
                            <div class="collapse mt-3 @error('phone') show @enderror" id="editPhone">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column gap-1">
                                        <div class="d-flex gap-2">
                                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                                class="form-control form-control-sm bg-dark border-secondary text-white @error('phone') border-danger @enderror"
                                                style="border-radius: 10px;">
                                            <button type="submit" class="btn btn-sm btn-success text-nowrap">Save</button>
                                        </div>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-secondary">Password</small>
                                <button class="btn btn-sm btn-primary py-0 px-2" data-bs-toggle="collapse"
                                    data-bs-target="#editPassword">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                            <h5 class="text-white m-0">••••••••</h5>
                            <div class="collapse mt-3 @error('password') show @enderror" id="editPassword">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column gap-2">
                                        <input type="password" name="password"
                                            placeholder="New Password"
                                            class="form-control form-control-sm bg-dark border-secondary text-white @error('password') border-danger @enderror"
                                            style="border-radius: 10px;">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="password" name="password_confirmation"
                                            placeholder="Confirm Password"
                                            class="form-control form-control-sm bg-dark border-secondary text-white"
                                            style="border-radius: 10px;">
                                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Created At -->
                    <div class="col-md-6">
                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-2">Created At</small>
                            <h5 class="text-white m-0">{{ $user->created_at->format('Y-m-d') }}</h5>
                        </div>
                    </div>



                </div>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        // Auto-hide alerts after 3 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 3000);
    </script>
</body>
