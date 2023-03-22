<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Organizer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'phone'];

    public function events() {
        return $this->hasMany(Event::class);
    }
}
