<?php

namespace Membra\Http\Controllers\Member;

use Membra\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Registrar;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Support\Facades\Redirect;

use Membra\Act;

class AuthController extends Controller {
 
	public function __construct(Sentinel $auth, Registrar $registrar) {
 
		$this->beforeFilter('csrf', ['on' => ['post']]);
		$this->middleware('sentinel.guest', ['except' => ['getLogout']]);
	}

	public function getLogin() {
		return view('auth.login');
	}

	public function getRegister() {
		return view('auth.register');
	}
	public function getLogout() {
		Sentinel::logout();
		return Redirect::route('home')
						->with('messagetype', 'success')
						->with('message', 'You have now been successfully been logged out!');
	}

	public function getActivate($activation_code) {
		$act = Act::where('code', '=', $activation_code)->where('completed', '=', 0)->first();
		if($act == null) {
			return Redirect::route('home')
				->with('messagetype', 'warning')
				->with('message', 'We couldn\'t find your activation code. Please try again.');
		} else {
			return view('auth.activate')->with('activation_code', $activation_code);
		}
	}

}
