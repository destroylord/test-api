<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule as Rule;
use Illuminate\Support\Facades\Http;
use Exception;

class RulePhoneNumber implements Rule
{

    protected $responseJson;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       
        try {
            $response = Http::get('https://phonevalidation.abstractapi.com/v1', [
                'api_key' => env('ABSTRACT_API_KEY'),
                'phone' => $value,
                'country' => 'id',
            ]);

            
            $this->responseJson = json_decode($response->body());

            if ($this->responseJson->valid === true) {
                self::getResponseJson();
            }

            if ($this->responseJson->valid === false) {
                $fail('The phone number is not valid.');
            }


        } catch (Exception $e) {
            $fail('Gagal memvalidasi nomor telepon. Silakan coba lagi.');
        }
        
        
    }

    public function getResponseJson()
    {
        return $this->responseJson;
    }
}
