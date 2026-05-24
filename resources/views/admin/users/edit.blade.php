@extends('shared.admin.app')
@section('create')
<div class="container py-5">

    <div class="card border-0 shadow-lg"
        style="background: rgba(20,25,55,0.95); border-radius:20px;">

        <div class="card-body p-5">

            <h2 class="text-white mb-4">
                <i class="bi bi-person-plus-fill text-primary"></i>
                Edit User
            </h2>

            @if ($errors->any())
    <div class="alert alert-danger">

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif

            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Name -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-light">Full Name</label>
                        <input type="text"
                            name="name"
                            value="{{ $user['name'] }}"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Enter full name">
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-light">Email</label>
                        <input type="email"
                            name="email"
                            value="{{ $user['email'] }}"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Enter email">
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-light">Phone</label>
                        <input type="text"
                            name="phone"
                            value="{{ $user['phone'] }}"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Enter phone number">
                    </div>

                    <!-- Image -->

                        {{-- Preview --}}
                    <div class="mb-2">
                        <img id="imagePreview" src="/storage/{{ $user['image'] }}" alt="old image" class="rounded"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-light">Image</label>
                        <input type="file"
                            name="image"
                            id="imageInput"
                            class="form-control bg-dark text-white border-secondary">
                    </div>



                    <!-- Role -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-light">Role</label>

                        <select name="role"
                            class="form-select bg-dark text-white border-secondary">

                            <option value="subscriber" {{ $user['role'] == 'subscriber' ? 'selected' : '' }} >Subscriber</option>
                            <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }} >Admin</option>

                        </select>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-light">Password</label>

                        <input type="password"
                            name="password"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Enter password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label text-light">
                            Confirm Password
                        </label>

                        <input type="password"
                            name="password_confirmation"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Confirm password">
                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end gap-3 mt-4">

                    <a href="{{ route('users.index') }}"
                        class="btn btn-outline-light px-4">
                        Cancel
                    </a>

                    <button type="submit"
                        class="btn btn-primary px-5">
                        <i class="bi bi-check-lg"></i>
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
 <script>
        let imageInput = document.getElementById("imageInput");
            let imagePreview = document.getElementById("imagePreview");

            imageInput.addEventListener("change", function() {
                let file = this.files[0];
                if (file) {
                    imagePreview.src = URL.createObjectURL(file);
                }
            });
    </script>
@endsection
