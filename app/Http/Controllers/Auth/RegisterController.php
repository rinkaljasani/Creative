<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //echo $data['fname']; 
        return Validator::make($data, [
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile_number' => ['required','min:11','numeric',],
            'address' => ['required', 'string', 'max:255'],
            'image' => ['required','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    { 
        $user = new User();
        echo "<br/>".$user->fname=$data['fname'];
        echo "<br/>".$user->lname=$data['lname'];
        echo "<br/>".$user->email=$data['email'];
        echo "<br/>".$user->password=Hash::make($data['password']);
        echo "<br/>".$user->mobile_number=$data['mobile_number'];
        echo "<br/>".$user->address=$data['address'];
        $user->image=$data['image'];
        $new_image=rand().'.'.$user->image->getClientOriginalExtension();
        echo $user->image->move(public_path("image"),$new_image);
        $user->image=$new_image;
        $user->save();
      // echo   $user= User::create([
      //       'fname' => $data['fname'],
      //       'lname' => $data['lname'],
      //       'email' => $data['email'],
      //       'password' => Hash::make($data['password']),
      //       'mobile_number' => $data['mobile_number'],
      //       'address' => $data['address'],
      //       'image' => $data['image']
      //   ]);
      //   $new_image=rand().'.'.$image->getClientOriginalExtension();
        //$image->move(public_path("image"),$new_image);

         // if(request()->hasFile([key : 'image'])){
         //     $image=request()->file[key: 'image'])->getClientOriginalName();
         //     request()->file[key:'image'])->storeAs(path:'image',name: $user->id.'/'.$image,  option:'');
         //     $user->upload(['image'=>$image]);
         // }
        return $user;
    }
}
