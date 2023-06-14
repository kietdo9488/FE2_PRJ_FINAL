<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicalrecord extends Model
{
    protected $table = 'medicalrecords';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;
}
