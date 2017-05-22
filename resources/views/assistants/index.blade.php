@extends('layouts.admin')
@section('content')
    <div class="card z-depth-4 grey lighten-4">
        <div class="card-content blue-grey white-text">
			<span class="card-title">
				Lista de Asistentes al evento {{ $event->title }}
			</span>
        </div>
        <div class="card-content">
            <table class="bordered centered">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookmarks as $bookmark)
                    <tr>
                        <td>{{ $bookmark->user->name }}</td>
                        <td>{{ $bookmark->user->email }}</td>
                        <td>
                            <a href="{{ route('assistants.show',['id' => $bookmark->user->idEncrypt]) }}" class="btn btn-primary">Ver</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection