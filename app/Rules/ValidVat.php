<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidVat implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (bool)preg_match_all(
            '/(?:(AT)\s*(U\d{8}))|(?:(BE)\s*(0?\d{*}))|(?:(CZ)\s*(\d{8,10}))|(?:(DE)\s*(\d{9}))|(?:(CY)\s*(\d{8}[A-Z]))|(?:(DK)\s*(\d{8}))|(?:(EE)\s*(\d{9}))|(?:(GR)\s*(\d{9}))|(?:(ES|NIF:?)\s*([0-9A-Z]\d{7}[0-9A-Z]))|(?:(FI)\s*(\d{8}))|(?:(FR)\s*([0-9A-Z]{2}\d{9}))|(?:(GB)\s*((\d{9}|\d{12})~(GD|HA)\d{3}))|(?:(HU)\s*(\d{8}))|(?:(IE)\s*(\d[A-Z0-9\\+\\*]\d{5}[A-Z]))|(?:(IT)\s*(\d{11}))|(?:(LT)\s*((\d{9}|\d{12})))|(?:(LU)\s*(\d{8}))|(?:(LV)\s*(\d{11}))|(?:(MT)\s*(\d{8}))|(?:(NL)\s*(\d{9}B\d{2}))|(?:(PL)\s*(\d{10}))|(?:(PT)\s*(\d{9}))|(?:(SE)\s*(\d{12}))|(?:(SI)\s*(\d{8}))|(?:(SK)\s*(\d{10}))|(?:\D|^)(\d{11})(?:\D|$)|(?:(CHE)(-|\s*)(\d{3}\.\d{3}\.\d{3}))|(?:(SM)\s*(\d{5}))/i',
            $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The VAT Number is not a valid VAT.';
    }
}
