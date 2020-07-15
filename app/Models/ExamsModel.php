<?php

namespace App\Models;

class ExamsModel extends BaseModel
{
    protected $table = 'exams';

    protected $allowedFields = ['code', 'scheduled_date', 'status', 'patient_amka'];
}
