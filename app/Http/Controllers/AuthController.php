<?php namespace DarkShare\Http\Controllers;

use DarkShare\Users\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {

	use AuthenticatesAndRegistersUsers;

	public $redirectPath = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
	public function __construct(Guard $auth)
	{
        $this->auth = $auth;

		$this->middleware('guest', ['except' => 'getLogout']);
    }

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'username' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('username', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
			->withInput($request->only('username', 'remember'))
			->withErrors([
				'username' => 'These credentials do not match our records.',
			]);
	}

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        flash('Please come back soon...');

        return redirect()->route('auth.login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return \Validator::make($data, [
          'username' => 'required|max:255|unique:users',
          'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        $user = User::create([
          'username' => $data['username'],
          'password' => $data['password'],
        ]);

        flash()->success("Welcome " . $user->username . "!");
        return $user;
    }

}
