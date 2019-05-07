<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partidas extends Model
{
  protected $table = 'partidas';
	public $timestamps = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
      'usuario_id', 'fecha', 'categoria_id', 'dificultad', 'resultado'
   ];
	 
	public function usuario() {
		return $this->belongsTo('App\Models\Usuarios', 'usuario_id', 'id');
	}
}
