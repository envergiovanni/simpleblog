@extends('layouts.frontend.app')

@section('content')
    <div class="col-md-8">
        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }} <small>{{ $post->subtitle }}</small></h1>
        <!-- Author -->
        <p class="lead">
            by <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>
        <!-- Date/Time -->
        <p>Posted on {{ $post->published_at->format('l jS \\of F Y h:i:s A') }}</p>

        <hr>
        Categorías : <a href="{{ route('page.category', $post->category->slug )}}" class="">{{ $post->category->name }}</a>
        <hr>
        <!-- Preview Image -->
        @if ($post->image_path)
            <img src="{{ $post->image_path }}" class="img-fluid rounded">
        @endif
        <hr>
        <!-- Post Content -->
        <p class="lead">{{ $post->excerpt }}</p>

        {!! $post->content !!}

        <hr>
        Etiquetas:
        @foreach ($post->tags as $key => $tag)
            <a href="{{ route('page.tag', $tag->slug ) }}">{{ $tag->name }}</a>
        @endforeach
        <hr>

        <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
             var disqus_config = function () {
             this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
             this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
             };
             */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://larablogsimple.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>

@endsection

@section('sidebar')
    <div class="col-md-4">
        <!-- Sidebar Widgets Column -->
        @include('layouts.frontend._sidebar')
    </div>
@endsection
