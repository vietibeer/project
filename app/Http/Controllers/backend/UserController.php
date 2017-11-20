<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Input;

class UserController extends Controller {
	// set data $this->user is model User
	public function __construct(User $user) {
		# code...
		$this->user = $user;
	}

	// Show list user
	public function index() {
		//lấy toàn bộ dữ liệu của bảng User
		$users = $this->user->get()->toArray();
		//compact('users') là truyền biến, và nhận qua view có cùng tên biến là $users
		return view('backend.user.index', compact('users'));
	}

	//create user
	public function create(Request $request) {

		//lấy toàn bộ dữ liệu từ request
		$input = Input::all();

		if (!empty($input)) {
			$validator = $this->user->validateCreate($input);

			//nếu xác nhận không thành công
			if ($validator->fails()) {
				return redirect('backend/user/create')->withErrors($validator);
			} else {
				//nếu thêm thành công.
				$filename = HelperUpload::upload($request, 'user_image');
				if ($this->user->saveUser($input, $filename)) {
					$this->user->setPasswordAttribute($input['password']);
					return redirect('backend/user/index')->with('thongbao', 'Thêm thành công');
				} else {
					return redirect('backend/user/index')->with('thongbao', 'Không thành công');
				}
			}
		}

		return view('backend.user.create');
	}

	//hàm sửa user
	public function edit(Request $request, $id) {
		//nếu không tồn tại id thì redirect về danh sách user

		if (empty($id)) {
			return back()->withInput();
		}
		//lấy toàn bộ dữ liệu từ request
		$input = Input::all();
		//
		if (!empty($input)) {
			$validator = $this->user->validateUpdate($input);

			if ($validator->fails()) {
				//quay lại trang edit
				return redirect()->back()->withErrors($validator);
			} else {
				$filename = HelperUpload::upload($request, 'user_image');
				if ($this->user->updateUser($input, $id, $filename)) {
					return redirect()->route('backend.user.index')->with('thongbao', 'Sửa thành công');
				} else {
					return redirect()->route('backend.user.index')->with('thongbao', 'Sửa không thành công');
				}
			}
		}
		//lấy 1 trường từ bảng User với id
		$user = $this->user->find($id);
		return view('backend.user.edit', compact('user'));
	}

	public function delete($id = '') {
		# code...
		if (empty($id)) {
			return redirect('backend/user/index');
		}
		//lấy 1 trường từ bảng User với id
		$user = $this->user->find($id);
		if ($user->delete()) {
			return redirect('backend/user/index')->with('thongbao', 'Xóa thành công');
		} else {
			return redirect('backend/user/index')->with('thongbao', 'Xóa không thành công');
		}

	}

	//export danh sách người dùng
	public function exportExcel($value = '') {
		# code...
		$data = $this->user->all();
		Excel::create('danh sách User', function ($excel) use ($data) {
			$excel->sheet('Sheetname', function ($sheet) use ($data) {

				// set font with ->setStyle()
				// $sheet->setStyle(array(
				//     'font' => array(
				//         'name'      =>  'Calibri',
				//         'size'      =>  13,
				//         'bold'      =>  true
				//     )
				// ));

				// Manipulate first row
				// $sheet->row(1, array(
				//     'DANH SÁCH CHI TIẾT GIAO DỊCH'
				// ));
				//Auto Size
				$sheet->setAutoSize(true);
				//sheet border
				$sheet->setAllBorders('thin');
				// Sheet manipulation
				$sheet->setPageMargin(0.25);

				$sheet->loadView('backend.user.excel', ['users' => $data]);
			});
		})->export('xlsx');
	}
}
