@extends('shared.admin.app')
@section('create')

    <div class="container py-3 py-md-5">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-3 p-md-5">

                <h2 class="text-white mb-4 fs-5 fs-md-4">
                    <i class="bi bi-person-pencil text-primary"></i>
                    Edit User
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <!-- Name -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Full Name</label>
                            <input type="text" name="name" value="{{ $user['name'] }}"
                                class="form-control bg-dark text-white border-secondary" placeholder="Enter full name">
                        </div>

                        <!-- Email -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Email</label>
                            <input type="email" name="email" value="{{ $user['email'] }}"
                                class="form-control bg-dark text-white border-secondary" placeholder="Enter email">
                        </div>

                        <!-- Phone -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Phone</label>
                            <input type="text" name="phone" value="{{ $user['phone'] }}"
                                class="form-control bg-dark text-white border-secondary" placeholder="Enter phone number">
                        </div>

                        <!-- Role -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Role</label>
                            <select name="role" class="form-select bg-dark text-white border-secondary">
                                <option value="subscriber" {{ $user['role'] == 'subscriber' ? 'selected' : '' }}>Subscriber
                                </option>
                                <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <!-- Image Preview + Upload -->
                        <div class="col-12">
                            <label class="form-label text-light small">Image</label>
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <img id="imagePreview" src="/storage/{{ $user['image'] }}" alt="current image"
                                    class="rounded" style="width: 80px; height: 80px; object-fit: cover; flex-shrink: 0;">
                                <input type="file" name="image" id="imageInput"
                                    class="form-control bg-dark text-white border-secondary" style="flex: 1; min-width: 0;">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Password</label>
                            <input type="password" name="password" class="form-control bg-dark text-white border-secondary"
                                placeholder="Leave empty to keep current">
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-12 col-md-6">
                            <label class="form-label text-light small">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control bg-dark text-white border-secondary" placeholder="Confirm new password">
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-light px-3">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i>Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
            }
        });
    </script>

@endsection
