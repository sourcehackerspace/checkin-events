@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tu evento</div>
                <div class="panel-body">
                    <div>
                        <img src="{{ asset('storage/'.$event->image) }}" class="img-responsive" alt="{{ $event->slug }}">
                        <h2 class="text-center">{{ $event->name }}</h2>
                        <h3 class="text-center">{{ $event->topic }}</h3>
                        <p class="text-justify">{!! $event->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Completa tu registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $name }}" required disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email }}" required disabled>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('from_name') ? ' has-error' : '' }}">
                            <label for="from" class="col-md-4 control-label">¿De donde nos visitas?</label>
                            
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select id="slcfrom" name="from" class="form-control">
                                            <option value="escuela">Escuela</option>
                                            <option value="empresa">Empresa</option>
                                            <option value="organización">Organización</option>
                                            <option value="otro">Otro</option>
                                        </select>

                                        @if ($errors->has('from'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('from') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <input id="from_name" type="from_name" class="form-control" name="from_name" value="{{ old('from_name') }}" placeholder="Escuela" >

                                        @if ($errors->has('from_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('from_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Terminar Registro
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#slcfrom').on('change', function(event){
            var name = capitalizeFirstLetter($(this).val());
            $('#from_name').attr('placeholder', name);
        })
    });
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
</script>
@endsection
