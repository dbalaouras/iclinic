<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorsModel extends Model
{
    protected $table = 'doctors';

    protected $primaryKey = 'amka';

    protected $allowedFields = ['amka', 'first_name', 'last_name', 'year_of_birth', 'speciality'];

    public function find($amka = false)
    {
        if ($amka === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['amka' => $amka])
            ->first();
    }
}
