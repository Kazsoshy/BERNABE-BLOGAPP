@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="d-flex justify-content-between">
                <h2>Show Post</h2>
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $post->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Body:</strong>
                {{ $post->body }}
            </div>
        </div>
    </div>
@endsection