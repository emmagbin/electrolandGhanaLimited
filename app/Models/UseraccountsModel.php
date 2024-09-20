<?php

namespace App\Models;

use CodeIgniter\Model;

class UseraccountsModel extends Model
{
    protected $table = 'useraccounts';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'useremail',
        'logintoken',
        'phonenumber',
        'roleid',
        'accountstatus',
        'createdby',
        'createdon',
        'lastupdatedby',
        'sex',
        'lastupdatedon',
        'lastseenon',
        'outletid',
        'fname',
        'lname',
        'expirydate'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'useremail' => 'required|valid_email',
        'logintoken' => 'permit_empty|string',
        'phonenumber' => 'required|string',
        'roleid' => 'required|string',
        'accountstatus' => 'required|string|max_length[1]',
        'createdby' => 'permit_empty|string',
        'createdon' => 'permit_empty|valid_date',
        'lastupdatedby' => 'permit_empty|string',
        'sex' => 'required|in_list[male,female]',
        'lastupdatedon' => 'permit_empty|valid_date',
        'lastseenon' => 'permit_empty|valid_date',
        'outletid' => 'required|integer',
        'fname' => 'permit_empty|string',
        'lname' => 'permit_empty|string',
        'expirydate' => 'permit_empty|valid_date',
    ];
}
