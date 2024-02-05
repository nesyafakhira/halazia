<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Stamp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateSettingController extends Controller
{
    public function edit()
    {
        $stamp = Stamp::first();
        return view('dashboard.certificate.setting.edit', compact('stamp'));
    }

    public function update(Request $request, Stamp $stamp)
    {
        $datas = $request->validate([
            'ceo_name' => ['required', 'string', 'max:115'],
            'teacher_name' => ['required', 'string', 'max:115'],
            'ceo_signature' => ['nullable', 'file', 'image', 'max:2048', 'mimes:png'],
            'teacher_signature' => ['nullable', 'file', 'image', 'max:2048', 'mimes:png']
        ]);

        if ($request->hasFile('ceo_signature')) {
            $ceo_signature = $request->file('ceo_signature');
            $datas['ceo_signature'] = $ceo_signature->store('signature');
        }

        if ($request->hasFile('teacher_signature')) {
            $teacher_signature = $request->file('teacher_signature');
            $datas['teacher_signature'] = $teacher_signature->store('signature');
        }

        $stamp->update([
            'ceo_name' => $datas['ceo_name'],
            'teacher_name' => $datas['teacher_name'],
            'ceo_signature' => $datas['ceo_signature'] ?? $stamp->ceo_signature,
            'teacher_signature' => $datas['teacher_signature'] ?? $stamp->teacher_signature,
        ]);

        return to_route('certificate.index')->with('success', 'Sukses mengedit setting untuk sertifikat');
    }
}
