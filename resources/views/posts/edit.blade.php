@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold text-dark">Edit <span class="text-primary">Post</span></h1>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Back to Posts
            </a>
        </div>
        <p class="text-muted">Modify your post and save the changes when you're ready.</p>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-3 mb-4" role="alert">
        <h6 class="fw-bold mb-2">Please correct the following errors:</h6>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="title" class="form-label fw-semibold">Post Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        class="form-control form-control-lg @error('title') is-invalid @enderror" 
                        placeholder="Enter post title"
                        value="{{ old('title', $post->title) }}"
                        autofocus
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="body" class="form-label fw-semibold">Content</label>
                    <textarea 
                        class="form-control @error('body') is-invalid @enderror" 
                        id="body"
                        name="body" 
                        rows="8" 
                        placeholder="Write your post content here..."
                    >{{ old('body', $post->body) }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <small class="text-muted">Last updated: {{ $post->updated_at->diffForHumans() }}</small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save me-2" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Input focus styles */
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }
    
    /* Textarea styles for better content editing */
    textarea.form-control {
        min-height: 200px;
        line-height: 1.6;
    }
    
    /* Card hover effect */
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection