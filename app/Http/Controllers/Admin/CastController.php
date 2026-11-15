<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function index()
    {
        $casts = Cast::latest()->paginate(10);
        return view('admin.casts.index', compact('casts'));
    }

    public function create()
    {
        return view('admin.casts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:45'],
            'age' => ['required', 'integer', 'min:1'],
            'bio' => ['required', 'string'],
        ]);

        Cast::create($validated);

        return redirect()->route('admin.casts.index')->with('success', 'Cast berhasil ditambahkan.');
    }

    public function show(Cast $cast)
    {
        return redirect()->route('admin.casts.edit', $cast);
    }

    public function edit(Cast $cast)
    {
        return view('admin.casts.edit', compact('cast'));
    }

    public function update(Request $request, Cast $cast)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:45'],
            'age' => ['required', 'integer', 'min:1'],
            'bio' => ['required', 'string'],
        ]);

        $cast->update($validated);

        return redirect()->route('admin.casts.index')->with('success', 'Cast berhasil diperbarui.');
    }

    public function destroy(Cast $cast)
    {
        DB::transaction(function () use ($cast) {
            $cast->perans()->delete();
            $cast->delete();
        });

        return redirect()->route('admin.casts.index')->with('success', 'Cast berhasil dihapus.');
    }
}
