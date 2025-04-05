<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|integer',
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $data = User::create($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'gagal menambahkan pengguna');
        }

        return redirect()->route('users.index')->with('success', 'berhasil menambahkan pengguna');
    }

    /**
     * Display the specified resource.
     */

    public function edit(string $id)
    {
        $user = User::find($id);

        return view('pages.users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'nip' => 'required|integer',
            'name' => 'required|string',
        ]);

        $data = $user->update($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'gagal mengubah pengguna');
        }

        return redirect()->route('users.index')->with('success', 'berhasil mengubah pengguna');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'berhasil menghapus pengguna');
    }
}
