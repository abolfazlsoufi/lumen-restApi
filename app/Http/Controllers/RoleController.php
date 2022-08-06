<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class RoleController extends Controller
{
    public function show()
    {
        $role = Role::all();
        return response()->json(['response'=>$role,'Result'=>['RetVal'=>true,'Description'=>'Show All Roles']]);
    }

    public function create(Request $request)
    {
        $role       = new Role();
        $role->name = $request->name;

        $role->save();
        return response()->json(['response'=>$role,'Result'=>['RetVal'=>true,'Description'=>'Role Successfully Created!']]);
    }

    public function update(Request $request,$id)
    {
        $role       = Role::find($id);
        $role->name = $request->name;

        $role->save();
        return response()->json(['response'=>$role,'Result'=>['RetVal'=>true,'Description'=>'Role Successfully Updated!']]);
    }

    public function delete($id)
    {
        $role = Role::destroy($id);
        if (!isEmpty($role)){
            return response()->json(['response'=>$role,'Result'=>['RetVal'=>true,'Description'=>'Role Successfully Deleted!']]);
        }
        else{
            return response()->json(['response'=>$role,'Result'=>['RetVal'=>false,'Description'=>'This role is not available with this id!']]);
        }

    }
}
