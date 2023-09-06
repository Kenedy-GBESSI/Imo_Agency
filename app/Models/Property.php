<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory;
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

    public function options() : BelongsToMany{
        return $this->belongsToMany(Option::class);
    }

    public function getUrl(string $path){
        return Storage::url($path);
    }

    public function getImage(){
        return $this->images[0] ?? null;
    }

    public function images (){
        return $this->hasMany(Image::class);
    }
}
