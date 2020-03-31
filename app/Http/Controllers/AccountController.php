<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetAccountPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function resetPasswordForm(Request $request)
    {
        $successMessage = $request->session()->get('successMessage');

        return view('account.reset-password', compact('successMessage'));
    }

    public function resetPassword(ResetAccountPassword $request)
    {
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->flash('successMessage', 'Senha atualizada com sucesso!');

        return redirect('/account/password/reset');
    }
}
