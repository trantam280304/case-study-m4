<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        // index 
        $this->authorize('viewAny', User::class);
        $users = User::orderBy('id', 'DESC')->get();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index', $param);
    }

    public function showAdmin()
    {
        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('user.admin', $param);
    }
    // thêm 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('admin.user.add', $param);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;

        // Xử lý ảnh
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        $notification = [
            'addgroup' => 'Thêm Tên Quyền Thành Công!',
        ];
        return redirect()->route('user.index')->with($notification);
    }
    //  sửa
    public function edit($id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $groups = Group::get();
        $param = [
            'user' => $user,
            'groups' => $groups
        ];
        return view('admin.user.edit', $param);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        // Xử lý ảnh
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();
        $notification = [
            'updategroup' => 'Chỉnh Sửa Thành Công!',
        ];
        return redirect()->route('user.index')->with($notification);
    }

    //  xem 
    public function show($id)
    {
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param = [
            'user' => $user,
        ];


        // $productshow-> show();
        return view('admin.user.profile', $param);
    }

    // hiển thị form đổi mật khẩu
    public function editpass($id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $param = [
            'user' => $user,
        ];
        return view('admin.user.editpass', $param);
    }

    // hiển thị form đổi mật khẩu
    public function adminpass($id)
    {
        //  $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        $param = [
            'user' => $user,
        ];
        return view('admin.user.adminpass', $param);
    }

    // chỉ có superAdmin mới có quyền đổi mật khẩu người kh
    public function adminUpdatePass(Request $request, $id)
    {
        // $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        if ($request->renewpassword == $request->newpassword) {
            $item = User::find($id);
            $item->password = bcrypt($request->newpassword);
            $item->save();
            $notification = [
                'message' => 'Đổi mật khẩu thành công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);
        } else {
            $notification = [
                'sainhap' => 'Bạn nhập mật khẩu không trùng khớp!',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    public function updatepass(Request $request)
    {
        if ($request->renewpassword == $request->newpassword) {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item = User::find(Auth()->user()->id);
                $item->password = bcrypt($request->newpassword);
                $item->save();
                $notification = [
                    'message' => 'Đổi mật khẩu thành công!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('user.index')->with($notification);
            } else {
                $notification = [
                    'saipass' => '!',

                ];
                return back()->with($notification);
            }
        } else {
            $notification = [
                'sainhap' => '!',
            ];
            return back()->with($notification);
        }
    }



    //  xóa
    public function destroy($id)
    {
        $this->authorize('forceDelete', User::class);
        $notification = [
            'sainhap' => '!',
        ];

        $user = User::find($id);
        if ($user->groups->name != 'Chủ tịch') {
            $user->delete();
        } else {

            return dd(__METHOD__);
        }
    }
}
