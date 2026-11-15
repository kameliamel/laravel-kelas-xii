<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Film;
use App\Models\Peran;
use Illuminate\Http\Request;

class PeranController extends Controller
{
    public function index()
    {
        $perans = Peran::with(['film', 'cast'])->latest()->paginate(10);
        return view('admin.perans.index', compact('perans'));
    }

    public function create()
    {
        $films = Film::orderBy('title')->get();
        $casts = Cast::orderBy('name')->get();
        return view('admin.perans.create', compact('films', 'casts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'actor' => ['required', 'string', 'max:255'],
            'film_id' => ['required', 'exists:films,id'],
            'cast_id' => ['required', 'exists:casts,id'],
        ]);

        Peran::create($validated);

        return redirect()->route('admin.perans.index')->with('success', 'Peran berhasil ditambahkan.');
    }

    public function show(Peran $peran)
    {
        return redirect()->route('admin.perans.edit', $peran);
    }

    public function edit(Peran $peran)
    {
        $films = Film::orderBy('title')->get();
        $casts = Cast::orderBy('name')->get();
        return view('admin.perans.edit', compact('peran', 'films', 'casts'));
    }

    public function update(Request $request, Peran $peran)
    {
        $validated = $request->validate([
            'actor' => ['required', 'string', 'max:255'],
            'film_id' => ['required', 'exists:films,id'],
            'cast_id' => ['required', 'exists:casts,id'],
        ]);

        $peran->update($validated);

        return redirect()->route('admin.perans.index')->with('success', 'Peran berhasil diperbarui.');
    }

    public function destroy(Peran $peran)
    {
        $peran->delete();

        return redirect()->route('admin.perans.index')->with('success', 'Peran berhasil dihapus.');
    }
}
