<?php

namespace App\Http\Controllers\Panel;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PanelController extends Controller
{
    public function index()
    {
        return view('panel.index');
    }

    public function profileEdit()
    {
        $user = auth()->user();

        return view('panel.profile.edit', compact('user'));
    }

    public function profileUpdate(User $user, Request $request)
    {
        $request->validate(['name' => 'required']);
        $user->update($request->all());

        return redirect()->route('panel.index')->with('success', 'Adyňyz üýtgedildi');
    }

    public function passwordEdit()
    {
        $user = auth()->user();

        return view('panel.profile.password', compact('user'));
    }

    public function passwordUpdate(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if (!Hash::check($request->get('old_password'), $user->password)) {
            return redirect()->back()->with("error", "Şu wagtky parolyňyz ýaňlyş.");
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            return redirect()->back()->with("error", "Şu wagtky parol we täze parolyňyz meňzeş. Başka parol synanyşyp görüň");
        }

        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->route('panel.index')->with('success', 'Parol üýtgedildi');
    }
}
