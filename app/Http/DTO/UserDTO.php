<?php

namespace App\Http\DTO;

use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public string $name;

    public string $email;

    public string $phone;
}
