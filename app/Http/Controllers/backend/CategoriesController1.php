<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Categories;

class CategoriesController extends Controller {
	public function __construct(Categories $categories) {
		$this->categories = $categories;
	}

	// Show list user
	public function index() {
		$categories = Categories::get()->toArray();
		return view('backend.categories.index', compact('categories'));
	}

	//create user
	public function create() {
		$input = \Input::all();
		if (!empty($input)) {

			$validator = Categories::validateCreate($input);

			if ($validator->fails()) {
				return redirect('backend/categories/create')->withErrors($validator);
			} else {
				if (Categories::saveCategories($input)) {
					return redirect('backend/categories/index')->with('thongbao', 'Thêm thành công');
				} else {
					return redirect('backend/categories/index')->with('thongbao', 'Không thành công');
				}

			}
		}
		return view('backend.categories.create');
	}

	//hàm sửa user
	public function edit($id = '') {
		//nếu không tồn tại id thì redirect về danh sách user
		if (empty($id)) {
			return redirect('backend/categories/index');
		}
		//lấy toàn bộ dữ liệu từ request
		$input = \Input::all();
//        dd($input);
		if (!empty($input)) {

			$validator = $this->categories->validateUpdate($input);

			if ($validator->fails()) {
				//quay lại trang edit
				return redirect()->back()->withErrors($validator);
			} else {
				if ($a = $this->categories->updateCategories($input, $id)) {

					return redirect()->route('backend.categories.index')->with('thongbao', 'Sửa thành công');
				} else {
					return redirect()->route('backend.categories.index')->with('thongbao', 'Sửa không thành công');
				}
			}
		}
		//lấy 1 trường từ bảng User với id
		$categories = $this->categories->find($id);
		return view('backend.categories.edit', compact('categories'));
	}

	public function delete($id = '') {
		# code...
		if (empty($id)) {
			return redirect('backend/categories/index');
		}
		//lấy 1 trường từ bảng User với id
		$categories = $this->categories->find($id);
		if ($categories->delete()) {
			return redirect('backend/categories/index')->with('thongbao', 'Xóa thành công');
		} else {
			return redirect('backend/categories/index')->with('thongbao', 'Xóa không thành công');
		}

	}

}
