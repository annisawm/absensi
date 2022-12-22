<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opd;
use App\Models\Pejabat;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PejabatController extends Controller
{
    public function index()
    {
        $pejabats = Pejabat::where('role_id', 5)->paginate(10);
        return view('pejabat.index', compact('pejabats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $opd = Opd::all();
        return view('pejabat.create', compact('opd'));
    }

    public function store(Request $request)
    {
        $request->merge(['role_id' => 5]);
        $this->validate($request, [
            'nip' => 'nullable|numeric|digits: 18',
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'opd_kode' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $request['password']=Hash::make($request->password);

        $data=User::create($request->all());
        $request['user_id']=$data->id;
        Pejabat::create($request->all());
        return redirect()->route('pejabat.index')
            ->with('success', 'Data Berhasil Dibuat');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pejabat.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $request['password']=Hash::make($request->password);

        $user=User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('pejabat.index')
            ->with('success', 'Data operator Berhasil Di Update');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('pejabat.index')
            ->with('success', 'Data operator Berhasil Di Hapus');
    }

}
