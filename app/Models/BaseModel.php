<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    protected $useTimestamps = true;

    public function getEntity()
    {
        $fields = $this->db->getFieldData($this->table);
        $result = [];

        foreach ($fields as $field) {
            $result[$field->name] = $field->default;
        }

        return $result;
    }
}
