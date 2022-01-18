<?php

namespace App\Http\Controllers;

use App\Models\Curse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        return User::all();
    }

    //registra un usuario
    public function create(Request $request)
    {
        $user = new User;
        $validator = Validator::make($request->all(),[
            'school_id' => 'required|integer|max:20',
            'role_id' => 'required|integer|max:20',
            'public_id' => 'required|max:255|unique:users,public_id',
            'name' => 'required|max:255|unique:users,name',
            'last_name' => 'required|max:255|unique:users,last_name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $user->create($request->all());
        $curses = Curse::find($request->curse_id);
        $user->curses()->attach($curses);
        return $request->json()->all();
    }

    //muestra un usuario
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    //actualiza un usuario
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(),[
            'school_id' => 'max:20|integer',
            'role_id' => 'max:20|integer',
            'public_id' => 'max:255|unique:users,public_id',
            'name' => 'max:255',
            'last_name' => 'max:255|users:schools,last_name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $user->update($request->all());
        return response()->json($user);
    }

    //elimina un usuario(softDelete)
    public function destroy($id)
    {
        $user = User::find( $id );
        $user->delete();
    }

}
