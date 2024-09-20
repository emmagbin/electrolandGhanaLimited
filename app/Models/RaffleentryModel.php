<?php

namespace App\Models;

use CodeIgniter\Model;

class RaffleentryModel extends Model
{
    protected $table = 'raffleentry';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'dateEntry',
        'timeEntry',
        'msisdn',
        'serialnumber',
        'ghanacard',
        'region'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'dateEntry' => 'required|valid_date',
        'timeEntry' => 'required|valid_time',
        'msisdn' => 'required|string',
        'serialnumber' => 'required|string',
        'ghanacard' => 'required|string',
        'region' => 'permit_empty|string',
    ];
}
