<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    function getPrescriptionsAPI()
    {
        $value = Prescription::all();
        return $value;   
    }
}
