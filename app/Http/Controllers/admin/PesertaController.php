<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesertas = Peserta::get();

        return view('admin.peserta.index', compact('pesertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datas = $request->validate([
            'name' => ['required', 'string', 'max:115'],
            'pelatihan' => ['required', 'string', 'max:100'],
            'type' => ['required', 'string', Rule::in(['1', '2', '3'])],
        ]);

        $peserta = Peserta::create($datas);
        $peserta->certificate()->create(['type' => $datas['type']]);

        return to_route('peserta.index')->with('success', 'Peserta baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $peserta)
    {
        $peserta->load('certificate');

        return view('admin.peserta.edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $peserta)
    {
        $datas = $request->validate([
            'name' => ['required', 'string', 'max:115'],
            'pelatihan' => ['required', 'string', 'max:100'],
            'type' => ['required', 'string', Rule::in(['1', '2', '3'])],
        ]);

        $peserta->update($datas);
        $peserta->certificate()->update(['type' => $datas['type']]);

        return to_route('peserta.index')->with('success', 'Peserta telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return to_route('peserta.index')->with('success', 'Peserta telah terhapus');
    }
}
