<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProfileDTO extends DataTransferObject
{
    public readonly int $id;
    public readonly string $date_of_birth;
    public readonly string $firstname;
    public readonly string $lastname;
    public readonly int $user_id;

    public readonly string $created_at;
    public readonly string $updated_at;
}
