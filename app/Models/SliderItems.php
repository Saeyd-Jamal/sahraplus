<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class SliderItems extends Model
{
    use HasFactory;
    protected $table = 'slider_items';
    protected $fillable = ['home_slider_id', 'item_id', 'position'];

    public function homeSlider()
    {
        return $this->belongsTo(HomeSliders::class, 'home_slider_id');
    }

    public function entertainment()
    {
        return $this->belongsTo(Entertainments::class, 'item_id');
    }

}
