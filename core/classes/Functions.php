<?php 
class Functions {

	/* clear input */
	public function checkInput($var) {
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}

	/* truncate text */
	public function truncate($text) {
		if (strlen($text) > 200) 
		{
		    $maxLength = 150;
		    $yourString = substr($text, 0, $maxLength);
		    return $yourString."...";
		}		
	}

	/* redirect */
	function redirect($page) {
		header('Location: '.BASE_URL.'/'.$page);
	}

	/* upload image */
	public function uploadImage($file) {
		$filename = basename($file['name']);
		$fileTMP  = $file['tmp_name'];
		$fileSize = $file['size'];
		$error    = $file['error'];

		$extension         = explode('.', $filename);
		$extension         = strtolower(end($extension));
		$allowed_extension = array('jpg', 'png', 'jpeg');

		if(in_array($extension, $allowed_extension) === true) {
			if($error === 0) {
				if($fileSize <= 209272152) {
					$fileRoot = 'assets/images/'.$filename; /* folder to upload images */
					move_uploaded_file($fileTMP, $_SERVER['DOCUMENT_ROOT'].'/spotexotics/'.$fileRoot);
					return $fileRoot;
				}else {
					$GLOBALS['imageError'] = "The file size is too large.";
				}
			}
		}else {
			$GLOBALS['imageError'] = "The extension is not allowed.";
		}
	}

	/* delete image */
	public function deleteImage($image) {
		$image_path = $_SERVER['DOCUMENT_ROOT'].'/spotexotics/'.$image;
		chown($image_path, 666);
		unlink($image_path);
	}

	/* time ago */
	public function timeAgo($datetime){
		$time    = strtotime($datetime);
		$current = time(); 
		$seconds = $current - $time;
		$minutes = round($seconds / 60);
		$hours   = round($seconds / 3600);
		$months  = round($seconds * 2600640);

		if($seconds <= 60) {
			if($seconds == 0) {
				return 'now';
			}
		}else if($minutes <= 60) {
			return $minutes.'m ago';
		}else if($hours <= 24) {
			return $hours."h ago";
		}else if($months <= 12) {
			return date('M j', $time);
		}else {
			return date('j M Y', $time);
		}
	}

	/* get random integer */
	public function getRandomInteger() : int
	{
		return mt_rand(10,100);
	}	

	/* convert the $_FILES array to the cleaner (IMHO) array (upload multiple images) */
	function reArrayFiles(&$file_post)
	{
	    $file_ary = array();
	    $multiple = is_array($file_post['name']);

	    $file_count = $multiple ? count($file_post['name']) : 1;
	    $file_keys  = array_keys($file_post);

	    for ($i = 0; $i < $file_count; $i++)
	    {
	        foreach ($file_keys as $key)
	        {
	            $file_ary[$i][$key] = $multiple ? $file_post[$key][$i] : $file_post[$key];
	        }
	    }

	    return $file_ary;
	}

}
?>