<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SiswaProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('siswa.edit-profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $siswa = Auth::guard('siswa')->user();

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'no_telepon' => 'required|string|max:15',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'sekolah_asal' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('siswas')->ignore($siswa->id),
            ],
            'pas_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Handle file upload if a new image is provided
        if ($request->hasFile('pas_foto')) {
            // Delete the old photo if it exists
            if ($siswa->pas_foto) {
                Storage::delete($siswa->pas_foto);
            }
            
            // Store the new photo
            $path = $request->file('pas_foto')->store('pas_foto', 'public');
            $validatedData['pas_foto'] = $path;
        }

        // Only update password if provided
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $siswa->update($validatedData);

        return redirect()->route('siswa.profile.edit')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}