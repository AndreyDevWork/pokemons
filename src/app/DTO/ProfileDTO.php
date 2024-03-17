<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProfileDTO extends DataTransferObject
{
    public string $id;
    public string $date_of_birth;
    public string $firstname;
    public string $lastname;
    public string $user_id;

    public string $created_at;
    public string $updated_at;
}
