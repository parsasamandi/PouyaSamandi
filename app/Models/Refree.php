<?php

namespace App\Models;

use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $image
 */
class Refree extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'link', 'image'];

    /**
     * Cascade On Delete.
     */
    use CascadesDeletes;
    protected $cascadeDeletes = ['explanations'];

    /*
     * Get all of the refree's description.
     */
    public function explanations() {
        return $this->morphOne(Explanation::class, 'explainable');
    }

}
