<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{

    public function index()
    {
        return Role::all();
    }

    //resgistra un rol
    public function create(Request $request)
    {
        $rol = new Role;
        $validator = Validator::make($request->all(),[
            'public_id' => 'required|max:255|unique:roles,public_id',
            'name' => 'required|max:45|unique:roles,name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $rol->create($request->all());
        return $request->json()->all();
    }

    //muestra un rol
    public function show($id)
    {
        $rol = Role::find($id);
        return response()->json($rol);
    }

    //actualiza un rol
    public function update(Request $request, $id)
    {
        $rol = Role::find($id);
        $validator = Validator::make($request->all(),[
            'public_id' => 'max:255|unique:roles,public_id',
            'name' => 'max:45|unique:roles,name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $rol->update($request->all());
        return response()->json($rol);
    }

    //elimina un rol(softDelete)
    public function destroy($id)
    {
        $rol = Role::find( $id );
        $rol->delete();
    }
}
