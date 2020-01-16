@extends('layouts.master')

@section("content")
<div class="row photos">
    <div class="col-md-12">
        <h1 class="page-header">Popular photos</h1>
    </div>

    <div class="col-md-12">
        <form action="/" method="GET" class="form-horizontal" role="form" id="filters">
            <div class="form-group">
                <div class="col-md-3">
                {{ Form::select('feature', [
                    "popular" => "Popular",
                    "highest_rated" => "Highest Rated",
                    "upcoming" => "Upcoming",
                    "editors" => "Editors",
                    "fresh_today" => "Fresh Today",
                    "fresh_yesterday" => "Fresh Yesterday",
                    "fresh_week" => "Fresh Weeek"
                    ], $inputs['feature'], ["class" => "form-control"]) }}
                </div>

                <div class="col-md-3">
                    {{ Form::select('sort', [
                        "created_at" => "Created At",
                        "rating" => "Rating",
                        "highest_rating" => "Highest Rating",
                        "times_viewed" => "Times Viewed",
                        "votes_count" => "Votes Count",
                        "favorites_count" => "Favorites Count",
                        "comments_count" => "Comments Count",
                        "taken_at" => "Taken At"
                    ], $inputs['sort'], ["class" => "form-control"]) }}
                </div>

                <div class="col-md-3">
                    {{ Form::select('sort_direction', [
                        "desc" => "Desc",
                        "asc" => "Asc"
                    ], $inputs['sort_direction'], ["class" => "form-control"]) }}
                </div>

                <div class="col-md-3">
                    <input type="submit" class="btn btn-primary" value="Filter"/>
                </div>

            </div>
        </form>
    </div>

    @include('partials/photos', ['photos' => $photos])

    <button id="load_more" class="btn btn-primary load_more center-block">Load more</button>
</div>

<hr>
@endsection

@section("scripts")
<script>
    $(function(){

        $('#load_more').click(function(e){
            var page = $(this).data('page') || 2,
                filter_form = $("#filters"),
                feature = filter_form.find("select[name='feature']").val(),
                sort = filter_form.find("select[name='sort']").val(),
                sort_direction = filter_form.find("select[name='sort_direction']").val();

            $(this).text("Loading...");

            $.ajax({
                url: '/ajax/index_more',
                type: 'get',
                data: {
                    page: page,
                    feature: feature,
                    sort: sort,
                    sort_direction: sort_direction
                },
                success: function(data){
                    var photos = $('.photos'),
                        more_photos = $(data);

                    more_photos.insertAfter(photos.find('.thumb:last'));

                    //increment page index
                    $('#load_more').data('page', page + 1);
                }//success
            }).done(function(){
                $("#load_more").text("Load more");
            })
        });

    });
</script>
<script src="/js/vote_favorite.js" type="text/javascript"></script>
@endsection
