<?php

namespace App\Models;

use CodeIgniter\Model;

class OperationsModel extends Model
{
    protected $table = 'operations';
    protected $returnType = 'array';
    protected $allowedFields = ['code', 'scheduled_date', 'status', 'patient_amka', 'primary_doctor_amka'];

    public function find($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function getOperationsFull()
    {
        $query = $this->select(
            'o.id, o.code, o.patient_amka, o.primary_doctor_amka, o.scheduled_date, o.status, 
        p.first_name as patient_first_name, p.last_name as patient_last_name,
        d.first_name as doctor_first_name, d.last_name as doctor_last_name'
        )
            ->from($this->table . ' as o', true)
            ->join('patients as p', 'p.amka = o.patient_amka', 'left')
            ->join('doctors as d', 'd.amka = o.primary_doctor_amka', 'left')
            ->get();

        $a = $query->getResult('array');

        return $a;
    }
}
