<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Carbon\Carbon;

class DoctorController extends Controller
{
    function getDoctorsAPI(){
        $value = Doctor::all();
        return $value;
    }

    function findDoctorsAPI(Request $request) {
        $name = $request->name;
        $value = Doctor::where('full_name','like','%'.$name.'%')->get();
        if($value != null){
            return response() -> json(['massage'=>'Tìm thấy bác sỹ thành công','doctor'=>$value],200);
        }else{
            return response() -> json(['masage'=>'Không tìm thấy bác sỹ'],404);
        }
        Return $request;
    }

    function changeStatusDoctorsAPI(Request $request){
        $status = $request->status;
        $id = $request->id;
        $value = Doctor::find($id);
        $value->status = $status;
        $result = $value->save();
        if($result){
            return response()->json(['massage'=>"Cập nhật trạng thái bác sỹ thành công!"],200);
        }else{
            return response()->json(['massage'=>'Cập nhật trạng thái bác sỹ không thành công!'],404);
        }
    }

    function createDoctorsAPI(Request $request){
        $currentDateTime = Carbon::now();
        $formattedDateWithTimeZone = $currentDateTime->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $doctor = new Doctor();
        $doctor->full_name = $request->full_name;
        $doctor->gender = $request->gender;
        $doctor->date_of_birth = $request->date_of_birth;
        $doctor->address = $request->address;
        $doctor->phone_number = $request->phone_number;
        $doctor->email = $request->email;
        $doctor->specialization = $request->specialization;
        $doctor->experience = $request->experience;
        $doctor->status = 0;
        $doctor->start_at = $formattedDateWithTimeZone;
        $result = $doctor->save();
        if($result){
            return response()->json(['massage'=>"Cập nhật trạng thái bác sỹ thành công!"],200);
        }else{
            return response()->json(['massage'=>'Cập nhật trạng thái bác sỹ không thành công!'],404);
        }
    }
}


