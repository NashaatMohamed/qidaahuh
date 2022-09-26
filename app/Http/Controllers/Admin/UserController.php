<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //encrypt + decrypt
        //encrypt('1');
        //decrypt('nkjnbkj nbzcjm rsad;')
        $q = $request->q;
        $adminRole = Role::findByName('user');
        $items = $adminRole->users()->whereRaw('(email like ? or f_name like ? or l_name like ?) ', ["%$q%", "%$q%", "%$q%"])
            ->paginate(10)
            ->appends(['q' => $q]);

        return view("admin.user.index")->with('items', $items);
    }

    public function create()
    {
        return view("admin.user.create");
    }

    public function store(CreateRequest $request)
    {
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);

        $user = User::create($requestData);
        $user->assignRole('user');
        Session::flash("msg", "s: تمت عملية الاضافة بنجاح");
        return redirect(route("user.create"));
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $item = User::find($id);
        if (!$item) {
            session()->flash("msg", "e:عنوان المستخدم غير صحيح");
            return redirect(route("user.index"));
        }
        return view("admin.user.edit", compact('item'));
    }

    public function update(EditRequest $request, $id)
    {
        $user = User::find($id);
        $requestData = $request->all();
        if ($request->password) {
            $requestData['password'] = bcrypt($requestData['password']);
        } else {
            unset($requestData['password']);
        }
        $user->update($requestData);

        session()->flash("msg", "s:تم تعديل بيانات المستخدم بنجاح");
        return redirect(route("user.index"));
    }


    public function destroy($id)
    {
        $itemDB = User::find($id);
        $itemDB->delete();
        session()->flash("msg", "w:تم حذف المستخدم بنجاح");
        return redirect(route("user.index"));
    }


    function updateProfile(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'phone' => 'numeric',
            'image' => 'image',
        ]);

        $user = auth()->user();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->phone = $request->phone;

        if ($request->image) {
            $fileName = $request->image->store("public/assets/img");
            $imageName = $request->image->hashName();
            $user->image = $imageName;
        }

        $user->save();
        return view("order.edit", compact('user'));

    }

}



