@extends('layouts.app')

<h1>database</h1>
@section('title', 'database')

@section('content')
  {{-- اشعار التحقق من الادخال --}}
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
  @endif

<table class="table table-bordered">

    <tbody>
@foreach ($categories as $item)

        <tr>
        <td>
            @if ($item->status > 0)
                <div class="alert alert-success m-0" >Active</div>
            @else
            <a href="active/{{$item->id}}" class="btn btn-lg btn-info ">unActive</a>

            @endif
        </td>
        <td class="dbContent">
            <h4>
                {{$item->title}}
            </h4>
        </td>
    </tr>
@endforeach


</tbody></table>
@endsection

@section('create_Database')
<div class="well editPanelTag">
    <h2>Init database</h2>
    <form action="/init" method="post" class="dbForm">
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
