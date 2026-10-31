<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DokterController extends Controller
{
    public function index()
    {
        $data_dokter = Dokter::orderBy('id', 'desc')->get();
        return view('dokter.index', compact('data_dokter'));
    }
    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        Dokter::create($request->all());
        return redirect()->route('dokter.index');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());
        return redirect()->route('dokter.index');
    }

    public function destroy($id)
    {
        Dokter::destroy($id);
        return redirect()->route('dokter.index');
    }
}