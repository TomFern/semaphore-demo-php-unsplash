@extends('layouts.master')
<style>
    .media-object{
        width: 64px;
        height: 64px;
    }
</style>
@section('styles')

@endsection

@section("content")
    <div class="row">
        <div class="col-lg-10">
            <h1>{{ $photo['name'] }}</h1>
            <p class="lead">
                by <a href="/user/{{ $photo['user']['id'] }}">{{ $photo['user']['username'] }}</a>
            </p>
            <hr>

            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $photo['created_at'] }}</p>
            <hr>

            <img class="img-responsive" src="{{ $photo['images'][0]['url'] }}" alt="">
            <hr>
            @if($photo['description'])
                <p class="lead">{{ $photo['description'] }}</p>
            @endif
            <hr>


            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                {{ Form::open(['url' => '/photo/comment', 'method' => 'post']) }}
                    <input type="hidden" name="pid" value="{{ $photo['id'] }}"/>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {{ Form::close() }}
            </div>

            <hr>

            @foreach($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{ $comment['user']['userpic_url'] }}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment['user']['username'] }}
                            <small>{{ $comment['created_at'] }}</small>
                        </h4>
                        {{ $comment['body'] }}
                        @if(count($comment['replies']))
                            @foreach($comment['replies'] as $ncomment)
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{ $ncomment['user']['userpic_url'] }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $ncomment['user']['username'] }}
                                            <small>{{ $comment['created_at'] }}</small>
                                        </h4>
                                        {{ $comment['body'] }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

    </div>

    <hr>
@endsection