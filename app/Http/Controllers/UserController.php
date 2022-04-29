<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'mobile' => 'required',
            'username' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['created_at'] = \Carbon\Carbon::now()->format('Y-m-d');

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('root')
            ->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            "created_at" => \Carbon\Carbon::now()->format('Y-m-d'),
            'password' => 'required|min:8|confirmed',
            'mobile' => 'required',
            'username' => 'required'
        ]);

        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('root')
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('root')
            ->with('success', 'User deleted successfully.');
    }
}
