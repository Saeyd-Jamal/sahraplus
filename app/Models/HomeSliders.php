<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class HomeSliders extends Model
{
    use HasFactory;
    protected $table = 'home_sliders';
    protected $fillable = ['title_ar', 'title_en', 'title_el', 'title_fr', 'title_de', 'type', 'position', 'status', 'numbering', 'is_restricted'];

    public function sliderItems()
    {
        return $this->hasMany(SliderItems::class, 'home_slider_id');
    }

}
