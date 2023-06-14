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

//medicalrecord
Route::get('/medicalrecord/all',[MedicalrecordController::class,'getMedicalrecordsAPI']);


//medicalrecord
Route::get('/patient/all',[PatientController::class,'getPatientsAPI']);
Route::get('/patient/{name}',[PatientController::class,'findPatientsAPI']);
Route::get('/patient/{id}',[PatientController::class,'getPatientAPI']);
Route::delete('/patient/{id}',[PatientController::class,'deletePatientsAPI']);
Route::post('/patient',[PatientController::class,'createPatientsAPI']);
Route::post('/patient/update',[PatientController::class,'updatePatientsAPI']);



//medicalrecord
Route::get('/prescription/all',[PrescriptionController::class,'getPrescriptionsAPI']);