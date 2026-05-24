@extends('shared.admin.app')
@section('create')
    <div class="container py-5">

        <div class="card border-0 shadow-lg" style="background: rgba(20,25,55,0.95); border-radius:20px;">

            <div class="card-body p-5">

                <h2 class="text-white mb-4">
                    <i class="bi bi-person-plus-fill text-primary"></i>
                    Edit post
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

                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label text-light">
                                Post Title
                            </label>

                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
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
                                placeholder="Enter post content">{{ old('content', $post->content) }}</textarea>

                            @error('content')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Preview --}}
                    <div class="mb-2">
                        <img id="imagePreview" src="/storage/{{ $post['image'] }}" alt="old image" class="rounded"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    </div>

                        <!-- New Image -->
                        <div class="col-md-12 mb-4">

                            <label class="form-label text-light">
                                New Image
                            </label>

                            <input type="file" name="image" id="imageInput"
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
                            Update Post

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
