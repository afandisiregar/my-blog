@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <article class="pb-2" style="border-bottom: 1px solid #ececec;">
        <header class="mb-4">
            <h1 class="fw-bolder mb-1">
                {{$post->title}}
            </h1>
            <span class="text-muted fst-italic mb-2">
                Post on {{Carbon\Carbon::parse($post->created_at)->format('M d, Y')}} by {{$post->user->name}} | {{$post->user->email}}
            </span>
        </header>
        <section class="mb-5">
            {!! $post->content !!}
        </section>
    </article>
    <section class="mb-5">
        <div class="card-bg-light">
            <div class="card-body">
                <h6 class="card-title">
                    Comment :
                </h6>
                @include('includes.message')
                
                <form action="/post/{{$post->id}}/comment" method="POST" class="mb-4 pb-4" style="border-bottom: 1px solid #ececec;">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Input your name">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Input your email">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="website" id="website" placeholder="Input your website">
                    </div>
                    <div class="form-group mb-2">
                        <textarea name="comment" id="comment" cols="30" rows="5" class="form-control" placeholder="Input your comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
                @foreach($post->comments as $key => $comment)
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <div class="fw-bold">
                            {{$comment->name}}
                        </div>
                        {{$comment->comment}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection