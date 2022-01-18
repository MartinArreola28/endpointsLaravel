<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Validator;

class SchoolsController extends Controller
{
    public function index()
    {
        return School::all();
    }

    //registra una escuela
    public function create(Request $request)
    {
        $school = new School;
        $validator = Validator::make($request->all(),[
            'public_id' => 'required|max:255|unique:schools,public_id',
            'name' => 'required|max:45|unique:schools,name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $school->create($request->all());
        return $request->json()->all();
    }
    
    //muestra una escuela
    public function show($id)
    {
        $school = School::find($id);
        return response()->json($school);
    }

    //actualiza una escuela
    public function update(Request $request, $id)
    {
        $school = School::find($id);
        $validator = Validator::make($request->all(),[
            'public_id' => 'max:255|unique:schools,public_id',
            'name' => 'max:45|unique:schools,name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $school->update($request->all());
        return response()->json($school);
    }

    //elimina una escuela(softDelete)
    public function destroy($id)
    {
        $school = School::find( $id );
        $school->delete();
    }
}
