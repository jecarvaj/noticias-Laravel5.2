<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table='noticias';
    protected $fillable=['titulo', 'cuerpo','imagen', 'user_id', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
