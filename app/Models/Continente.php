<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_continente
 * @property string $nombre_continente
 * @property Pais[] $paises
 */
class Continente extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_continente';

    /**
     * @var array
     */
    protected $fillable = ['nombre_continente'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paises()
    {
        return $this->hasMany('App\Models\Pais', 'id_continente', 'id_continente');
    }
}
