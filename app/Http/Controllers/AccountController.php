<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(Request $request)
{
    $admin = Auth::user();
    $search = $request->search;

    $gurus = Guru::with('user')
        ->when($search, function ($query, $search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nip', 'like', '%' . $search . '%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('username', 'like', '%' . $search . '%');
                });
        })
        ->orderBy('nama')
        ->paginate(10);

    return view('admin.account.index', compact('admin', 'gurus'));
}

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed',
        ]);

        $admin = Auth::user();

        if (!Hash::check($request->password_lama, $admin->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        $admin->password = Hash::make($request->password_baru);
        $admin->save();

        return back()->with('success', 'Password admin berhasil diperbarui.');
    }

    public function resetPasswordGuru(Request $request, Guru $guru)
    {
        $request->validate([
            'password_baru' => 'required|min:6|confirmed',
        ]);

        if (!$guru->user) {
            return back()->with('error', 'Akun guru tidak ditemukan.');
        }

        $guru->user->password = Hash::make($request->password_baru);
        $guru->user->save();

        return back()->with('success', 'Password guru berhasil direset.');
    }
}