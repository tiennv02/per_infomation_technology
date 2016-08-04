<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\SendMail;
use App\Repositories\UsersRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  App\Http\Requests\LoginRequest $request
     * @param  Guard $auth
     * @return Response
     */
    public function postLogin(
        LoginRequest $request,
        Guard $auth)
    {
        $logValue = $request->input('log');
        var_dump($request);
        $logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        var_dump($request);
        $throttles = in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );
        var_dump($request);
        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return redirect('/admin/login')
                ->with('error', trans('front/login.maxattempt'))
                ->withInput($request->only('log'));
        }
        var_dump($request);
        $credentials = [
            $logAccess => $logValue,
            'password' => $request->input('password')
        ];

        if (!$auth->validate($credentials)) {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }

            return redirect('/admin/login')
                ->with('error', trans('front/login.credentials'))
                ->withInput($request->only('log'));
        }

        $user = $auth->getLastAttempted();

        if ($user->confirmed) {
            if ($throttles) {
                $this->clearLoginAttempts($request);
            }

            $auth->login($user, $request->has('memory'));

            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }

            return redirect('/');
        }

        $request->session()->put('user_id', $user->id);

        return redirect('/admin/login')->with('error', trans('front/verify.again'));
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postRegister(
        RegisterRequest $request,
        UsersRepository $user_gestion)
    {
        $user = $user_gestion->store(
            $request->all(),
            $confirmation_code = str_random(30)
        );

        $this->dispatch(new SendMail($user));

        return redirect('/')->with('ok', trans('front/verify.message'));
    }

    /**
     * Handle a confirmation request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  string $confirmation_code
     * @return Response
     */
    public function getConfirm(
        UserRepository $user_gestion,
        $confirmation_code)
    {
        $user = $user_gestion->confirm($confirmation_code);

        return redirect('/')->with('ok', trans('front/verify.success'));
    }

    /**
     * Handle a resend request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function getResend(
        UsersRepository $user_gestion,
        Request $request)
    {
        if ($request->session()->has('user_id')) {
            $user = $user_gestion->getById($request->session()->get('user_id'));

            $this->dispatch(new SendMail($user));

            return redirect('/')->with('ok', trans('front/verify.resend'));
        }

        return redirect('/');
    }

    /**
     * Login users
     *
     * @return Response
     */
    public function getLogin()
    {
        return view("admin.login");
    }
}
