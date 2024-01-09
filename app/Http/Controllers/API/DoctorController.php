<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;


class DoctorController extends Controller
{
    public function all_doctors()
    {
        $doctors = Doctor::all();

        return response()->json([
            "status" => true,
            "doctors" => $doctors,
        ], 200);
    }

    public function insert_doctor(Request $request)
    {
        $result =Doctor::create(
            [
                'name' => $request->name,
                'specialization' => $request->specialization,
                'designation' => $request->designation,
                'experience' => $request->experience,
                'gender' => $request->gender,
            ]
        );

        if($result)
        {
            return response()->json([
                "status" => true,
                "message" => 'Data stored successfully.',
            ], 200);
        }
        else
        {
            return response()->json([
                "status" => false,
                "message" => 'Data not stored.',
            ], 500);
        }
    }

    public function update_doctor(Request $request, int $id)
    {
        $result = Doctor::where('id', $id)->first();

        if(!$result)
        {
            return response()->json([
                "status" => false,
                "message" => 'Data Not Found.',
            ], 404);
        }

        $result->update(
            [
                'name' => $request->name,
                'specialization' => $request->specialization,
                'designation' => $request->designation,
                'experience' => $request->experience,
                'gender' => $request->gender,                
            ]
        );
        return response()->json([
            "status" => true,
            "message" => 'Data updated successfully.',
        ], 200);
    }

    public function delete_doctor(int $id)
    {
        try{
            $result = Doctor::findOrFail($id);
            
            $result->delete();

            return response()->json([
                "status" => true,
                "message" => 'Data deleted successfully.',
            ], 200);

        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return response()->json([
                "status" => false,
                "message" => 'Data not found.',
            ], 404);
        }
    }

    public function get_doctor(int $id)
    {
        try{
            $result = Doctor::findOrFail($id);
            
            $result = $result->makeHidden(['created_at', 'updated_at']);
            
            return response()->json([
                "status" => true,
                "result" => $result,
            ], 200);

        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return response()->json([
                "status" => false,
                "message" => 'Data not found.',
            ], 404);
        }        
    }

}
