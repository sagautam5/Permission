<?php

namespace App\Permission\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name'];

    public $timestamps = true;
}
