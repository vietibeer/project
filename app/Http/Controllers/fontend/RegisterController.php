<?php

namespace App\Http\Controllers\fontend;
use App\Http\Controllers\Controller;

class RegisterController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
//        $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}

	public function register() {
		return view('fontend.auth.register');
	}
}
