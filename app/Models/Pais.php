<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_pais
 * @property int $id_continente
 * @property string $nombre_pais
 * @property Continente $continente
 */
class Pais extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_pais';

    /**
     * @var array
     */
    protected $fillable = ['id_continente', 'nombre_pais'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function continente()
    {
        return $this->belongsTo('App\Models\Continente', 'id_continente', 'id_continente');
    }
}
