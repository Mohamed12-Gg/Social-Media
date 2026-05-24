@extends('shared.admin.app')
@section('create')
    <div class="container py-5">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-5">
                        {{-- Success Alert --}}
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

                <h2 class="text-white mb-4">
                    <i class="bi bi-person-plus-fill text-primary"></i>
                    Create Post
                </h2>


                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label text-light">
                                Post Title
                            </label>

                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control bg-dark text-white border-secondary @error('title') is-invalid @enderror"
                                placeholder="Enter post title">

                            @error('title')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Content -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label text-light">
                                Content
                            </label>

                            <textarea name="content" rows="6"
                                class="form-control bg-dark text-white border-secondary @error('content') is-invalid @enderror"
                                placeholder="Enter post content">{{ old('content') }}</textarea>

                            @error('content')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- Image -->

                        <div class="col-md-12 mb-4">

                            <label class="form-label text-light">
                                Post Image
                            </label>

                            <input type="file" name="image"
                                class="form-control bg-dark text-white border-secondary @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-3 mt-4">

                        <a href="{{ route('posts.index') }}" class="btn btn-outline-light px-4">

                            Cancel

                        </a>

                        <button type="submit" class="btn btn-primary px-5">

                            <i class="bi bi-check-lg"></i>
                            Create Post

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
