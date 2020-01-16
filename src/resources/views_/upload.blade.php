@extends('layouts.master')

@section("content")
<br/>
<div class="row">
{{ Form::open(['route' => 'photo.upload', 'files' => true]) }}
    <div class="form-group">
        {{ Form::label('name', 'Name: ') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description: ') }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('photo', 'Upload a photo') }}
        {{ Form::file('photo', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Upload', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
</div>
<!-- .row -->

<br/>
@endsection
