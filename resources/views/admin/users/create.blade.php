@extends('shared.admin.app')
@section('create')
    <div class="container py-3 py-md-5">
        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">
            <div class="card-body p-3 p-md-5">

                <h2 class="text-white mb-4 fs-5">
                    <i class="bi bi-person-plus-fill text-primary"></i>
                    Create User
                </h2>

                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <!-- Name -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control bg-dark text-white border-secondary @error('name') is-invalid @enderror"
                                placeholder="Enter full name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control bg-dark text-white border-secondary @error('email') is-invalid @enderror"
                                placeholder="Enter email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="form-control bg-dark text-white border-secondary @error('phone') is-invalid @enderror"
                                placeholder="Enter phone number">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Role</label>
                            <select name="role"
                                class="form-select bg-dark text-white border-secondary @error('role') is-invalid @enderror">
                                <option value="subscriber" {{ old('role') == 'subscriber' ? 'selected' : '' }}>Subscriber
                                </option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Image</label>
                            <input type="file" name="image"
                                class="form-control bg-dark text-white border-secondary @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Password</label>
                            <input type="password" name="password"
                                class="form-control bg-dark text-white border-secondary @error('password') is-invalid @enderror"
                                placeholder="Enter password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control bg-dark text-white border-secondary" placeholder="Confirm password">
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-light px-3">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i>Create User
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
