<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function store()
    {
        return response()->json(
            [
                'success' => true,
                'message' => 'کاربر با موفقیت ایجاد شد',
                'data' => [
                    'full_name' => 'Amir Salehi',
                    'email' => 'isamirsalehi@gmail.com',
                    'mobile' => '09121112222',
                    'password' => '123456',
                ],
            ]
        )->setStatusCode(201);
    }
}
