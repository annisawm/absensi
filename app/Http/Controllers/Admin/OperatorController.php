<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)->paginate(10);
        return view('operator.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('operator.create');
    }

    public function store(Request $request)
    {
        $request->merge(['role_id' => 3]);
        $this->validate($request, [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $request['password']=Hash::make($request->password);

        User::create($request->all());
        return redirect()->route('operator.index')
            ->with('success', 'Data Berhasil Dibuat');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('operator.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $request['password']=Hash::make($request->password);

        $user=User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('operator.index')
            ->with('success', 'Data operator Berhasil Di Update');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('operator.index')
            ->with('success', 'Data operator Berhasil Di Hapus');
    }

}
