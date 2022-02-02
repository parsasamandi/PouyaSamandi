<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $image
 */
class Refree extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'link', 'image'];

    /*
     * Get all of the refree's description.
     */
    public function explanations() {
        return $this->morphOne(Explanation::class, 'explainable');
    }

}
