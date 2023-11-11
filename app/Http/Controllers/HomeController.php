<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use PhpParser\Node\Expr\AssignOp\Concat;

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
        $account = new Account;
        $center = $req->input('dropdown');
        $name = $req['name'];
        $rank = $req['rank'];
        $fee = $req['fee'];
        $discount = $req['discount'];
        $finalfee = $fee - (($discount / 100) * $fee);

        $account->name = $name;
        $account->center = $center;
        $account->rank = $rank;
        $account->fee = $finalfee;
        $account->discount = $discount;
        $account->save();
        return redirect('/admin/home')->with('accountmessage', 'Student added succesfully');





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

}