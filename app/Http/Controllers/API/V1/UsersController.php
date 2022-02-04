<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'password' => 'required',
        ]);

        $request->password = app('hash')->make($request->password);
        $this->userRepository->create($request->toArray());

        return response()->json(
            [
                'success' => true,
                'message' => 'کاربر با موفقیت ایجاد شد',
                'data' => [
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'password' => $request->password,
                ],
            ]
        )->setStatusCode(201);
    }
}
