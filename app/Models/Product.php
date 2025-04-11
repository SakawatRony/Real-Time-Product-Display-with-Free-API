<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    protected function store($data = [])
    {
        $data = parent::create($data);

        if($data) {
            return true;
        }

        return false;
    }

}
