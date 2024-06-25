<?php

namespace App\Services\Api\V1;

use App\Http\DTO\UserDTO;
use App\Models\Phone;
use App\Models\User;

class UserService
{
    public function createUser(UserDTO $DTO): User
    {
        $createdUser = User::create([
            'name' => $DTO->name,
            'email' => $DTO->email,
        ]);

        $this->createPhone($DTO, $createdUser);

        return $createdUser;
    }

    private function createPhone(UserDTO $DTO, User $user)
    {
        Phone::create([
            'phone' => $DTO->phone,
            'user_id' => $user->id,
        ]);
    }
}
