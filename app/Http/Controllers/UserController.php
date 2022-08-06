<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show()
    {
        $user = User::all();
        return response()->json(['response'=>$user,'Result'=>['RetVal'=>true,'Description'=>'Show All Users!']]);
    }

    public function showId($id)
    {
        $user = User::find($id);
        return $user
            ? (response()->json(['response'=>$user,'Result'=>['RetVal'=>true,'Description'=>'The User Exists!']]))
            : (response()->json(['response'=>$user,'Result'=>['RetVal'=>false,'Description'=>'User Doesnt Exist!']]));
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->password     = $request->password;
        $user->phone_number = $request->phone_number;
        $user->email        = $request->email;

        $user->save();

        $role = new UserRole();
        $role->user_id = $user->id;
        $role->save();

        return response()->json(['response'=>$user,'Result'=>['RetVal'=>true,'Description'=>'User Successfully Created!']]);

    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);

        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->password     = $request->password;
        $user->phone_number = $request->phone_number;
        $user->email        = $request->email;

        $user->save();
        return response()->json(['response'=>$user,'Result'=>['RetVal'=>true,'Description'=>'User Successfully Updated!']]);
    }

    public function delete($id)
    {
        $user = User::destroy($id);
        return response()->json(['response'=>$user,'Result'=>['RetVal'=>true,'Description'=>'User Successfully Deleted!']]);
    }
}
