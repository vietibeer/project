<?php
/**
 * Created by PhpStorm.
 * User: duyvu
 * Date: 10/10/2017
 * Time: 13:20
 */

namespace app\Http\Controllers\Backend;

class AdminController {
	public function index() {
		if (!\Auth::check()) {
			return redirect()->route('name-backend-login');
		}
		return view('backend.dashboard.home');
	}
}