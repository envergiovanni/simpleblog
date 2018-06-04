@extends('layouts.frontend.app')

@section('content')

    <div class="col-md-8">
        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

        @foreach ($posts as $post)

            <div class="card mb-4">
                @if ($post->image_path)
                    <img src="{{ $post->image_path }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }} <small>{{ $post->subtitle }}</small></h2>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="{{ route('page.entry', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $post->published_at->toFormattedDateString() }} by <a href="#">@if($post->user){{ $post->user->name }}@endif</a>
                </div>
            </div>
        @endforeach

        {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}
    </div>

@endsection

@section('sidebar')
    <div class="col-md-4">
        <!-- Sidebar Widgets Column -->
        @include('layouts.frontend._sidebar')
    </div>
@endsection