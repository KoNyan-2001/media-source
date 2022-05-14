<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([

        'name' => 'required|max:250',
        'email' => 'required|email',
        'status' => 'required',

        ]);

        $user = User::findOrFail($id);
        $user->update([
        $user->name = $request->name,
        $user->email = $request->email,
        $user->status = $request->status,
        ]);
        return redirect('/admin/users')->with('ssMsg', 'You have successfully updated!');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users')->with('ssMsg', 'You have successfully deleted!');
    }
    
   
}
