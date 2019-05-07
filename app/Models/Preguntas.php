<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
	protected $table = 'preguntas';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
      'texto', 'categoria_id', 'dificultad'
   ];
	 
	public function respuestas() {
		return $this->hasMany('App\Models\Respuestas', 'pregunta_id', 'id');
	}
}
