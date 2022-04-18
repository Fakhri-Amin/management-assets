<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaboratorium extends Model
{
    protected $table = 'laboratorium';  // nama table di database
    protected $primaryKey = 'id_lab';  // nama field id 
    protected $useTimestamps = true;  // jika menggunakan crated_at dan updated_at

    protected $allowedFields = [
        'item_photo',
        'item_code',
        'item_name',
        'item_spec',
        'obtained_year',
        'unit_value',
        'condition',
        'total',
        'user_unit',
        'ownership_type'
    ];    //  field / column yang boleh diisi oleh kita, sisanya field id, created_at & updated_at diisi secara otomatis oleh CInya 

    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_lab' => $id])->first();
    }
}
