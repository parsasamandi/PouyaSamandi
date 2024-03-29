<?php

namespace App\Models;
use App\Models\Media;

use Illuminate\Database\Eloquent\Model;

class Media_text extends Model
{
    public $timestamps = false;
    protected $table = 'media_text';

    public function mediaTextRel()
    {
        return $this->hasMany(Media::class, 'mediaText_id');
    }
}
