<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'rolename',
        'rolestatus',
        'createdby',
        'createdon',
        'lastupdatedon',
        'serialnumber',
        'reports',
        'draws',
        'user_management',
        'show_room_management'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'rolename' => 'required|string',
        'rolestatus' => 'required|string|max_length[1]',
        'createdby' => 'permit_empty|string',
        'createdon' => 'permit_empty|valid_date',
        'lastupdatedon' => 'permit_empty|valid_date',
        'serialnumber' => 'permit_empty|string|max_length[1]',
        'reports' => 'permit_empty|string|max_length[1]',
        'draws' => 'permit_empty|string|max_length[1]',
        'user_management' => 'permit_empty|string|max_length[1]',
    ];
}
