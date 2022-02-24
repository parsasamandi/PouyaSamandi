<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

/**
 * @property int $id
 * @property string $title
 * @property Explanation[] $explanations
 */


class Experience extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'experiences';

    /**
     * @var array
     */
    protected $fillable = ['headline'];

    /**
     * Cascade On Delete.
     */
    use CascadesDeletes;
    protected $cascadeDeletes = ['explanations'];

     /*
     * Get all of experience's description.
     */
    public function explanations() {
        return $this->morphMany(Explanation::class, 'explainable');
    }
}
