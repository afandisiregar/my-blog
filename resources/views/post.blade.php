@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($datas as $key => $data)
            <div class="col-lg-6">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h2 class="card-title">
                          <h4>
                            {{$data->title}}
                          </h4>
                      </h2>
                      <p class="card-text">{{Str::limit($data->content, 150, $end='.......')}}</p>
                      <p class="small text-muted mb-0">Post on {{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}} by {{$data->user->name}}</p>
                      <p class="small text-muted">{{$data->comments->count()}} comments <i class="bi bi-chat-dots"></i></p>
                      <a href="/post/{{$data->slug}}" class="btn btn-primary">Read More <i class="bi bi-arrow-right font-bold"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection