<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Opd;
use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade as PDF;


class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function cetak()
    {
        $guest = guest::all();
        $pdf = PDF\Pdf::loadview('guest.cetak', ['guest' => $guest]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function create()
    {
        $opd = Opd::all();
        return view('guest.create', compact('opd'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'nullable|numeric|digits: 18',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'opd_kode' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required|numeric',
//            'signature' => 'required',
        ]);


        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $signature = uniqid() . '.' . $image_type;

        Storage::put('signed/' . $signature, $image_base64);

        $data = $request->all();
        $data['signed'] = 'signed/' . $signature;
        $guest = guest::create($data);
        if ($guest) {
            return redirect()->route('guest.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('guest.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function file($id)
    {
        $poster = Guest::find($id);
        $file = storage_path('app/' . $poster->signed);
        return response()
            ->file($file, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }

    public function tabel($id){
        return DataTables::of(Guest::where('program_id', $id))
            ->addColumn('signed', function ($data) {
                return '<img class="img-size-64 img-bordered-lg" src="' . route('signed.file', $data->id) . '" alt="user image">';
            })
            ->rawColumns(['signed'])
            ->make(true);
    }

    public function edit(guest $guest)
    {
        return view('guest.edit', compact('guest'));
    }


    public function update(Request $request, guest $guest)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'opd_kode' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
//            'signature' => 'required',
        ]);


        $guest = guest::findOrFail($guest->id);

        $guest->update($request->all());

        if ($guest) {

            return redirect()->route('guest.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {

            return redirect()->route('guest.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $guest = guest::findOrFail($id);
        $guest->delete();

        if ($guest) {
            return redirect()->route('guest.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('guest.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
