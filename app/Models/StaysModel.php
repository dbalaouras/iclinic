<?php

namespace App\Models;

class StaysModel extends BaseModel
{
    protected $table = 'stay';

    protected $allowedFields = ['start_datetime', 'end_datetime', 'patient_amka', 'exit_notes'];

    /**
     * Get exams with patient info
     */
    public function getStaysFull($patient_amka = false)
    {
        $query = $this->select(
            'o.id, o.patient_amka, o.start_datetime, o.end_datetime, o.exit_notes,
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
