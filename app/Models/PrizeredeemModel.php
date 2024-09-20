<?php

namespace App\Models;

use CodeIgniter\Model;

class PrizeredeemModel extends Model
{
    protected $table = 'prizeredeem';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'prizeid',
        'serialnumber',
        'actiondate',
        'actiontime',
        'actionby'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'prizeid' => 'required|integer',
        'serialnumber' => 'required|string',
        'actiondate' => 'required|valid_date',
        'actiontime' => 'required|valid_time',
        'actionby' => 'required|string',
    ];
}
