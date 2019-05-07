<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\Preguntas as Preguntas;
use App\Models\Respuestas as Respuestas;
use App\Models\Partidas as Partidas;

class PlayController extends Controller
{
	/**
	 * Da inicio al juego de preguntas y respuestas
	 */
  public function start() {
		// Obtengo las preguntas a mostrar
    $preguntasYRespuestas = Preguntas::with('respuestas')	// Las obtengo cada una con sus respuestas respectivas
							 ->where('categoria_id', 1)									// Inicialmente solo esta disponible para jugar la categoria 1 de preguntas
               ->take(10)																	// Solo muestro 10 preguntas como maximo
							 ->inRandomOrder()													// Elijo aleatoriamente las preguntas a mostrar
               ->get();

		return view('start', compact('preguntasYRespuestas'));
  }

	/**
	 * Recopila las respuestas ingresadas y muestra el resultado
	 */
	public function finish(Request $request) {
		// Obtengo los datos ingresados desde la vista
		$data = $request->post();

		// Filtro para obtener sólo los ID de respuestas seleccionadas
		$respuestasSeleccionadas = [];
		foreach ($data as $key => $value) {
			if (strpos($key, 'pregunta_') === 0) {
					$respuestasSeleccionadas[$key] = $value;
			}
		}



		// Obtengo los datos completos de las respuestas seleccionadas
		$respuestas = Respuestas::whereIn('id', $respuestasSeleccionadas)
												->get();
		// Sumo todos los puntajes de las respuestas, y determino el número de respuestas correctas
		$puntajeTotal = 0;
		$cantidadRespuestasCorrectas = 0;
		foreach ($respuestas as $respuesta) {
			$puntajeTotal += $respuesta->puntaje;
			$cantidadRespuestasCorrectas += $respuesta->correcta;
		}

  

		// Si la partida la jugo un usuario logueado, guardo sus datos
		if (Auth::check()){
      Partidas::create([
        'usuario_id' => Auth::user()->id,
				'fecha' => date("Y-m-d H:i:s"),
        'categoria_id' => 1,
        'dificultad' => 3,
				'resultado' => $puntajeTotal
      ]);
    }

		// Muestro los resultados de la partida en pantalla
		return view('resultados', compact('puntajeTotal', 'cantidadRespuestasCorrectas'));
  }
}
