<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'date'];

    protected $dates = ['date'];

    public function pointLoad()
    {
        return $this->belongsTo(Load::class, 'load_id');
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m');
    }
}
