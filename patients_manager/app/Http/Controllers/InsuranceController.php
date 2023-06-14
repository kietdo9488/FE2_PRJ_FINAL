<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    function getInsurancesAPI()
    {
        $value = Insurance::all();
        return $value;   
    }
}
