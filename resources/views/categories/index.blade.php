@extends('layouts.main')
@section('contentt')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title d-flex justify-content-center" data-aos="fade-up">Категории</h1>
        <section class="featured-posts-section">
            @foreach($categories as $category)
            <ul>
                <li><a href="{{route('category.post.index',$category->id)}}">{{$category->title}}</a></li>
            </ul>
            @endforeach
        </section>
    </div>

</main>
@endsection
