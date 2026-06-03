@extends('shared.admin.app')
@section('create')
    <div class="container py-3 py-md-5">
        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">
            <div class="card-body p-3 p-md-5">

                @if (session('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <h2 class="text-white mb-4 fs-5">
                    <i class="bi bi-file-earmark-plus text-primary"></i>
                    Create Post
                </h2>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <!-- Title -->
                        <div class="col-12">
                            <label class="form-label text-light small">Post Title</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control bg-dark text-white border-secondary @error('title') is-invalid @enderror"
                                placeholder="Enter post title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="col-12">
                            <label class="form-label text-light small">Content</label>
                            <textarea name="content" rows="6"
                                class="form-control bg-dark text-white border-secondary @error('content') is-invalid @enderror"
                                placeholder="Enter post content">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-12">
                            <label class="form-label text-light small">Post Image</label>
                            <input type="file" name="image"
                                class="form-control bg-dark text-white border-secondary @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-light px-3">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i>Create Post
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
