@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resultados de la partida</div>

                <div class="card-body">
                    ¡Acertaste {{ $cantidadRespuestasCorrectas }} preguntas! Tu puntaje es de {{ $puntajeTotal }}
                </div>
            </div>

						<a href="http://localhost/trivia/public/play" class="btn btn-primary" role="button" style="margin-top: 15px;">Jugar otra vez</a><br>
						@if (Auth::check())
						<a href="http://localhost/trivia/public/home" class="btn btn-primary" role="button" style="margin-top: 15px;">Volver a inicio</a>
						@endif
        </div>
    </div>
</div>
@endsection
