@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="http://localhost/trivia/public/finish">
@csrf
		@foreach($preguntasYRespuestas as $preguntaYRespuestas)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $preguntaYRespuestas->texto }}</div>

                <div class="card-body">
									@foreach($preguntaYRespuestas->respuestas as $respuesta)
									<input type="radio" name="pregunta.{{ $preguntaYRespuestas->id }}" value="{{ $respuesta->id }}"> {{ $respuesta->texto }}<br>
									@endforeach
                </div>
            </div>
        </div>
    </div>
		@endforeach

		<div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-primary">
        Enviar
      </button>
    </div>
</form>
</div>
@endsection
