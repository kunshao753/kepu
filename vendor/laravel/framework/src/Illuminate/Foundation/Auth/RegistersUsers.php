<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->rewriteRegister($request);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function rewriteRegister($request)
    {
        $params = $request->all();
        $userByMobile = \App\User::where(['mobile'=>$params['mobile']])->first();
        $userByEmail = \App\User::where(['email'=>$params['email']])->first();
        if(!empty($userByMobile)){
            echo "<script>alert('手机号已存在, 请重新输入'); window.location.href = '/register'; </script>";
            die;
        }
        if(!empty($userByEmail)){
            echo "<script>alert('邮箱已存在, 请重新输入'); window.location.href = '/register'; </script>";
            die;
        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
