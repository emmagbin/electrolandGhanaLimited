<?php

namespace App\Models;

use CodeIgniter\Model;

class SerialnumberModel extends Model
{
    protected $table = 'serialnumber';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'serialnumber',
        'status',
        'prize'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'serialnumber' => 'required|string',
        'status' => 'required|string',
        'prize' => 'required|string',
    ];



    public function moveRecords()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('serialnumber');

        // Start a transaction
        $db->transBegin();

        try {
            // Insert records into the target table
            $builder->query("
                INSERT INTO serialnumber (serialnumber)
                SELECT s.serialnumber
                FROM serialnumberTemp s
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM serialnumber t
                    WHERE t.serialnumber = s.serialnumber
                )
            ");

            // Delete records from the source table
            $db->table('serialnumberTemp')->query("
                DELETE s
                FROM serialnumberTemp s
                WHERE EXISTS (
                    SELECT 1
                    FROM serialnumber t
                    WHERE t.serialnumber = s.serialnumber
                )
            ");

            // Commit the transaction
            $db->transCommit();
        } catch (\Exception $e) {
            // Rollback the transaction on error
            $db->transRollback();
            throw $e;
        }
    }
}
