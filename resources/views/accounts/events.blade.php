@extends('layouts.admin')

@section('content')
@locale()
    <div class="card z-depth-4">
        <div class="card-content accent white-text">
            <span class="card-title">{{ $title }}</span>
        </div>
    </div>
    <div class="row">
        <div class="col l8 offset-l2">
            @foreach($events as $event)
                <div class="card horizontal">
                    <div class="card-img">
                        <img src="{{ asset('storage/'.$event->image) }}" style="width: 250px; height: auto;">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p class="blue-text">@datetime($event->date.' '.$event->time)</p>
                            <h5>{{ $event->title }}</h5>
                            <p class="truncate">{{ $event->summary }}</p>
                        </div>
                        <div class="card-action">
                            <a href="#">Ver mas</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--<div class="card z-depth-4 grey lighten-4">--}}
        {{--<div class="card-content blue-grey white-text">--}}
			{{--<span class="card-title">--}}
				{{--Lista de Eventos--}}
			{{--</span>--}}
        {{--</div>--}}
        {{--<div class="card-content">--}}
            {{--<table class="bordered centered">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th></th>--}}
                    {{--<th>Nombre</th>--}}
                    {{--<th>Cupo</th>--}}
                    {{--<th></th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($bookmarks as $bookmark)--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<div style="max-width: 50px;">--}}
                                {{--<img src="{{ asset('storage/'.$bookmark->event->image) }}" class="responsive-img">--}}
                            {{--</div>--}}
                        {{--</td>--}}
                        {{--<td>{{ $bookmark->event->title }}</td>--}}
                        {{--<td>{{ $bookmark->event->quota }}</td>--}}
                        {{--<td>--}}
                            {{--<a href="{{ route('assistants.index', ['slug' => $event->slug]) }}" class="btn waves-effect waves-light blue">Asistentes</a>--}}
                            {{--<a href="{{ route('crud.events.show', ['id' => $event->id]) }}" class="btn waves-effect waves-light green">Ver</a>--}}
                            {{--<a href="{{ route('crud.events.edit', ['id' => $event->id]) }}" class="btn waves-effect waves-light orange">Modificar</a>--}}
                            {{--<a href="{{ route('crud.events.delete', ['id' => $event->id]) }}" class="btn waves-effect waves-light red delete">Eliminar</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
