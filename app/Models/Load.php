<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Load extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'weight'];

    public function point()
    {
        return $this->hasOne(Point::class)->select(['from', 'to', 'date', 'load_id']);
    }

    public function createLoad($loadData)
    {
        $load = Load::create([
            'name' => Str::ucfirst($loadData['load_name']),
            'weight' => $loadData['weight']
        ]);
        $load->point()->create([
            'from' => Str::ucfirst($loadData['from']),
            'to' => Str::ucfirst($loadData['to']),
            'date' => $loadData['date_picker']
        ]);

        return $load->load('point');
    }
}
