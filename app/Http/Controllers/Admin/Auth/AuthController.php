<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Objects\ObjectSendMail;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\Response;
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
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
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
        $email = $request->input('email');
        $password = $request->input('password');
        $throttles = in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );
        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return redirect('/admin/login')
                ->with('error', trans('front/login.maxattempt'))
                ->withInput($request->only('email'));
        }
        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        if (!$auth->validate($credentials)) {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }

            return redirect('/auth/login')
                ->with('error', trans('front/login.credentials'))
                ->withInput($request->only('email'));
        }

        $user = $auth->getLastAttempted();

        if ($user->id > 0) {
            if ($throttles) {
                $this->clearLoginAttempts($request);
            }

            $auth->login($user, $request->has('memory'));

            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }

            return redirect('/admin');
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
        $reponse = new Response();
        $inputs = $request->all();
        $response = $user_gestion->store(
            $inputs,
            $remember_token = str_random(30)
        );
        if ($response && $response->getResultCode() == 'OK') {
            // send mail
            $objectSendMail = new ObjectSendMail();
            $objectSendMail->setEmail($inputs['email']);
            $objectSendMail->setUsername($inputs['name']);
            $objectSendMail->setTitle('Thư cám ơn đã gửi thư liên hệ');
            $objectSendMail->setContent('Bạn đã đăng ký thành công tài khoản');
            $this->dispatch(new SendMail($objectSendMail));
            return redirect('/auth/login')->with('success', trans('front/verify.message'));
        } else {
            return redirect()->back()->withInput()->with('error', $reponse->getResultMessage());
        }
        return redirect()->to('auth/register')->withErrors('error', 'Có lỗi xảy ra, Xin vui lòng thử lại sau!.');
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

    /**
     * Display screen register
     *
     * @return Response
     */
    public function getRegister()
    {
        return view("admin.register");
    }

    public function getLogout(Guard $auth)
    {
        $auth->logout();
//        Auth::guard($this->getGuard())->logout();
        return view("admin.login");
    }
}
