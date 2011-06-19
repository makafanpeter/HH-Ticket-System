<?php
/**
Util Class for common methods and algorithms.
*/
class Util {

    const email_regex = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    const strong_pass_regex = "/^(?=.*([^a-zA-Z0-9]))(?=.*([0-9]))(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,}$/";
    const valid_pass_regex = "/^(?=.*(\d|[^a-zA-Z]))(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,}$/";
    
	/**
	isEmail			-	Checks if an email is valid.
	@params			-	Email address to check.
	return			- 	Returns true or false.
	*/
    public static function isEmail($email) {
        if (preg_match(self::email_regex, $email)) return true;
        return false;
    }
    
	/**
	isValidPass		-	Checks if a password is valid and returns if its strong, weak or invalid.
	@params			-	Password to check and length of password.
	return			- 	Returns 1 if the password to check is strong, 0 if the password is weak and -1 if the password is invalid.
	*/
    public static function isValidPass($password, $length = 8) {
        if (preg_match(str_replace("8", $length, self::strong_pass_regex), $password)) return 1;
        if (preg_match(str_replace("8", $length, self::valid_pass_regex), $password)) return 0;
        return -1;
    }
    
	/**
	isLength		-	determins if a string is of a cetain lenght.
	@params			-	string to check, length of which the string must be and delimiter is if the string is between two values.
	return			- 	Returns true or false.
	*/
    public static function isLength($string, $length, $delimiter = -1) {
        if ($delimiter == -1) {
            if (strlen($string) >= $length) return true;
        } else {
            if (strlen($string) >= $length && strlen($string) <= $delimiter) return true;
        }
        return false;
    }
	
	/**
	hashString		-	Hashes a string or uses a predefined hash.
	@params			-	String to be hashed, SALT if available.
	return			-	Returns a hash string.
	*/
	public static function hashString($string, $salt = NULL) {
		if ($salt === NULL) {
			$salt = substr(hash('sha512',uniqid(rand(), true)), 0, 10);
		} else {
			$salt = substr($salt, 0, 10);
		}
		
		$hash = $salt . hash('sha512', $salt.$string);
		return $hash;
	}
	
	/**
	generateKey		-	Generates a random string with the defined params.
	@params			-	4 Strength levels 0, 2, 4 and 8.
	return			- 	Returns a string of random characters.
	*/
	public static function generateKey($length = 8, $strength = 8) {
		$vowels = 'aeiou';
		$consonants = 'bcdfghjklmnpqrstvwxyz';
		if ($strength >= 1) {
			$consonants .= 'BCDFGHJKLMNPQRSTVWXYZ';
		}
		if ($strength >= 2) {
			$vowels .= "AEIOU";
		}
		if ($strength >= 4) {
			$consonants .= '1234567890';
		}
		if ($strength >= 8 ) {
			$vowels .= '/,.()@#!*%[]{}^-=_';
		}

		$key = '';
		for ($i = 0; $i < $length; $i++) {
			$alt = mt_rand(0, 2);
			if ($alt == 1) {
				$key .= $consonants[(mt_rand(0, strlen($consonants) - 1))];
			} else {
				$key .= $vowels[(mt_rand(0, strlen($vowels) - 1))];
			}
		}
		return $key;
	}
	
}
?>