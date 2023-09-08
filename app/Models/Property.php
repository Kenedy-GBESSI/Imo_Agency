<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'air_layer',
        'price',
        'bedroom',
        'rooms_num',
        'floor',
        'address',
        'city',
        'postal_code',
        'sold'
    ];
    protected $guarded = [];


    // Casting, ça permet à la récupération d'un attribut du modèle, d'avoir le format ou le type qu'on souhaite. Moi je veux par exemple qu'à la sortie,sold soit true or false, et également que mon attribut created_at soit string

    protected $casts = [
        'sold' => 'boolean',
        'created_at' => 'string'
    ];

    public function options() : BelongsToMany{
        return $this->belongsToMany(Option::class);
    }

    public function getUrl(string $path){
        return Storage::url($path);
    }

    public function getImage(){
        return $this->images[0] ?? null;
    }

    public function scopeAvailable(Builder $builder, bool $available = true) : Builder{
          return $builder->where('sold',!$available);
    }

    public function scopeRecent(Builder $builder) : Builder{
        return $builder->orderBy('created_at','desc');
    }

    public function images (){
        return $this->hasMany(Image::class);
    }
}
