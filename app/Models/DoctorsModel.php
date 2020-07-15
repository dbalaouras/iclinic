<?php

namespace App\Models;


class DoctorsModel extends BaseModel
{
    protected $table = 'doctors';

    protected $primaryKey = 'amka';

    protected $allowedFields = ['amka', 'first_name', 'last_name', 'year_of_birth', 'speciality'];
}
