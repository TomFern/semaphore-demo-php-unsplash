<style>
    .thumb{
        margin-bottom: 10px;
        padding: 4px;
    }

    .caption {
        padding-left: 5px;
        padding-right: 5px;
    }
</style>

@foreach($photos as $photo)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb" data-photo-id="{{ $photo['id'] }}">
        <a class="thumbnail" href="/photo/{{ $photo['id'] }}">
            <img class="img-responsive" src="{{ $photo['images'][0]['url'] }}" alt="{{ $photo['name'] }}">
        </a>
        <div class="caption">
            <a class="pull-left" href="/user/{{ $photo['user']['id'] }}">{{ $photo['user']['fullname'] }}</a>
            <a class="pull-right fa fa-heart favorite" href="#"> {{ $photo['favorites_count'] }}</a>
            <a class="pull-right fa fa-thumbs-up vote" href="#"> {{ $photo['votes_count'] }}</a>
        </div>
    </div>
@endforeach