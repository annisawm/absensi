<?php

namespace App\Http\Controllers;

//use App\Models\Guest;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Note;
use Barryvdh\DomPDF\Facade as PDF;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->paginate(5);
        return view('notes.index', compact('notes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cetak(note $id)
    {
        $notes = Note::where('id', $id->id)->get();
        $program = Program::where('id', $id->program_id)->get();
        $pdf = PDF\Pdf::loadview('notes.cetak', ['notes' => $notes,'program'=>$program]);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'ketua' => 'required',
            'sekretaris' => 'required',
            'pencatat' => 'required',
            'peserta' => 'required',
            'isi' => 'required',
            'pembuka' => 'required',
            'pembahasan' => 'required',
            'keputusan' => 'required',
        ]);

        Note::create($request->all());
        return redirect()->route('notes.index')
            ->with('success', 'Notulensi Berhasil Dibuat');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'judul' => 'required',
            'ketua' => 'required',
            'sekretaris' => 'required',
            'pencatat' => 'required',
            'peserta' => 'required',
            'isi' => 'required',
            'pembuka' => 'required',
            'pembahasan' => 'required',
            'keputusan' => 'required',
        ]);

        $note->update($request->all());
        return redirect()->route('notes.index')
            ->with('success', 'Notulensi Berhasil Di Update');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')
            ->with('success', 'Notulensi Berhasil Di Hapus');
    }

    public function hapus($id)
    {
        $note = Note::find($id);
        $note->delete();

        return redirect('/notes');
    }

    public function trash()
    {
        $note = Note::onlyTrashed()->get();
        return view('notes/trash', ['notes' => $note]);
    }

    public function kembalikan($id)
    {
        $note = Note::onlyTrashed()->where('id',$id);
        $note->restore();
        return redirect('/notes/trash');
    }

    public function kembalikan_semua()
    {
        $note = Note::onlyTrashed();
        $note->restore();

        return redirect('/notes/trash');
    }

    public function hapus_permanen($id)
    {
        $note = Note::onlyTrashed()->where('id',$id);
        $note->forceDelete();

        return redirect('/notes/trash');
    }

    public function hapus_permanen_semua()
    {
        $note = Note::onlyTrashed();
        $note->forceDelete();

        return redirect('/notes/trash');
    }
}
