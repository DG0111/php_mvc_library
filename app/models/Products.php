<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $table = 'products';

    protected $fillable = ['name', 'cate_id', 'price', 'views', 'star', 'short_desc', 'detail'];

    public function getCategory() {
        return Categories::find($this->cate_id);
    }

    public $timestamps = false;
}
