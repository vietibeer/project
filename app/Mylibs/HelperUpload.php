<?php
namespace App\Mylibs;
class Mylibs {

	public static function upload($request, $upload) {
		$user = 'user_image';
		$categories = 'cat_img';
		$rename = array('_User_', '_Cat_');
		if ($upload == $user) {
			$upload = $user;
		} else if ($upload == $categories) {
			$upload = $categories;
		}
		if ($request->hasFile($upload)) {
			$file = $request->file($upload);
			$fileExtension = array('png', 'jpg', 'gif');

			$fileCheckEx = $file->getClientOriginalExtension($upload);
			if (in_array($fileCheckEx, $fileExtension)) {
				if ($upload == $user) {
					$firstName = rand(0, 999) . $rename[0];
				} else if ($upload == $categories) {
					$firstName = rand(0, 999) . $rename[1];
				}
				$lastName = $file->getClientOriginalName($upload);
				$filename = $firstName . $lastName;
				$file->move('public/backend/images/user', $filename);
				return $filename;
			} else {
				echo 'Chua upload1111';
			}
		}

	}

}

?>