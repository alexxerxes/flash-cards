@extends('layouts.app')

<h1>Edit tags</h1>
@section('title', 'tags')

@section('content')

{{-- اشعار التحقق من الادخال --}}
@if(session()->has('message'))
<div class="alert alert-success text-right">
    {{ session()->get('message') }}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger text-right">
    {{ session()->get('error') }}
</div>
@endif
{{-- نهاية التحقق --}}

<div class="well">
    <h2>Edit Tag #1</h2>
    <form action="/updateTag" method="post" class="tagForm">
        @csrf
        <div class="form-group">
            <label for="tagName">Tag name</label>
            <input type="text" name="tagName" class="form-control" value="{{$tagsEdit->TagName}}">
        </div>

        <hr>
        <div class="form-group">
            <input type="hidden" name="idCategory" value="{{$tagsEdit->id_category}}">
            <input type="hidden" name="tag_id" value="{{$tagsEdit->id_tag}}">
            <button type="submit" class="saveButton btn btn-lg btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection
