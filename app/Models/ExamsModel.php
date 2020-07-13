<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamsModel extends Model
{
    protected $table = 'exams';

    protected $allowedFields = ['code', 'scheduled_date', 'status', 'patient_amka'];

    public function find($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
}
