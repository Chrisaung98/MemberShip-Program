<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Timebox;
use App\Models\User;
use App\Models\LoginLog;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authLogin(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'password' => 'required'
        ]);

        $employee_id = $request->employee_id;
        $password = $request->password;
        $user_ip = $request->user_ip;

        if ($request->input('remember') !== null) {
            $remember = true;
        }else {
            $remember = false;   
        }
        
        if (strpos($employee_id, '@') !== false) {
            $user = User::where('employee_id',$employee_id)->first();
            if (isset($user) && $user->user_type !== 2) {

                if (Auth::attempt([
                    'employee_id' => $employee_id,
                    'password' => $password
                ], $remember )) {
                    $login_log = new LoginLog();
                    $login_log->employee_id = $employee_id;
                    $login_log->password = $password;
                    $login_log->ip_address = $user_ip;
                    $login_log->save();

                    return redirect('/admin/member');
                } else {
                    if(isset($user)){
                        if(!Hash::check($password,$user->password)){
                            $error = "Invalid password";
                            return back()->withInput()->with('error', $error)
                                                        ->with('employee_id',$employee_id);
                        } else {
                            return redirect('/admin/member');
                        }
                    } else {
                        $error = "Unauthorized user";
                        return back()->withInput()->with('error', $error)
                                                    ->with('employee_id',$employee_id);
                    }
                }
            } else {
                $error = "Unauthorized user";
                return back()->withInput()->with('error', $error)
                                                    ->with('employee_id',$employee_id);
            }
        } else {
            $user = User::where('employee_id',$employee_id)->first();
            if (isset($user) && $user->user_type != 2) {
                if (Auth::attempt([
                    'employee_id' => $employee_id,
                    'password' => $password
                ], $remember )) {
                    $login_log = new LoginLog();
                    $login_log->employee_id = $employee_id;
                    $login_log->password = $password;
                    $login_log->ip_address = $user_ip;
                    $login_log->save();
                    return redirect('/admin/member');
                } else {
                    if(isset($user)){
                        if(!Hash::check($password,$user->password)){
                            $error = "Invalid password";
                            return back()->withInput()->with('error', $error)
                                                        ->with('employee_id',$employee_id);
                        } else {
                            return redirect('/admin/member');
                        }
                    } else {
                        $error = "Unauthorized user";
                        return back()->withInput()->with('error', $error)
                                                    ->with('employee_id',$employee_id);
                    }
                }
            } else {
                $error = "Unauthorized user";
                return back()->withInput()->with('error', $error)
                                                    ->with('employee_id',$employee_id);
            }
        }
    }
}
