@extends('layouts.app')

<h1>Card</h1>
@section('title', 'Card')

@section('content')
<div class="well editPanel">

    {{-- <div id="flip">Click to slide down panel</div> --}}
    {{-- <div id="panel">Hello world!</div> --}}

    {{-- اشعار التحقق من الادخال --}}
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger text-right">
        {{ session()->get('error') }}
    </div>
    @endif
    {{-- نهاية التحقق --}}

    <h2>Add a Card</h2>
    <form action="addCard" method="post" class="cardForm">
        @csrf
        <div class="form-group">
            @foreach ($tag as $item)
            <label for='{{$item->TagName}}' class="toggleButton btn btn-default btn-lg">{{$item->TagName}} &nbsp;
                <input type="radio" name="type" class="CardSlideDown" value="{{$item->id_tag}}" id="{{$item->TagName}}">
            </label>
            @endforeach
        </div>
        <div id="panel">
        <div class="form-group fieldFront">
            <label for="front">Front of Card</label>
            <input type="text" name="front" class="form-control">
        </div>
        <div class="form-group fieldBack" >
            <label for="back">Back of Card</label>
            <textarea name="back" class="form-control" placeholder="back of card" rows="12"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="saveButton btn btn-lg btn-primary">Save</button>
        </div>
        </div>
    </form>
</div>
@endsection
