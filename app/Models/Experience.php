<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

     /*
     * Get all of experience's description.
     */
    public function explanations() {
        return $this->morphMany(Explanation::class, 'explainable');
    }
}
