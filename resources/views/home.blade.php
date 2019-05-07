@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mi historial</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

										@if (!empty($historial))
                        <table class="table table-striped">
													<thead>
														<tr>
															<th>Fecha de juego</th>
															<th>Resultado</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($historial as $partida)
														<tr>
															<td>{{ $partida->fecha }}</td>
															<td>{{ $partida->resultado }}</td>
														</tr>
														@endforeach
													</tbody>
												</table>
                    @endif
                </div>
            </div>

						<a href="http://localhost/trivia/public/play" class="btn btn-primary" role="button" style="margin-top: 15px;">Jugar</a>
        </div>
    </div>
</div>
@endsection
