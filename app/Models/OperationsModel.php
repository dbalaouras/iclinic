<?php

namespace App\Models;

use CodeIgniter\Model;

class OperationsModel extends Model
{
    protected $table = 'operations';

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

        
        $query = $this->select('t1.code, t1.patient_amka, t1.primary_doctor_amka, t1.scheduled_date, t1.status, t2.*')
            ->from('operations as t1')
            ->join('patients as t2', 't2.amka = t1.patient_amka', 'INNER')
            ->asArray()
            ->get();

        $a = $query->getResult();
        
        return $a;
    }
}
