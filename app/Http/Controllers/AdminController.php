<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Rule;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        $user = Admin::where('name', $request->name)->first();
//        dd($user->password);
        if (Auth::guard('admin')->attempt($credentials)) {
            if ($user->status == 0)
            {
                return view('admin.users.login');
            }
            else{
                if($user->has_role('user'))
                {
                    return redirect()->route('user.all_foods');
                }
                else{
                    return redirect()->route('admin.index');
                }
            }
        }else{
            return view('admin.users.login');
        }

    }


    public function index()
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::paginate(10);
        return view('admin.users.index', compact('user_list', 'user'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.users.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'new_password' => 'required|confirmed',
            'phone' => 'required'

        ]);

        $validated_data['password'] = Hash::make($request->new_password);
        $user = new Admin();
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->password = $validated_data['password'];
        $user->phone = $validated_data['phone'];
        $user->save();
        return redirect()->route('admin.index')->with('success', 'Tạo tài khoản thành công!');
    }

    public function show($id)
    {
        $user = Auth::guard('admin')->user();
        $userList = Admin::all();
        $user_show = Admin::find($id);
        return view('admin.users.show', compact('user', 'user_show', 'userList'));
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::all();
        $user_edit = Admin::find($id);
        return view('admin.users.edit', compact('user', 'user_edit', 'user_list'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        {
            $validated_data = $request->validate([
                'name' => 'required',
//                'email' => 'required|email|exists:admins,email,'.$id,
                'email' => 'required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($id),
                'phone' => 'nullable'
            ]);

            $user = Admin::find($id);
            $user->name = $validated_data['name'];
            $user->email = $validated_data['email'];
            $user->phone = $validated_data['phone'];
            $user->save();

            return redirect()->route('admin.index')->with('success', 'Sửa thông tin tài khoản thành công!');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_auth');
    }

    public function edit_password($id)
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::all();
        $user_edit = Admin::find($id);
        return view('admin.users.password', compact('user', 'user_edit', 'user_list'));
    }

    public function change_password(Request $request) {
        $user = Auth::guard('admin')->user();
        $user_password_old = $user->password; //mật khẩu cũ

        $request->validate([
            'password' => 'required',
            'set_new_password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required',

        ]);
        if(!Hash::check($request->password,$user_password_old)){
            return back()->withErrors(['current_password'=>'Nhập sai mật khẩu hiện tại, vui lòng nhập lại!']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('admin.index', ['user' => $user])->with('success', 'Thay đổi mật khẩu thành công!');
    }
    public function block($id)
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::all();
        $user_lock = Admin::find($id);

        if ($user_lock->status == 0)
        {
            $user_lock->status = 1;
            $user_lock->save();
            return redirect()->route('admin.index', ['user' => $user])->with('success', 'Gỡ block thành công!');
        }else
            {
                $user_lock->status = 0;
                $user_lock->save();
                return redirect()->route('admin.index', ['user' => $user])->with('success', 'Block thành công!');
            }

    }

    function check_mail(Request $request){
         echo $request->get('email');
        if($request->get('email')){
            $email_check = $request->get('email');
            $data = Admin::where('email', $email_check)->count();
            if($data > 0){
                echo 'exist';
            }

        }
    }

}
