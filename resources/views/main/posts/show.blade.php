@extends('layouts.main')
@section('contentt')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title d-flex justify-content-center" data-aos="fade-up">{{$post->title}}</h1>
        <section class="blog-post-featured-img col-lg-9 mx-auto d-flex justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <img src="{{asset('storage/'.$post->main_image)}}" alt="featured image" class="w-50">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                  <h1>{!! $post->content !!}</h1>
                </div>
            </div>
        </section>
        <div class="row">

            <div class="col-lg-9 mx-auto">
                <h1>Комментарий:</h1>

                <div class="comment-list">
                    @foreach($post->comments as $comment)
                        <div class="comment-text">
                    <h3>Автор: {{$comment->user->name}}</h3>

                    <!-- /.username --><br>
                           <h4> {{$comment->message}}</h4>
                        </div>
                    @endforeach
                </div>
                <section class="comment-section">
                    <form action="{{route('post.comment.store',$post->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <textarea name="message" id="message" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>
</body>

</html>
@endsection
