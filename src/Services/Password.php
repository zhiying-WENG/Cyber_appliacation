<?php

namespace App\Services;

class Password {
    public function checkPasswordStrength(string $password): bool
    {
        // Define regular expressions
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChar = preg_match('@[^\w]@', $password);

        // Define minimum length
        $minLength = 8;
        return $uppercase && $lowercase && $number && $specialChar && strlen($password) >= $minLength;
    }
}