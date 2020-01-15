@extends('layouts.master')

@section("content")
<div class="row photos">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $user['fullname'] }}</h1>
    </div>

    @include('partials/photos', ['photos' => $photos])

</div>

<hr>
@endsection

@section("scripts")
<script src="/js/vote_favorite.js" type="text/javascript"></script>
@endsection