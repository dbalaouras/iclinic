<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    protected $table = 'patients';

    protected $primaryKey = 'amka';

    protected $allowedFields = ['amka', 'first_name', 'last_name', 'year_of_birth', 'allergies', 'medical_history', 'medication'];

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
