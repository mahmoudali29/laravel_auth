<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['topics','description','source_title','source_title_writer','host','location','website','start_date','end_date'];

    public function Speakers()
    {
    	return $this->belongsToMany('App\Models\Speaker','event_speakers')->where('event_speakers.deleted_at', NULL);
    }

    public function Photos(){
       return $this->hasMany('App\Models\EventPhotos')->where('event_photos.deleted_at', NULL);
   }

    public function Photo(){
       return $this->hasOne('App\Models\EventPhotos')->where('event_photos.deleted_at', NULL);
   }
}
