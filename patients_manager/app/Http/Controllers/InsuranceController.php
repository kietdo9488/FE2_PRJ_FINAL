<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Insurance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    function getInsurancesAPI()
    {
        $value = Insurance::all();
        return $value;   
    }

    function deleteInsurancesAPI(Request $request){
        $id = $request->id;
        $value = Insurance::where('id', '=', $id)->delete();
        if($value > 0 ){
            return response()->json(['message' => 'Xóa bảo hiểm thành công'], 200);
        }else{
            return response()->json(['message' => 'Xóa bảo hiểm không thành công'], 404);
        }
    }

    function getInsuranceAPI(Request $request){
        $id = $request->id;
        $value =  Insurance::find($id);
        return $value;   
    }

    function createInsurancesAPI(Request $request){
        $currentDateTime = Carbon::now();
        $formattedDateWithTimeZone = $currentDateTime->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $patients = new Insurance();
        $patients->patient_id = $request->patient_id;
        $patients->provider_name = $request->provider_name;
        $patients->provider_number = $request->provider_number;
        $patients->expiration_date = $formattedDateWithTimeZone;
        $result = $patients->save();
        if($result){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    function updateInsurancesAPI(Request $request){
        $currentDateTime = Carbon::now();
        $formattedDateWithTimeZone = $currentDateTime->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $id = $request->id;
        $patients = Insurance::find($id);
        $patients->patient_id = $request->patient_id;
        $patients->provider_name = $request->provider_name;
        $patients->provider_number = $request->provider_number;
        $patients->expiration_date = $formattedDateWithTimeZone;
        $result = $patients->save();
        if($result){
            return response()->json(['massage'=>'Cập nhật bảo hiểm bệnh nhân thành công!'],200);
        }else{
            return response()->json(['massage'=>'Cập nhật bảo hiểm bệnh nhân thất bại!'],404);
        }
    }

    function findInsurancesAPI(Request $request){
        $id = $request->id;
        $value = Insurance::where('id','like','%'.$id.'%')->get();
        if($value != null){
            return response() -> json(['message'=>'Tìm thấy bảo hiểm thành công','insurance'=>$value],200);
        }else{
            return response() -> json(['message'=>'Không tìm thấy bảo hiểm'],404);
        }
        Return $request; 
    }

    function findInsurancesByPatientAPI(Request $request)
    {
        $name = $request->name;
        $value = DB::table('insurance')
        ->join('patients', 'patients.id', '=', 'insurance.patient_id')
        ->where('patients.full_name', 'like', '%' . $name . '%')
        ->get();
        return $value;
    }
}
