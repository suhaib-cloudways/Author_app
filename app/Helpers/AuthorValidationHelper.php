<?php
namespace App\Helpers;

class AuhtorValidationHelper
{
    public static function dataValidation(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'location' => 'required|alpha'
        ]);
    }
}