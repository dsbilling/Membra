<?php namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\Member\ForgotPasswordRequest;
use App\Http\Requests\Member\RecoverRequest;

use App\User;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->beforeFilter('csrf', ['on' => ['post']]);
		$this->middleware('guest');
	}

	public function getForgotPassword() {
		return view('account.forgotpassword');
	}

	public function postForgotPassword(ForgotPasswordRequest $request) {

		$user = User::where('email', '=', $request->get('email'))->first();

		if($user == null) {
			return Redirect::route('home')
						->with('messagetype', 'warning')
						->with('message', 'We couldn\'t find your account. Please try again.');
		} else {

			/*$user 					= User::find($user->username);*/
			$token					= str_random(60);
			$user->passwordtoken 	= $token;

			if($user->save()) {

				Mail::send('emails.password', 
					array(
						'token' => $token,
					), function($message) use ($user) {
						$message->to($user->email, $user->username)->subject('Reset Password');
				});

				return Redirect::route('home')
						->with('messagetype', 'success')
						->with('message', 'We have sent you an email to reset your password.');
			}
		}

	}

	public function getRecoverAccount($passwordtoken) {
		return view('account.recover')->with('passwordtoken', $passwordtoken);
	}

	public function postRecoverAccount($passwordtoken, RecoverRequest $request) {
		$user = User::where('passwordtoken', '=', $passwordtoken);

		if($user == null) {
			return Redirect::route('home')
				->with('messagetype', 'warning')
				->with('message', 'We couldn\'t find your account. Please try again.');
		} else {

			$user->password 		= $request->get('password');
			$user->passwordtoken 	= '';

			if($user->save()) {
				return Redirect::route('home')
						->with('messagetype', 'success')
						->with('message', 'Your account has been recovered and you can sign in with your new password.');
			}

		}

		return Redirect::route('home')
				->with('messagetype', 'warning')
				->with('message', 'Could\'t recover your account.');

	}

}
