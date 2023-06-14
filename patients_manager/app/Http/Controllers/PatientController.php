<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    function getPatientsAPI()
    {
        $value =  Patient::orderByDesc('id')->get();
        return $value;   
    }

    function deletePatientsAPI(Request $request){
        $id = $request->id;
        $value = Patient::where('id', '=', $id)->delete();
        if($value > 0 ){
            return response()->json(['message' => 'Xóa bệnh nhân thành công'], 200);
        }else{
            return response()->json(['message' => 'Xóa bệnh nhân không thành công'], 404);
        }
    }

    function getPatientAPI(Request $request){
        $id = $request->id;
        $value =  Patient::find($id);
        return $value;   
    }


    function createPatientsAPI(Request $request){
        $patients = new Patient();
        $patients->full_name = $request->full_name;
        $patients->gender = $request->gender;
        $patients->date_of_birth = $request->date_of_birth;
        $patients->address = $request->address;
        $patients->email = $request->email;
        $patients->phone_number = $request->phone_number;
        $result = $patients->save();
        if($result){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    
    function updatePatientsAPI(Request $request){
        $id = $request->id;
        $patients = Patient::find($id);
        $patients->full_name = $request->full_name;
        $patients->gender = $request->gender;
        $patients->date_of_birth = $request->date_of_birth;
        $patients->address = $request->address;
        $patients->email = $request->email;
        $patients->phone_number = $request->phone_number;
        $result = $patients->save();
        if($result){
            return response()->json(['massage'=>'Cập nhật thông tin bệnh nhân thành công!'],200);
        }else{
            return response()->json(['massage'=>'Cập nhật thông tin bệnh nhân thất bại!'],404);
        }
    }


    function findPatientsAPI(Request $request){
        $name = $request->name;
        $value = Patient::where('full_name','like','%'.$name.'%')->get();
        if($value != null){
            return response() -> json(['message'=>'Tìm thấy bệnh nhân thành công','patient'=>$value],200);
        }else{
            return response() -> json(['message'=>'Không tìm bệnh nhân sỹ'],404);
        }
        Return $request; 
    }
}

