<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EventRegisterations extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['event_id','name','email','phone','ticket_type'];

    protected $table = "event_registrations";
}
