<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idUsuario';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
     public $timestamps = false;
}
