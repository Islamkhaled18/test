<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Category extends Model
{
    use HasTranslations;

    public $table = 'categories';
    public $guarded = [];
    public $translatable = [
        'category_name',
    ];

    public function scopeChild($query)
    {
        return $query->where('parent_id' ,'!=', null);

    }
    public function scopeParent($query)
    {
        return $query->where('parent_id' , null);

    }
    public function _parent(){

        return $this->belongsto(Self::class , 'parent_id');
    }

    public function childrens(){
        return $this->hasMany(Self::class , 'parent_id');
    }

}
