<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class SundayOrThursday implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dayOfWeek = Carbon::parse($value)->format('l');

        if (!in_array($dayOfWeek, ['Sunday', 'Thursday'])) {
            $fail("The $attribute must be a Sunday or Thursday.");
        }
    }
}