@extends('layouts.app')

<h1>Edit Card</h1>
@section('title', 'Edit Card')

@section('content')

<div class="well editPanel">
    <h2>Edit Card #1235</h2>
    <form action="/update_card" method="post" class="cardForm">
@csrf
        <div class="form-group">
            @foreach ($tag as $item)
            <label for='{{$item->TagName}}' class="toggleButton btn btn-default btn-lg">{{$item->TagName}} &nbsp;
                <input type="radio" name="type" class="CardSlideDown" value="{{$item->id_tag}}" id="{{$item->TagName}}" {{ ($item->id_tag==$EditCard->type)? "checked" : ""}}>
            </label>
            @endforeach
        </div>
        <div class="form-group">
            <label for="front">Front of Card</label>
            <input type="text" name="front" id="front" class="form-control" value="{{$EditCard->front}}">
        </div>
        <div class="form-group">
            <label for="back">Back of Card</label>
            <textarea name="back" class="form-control" id="back" placeholder="back of card" rows="12">{{$EditCard->back}}</textarea>
        </div>
        <div class="row">
            {{-- <div class="col-xs-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="known" value="1"> Known
                    </label>
                </div>
            </div> --}}
            <div class="col-xs-6 text-right">
                <a href="/deleteCard/{{$EditCard->id}}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i>
                    Remove
                </a>
            </div>
        </div>

        <hr>
        <div class="form-group">
            <input type="hidden" name="card_id" value="{{$EditCard->id}}">
            <button type="submit" class="saveButton btn btn-lg btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection
