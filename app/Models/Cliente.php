<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Cliente extends Model
{
    use SoftDeletes;

    protected $guarded = 'id';

    public function getUrlFotoPublicAttribute()
    {
        return asset('/uploads').'/'.$this->url_foto;
    }
}
