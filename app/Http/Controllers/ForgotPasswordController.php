<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\PasswordResset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot_password');
    }

    public function sendEmail(Request $request)
    {
        try {
            $checkEmail = User::where('email', $request->email)->first();
            if (empty($checkEmail)) {
                return redirect()->back()->with('error', 'Email Tidak Terdaftar');
            } elseif ($checkEmail->enabled != 1) {
                return redirect()->back()->with('error', 'Akun anda tidak aktif, pengajuan di reject / akun di blokir');
            } else {
                //> insert token to db
                $token = Str::random(60);
                $data = [
                    'token' => $token,
                    'name' => $checkEmail->name,
                    'email' => $checkEmail->email
                ];

                $reset = PasswordResset::create($data);

                if (isset($reset) && !empty($reset)) {
                    Mail::to($request->email)->send(new ForgotPassword($reset));
                    return back()->with('success', 'Link Reset Email sudah dikirim');
                }
            }
        } catch (\Exception $exc) {
            return $exc->getMessage();
        }
    }
    public function editPassword($token)
    {
        $user = PasswordResset::where('token', $token)->firstOrFail();
        return view('auth.reset_password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|min:3',
                'confirm_password' => 'required|same:password',
            ]);
            $checkToken = PasswordResset::where('token', $request->token)->first();

            if (empty($checkToken)) {
                return redirect()->back()->with('error', 'Invalid token!');
            }

            $update = User::where('email', $checkToken->email)->update(['password' => bcrypt($request->password)]);
            if (isset($update)) {
                PasswordResset::where('email', $checkToken->email)->delete();
            }

            return redirect()->route('login')->with('success', 'Password anda berhasil diubah!');
        } catch (\Exception $exc) {
            return abort(404);
        }
    }
}
