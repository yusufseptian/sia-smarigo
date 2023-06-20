<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelListDeskripsi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'list_deskripsi';
    protected $primaryKey       = 'listdesk_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'listdesk_guru_id', 'listdesk_deskripsi'
    ];
}
