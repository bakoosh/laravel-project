@extends('layouts.main')
@section('contentt')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title d-flex justify-content-center" data-aos="fade-up">Блог</h1>
        <section class="featured-posts-section">
            @foreach($posts as $post)
            <div class="row  d-flex align-items-center justify-content-center">
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{ asset('storage/' . $post->preview_image )}}" alt="blog post">
                    </div>
                    <p class="blog-post-category">{{$post->category->title}}</p>
                    <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">
                        <h6 class="blog-post-title">{{$post->title}}</h6>
                    </a>
                </div>
                @endforeach
            </div>



        </section>
    </div>

</main>
@endsection
