<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Speaker extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','position'];

    public function Events()
    {
        return $this->belongsToMany('App\Models\Event','event_speakers')->where('event_speakers.deleted_at', NULL);
    }
}
