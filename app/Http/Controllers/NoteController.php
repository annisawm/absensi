<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->paginate(5);
        return view('notes.index', compact('notes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
}
