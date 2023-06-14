<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    function getAppointmentsAPI(){
     $value = Appointment::all();
     return $value;  
    }
}
