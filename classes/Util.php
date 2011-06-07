<?php

class Util {

    const email_regex = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    const strong_pass_regex = "/^(?=.*([^a-zA-Z0-9]))(?=.*([0-9]))(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,}$/";
    const valid_pass_regex = "/^(?=.*(\d|[^a-zA-Z]))(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,}$/";
    
    public static function isEmail($email) {
        if (preg_match(self::email_regex, $email)) return true;
        return false;
    }
    
    public static function isValidPass($password, $length = 8) {
        if (preg_match(str_replace("8", $length, self::strong_pass_regex), $password)) return 1;
        if (preg_match(str_replace("8", $length, self::valid_pass_regex), $password)) return 0;
        return -1;
    }
    
    public static function isLength($string, $length, $delimiter = -1) {
        if ($delimiter == -1) {
            if (strlen($string) >= $length) return true;
        } else {
            if (strlen($string) >= $length && strlen($string) <= $delimiter) return true;
        }
        return false;
    }
}

$pass = "Lololw^7";

echo "Password: $pass - ";
if (Util::isValidPass($pass) == 1) {
    echo " is strong!";
} else if (Util::isValidPass($pass) == 0) {
    echo " is weak!";
} else {
    echo " is not valid!";
}
?>