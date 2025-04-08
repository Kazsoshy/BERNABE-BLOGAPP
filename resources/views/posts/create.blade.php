@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold text-dark">Create <span class="text-primary">New Post</span></h1>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary rounded-pill px-4 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Back to Posts
            </a>
        </div>
        <p class="text-muted">Share your thoughts, ideas, and stories with the world.</p>
    </div>

    <!-- Error Messages -->
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

    <!-- Post Form -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="title" class="form-label fw-semibold">Post Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        class="form-control form-control-lg @error('title') is-invalid @enderror" 
                        placeholder="Enter an engaging title"
                        value="{{ old('title') }}"
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
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between align-items-center pt-3">
                    <a href="{{ route('posts.index') }}" class="btn btn-link text-decoration-none">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5 rounded-pill">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2 me-2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        Publish Post
                    </button>
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