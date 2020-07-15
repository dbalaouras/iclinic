<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    public function find($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where([$this->primaryKey => $id])
            ->first();
    }
}
