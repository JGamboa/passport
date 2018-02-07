<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lugares
 * @package App\Models
 * @version February 7, 2018, 12:46 pm UTC
 *
 * @property string titulo
 * @property string latitud
 * @property string longitud
 * @property string photo
 */
class Lugares extends Model
{
    use SoftDeletes;

    public $table = 'lugares';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'latitud',
        'longitud',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'latitud' => 'string',
        'longitud' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
