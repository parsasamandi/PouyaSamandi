<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $explanation
 * @property string $explanation_type
 * @property int $explanation_id
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
    protected $fillable = ['explanation', 'explainable_type', 'explainable_id'];


    /**
     * Get The parent description model (Course, Article)
     */
    public function explainable() {
        return $this->morphTo();
    }

}
