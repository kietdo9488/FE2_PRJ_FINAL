<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'insurance';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;
}
