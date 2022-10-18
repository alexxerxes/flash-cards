
@extends('layouts.app')

<h1>Create Category</h1>
@section('title', 'Create Category')

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

<div class="well editPanelTag">
    <h2>Create Category</h2>
    <form action="/CreateCategory" method="post" class="dbForm">
        @csrf
        <div class="form-group fieldDbName">
            <label for="dbName">Database name</label>
            <input type="text" name="dbName" id="dbName" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="saveButton btn btn-lg btn-primary">Create</button>
        </div>
    </form>
</div>

@endsection
