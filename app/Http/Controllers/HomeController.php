<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function pic($d = null)
    {
        if (empty($d)) {
            $key = rand(10000, 99999);
        } else {
            $key = substr($d, 0, 5);
        }
        $back = rand(0, 9);
        /*
        $r = rand(0,255);
        $g = rand(0,255);
        $b = rand(0,255);
        */
        $r = 0;
        $g = 0;
        $b = 0;

        session(['chaptcha' => $key]);

        //$cht = array(0=>"零",1=>"壹",2=>"貳",3=>"參",4=>"肆",5=>"伍",6=>"陸",7=>"柒",8=>"捌",9=>"玖");
        $cht = array(0 => "0", 1 => "1", 2 => "2", 3 => "3", 4 => "4", 5 => "5", 6 => "6", 7 => "7", 8 => "8", 9 => "9");
        $cht_key = "";
        for ($i = 0; $i < 5; $i++) $cht_key .= $cht[substr($key, $i, 1)];

        header("Content-type: image/gif");
        $im = imagecreatefromgif(asset('images/back/01.gif')) or die("無法建立GD圖片");
        $text_color = imagecolorallocate($im, $r, $g, $b);

        imagettftext($im, 25, 0, 5, 32, $text_color, public_path('font/AdobeGothicStd-Bold.otf'), $cht_key);
        imagegif($im);
        imagedestroy($im);
    }

    public function gauth(Request $request)
    {    
        //是否已有此帳號
        $u = explode('@', $request->input('username'));
        $username = $u[0];


        if ($request->input('chaptcha') != session('chaptcha')) {
            return back()->withInput()->withErrors(['error' => '驗證碼錯誤']);
        }


        $data = array("email" => $username, "password" => $request->input('password'));
            $data_string = json_encode($data);
            $ch = curl_init('https://school.chc.edu.tw/api/auth');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string)
                )
            );
            $result = curl_exec($ch);
            $obj = json_decode($result, true);

            if (empty($obj)) {
                return back()->withInput()->withErrors(['error' => 'Gsuite 認證系統無法認證']);
            }

            if ($obj['success']) {
                //非教職員，即跳開
                if ($obj['kind'] == "學生") {
                    return back()->withInput()->withErrors(['error' => '學生不能登入']);
                }

               

                $user = User::where('username', $username)                    
                    ->first();                
                $user_att['edu_key'] = $obj['edu_key'];
                $user_att['code'] = $obj['code'];
                $user_att['school'] = $obj['school']; 
                $user_att['name'] = $obj['name'];
                $user_att['email'] = $obj['email'];
                $user_att['username'] = $username;
                $user_att['password'] = bcrypt($request->input('password'));
                $user_att['kind'] = $obj['kind'];
                $user_att['title'] = $obj['title'];

                if (empty($user)) {
                    //無使用者，即建立使用者資料
                    $user = User::create($user_att);
                } else {
                    $user->update($user_att);
                }                                                
            } else {
                return back()->withInput()->withErrors(['error' => 'Gsuite認證錯誤']);
            };      

        //登入
        if (Auth::attempt([
            'username' => $username,
            'password' => $request->input('password')
        ])) {
            if (empty($request->session()->get('url.intended'))) {
                if(empty(auth()->user()->admin)){
                    return redirect()->route('upload');    
                }
                return redirect()->route('index');
            } else {
                return redirect($request->session()->get('url.intended'));
            }   
        } else {
            return back()->withInput()->withErrors(['error' => '錯誤！無法登入！']);
        }        

    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('index');
    }

    public function assign()
    {
        return view('assign');
    }

    public function do_assign(Request $request)
    {
        dd($request->all());
    }

    public function upload(){
        return view('upload');
    }

    public function impersonate(User $user)
    {
        Auth::user()->impersonate($user);
        $user_power = get_user_power($user->id);
        session(['user_power' => $user_power]);
        return redirect()->route('index');
    }

    public function impersonate_leave($action = null)
    {
        Auth::user()->leaveImpersonation();
        $user_power = get_user_power(Auth::user()->id);
        session(['user_power' => $user_power]);
        return redirect()->route('index');
    }
}
