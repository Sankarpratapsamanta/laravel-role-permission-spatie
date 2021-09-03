<?php

namespace App\Http\Controllers\StoreAuth;

use App\Store;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/store/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('store.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:stores',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Store
     */
    protected function create(array $data)
    {
        
        $store = new Store;

        $store->name=$data['name'];
        $store->email=$data['email'];
        $store->password=bcrypt($data['password']);
       
        if($store->save()){
            $id = $store->id;
            $role = Role::create([
                'store_id'=>$id,
                'name' => 'admin',
                'guard_name' => 'store',
            ]);
            // $role->store_id=$id;
            // $role->name = 'admin';
            // $role->guard_name = 'web';
        }
        // dd($role->id);
        if($role->save()){
            $role_id = $role->id;
            $store->assignRole($role_id);
            $store->save();
        }
        
        return $store;

    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('store.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('store');
    }
}
