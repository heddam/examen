<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Livre extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded=[];



    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                
            ]
        ];
    }


}
