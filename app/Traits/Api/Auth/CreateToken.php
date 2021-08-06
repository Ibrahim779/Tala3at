<?php


namespace App\Traits\Api\Auth;


trait CreateToken
{

    protected function createToken()
    {
        return auth()->user()->createToken('token')->plainTextToken;
    }

}
