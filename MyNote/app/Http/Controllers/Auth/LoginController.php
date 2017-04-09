<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    // protected function guard()
    // {
    //     return Auth::guard('api');
    // }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        $authUser = $this->findOrCreateUser($user);
        $check = User::where('email', $user->email)->first();
        if ($check->password === null) {

          return view('addPass',['user'=>$user]);
        }
      else {
        Auth::login($authUser, true);
        return redirect('/home');
      }
        // $user->token;
    }

    public function vAddPass(){
      return view('addPass');
    }

    public function addPass(Request $request){
      $this->validate($request,[
        'password'  => 'required',
        // 'price' => 'required|numeric'
      ]);

      $insert = User::where('email', $request->email)->first();
      $insert->password  = bcrypt($request->password);
      $insert->save();
      Auth::login($insert, true);
      return redirect('/home');
    }

    private function findOrCreateUser($googleid)
    {
        if ($authUser = User::where('email', $googleid->email)->first()) {
            return $authUser;
        }
        return User::create([
            'name' => $googleid->name,
            'email' => $googleid->email,
            // 'avatar' => $googleid->avatar
            // 'google_id' => $googleid->id,
            // 'avatar' => $googleid->avatar
        ]);
    }
}
