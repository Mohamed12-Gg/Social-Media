@extends('shared.admin.app')
@section('create')

    <div class="container py-3 py-md-5">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-3 p-md-5">

                <h2 class="text-white mb-4 fs-5">
                    <i class="bi bi-pencil-square text-primary"></i>
                    Edit Post
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

                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <!-- Title -->
                        <div class="col-12">
                            <label class="form-label text-light small">Post Title</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
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
                                placeholder="Enter post content">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Preview + Upload -->
                        <div class="col-12">
                            <label class="form-label text-light small">Post Image</label>
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <img id="imagePreview" src="/storage/{{ $post['image'] }}" alt="current image"
                                    class="rounded" style="width: 80px; height: 80px; object-fit: cover; flex-shrink: 0;">
                                <input type="file" name="image" id="imageInput"
                                    class="form-control bg-dark text-white border-secondary @error('image') is-invalid @enderror"
                                    style="flex: 1; min-width: 0;">
                            </div>
                            @error('image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-light px-3">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i>Update Post
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
