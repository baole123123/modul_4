<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::paginate(4);
        if(isset($request->keyword)){
            $keyword = $request->keyword;
            $users = User::where('name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%")
                ->paginate();
        }


        return view('users.index', compact('users'));
    }
    public function create(){
        return view ('users.create');
    }
    public function store(Request $request){
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        // xử lý ảnh
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();
        return redirect()->route('user.index');
    }
    public function edit($id){
        $user = User::find($id);

        return view('users.edit' , compact(['user']));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        // xử lý ảnh
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();
            return redirect()->route('user.index');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');

    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

}
