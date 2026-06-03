@extends('shared.admin.app')

@section('main')
    @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-section">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-white m-0">
                <i class="bi bi-file-earmark-text"></i>
                All Posts ({{ count($posts) }})
            </h2>
            <a class="btn btn-primary btn-sm px-3" href="{{ route('posts.create') }}">
                <i class="bi bi-plus"></i> Add Post
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- مخفية على الموبايل --}}
                        <th class="d-none d-md-table-cell">
                            <i class="bi bi-image me-1"></i>Image
                        </th>
                        <th><i class="bi bi-type me-1"></i>Title</th>
                        {{-- مخفية على الموبايل --}}
                        <th class="d-none d-sm-table-cell">
                            <i class="bi bi-text-paragraph me-1"></i>Content
                        </th>
                        <th><i class="bi bi-gear me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>

                            {{-- Image: مخفية على الموبايل --}}
                            <td class="d-none d-md-table-cell">
                                @if ($post->image)
                                    <img src="/storage/{{ $post->image }}" alt="Post Image" width="60" height="60"
                                        class="rounded border border-secondary" style="object-fit: cover;">
                                @else
                                    <div class="rounded d-flex align-items-center justify-content-center bg-secondary"
                                        style="width:60px; height:60px;">
                                        <i class="bi bi-image text-white"></i>
                                    </div>
                                @endif
                            </td>

                            {{-- Title: دايماً ظاهر --}}
                            <td>
                                {{-- على الموبايل نحط الصورة صغيرة جنب العنوان --}}
                                <div class="d-flex align-items-center gap-2">
                                    <div class="d-md-none flex-shrink-0">
                                        @if ($post->image)
                                            <img src="/storage/{{ $post->image }}" alt="" width="36"
                                                height="36" class="rounded" style="object-fit: cover;">
                                        @else
                                            <div class="rounded d-flex align-items-center justify-content-center bg-secondary"
                                                style="width:36px; height:36px;">
                                                <i class="bi bi-image text-white" style="font-size:0.7rem;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div style="min-width:0;">
                                        <strong class="text-white d-block text-truncate" style="max-width:120px;">
                                            {{ $post->title }}
                                        </strong>
                                        {{-- Content مخفي على الموبايل في الجدول بس بيظهر هنا كـ subtitle --}}
                                        <small class="text-secondary d-sm-none text-truncate d-block"
                                            style="max-width:120px;">
                                            {{ Str::limit($post->content, 30) }}
                                        </small>
                                    </div>
                                </div>
                            </td>

                            {{-- Content: مخفي على الموبايل لأنه بيظهر كـ subtitle --}}
                            <td class="d-none d-sm-table-cell text-white-50" style="max-width:200px;">
                                {{ Str::limit($post->content, 60) }}
                            </td>

                            {{-- Actions: دايماً ظاهرة --}}
                            <td>
                                <div class="d-flex gap-1 flex-nowrap">
                                    <a class="btn btn-sm btn-primary" href="{{ route('posts.edit', $post->id) }}"
                                        title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('posts.show', $post->id) }}"
                                        title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Delete"
                                            onclick="return confirm('Delete this post?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-5">
                                <i class="bi bi-journal-x fs-2 d-block mb-2"></i>
                                No posts added yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
