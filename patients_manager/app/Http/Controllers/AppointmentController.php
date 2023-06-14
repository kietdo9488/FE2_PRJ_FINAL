<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    function getAppointmentsAPI(){
     $value = Appointment::all();
     return $value;  
    }

    //tim kiem cuoc hen cua benh nhan  vs tim cua bac sy 
    function findAppointmentOfPatientAPI(Request $request){
        $name = $request->name;
        $value = DB::table('appointments')
        ->join('doctors', 'doctors.id', '=', 'appointments.doctor')
        ->where('doctors.full_name', 'like', '%' . $name . '%')
        ->get();
        return $value;
    }


    function createAppointmentOfPatientAPI(Request $request){
        $data = $request;
        $appointment = new Appointment();
        $appointment->patient_id = $data->patient_id;
        $appointment->appointment_date = $data->appointment_date;
        $appointment->appointment_time = $data->appointment_time;
        $appointment->note = $data->note;
        $appointment->doctor = $data->doctor;
        $appointment->status = $data->status;
        $result = $appointment->save();
        if($result){
            return response()->json(['message'=>'Đã thêm cuộc hẹn thành công'],200);
        }else{
            return response()->json(['message'=>'Đã thêm cuộc hẹn thất bại'],404);
        }
    }

    function updateAppointmentOfPatientAPI(Request $request){
        $data = $request;
        $appointment = Appointment::find($request->id);
        $appointment->appointment_date = $data->appointment_date;
        $appointment->appointment_time = $data->appointment_time;
        $appointment->note = $data->note;
        $appointment->status = $data->status;
        $result = $appointment->save();
        if( $result){
            return response()->json(['message' => 'Cập nhật lịch đặt thành công!'],200);
        }else{
            return response()->json(['message' => 'Cập nhật lịch đặt thất bại!'],404);
        }
    }
    
}
