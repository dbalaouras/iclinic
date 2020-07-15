<?php

namespace App\Models;

class OperationsModel extends BaseModel
{
    protected $table = 'operations';
    protected $returnType = 'array';
    protected $allowedFields = ['code', 'scheduled_date', 'status', 'patient_amka', 'lead_doctor_amka', 'result'];

    public function getOperationsFull($lead_doctor_amka = false, $patient_amka = false)
    {
        $query = $this->select(
            'o.id, o.code, o.patient_amka, o.lead_doctor_amka, o.scheduled_date, o.status, 
        p.first_name as patient_first_name, p.last_name as patient_last_name,
        d.first_name as doctor_first_name, d.last_name as doctor_last_name'
        )
            ->from($this->table . ' as o', true)
            ->join('patients as p', 'p.amka = o.patient_amka', 'left')
            ->join('doctors as d', 'd.amka = o.lead_doctor_amka', 'left');

        if ($lead_doctor_amka || $patient_amka) {

            $where_array = [];
            if ($lead_doctor_amka) $where_array['lead_doctor_amka'] = $lead_doctor_amka;
            if ($patient_amka) $where_array['patient_amka'] = $patient_amka;

            $query = $query->where($where_array);
        }

        $a = $query->get()->getResult('array');

        return $a;
    }
}
