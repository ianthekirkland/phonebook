<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhonebookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * Validation is NOT sanitization!!!
     *
     * @return array
     * @link https://laravel.com/docs/5.5/validation#available-validation-rules
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            // 'phone' => 'required|numeric',
            'phone' => 'max:50', // https://stackoverflow.com/questions/723587/whats-the-longest-possible-worldwide-phone-number-i-should-consider-in-sql-varc
            // 'phone' => 'required|max:50', // https://stackoverflow.com/questions/723587/whats-the-longest-possible-worldwide-phone-number-i-should-consider-in-sql-varc
            // 'phone' => 'required|regex:/(01)[0-9]{9}/',
            // 'phone' => 'required|regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/', // https://stackoverflow.com/questions/16699007/regular-expression-to-match-standard-10-digit-phone-number
            'email' => 'required|email|unique:phonebooks', // 'phonebooks' is the mySQL database name
        ];
    }
}
