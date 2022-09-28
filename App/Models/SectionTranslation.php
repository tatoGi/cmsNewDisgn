<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;

class SectionTranslation extends Model
{
    use HasFactory,Sluggable,Searchable;

    protected $casts = [
        'locale_additional' => 'collection'
    ];

    protected $fillable = [
        'section_id',
        'locale',
        'title', 
        'keywords',
        'slug', 
        'desc',
        'icon',
        'locale_additional',
        'active'
    ];

    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'desc' => $this->desc
        ];
    }
}
