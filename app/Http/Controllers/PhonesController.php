<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use Illuminate\Support\Facades\Validator;

class PhonesController extends Controller
{
    public function index()
    {
        return Phone::all();
    }

    //registra un telefono
    public function create(Request $request)
    {
        $phone = new Phone;
        $validator = Validator::make($request->all(),[
            'public_id' => 'required|max:255|unique:phones,public_id',
            'user_id' => 'required|integer|max:20',
            'number' => 'required|max:45|unique:phones,number'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $phone->create($request->all());
        return $request->json()->all();
    }

    //muestra un telefono
    public function show($id)
    {
        $phone = Phone::find($id);
        return response()->json($phone);
    }

    //actualiza un telefono
    public function update(Request $request, $id)
    {
        $phone = Phone::find($id);
        $validator = Validator::make($request->all(),[
            'public_id' => 'max:255|unique:phones,public_id',
            'user_id' => 'integer|max:20',
            'name' => 'max:45|unique:phones,name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $phone->update($request->all());
        return response()->json($phone);
    }

    //elimina un telefono(softDelete)
    public function destroy($id)
    {
        $phone = Phone::find( $id );
        $phone->delete();
    }
}
