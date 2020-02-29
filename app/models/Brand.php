<?php


namespace Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Searchable;
    protected $table = 'brands';

    protected $fillable = ['id','brand_name','logo','country'];

    public $timestamps = false;
}
