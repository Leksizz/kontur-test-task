<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\DTO\UserDTO;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Jobs\SendMailForAdminJob;
use App\Services\Api\V1\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $userDTO = UserDTO::from($validatedData);

        $createdUser = $this->userService->createUser($userDTO);

        dispatch(new SendMailForAdminJob($createdUser));

        return response()->json('Данные успешно отправлены');
    }
}
