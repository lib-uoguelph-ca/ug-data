<?php

class i18n {
	public static function t($input, $lang = 'en') {
		$strings = Config::get("translation/$lang");

		if (isset($strings[$input])) {
			return $strings[$input];	
		}
		else {
			return $input;
		}
		
	}

} 
