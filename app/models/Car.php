<?php


namespace Models;

use Illuminate\Database\Eloquent\Model;


class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = ['id','brand_id','model_name','image','price','sale_price','detail','quantity'];
    public $timestamps = false;

}
