<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carouselItems extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carousel_items';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'carousel_item_id';
    /** 
     * THe attributes that are assignable
     * @var array
     */
    protected $fillable = [
        'carousel_name',
        'image_path',
        'desctiption',
        'user_id',
    ];
}
