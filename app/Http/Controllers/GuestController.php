<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Guest;

class GuestController extends Controller
{
    //


    public function getAllGuest(){
        $guest=Guest::all();

        return response()->json($guest);
    }

    public function getGuest($email){
        $guest=Guest::where('email',$email)->first();
        if(is_null($guest)){
            return response()->json([
                "message"=> "data tidak ditemukan"
        ],404);
        }else{
            return $guest->toJson(JSON_PRETTY_PRINT);
        }
    }

    public function postNewGuest(Request $request){

       // $check_guest=Guest::find($request->email);


        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'max:255'],
            'gender' => ['required'],
            'age'=>['required'],
            'education'=>['required'],
            'agency'=>['required'],
            'agency_address'=>['required'],
            'handphone'=>['required'],
            'email'=>['required','email'],
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=>"invalid",
                "data"=>$validator->errors()
            ], 422);
        }else{
             $guest=Guest::firstOrCreate(
                ['email'=>$request->email],
                [
                'fullname'=>$request->fullname,
                'gender'=>$request->gender,
                'age'=>$request->age,
                'education'=>$request->education,
                'agency'=>$request->agency,
                'agency_address'=>$request->agency_address,
                'handphone'=>$request->handphone,
                ]);

            return response()->json([
              "status" => "OK",  
              "message" => "tamu berhasil ditambahkan"
            ], 200);
        }
        

        /*return response()->json([
          "message" => "tamu berhasil ditambahkan"    ], 200);*/
    }

    public function updateGuest(Request $request,$id){
        $guest=Guest::find($id);
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'max:255'],
            'gender' => ['required'],
            'age'=>['required'],
            'education'=>['required'],
            'agency'=>['required'],
            'agency_address'=>['required'],
            'handphone'=>['required'],
            'email'=>['required','email'],
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=>"invalid",
                "data"=>$validator->errors()
            ], 422);
        }else{
            $guest->update([
                'fullname'=>$request->fullname,
                'gender'=>$request->gender,
                'age'=>$request->age,
                'education'=>$request->education,
                'agency'=>$request->agency,
                'agency_address'=>$request->agency_address,
                'handphone'=>$request->handphone,    
             ]);

            return response()->json([
              "status" => "OK" ,
              "message" => "tamu berhasil diupdate"
            ], 200);
        }

    }
}
