<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',2)->paginate(10);
        return view('superAdmin.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('superAdmin.create');
    }

    public function store(Request $request)
    {
        $request->merge(['role_id' => 2]);
        $this->validate($request, [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $request['password']=Hash::make($request->password);

        User::create($request->all());
        return redirect()->route('superAdmin.index')
            ->with('success', 'Data operator Berhasil Dibuat');
    }

    // public function show($id)
    // {
    //     $user = User::find($id);
    //     return view('superAdmin.show', compact('user'));
    // }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('superAdmin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $request['password']=Hash::make($request->password);

        $user=User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('superAdmin.index')
            ->with('success', 'Data operator Berhasil Di Update');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('superAdmin.index')
            ->with('success', 'Data operator Berhasil Di Hapus');
    }


}
