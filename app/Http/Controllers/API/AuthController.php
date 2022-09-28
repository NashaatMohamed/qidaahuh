<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|integer',

            'password' => 'required|confirmed',
            'password_confirmation' => 'required|max:1000'

        ]);
        /*  $d= AccountType::select('status')->where('id','=','6')->first();
          $validateData['user_type'] =$d->status ;*/
        $validateData['password'] = bcrypt($request->password);

        $user = User::create($validateData);
        $user->assignRole('user');
        Auth::login($user);

        event(new Registered($user));

        $accessToken = $user->createToken('authToken')->accessToken; ///authToken تم تسمية الtoken باي اسم
        // response(['user' => $user, 'access_token' => $accessToken]);
      return   response()->json(['status' => true, 'statusCode' => 200, 'message' => 'Success you are register', 'user' => $user, 'access_token' => $accessToken]);
    }


    /**
     * @throws \Exception
     */


    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);


        if (!auth()->attempt($loginData)) {
            return response(['status' => false, 'statusCode' => 404,'message' => 'invalid credentials']);
        } /*else{
       return response (['user'=>$loginData]);
   }*/
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response()->json(['status' => true, 'statusCode' => 200, 'message' => 'Success you are login','user' => auth()->user(), 'access_token' => $accessToken]);


    }

    public function refreshToken(Request $request)
    {

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $response = Route::dispatch($proxy);

        $response = json_decode($response->getContent());


        return response()->json(['status' => true, 'statusCode' => 200, 'message' => 'Success', 'items' => $response]);
    }


    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json(
            [
                'message' => 'Logged out'
            ]
        );

    }

    public function editUser(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $user->f_name = $request->get('f_name');
        $user->l_name = $request->get('l_name');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $user->save();
        return response()->json(true);
    }

    public function destroy($id)
    {
        $item = User::find($id);

        $item->delete();


        if (!$item) {
            return response()->json(['message' => 'The USER Not Delete']);
        } else {
            return response()->json(['message' => 'The User  Delete Successfuly']);
        }
    }

    public function adminLogin(Request $request)
    {

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $response = Route::dispatch($proxy);

        $response = json_decode($response->getContent());

        $token = $response;

        $proxy = Request::create(
            'api/user',
            'get'
        );

        $proxy->headers->set('Authorization', 'Bearer ' . $token->access_token);
        $response = Route::dispatch($proxy);

        $user = json_decode($response->getContent());


        $data = [
            'token' => $token,
            'user' => $user,
        ];
        return response()->json(['status' => true, 'statusCode' => 200, 'message' => 'Success', 'items' => $data]);

    }

    /**
     * admin register API
     * @return JsonResponse
     */
    public function adminRegister(Request $request)
    {
        $validator = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create($validator);

        $success['token'] = $user->createToken('MyApp', ['*'])->accessToken;
        return response()->json(['success' => $success], 200);
    }

    function details($id)
    {
        $item = User::find($id);
        if (!$item) {
            return response()->json(['status' => 0, 'msg' => 'Invalid User Id']);
        }
        return response()->json(['status' => 1, 'item' => $item]);
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

        return response()->json([

            'status' => 1,

            'msg' => 'Updated Successfully',$user
        ]);
    }
}
