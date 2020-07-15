<?php

namespace App\Models;

class ExamsModel extends BaseModel
{
    protected $table = 'exams';

    protected $allowedFields = ['code', 'scheduled_date', 'status', 'patient_amka'];

    /**
     * Get exams with patient info
     */
    public function getExamsFull($patient_amka = false)
    {
        $query = $this->select(
            'o.id, o.code, o.patient_amka, o.scheduled_date, o.status, 
        p.first_name as patient_first_name, p.last_name as patient_last_name'
        )
            ->from($this->table . ' as o', true)
            ->join('patients as p', 'p.amka = o.patient_amka', 'left');

        if ($patient_amka) {
            $query = $query->where(['patient_amka' => $patient_amka]);
        }

        $a = $query->get()->getResult('array');

        return $a;
    }
}
