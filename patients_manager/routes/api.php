<?php
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\MedicalrecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//appointment
Route::get('/appointment/all',[AppointmentController::class,'getAppointmentsAPI']);
Route::get('/appointment/doctor/{name}',[AppointmentController::class,'findAppointmentOfPatientAPI']);//createAppointmentOfPatientAPI
Route::post('/appointment',[AppointmentController::class,'createAppointmentOfPatientAPI']);

//doctor
Route::get('/doctor/all',[DoctorController::class,'getDoctorsAPI']);
Route::get('/doctor/{name}',[DoctorController::class,'findDoctorsAPI']);
Route::post('/doctor',[DoctorController::class,'changeStatusDoctorsAPI']);
Route::post('/doctor/create',[DoctorController::class,'createDoctorsAPI']);

//insurance
Route::get('/insurance/all',[InsuranceController::class,'getInsurancesAPI']);
Route::get('/insurance/find/{id}',[InsuranceController::class,'findInsurancesAPI']);
Route::get('/insurance/find_patientName/{name}',[InsuranceController::class,'findInsurancesByPatientAPI']);
Route::get('/insurance/{id}',[InsuranceController::class,'getInsuranceAPI']);
Route::delete('/insurance/{id}',[InsuranceController::class,'deleteInsurancesAPI']);
Route::post('/insurance',[InsuranceController::class,'createInsurancesAPI']);
Route::post('/insurance/update',[InsuranceController::class,'updateInsurancesAPI']);

//medicalrecord
Route::get('/medicalrecord/all',[MedicalrecordController::class,'getMedicalrecordsAPI']);
Route::get('/medicalrecord/find/{id}',[MedicalrecordController::class,'findMedicalrecordsAPI']);
Route::get('/medicalrecord/get/{id}',[MedicalrecordController::class,'getMedicalrecordAPI']);
// Route::delete('/medicalrecord/{id}',[MedicalrecordController::class,'deleteMedicalrecordAPI']);
Route::post('/medicalrecord',[MedicalrecordController::class,'createMedicalrecord']);
Route::post('/medicalrecord/update',[MedicalrecordController::class,'updateMedicalrecordAPI']);
Route::get('/medicalrecord/name/{name}',[MedicalrecordController::class,'findPatientInMedicalrecordsAPI']);


//medicalrecord
Route::get('/patient/all',[PatientController::class,'getPatientsAPI']);
Route::get('/patient/{name}',[PatientController::class,'findPatientsAPI']);
Route::get('/patient/{id}',[PatientController::class,'getPatientAPI']);
Route::delete('/patient/{id}',[PatientController::class,'deletePatientsAPI']);
Route::post('/patient',[PatientController::class,'createPatientsAPI']);
Route::post('/patient/update',[PatientController::class,'updatePatientsAPI']);



//prescription
Route::get('/prescription/all',[PrescriptionController::class,'getPrescriptionsAPI']);
Route::get('/prescription/find/{id}',[PrescriptionController::class,'findPrescriptionsAPI']);
Route::get('/prescription/find_patientName/{name}',[PrescriptionController::class,'findPrescriptionsByPatientAPI']);
Route::get('/prescription/{id}',[PrescriptionController::class,'getPrescriptionAPI']);
Route::post('/prescription',[PrescriptionController::class,'createPrescriptionsAPI']);
