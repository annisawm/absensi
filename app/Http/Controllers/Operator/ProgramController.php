<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Note;
use App\Models\Program;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(10);

        return view('program.index', compact('programs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function cetak(program $id)
    {
        $program = program::where('id', $id->id)->get();
        $guest = Guest::where('program_id', $id->id)->get();
        $pdf = PDF\Pdf::loadview('program.cetak',['program'=>$program,'guest'=>$guest]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function create()
    {
        return view('program.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'acara' => 'required',
            'jam' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
        ]);

        program::create($request->all());
        return redirect()->route('program.index')
            ->with('success', 'Data Program Berhasil Dibuat');

    }

    public function show($id)
    {
        $program = Program::with('notes')->find($id);
        return view('program.show', compact('program'));
    }

    public function notes($id)
    {
        $program = Program::find($id);
        return view('program.note', compact('program'));
    }


    public function edit(program $program)
    {
        return view('program.edit', compact('program'));
    }


    public function update(Request $request, program $program)
    {
        $this->validate($request, [
            'acara' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
        ]);

        program::findOrFail($program->id);
        return redirect()->route('program.index')
            ->with('success', 'Data Program Berhasil Di Update');
    }

    public function destroy($id)
    {
        $program = program::findOrFail($id);
        Note::where('program_id', $program->id)->delete();
        $program->delete();
        return redirect()->route('program.index')
            ->with('success', 'Data Program Berhasil Di Hapus');
    }

    public function hapus($id)
    {
        $program = program::findOrFail($id);
        Note::where('program_id', $program->id)->delete();
        $program->delete();

        return redirect('/program');
    }

    public function trash()
    {
        $program = program::onlyTrashed()->get();
        return view('/program/trash', ['program' => $program]);
    }

    public function kembalikan($id)
    {
        $program = program::onlyTrashed()->where('id',$id);
        $program->restore();
        return redirect('/program/trash');
    }


    public function hapus_permanen($id)
    {
        $program = program::onlyTrashed()->where('id',$id);
        $program->forceDelete();

        return redirect('/program/trash');
    }
}
