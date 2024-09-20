<?php

namespace App\Models;

use CodeIgniter\Model;

class DrawsModel extends Model
{
    protected $table = 'draws';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'drawdate',
        'serialnumber',
        'position',
        'prize',
        'redeemstatus'
    ];

    protected $useTimestamps = false; // Set to true if you have created_at and updated_at columns

    // Add validation rules if necessary
    protected $validationRules = [
        'drawdate' => 'required|valid_date',
        'serialnumber' => 'required|string',
        'position' => 'required|string',
        'prize' => 'required|string',
        'redeemstatus' => 'required|string|max_length[1]',
    ];
}
