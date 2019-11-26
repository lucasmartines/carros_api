<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
	public $guarded = ['id'];
//	protected $with = ['carros'];

	public function carros(){
		return $this->hasMany("App\Carro");
	}
}
