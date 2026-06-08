<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class isOldPass implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // pengecekan password hash untuk user yang login
        $isPasswordValid = Hash::check($value, Auth::user()->password);

        // jika password tidak sesuai
        if (!$isPasswordValid) {
            $fail('Password lama salah');
        }
    }
}