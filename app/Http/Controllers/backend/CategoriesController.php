<?php

namespace App\Http\Controllers\backend;

use App\Http\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$categories = Categories::all();
        return view('backend.categories.index', ['categories' => $categories]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('backend.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Http\Models\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function show(Categories $categories) {
        // case 1
		$categories = Categories::find($categories->cat_id);

		return view('backend.categories.show', ['categories' => $categories]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Http\Models\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Categories $categories, $id) {
		$categories = categories::find($id);
//		dd($categories);

		return view('backend.categories.edit', ['categories' => $categories]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Http\Models\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Categories $categories) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Http\Models\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Categories $categories) {
		//
	}
}
