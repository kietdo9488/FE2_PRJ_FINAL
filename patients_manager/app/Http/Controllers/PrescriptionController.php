<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Prescription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    function getPrescriptionsAPI()
    {
        $value = Prescription::all();
        return $value;   
    }

    function deletePrescriptionsAPI(Request $request){
        $id = $request->id;
        $value = Prescription::where('id', '=', $id)->delete();
        if($value > 0 ){
            return response()->json(['message' => 'Xóa đơn thuốc thành công'], 200);
        }else{
            return response()->json(['message' => 'Xóa đơn thuốc không thành công'], 404);
        }
    }

    function getPrescriptionAPI(Request $request){
        $id = $request->id;
        $value =  Prescription::find($id);
        return $value;   
    }

    function createPrescriptionsAPI(Request $request){
        $currentDateTime = Carbon::now();
        $formattedDateWithTimeZone = $currentDateTime->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $prescription = new Prescription();
        $prescription->patient_id = $request->patient_id;
        $prescription->prescription_date = $formattedDateWithTimeZone;
        $prescription->prescription_code = $request->prescription_code;
        $prescription->prescription_details = $request->prescription_details;
        $prescription->doctor = $request->doctor;
        $result = $prescription->save();
        if($result){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    function findPrescriptionsAPI(Request $request){
        $id = $request->id;
        $value = Prescription::where('patient_id','like','%'.$id.'%')->get();
        if($value != null){
            return response() -> json(['message'=>'Tìm thấy đơn thuốc của bệnh nhân thành công','prescription'=>$value],200);
        }else{
            return response() -> json(['message'=>'Không tìm thấy đơn thuốc của bệnh nhân bệnh nhân'],404);
        }
    }

    function findPrescriptionsByPatientAPI(Request $request)
    {
        $name = $request->name;
        $value = DB::table('prescriptions')
        ->join('patients', 'patients.id', '=', 'prescriptions.patient_id')
        ->where('patients.full_name', 'like', '%' . $name . '%')
        ->get();
        return $value;
    }

}
