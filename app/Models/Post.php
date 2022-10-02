<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public function scopeActive($query)
    {
        $query->where('status', 1);
        return $query;
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return '';
        }
        $disk = \Storage::disk('public');
        return $disk->url($this->image);
    }

    public function getUpdatedAtLabelAttribute()
    {
        return date("Y/m/d H:i", strtotime($this->updated_at));
    }

}
