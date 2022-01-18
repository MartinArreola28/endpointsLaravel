<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curse;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CursesController extends Controller
{
    public function index()
    {
        return Curse::all();
    }

    //registra un curso
    public function create(Request $request)
    {
        $curse = new Curse;
        $validator = Validator::make($request->all(),[
            'public_id' => 'required|max:255|unique:curses,public_id',
            'name' => 'required|max:45|unique:curses,name',
            'school_id' => 'required|integer|max:20',
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $curse->create($request->all());
        return $request->json()->all();
    }

    //muestra un curso
    public function show($id)
    {
        $curse = Curse::find($id);
        return response()->json($curse);
    }

    //actualiza un curso
    public function update(Request $request, $id)
    {
        $curse = Curse::find($id);
        $validator = Validator::make($request->all(),[
            'public_id' => 'max:255|unique:curses,public_id',
            'name' => 'max:45|unique:curses,name'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $curse->update($request->all());
        return response()->json($curse);
    }

    //elimina un curso (softDelete)
    public function destroy($id)
    {
        $curse = Curse::find( $id );
        $curse->delete();
    }

    //muestra los usuario activos en un curso
    public function showActiveUsers($id){
        $curse = DB::table('curses')
        ->join('users_curses', 'curses.id', '=', 'users_curses.curse_id')
        ->join('users', 'users.id', '=', 'users_curses.user_id')
        ->where('curses.id', $id)
        ->get();

        return response()->json($curse);
    }
}
