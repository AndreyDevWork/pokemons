<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public readonly int $id;
    public readonly string $username;
    public readonly string|null $email;
}
