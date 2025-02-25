<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Upload;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Storage;

class HomeController extends Controller
{
    public function index(){
        $years = Year::orderBy('year')->get();
        $data = [
            'years'=>$years,
        ];
        return view('index',$data);
    }

    public function show($year){
        $year = Year::where('year',$year)->first();
        $sites = Site::where('year_id',$year->id)->get();
        $eng_schools = config('app.eng_schools');
        $data = [
            'sites'=>$sites,
            'year'=>$year,
            'eng_schools'=>$eng_schools,
        ];
        return view('show',$data);
    }

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

               

                $user = User::where('edu_key', $obj['edu_key'])                    
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

    public function year()
    {
        $years = Year::orderBy('year')->get();
        $data = [
            'years'=>$years,
        ];
        return view('year',$data);
    }

    public function do_year(Request $request)
    {
        $check = Year::where('year',$request->input('year'))->first();
        if($check){
            return back()->withErrors(['error' => '錯誤！此年度名稱已用！']);
        }
        $att['year'] = $request->input('year');
        $att['user_id'] = auth()->user()->id;
        Year::create($att);
        if(!is_dir(storage_path('app/public/'.$att['year']))){
            Storage::makeDirectory('public/'.$att['year']);
        }
        $year_doc = env('YEAR_DOC');
        $results = shell_exec('ln -s '.$year_doc.'storage/app/public/'.$att['year'].' '. $year_doc.'public');
        
 
        return redirect()->route('year');

    }

    public function assign(Year $year)
    {
        $uploads = Upload::where('year_id',$year->id)->get();
        $eng_schools = config('app.eng_schools');
        $data = [
            'year'=>$year,
            'uploads'=>$uploads,
            'eng_schools'=>$eng_schools,
        ];
        return view('assign',$data);
    }

    public function do_assign(Request $request)
    {
        $att['year_id'] = $request->input('year_id');
        $att['user_id'] = auth()->user()->id;
        $schools = config('app.schools');
        $check_uploads = Upload::where('year_id',$att['year_id'])->get();
        foreach($check_uploads as $check_upload){
            $check[$check_upload->code] = 1;
        }
        foreach($request->input('schools') as $v){
            if($v=="all_school"){
                Upload::where('year_id',$request->input('year_id'))->delete();
                foreach($schools as $k1=>$v1){
                    $att['code'] = $k1;
                    $att['school'] = $v1;
                    Upload::create($att);    
                }
                break;
            }
            if(!isset($check[$v])){
                $att['code'] = $v;
                $att['school'] = $schools[$v];
                Upload::create($att);
            }
            
        }

        return redirect()->route('assign',$att['year_id']);

    }

    public function delete_school(Upload $upload)
    {
        $eng_schools = config('app.eng_schools');
        $old = env('YEAR_DOC').'storage/app/public/' . $upload->year->year .'/'.$eng_schools[$upload->code];
            if(is_dir($old)){
                delete_dir($old);
        }

        Site::where('year_id',$upload->year_id)
        ->where('code',$upload->code)
        ->delete();

        $upload->delete();
        return redirect()->route('assign',$upload->year_id);
    }

    public function delete_site(Site $site)
    {
        $eng_schools = config('app.eng_schools');
        $old = env('YEAR_DOC').'storage/app/public/' . $site->year->year .'/'.$eng_schools[$site->code].'/'.$site->site_name;
            if(is_dir($old)){
                delete_dir($old);
        }

        $site->delete();
        return redirect()->route('assign',$site->year_id);
    }

    public function upload()
    {   
        $uploads = Upload::where('code',auth()->user()->code)
        ->orderBy('year_id')->get();
        $sites = Site::where('user_id',auth()->user()->id)->get();
        $site_data = [];
        foreach($sites as $site){
            $site_data[$site->year_id]['site'] = $site->site_name;
        }
        $eng_schools = config('app.eng_schools');
        $data = [
            'uploads'=>$uploads,
            'site_data'=>$site_data,
            'eng_schools'=>$eng_schools,
        ];
        return view('upload',$data);
    }

    public function upload_file(Request $request){
        $request->validate([
            'my_file' => 'required|file|max:512000',
          ]);
        //執行上傳檔案
        $year = Year::find($request->input('year_id'));
        $eng_schools = config('app.eng_schools');
        $folder = 'public/' . $year->year .'/'.$eng_schools[auth()->user()->code].'/'.$request->input('my_site');
        $real_path =env('YEAR_DOC').'storage/app/'.$folder.'/';
        $my_file = $request->file('my_file');
        if ($request->hasFile('my_file')) {
        //刪除舊的
            $old_site = Site::where('user_id',auth()->user()->id)
                ->where('year_id',$request->input('year_id'))->first();
                if(!empty($old_site)){
                    $old = env('YEAR_DOC').'storage/app/public/' . $year->year .'/'.$eng_schools[auth()->user()->code].'/'.$old_site->site_name;
                    if(is_dir($old)){
                        delete_dir($old);
                    }
                }
                
            $info = [
                'original_filename' => $my_file->getClientOriginalName(),
                'extension' => $my_file->getClientOriginalExtension(),
            ];
            $my_file->storeAs($folder,$info['original_filename']);
            $str = 'unzip '.$real_path.$info['original_filename'].' -d '.$real_path;
            $results = shell_exec($str);

            $att['site_name'] = $request->input('my_site');
            if(!empty($old_site)){
                $old_site->update($att);
            }else{
                $att['year_id'] = $year->id;
                $att['code'] = auth()->user()->code;
                $att['school'] = auth()->user()->school;
                $att['user_id'] = auth()->user()->id;
                Site::create($att);
            }
            

            if(file_exists($real_path.$info['original_filename'])){
                unlink($real_path.$info['original_filename']);
            }
            
        }

        return redirect()->route('upload');
    }

    public function delete_my_site(Year $year)
    {
        $eng_schools = config('app.eng_schools');
        $site = Site::where('year_id',$year->id)
            ->where('user_id',auth()->user()->id)
            ->first();
        $old = env('YEAR_DOC').'storage/app/public/' . $year->year .'/'.$eng_schools[auth()->user()->code].'/'.$site->site_name;
            if(is_dir($old)){
                delete_dir($old);
        }

        $site->delete();
        return redirect()->route('upload',$site->year_id);
    }

    public function users(){
        $users = User::orderBy('admin','DESC')->orderBy('code')->paginate(20);;
        $data = [
            'users'=>$users,
        ];
        return view('users',$data);
    }

    public function ch_admin(User $user){
        if($user->admin==1){
            $att['admin'] = null;
        }else{
            $att['admin'] = 1;
        }
        $user->update($att);

        return redirect()->route('users');
    }
    

    public function impersonate(User $user)
    {
        Auth::user()->impersonate($user);
        return redirect()->route('index');
    }

    public function impersonate_leave($action = null)
    {
        Auth::user()->leaveImpersonation();
        return redirect()->route('index');
    }
}
