<?php

namespace App\Http\Controllers;

use App\Models\Medicalrecord;
use Illuminate\Http\Request;

class MedicalrecordController extends Controller
{
    function getMedicalrecordsAPI()
    {
        $value = Medicalrecord::all();
        return $value;   
    }
}

