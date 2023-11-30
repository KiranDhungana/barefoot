<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Event;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use PhpParser\Node\Expr\AssignOp\Concat;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1) {

            return redirect()->route('admin-home');
        } else {
            return view('home');
        }

    }
    public function adminhome()
    {
        $d = User::all();
        return view('admin')->with(array('data' => $d, 'len' => User::count()));
    }
    public function register_user()
    {
        return view('register');
    }
    public function register(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'age' => 'required|integer|min:5',
            'rank' => 'required|integer|min:0',
            'address' => 'required',
            'description' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
        ]);



        $user = new User;
        $name = $req['name'];
        $fileName = time() . '.' . $req->image->extension();
        $req->image->storeAs('public/images', $fileName);
        $email = $req['email'];
        $age = $req['age'];
        $phone = $req['phone'];
        $description = $req['description'];
        $rank = $req['rank'];
        $address = $req['address'];
        $password = Hash::make($req['password']);
        $user->name = $name;
        $user->email = $email;
        $user->image = $fileName;
        $user->phone = $phone;
        $user->age = $age;
        $user->rank = $rank;
        $user->description = $description;

        $user->password = $password;
        $user->address = $address;
        // document upload
        $fileNames = [];
        if ($req->file('file'))
            foreach ($req->file('file') as $img) {
                $imgname = $img->getClientOriginalName();
                $img->storeAs('public/images', $imgname);
                $fileNames[] = $imgname;
            }
        $uplo_file = json_encode($fileNames);
        $user->path = $uplo_file;
        // user::create(['path' => $uplo_file]);
        $user->save();
        return redirect('/admin/home')->with('msg', 'Player Added Successfully');

    }
    public function delete($name)
    {

        user::find($name)->delete();

        return redirect('/admin/home')->with('deletedmsg', 'User Deleted Successfully');

    }
    public function update($id)
    {


        $user_info = user::find($id);
        // dd($user_info);

        return view("userupdate")->with('updateinfo', $user_info);

    }
    public function update_info(Request $req, $id)
    {
        $user = User::find($id);
        $validated = $req->validate([
            'name' => 'required',
            // 'email' => 'required|email',
            // 'password' => 'required',
            // 'file[]' => 'required',
            'age' => 'required|integer|min:5',
            'rank' => 'required|integer|min:0',
            'address' => 'required',
            'description' => 'required',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);


        $name = $req['name'];
        // $email = $req['email'];
        $address = $req['address'];
        $number = $req['number'];
        $description = $req['description'];
        $rank = $req['rank'];
        $age = $req['age'];
        // if ($req['password'] == $user->password) {
        //     $user->password = $req['password'];
        // } else {
        //     $user->password = Hash::make($req['password']);
        // }

        $user->name = $name;
        // $user->email = $email;
        $user->address = $address;
        $user->age = $age;
        $user->description = $description;
        $user->rank = $rank;
        $user->phone = $number;
        // docupload upload

        $find = user::find($id);
        $all = $find['path'];
        $all = json_decode($all);
        if ($all == NULL) {
            $n = [];
        } else {
            $n = arr::flatten($all);
        }

        // dd($n);
        // $all = explode(",", $all);
        // dd($all);
        // dd(strlen($all));
        //  $all = explode(" ", $all);

        ///documents upload
        $fileNames = [];
        if ($req->file('file'))
            foreach ($req->file('file') as $img) {
                $imgname = $img->getClientOriginalName();
                $img->storeAs('public/images', $imgname);
                $fileNames[] = $imgname;
            }
        $fileNames = array_merge($fileNames, $n);
        $uplo_file = json_encode($fileNames);
        $user->path = $uplo_file;

        $user->save();
        return redirect('/admin/home')->with('updatedmsg', 'User data updated succesfully');

    }
    public function add_noticepage()
    {

        return view('addnotice');

    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required',
            'file' => 'required',

        ]);
        $title = $req['title'];
        $desc = $req['des'];
        $fileName = [];
        foreach ($req->file('file') as $img) {
            $imgname = $img->getClientOriginalName();
            $img->storeAs('public/files', $imgname);
            $fileNames[] = $imgname;
        }

        $uplo_file = json_encode($fileNames);
        file::create(['path' => $uplo_file, 'title' => $title, 'description' => $desc,]);
        return redirect('/admin/home')->with('notice_message', 'Notice added succesfully');

    }

    public function manageaccounts()
    {
        // $data = file::all();
        return view('accounts');
    }
    public function del_notice()
    {
        $data = file::all();
        return view('deletenotice')->with('notice', $data);
    }
    public function delete_notice($id)
    {
        $data = file::find($id);
        // dd($data);
        $data->delete();

        return redirect('delete-notice')->with('delete_message', 'Notice deleted succesfully');
    }

    public function addaccounts(Request $req)
    {
        $loginid = random_int(100000, 999999);
        $alph = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code = '';

        for ($i = 0; $i < 5; $i++) {
            $code .= $alph[rand(0, 61)];
        }
        $password = Hash::make($code);



        $account = new Account;
        $center = $req->input('dropdown');
        $name = $req['name'];
        $rank = $req['rank'];
        $fee = $req['fee'];
        $discount = $req['discount'];
        $finalfee = $fee - (($discount / 100) * $fee);

        $account->name = $name;
        $account->loginid = $loginid;
        $account->password = $password;

        $account->center = $center;
        $account->rank = $rank;
        $account->fee = $finalfee;
        $account->discount = $discount;

        $fromemail = "Barefootwebsite@gmail.com";
        $fromname = $req['name'];
        $subj = "User Account details";
        // $message = $req['message'];
        $toname = 'Barefoot';
        $to_name = 'barefoot';
        $to_email = 'barefootmartialarts@gmail.com';
        // $data = array('name' => "Cloudways (sender_name)", "body" => 'A test mail');
        $data = [
            'UserName' => $name,
            'Userloginid' => $loginid,
            'Password' => $code,
            'subj' => "User Account details",

        ];



        // $user['to'] = 'barefootmartialarts@gmail.com';
        // $user['sub'] = $subj;
        // $user['from'] = $email;
        \Illuminate\Support\Facades\Mail::send('accountmail', $data, function ($message) use ($to_email, $toname, $fromemail, $fromname, $subj) {

            $message->from($fromemail, $fromname);
            $message->to($to_email, $toname);
            $message->subject($subj);
        });
        $account->save();
        return redirect('/admin/home')->with('accountmessage', 'Account  added succesfully');





    }



    public function editaccounts()
    {
        $data = account::all();
        return view('editaccount')->with('accountdata', $data);
        // $data = file::all();
        // return view('editaccount');
    }
    public function accountdelete($id)
    {

        Account::find($id)->delete();

        return redirect('/admin/home')->with('accountdeletedmsg', 'Student Deleted Successfully');

    }
    public function accountview($id)
    {

        $accdata = Account::find($id);

        return view('viewaccount')->with('accountdata', $accdata);

    }
    public function accountupdate($id)
    {

        $accdata = Account::find($id);

        return view('editaccountform')->with('accountdata', $accdata);

    }
    public function accountupdateform(Request $req, $id)
    {
        $accdata = Account::find($id);
        $name = $req['name'];
        $rank = $req['rank'];
        $paidamount = $req['paidamount'];
        $date = $req['paiddate'];

        $accdata->name = $name;
        $accdata->rank = $rank;
        $accdata->paid = $paidamount;

        $accdata->fee = $accdata->fee - $paidamount;
        $accdata->totalpaidamount = $accdata->totalpaidamount + $paidamount;

        $accdata->paiddate = $date;
        $accdata->save();
        return redirect('/admin/home')->with('accountupdatedmsg', 'Students data updated succesfully');



    }
    public function viewcenter()
    {

        $account = Account::all();
        $parasicollected = 0;
        $dainahawacollected = 0;
        foreach ($account as $item) {

            if ($item['center'] == "Parasi") {
                $parasicollected = $item['paid'] + $parasicollected;

            } else if ($item['center'] == "Dainahawa") {
                $dainahawacollected = $item['fee'] + $dainahawacollected;
            } else if ($item['center'] == "Swathi") {
                echo "Swati";
            } else if ($item['center'] == "4") {
                echo "4";
            }

        }
        echo $parasicollected;


    }
    public function add_event()
    {
        return view('addevents');
    }

    public function add_event_todb(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required',
            'file' => 'required',

        ]);
        $title = $req['title'];
        $desc = $req['des'];
        $fileName = [];
        foreach ($req->file('file') as $img) {
            //get name of file
            $fileName = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
            //get extension of file
            $extension = pathinfo($img->getClientOriginalName(), PATHINFO_EXTENSION);
            //make new name
            $fullFileName = $fileName . "-" . time() . "." . $img->getClientOriginalExtension();
            // $imgname = $img->getClientOriginalName();
            $img->storeAs('public/files', $fullFileName);
            $fileNames[] = $fullFileName;
        }

        $uplo_file = json_encode($fileNames);
        event::create(['path' => $uplo_file, 'title' => $title, 'description' => $desc,]);
        dd("Added file");
        return redirect('/admin/home')->with('event_message', 'Events added succesfully');
    }
    public function view_center()
    {
        $data = account::all();
        $pi = 0;
        $si = 0;
        $di = 0;
        $i = 0;
        $pa = 0;
        $sa = 0;
        $da = 0;
        $a = 0;
        foreach ($data as $key) {
            if ($key['center'] == "Swathi") {
                $si = $si + 1;
                $sa = $key['totalpaidamount'] + $sa;
            } else if ($key['center'] == "Parasi") {
                $pi = $pi + 1;
                $pa = $key['totalpaidamount'] + $pa;

            } else if ($key['center'] == "Dainahawa") {
                $di = $di + 1;
                $da = $key['totalpaidamount'] + $da;
            } else {
                $i = $i + 1;
                $a = $key['totalpaidamount'] + $a;
            }
        }
        dd($sa);
        return view('center')->with('centerinfo', $data);
    }

}