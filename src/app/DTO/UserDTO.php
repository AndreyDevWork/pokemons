<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public int|null $id;
    public string $username;
    public string|null $email;
}
