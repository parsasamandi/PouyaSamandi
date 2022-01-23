<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $description
 * @property string $describable_type
 * @property int $describable_id
 */
class Explanation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'explanations';

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['description', 'description_type', 'description_id'];


    /**
     * Get The parent description model (Course, Article)
     */
    public function explainable() {
        return $this->morphTo();
    }

}
