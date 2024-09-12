<?php

namespace App;


use Illuminate\Http\Exceptions\HttpResponseException;
trait ValidationException
{
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json(['error' => $validator->errors()], 422);
        throw new HttpResponseException($response);
    }
}
