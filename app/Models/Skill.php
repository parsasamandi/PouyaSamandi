<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Description[] $descriptions
 */

class Skill extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'skill';

    /**
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * Cascade On Delete.
     */
    use CascadesDeletes;
    protected $cascadeDeletes = ['descriptions'];


    /*
     * Get all of the skill's description.
     */
    public function descriptions() {
        return $this->morphMany('App\Models\Description', 'description');
    }
    
}
