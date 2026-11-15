<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->latest()->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sinopsis' => ['required', 'string'],
            'year' => ['required', 'integer', 'between:1900,2100'],
            'genre_id' => ['required', 'exists:genres,id'],
            'poster' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $path = $request->file('poster')->store('images', 'public');
        $validated['poster'] = 'storage/' . $path;

        Film::create($validated);

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function show(Film $film)
    {
        return redirect()->route('admin.films.edit', $film);
    }

    public function edit(Film $film)
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sinopsis' => ['required', 'string'],
            'year' => ['required', 'integer', 'between:1900,2100'],
            'genre_id' => ['required', 'exists:genres,id'],
            'poster' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('poster')) {
            if ($film->poster && str_starts_with($film->poster, 'storage/images/')) {
                $storagePath = str_replace('storage/', '', $film->poster);
                if (Storage::disk('public')->exists($storagePath)) {
                    Storage::disk('public')->delete($storagePath);
                }
            }

            $path = $request->file('poster')->store('images', 'public');
            $validated['poster'] = 'storage/' . $path;
        } else {
            unset($validated['poster']);
        }

        $film->update($validated);

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        DB::transaction(function () use ($film) {
            $film->perans()->delete();
            $film->kritiks()->delete();

            if ($film->poster && str_starts_with($film->poster, 'storage/images/')) {
                $storagePath = str_replace('storage/', '', $film->poster);
                if (Storage::disk('public')->exists($storagePath)) {
                    Storage::disk('public')->delete($storagePath);
                }
            }

            $film->delete();
        });

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil dihapus.');
    }
}
