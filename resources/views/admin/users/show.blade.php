@extends('shared.admin.app')
@section('show')
    <div class="container-fluid py-4">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-5">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-5">

                    <h2 class="text-white m-0">
                        <i class="bi bi-person-circle text-primary"></i>
                        User Details
                    </h2>

                    <a href="{{ route('users.index') }}" class="btn btn-outline-light">

                        <i class="bi bi-arrow-left"></i>
                        Back

                    </a>

                </div>

                <!-- User Info -->
                <div class="row g-4">

                    <!-- Avatar -->
                    <div class="col-12 text-center mb-4">

                        <div class="mx-auto d-flex align-items-center justify-content-center"
                            style="
                            width:120px;
                            height:120px;
                            border-radius:50%;
                            font-size:40px;
                            font-weight:bold;
                            color:white;
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        ">

                            <img src="/storage/{{ $user['image'] }}" alt="User Image"
                                class="rounded-circle border border-3 border-light shadow"
                                style="
        width: 140px;
        height: 140px;
        object-fit: cover;
    ">

                        </div>

                        <h3 class="text-white mt-3">
                            {{ $user->name }}
                        </h3>

                    </div>

                    <!-- Name -->
                    <div class="col-md-6">

                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">

                            <small class="text-secondary d-block mb-2">
                                Full Name
                            </small>

                            <h5 class="text-white m-0">
                                {{ $user->name }}
                            </h5>

                        </div>

                    </div>

                    <!-- Email -->
                    <div class="col-md-6">

                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">

                            <small class="text-secondary d-block mb-2">
                                Email
                            </small>

                            <h5 class="text-white m-0">
                                {{ $user->email }}
                            </h5>

                        </div>

                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">

                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">

                            <small class="text-secondary d-block mb-2">
                                Phone
                            </small>

                            <h5 class="text-white m-0">
                                {{ $user->phone }}
                            </h5>

                        </div>

                    </div>

                    <!-- Role -->
                    <div class="col-md-6">

                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">

                            <small class="text-secondary d-block mb-2">
                                Role
                            </small>

                            <span
                                class="badge px-4 py-2 fs-6
                            {{ $user->role == 'admin' ? 'bg-primary' : 'bg-success' }}">

                                {{ ucfirst($user->role) }}

                            </span>

                        </div>

                    </div>

                    <!-- Created At -->
                    <div class="col-md-6">

                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">

                            <small class="text-secondary d-block mb-2">
                                Created At
                            </small>

                            <h5 class="text-white m-0">
                                {{ $user->created_at->format('Y-m-d') }}
                            </h5>

                        </div>

                    </div>

                    <!-- Updated At -->
                    <div class="col-md-6">

                        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05);">

                            <small class="text-secondary d-block mb-2">
                                Updated At
                            </small>

                            <h5 class="text-white m-0">
                                {{ $user->updated_at->format('Y-m-d') }}
                            </h5>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
