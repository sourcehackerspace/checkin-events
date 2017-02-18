@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tu curso</div>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Registrate</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia omnis, nulla corporis, autem quidem ratione obcaecati accusamus, soluta nobis distinctio ab minima atque aspernatur suscipit, odio deserunt odit. Illo, hic.
                            </p>
                        </div>
                        <div class="col-md-offset-3 col-md-6">
                            <a href="{{ route('auth.facebook') }}" class="btn btn-primary btn-block">
                                Registrate con Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
