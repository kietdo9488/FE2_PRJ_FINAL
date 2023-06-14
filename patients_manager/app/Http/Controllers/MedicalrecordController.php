<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Medicalrecord;
use Illuminate\Http\Request;

class MedicalrecordController extends Controller
{
    function getMedicalrecordsAPI()
    {
        $value = Medicalrecord::all();
        return $value;   
    }

    //1 thg
    function getMedicalrecordAPI(Request $request) {
        $value = Medicalrecord::find($request->id);
        return $value;
    }

    //Them xoa sua tim
    //Them
    function createMedicalrecord(Request $request) {
        $medicalrecord = new Medicalrecord();
        $medicalrecord->patient_id = $request->patient_id;
        $medicalrecord->entry_date = $request->entry_date;
            $medicalrecord->symptoms = $request->symptoms;
            $medicalrecord->diagnosis = $request->diagnosis;
            $medicalrecord->note=  $request->note;
        $result = $medicalrecord->save();
        if($result){
            return response()->json(['massage'=>'Them medicalrecord thành công!'],200);;
        }else{
            return redirect()->json(['massage'=>'them medicalrecord thất bại!'],404);
        }
    }

    // function deleteMedicalrecordAPI(Request $request){
    //     $id = $request->id;
    //     $value = Medicalrecord::where('id', '=', $id)->delete();
    //     if($value > 0 ){
    //         return response()->json(['message' => 'Xóa Medicalrecord thành công'], 200);
    //     }else{
    //         return response()->json(['message' => 'Xóa Medicalrecord không thành công'], 404);
    //     }
    // }
    
    function updateMedicalrecordAPI(Request $request){
        $id = $request->id;
        $medicalrecord = Medicalrecord::find($id);
        $medicalrecord->patient_id = $request->patient_id;
        $medicalrecord->entry_date = $request->entry_date;
        $medicalrecord->symptoms = $request->symptoms;
        $medicalrecord->diagnosis = $request->diagnosis;
        $medicalrecord->note = $request->note;
        $result = $medicalrecord->save();
        if($result){
            return response()->json(['massage'=>'Cập nhật medicalrecord thành công!'],200);
        }else{
            return response()->json(['massage'=>'Cập nhật medicalrecord thất bại!'],404);
        }
    }

    function findMedicalrecordsAPI(Request $request){
        $id = $request->id;
        $value = Medicalrecord::find($id);
        if($value != null){
            return response() -> json(['massage'=>'Tìm thấy bệnh nhân thành công','patient'=>$value],200);
        }else{
            return response() -> json(['masage'=>'Không tìm bệnh nhân sỹ'],404);
        }
        return $request; 
    }

    function findPatientInMedicalrecordsAPI(Request $request){

        $name = $request->name;
        $value = DB::table('medicalrecords')
        ->join('patients', 'patients.id', '=', 'medicalrecords.patient_id')
        ->where('patients.full_name', 'like', '%' . $name . '%')
        ->get();
        return $value;
    }
}

