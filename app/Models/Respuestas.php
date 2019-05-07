<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
  protected $table = 'respuestas';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
      'pregunta_id', 'texto', 'correcta', 'puntaje'
   ];
	 
	public function pregunta() {
		return $this->belongsTo('App\Models\Preguntas', 'pregunta_id', 'id');
	}
}
