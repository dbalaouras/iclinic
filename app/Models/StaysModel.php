<?php

namespace App\Models;

use CodeIgniter\Model;

class StaysModel extends Model
{
    protected $table = 'stay';

    protected $allowedFields = ['start_datetime', 'end_datetime', 'patient_amka', 'exit_notes'];

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
