@extends('layouts.app')

<h1>tags</h1>
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

{{-- add tag --}}
<div class="well editPanelTag">
    @foreach ($category as $item)
    <h2>Add a Tag {{$item->title}}</h2>
    <form action="/addTag" method="post" class="tagForm">
        @csrf
        <div class="form-group fieldTagName">
            <label for="tagName">Tag name</label>
            <input type="hidden" name="idCategory" value="{{$item->id}}">
            <input type="text" name="tagName" id="tagName" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="saveButton btn btn-lg btn-primary">Save</button>
        </div>
    </form>
    @endforeach
</div>
{{-- end add tag --}}

{{-- show tag --}}
<table class="table table-bordered">

    <tbody>
        @foreach ($tag as $item)
        <tr>
        <td>
            <a href="/editTag/{{$item->id_tag}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" aria-hidden="true">Edit</i></a>
        </td>
        <td class="tagContent">
            <h4>
                {{$item->TagName}}
            </h4>
        </td>
    </tr>
    @endforeach
</tbody></table>
{{-- end show tag --}}


@endsection
