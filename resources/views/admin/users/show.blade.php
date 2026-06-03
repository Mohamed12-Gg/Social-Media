@extends('shared.admin.app')
@section('show')
    <div class="container-fluid py-3 py-md-4">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-3 p-md-5">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-white m-0 fs-5">
                        <i class="bi bi-person-circle text-primary"></i>
                        User Details
                    </h2>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-light btn-sm px-3">
                        <i class="bi bi-arrow-left me-1"></i>Back
                    </a>
                </div>

                <!-- Avatar -->
                <div class="text-center mb-4">
                    <img src="/storage/{{ $user['image'] }}" alt="User Image"
                        class="rounded-circle border border-3 border-secondary shadow"
                        style="width: 110px; height: 110px; object-fit: cover;">
                    <h4 class="text-white mt-3 mb-0">{{ $user->name }}</h4>
                    <span class="badge mt-2 {{ $user->role == 'admin' ? 'bg-primary' : 'bg-success' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>

                <!-- Info Cards -->
                <div class="row g-3">

                    <div class="col-6 col-md-6">
                        <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-1">Full Name</small>
                            <p class="text-white m-0 fw-semibold text-truncate">{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-1">Phone</small>
                            <p class="text-white m-0 fw-semibold text-truncate">{{ $user->phone }}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-1">Email</small>
                            <p class="text-white m-0 fw-semibold text-truncate">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-1">Created</small>
                            <p class="text-white m-0 fw-semibold">{{ $user->created_at->format('Y-m-d') }}</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="p-3 rounded-4" style="background: rgba(255,255,255,0.05);">
                            <small class="text-secondary d-block mb-1">Updated</small>
                            <p class="text-white m-0 fw-semibold">{{ $user->updated_at->format('Y-m-d') }}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
