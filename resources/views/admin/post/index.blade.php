@extends('shared.admin.app')
@section('main')
    {{-- Main Content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        {{-- Success Alert --}}
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Posts Table --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="text-white m-0">
                <i class="bi bi-people"></i> All Posts ({{ count($posts) }})
            </h2>

            <a class="btn btn-primary" href="{{ route('posts.create') }}">
                <i class="bi bi-plus"></i> Add Post
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($posts as $post)
                        <tr>

                            <!-- ID -->
                            <td>{{ $post->id }}</td>

                            <!-- Image -->
                            <td>
                                @if ($post->image)
                                    <img src="/storage/{{ $post->image }}" alt="Post Image" width="70" height="70"
                                        class="rounded shadow" style="object-fit: cover;">
                                @else
                                    <div class="rounded shadow d-flex align-items-center justify-content-center bg-secondary"
                                        style="width: 70px; height: 70px;">
                                        <i class="bi bi-image text-white fs-4"></i>
                                    </div>
                                @endif
                            </td>
                            <!-- Title -->
                            <td>
                                <strong>{{ $post->title }}</strong>
                            </td>

                            <!-- Content -->
                            <td style="max-width: 300px;">
                                {{ Str::limit($post->content, 80) }}
                            </td>

                            <!-- Actions -->
                            <td>
                                <div class="d-flex gap-2">

                                    <!-- Edit -->
                                    <a class="btn btn-sm btn-primary" href="{{ route('posts.edit', $post->id) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <!-- Show -->
                                    <a class="btn btn-sm btn-warning" href="{{ route('posts.show', $post->id) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                </div>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-4">
                                <i class="bi bi-journal-x fs-4 d-block mb-2"></i>
                                No posts added
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
        </div>
    </main>
@endsection
