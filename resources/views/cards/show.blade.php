@extends('layouts.app')

<h1>show</h1>
@section('title', 'show')

@section('content')

    {{-- اشعار التحقق من الحذف --}}
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

{{-- فرز --}}
<div class="btn-group btn-group-md" role="group" aria-label="filters">
    <a href="/show" class="btn btn-default">all</a>
@foreach ($tags as $item)
    <a href="/filter_cards/{{$item->id_tag}}" class="btn btn-default">{{$item->TagName}}</a>
@endforeach

</div>
<br>
<br>

{{-- fatch --}}
<table class="display" id="example1" style="width:100%">
    <thead>

    <tr>
        <th>تعديل</th>
        <th>عرض</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($cards as $item)
    <tr>
        <td><a href="/editCard/{{$item->id}}">edit</a></td>
        <td>
            <h4>{{$item->front}}</h4>
            {{-- @foreach ($tags as $it) --}}
                @if ($item->TagName == 'code')
                    <pre>{{$item->back}}</pre>
                @else
                    {{$item->back}}
                @endif
                {{-- {{ ($it->TagName == 'code')? "<pre>$item->back</pre>" : $item->back }} --}}
            {{-- @endforeach --}}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

{{-- @include('cards.table') --}}

@endsection


