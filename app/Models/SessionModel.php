<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'state',
        'msisdn',
        'serialnumber',
        'ghanacard',
        'sessionID',
        'sessionDate',
        'sessionTime',
        'region'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'state' => 'required|string',
        'msisdn' => 'required|string',
        'serialnumber' => 'required|string',
        'ghanacard' => 'required|string',
        'sessionID' => 'required|string',
        'sessionDate' => 'required|valid_date',
        'sessionTime' => 'required|valid_time',
        'region' => 'required|string',
    ];
}
