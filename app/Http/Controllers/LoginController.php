<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class LoginController extends Controller
{
    public function index() {
        return view('login1',[
            'title' => "Login"
        ]);
    }

    protected function getprofile($email){
        $cekdata_user = User::firstWhere('email',$email);
        if ($cekdata_user->user_role === 'customer') {
            $cekdata_profil = Customer::firstWhere('id_user',$cekdata_user->id);
            if ($cekdata_profil===null) {
                $X=['-Oke',$cekdata_user->id,'customer'];
                return $X ;
            } else {
                $X=['Oke',$cekdata_user->id,'customer'];
                return $X ;
            }
        }elseif ($cekdata_user->user_role === 'pengajar') {
            $cekdata_profil = Pengajar::firstWhere('id_user',$cekdata_user->id);
            if ($cekdata_profil===null) {
                $X=['-Oke',$cekdata_user->id,'pengajar'];
                return $X ;
            } else {
                $X=['Oke',$cekdata_user->id,'pengajar'];
                return $X ;
            }
        }
        
    }

    public function authenticate(Request $req) {
        $credentitals = $req->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        if(Auth::attempt($credentitals)) {
            $req->session()->regenerate();
            $X=$this->getprofile($credentitals['email']);
            if ($X[0] ==='-Oke') {
                if ($X[2] === 'customer') {
                    return view('profil',[
                        'id'=> $X[1]
                    ]);
                } elseif ($X[2] === 'pengajar') {
                    return view('create_data',[
                        'id'=> $X[1]
                    ]);
                }
                
                // return redirect()->intended("/setup-profile/$X");
            }
            return redirect()->intended('/');
        }

        return back()->withErrors('Login Failed!');

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
