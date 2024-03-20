<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public readonly int|null $id;
    public readonly string|null $username;
    public readonly string|null $email;
    public readonly string|null $password;
}
