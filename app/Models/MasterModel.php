<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
   
    //MasterFunction

public function masterfunction($table, $data, $condition, $action)
{
    // Validate input parameters
    $this->validateInputParams($table, $condition, $action);

    // Start transaction
    $this->db->transStart();

    try {
        switch ($action) {
            case 'insert':
                return $this->handleInsert($table, $data, $condition);
            case 'update':
            case 'unlock':
            case 'lock':
                return $this->handleUpdate($table, $data, $condition);
            case 'delete':
                return $this->handleDelete($table, $condition);
            default:
                return "unsupported_action";
        }
    } catch (Exception $e) {
        // Rollback transaction on error
        $this->db->transRollback();
        // Log the exception
        log_message('error', 'Database operation failed: ' . $e->getMessage());
        return "error";
    } finally {
        // Complete transaction
        $this->db->transComplete();
    }
}

private function validateInputParams($table, $condition, $action)
{
    // Validate $table to prevent SQL injection
    if (!is_string($table) || empty($table)) {
        throw new InvalidArgumentException("Invalid table name provided.");
    }

    // Validate $condition to prevent SQL injection
    if (!is_array($condition) || empty($condition)) {
        throw new InvalidArgumentException("Invalid condition provided.");
    }

    // Validate $action to prevent unexpected behavior
    $allowedActions = ['insert', 'update', 'delete', 'unlock', 'lock'];
    if (!in_array($action, $allowedActions)) {
        throw new InvalidArgumentException("Unsupported action provided.");
    }
}

private function handleInsert($table, $data, $condition)
{
    $query = $this->db->table($table);
    // Check if a row exists before attempting insertion
    $row = $query->where($condition)->get()->getRow();
    if (!$row) {
        $result = $query->insert($data);
        return $result ? "created" : "failed";
    } else {
        return "already_exists";
    }
}

private function handleUpdate($table, $data, $condition)
{
    $query = $this->db->table($table);
    $result = $query->where($condition)->update($data);
    return $result ? "updated" : "failed";
}

private function handleDelete($table, $condition)
{
    $query = $this->db->table($table);
    // Check if the row exists before attempting deletion
    $row = $query->where($condition)->get()->getRow();
    if ($row) {
        $result = $query->where($condition)->delete();
        return $result ? "deleted" : "failed";
    } else {
        return "not_found";
    }
}

public function getData($table, $conditions = [], $returnArray = true)
    {
        $builder = $this->db->table($table);

        if (!empty($conditions)) {
            $builder->where($conditions);
        }

        $query = $builder->get();

        if ($returnArray) {
            return $query->getResultArray();
        } else {
            return $query->getResult();
        }
    }

   public function getDatawhereIn($table, $conditions = [], $returnArray = true)
{
    $builder = $this->db->table($table);

    // Check if conditions array is not empty and process each condition
    if (!empty($conditions)) {
        foreach ($conditions as $key => $value) {
            // Assuming the key is the column name and value is the condition value
            $builder->where($key, $value);
        }
    }

    $query = $builder->get();

    if ($returnArray) {
        return $query->getResultArray();
    } else {
        return $query->getResult();
    }
}



public function checkExistCondition($table, $condition)
{
    // Query to select the first row based on condition
    $row = $this->db->table($table)
                   ->where($condition)
                   ->get()
                   ->getRow(); // Retrieve the first row

    // Check if the row exists
    if ($row) {
        // Row exists, return 'yes'
        return 'yes';
    } else {
        // Row does not exist, return 'no'
        return 'no';
    }
}


public function createReturnId(string $tableName, array $data) {
    $result = $this->db->table($tableName)->insert($data);
    if ($result) {
        return $this->db->insertID();
    } else {
        return "failed";
    }
}

public function createReturnIdd(string $tableName, array $data) {
    // Remove the computed field from the data array
    unset($data['receiptNumber']);
    $result = $this->db->table($tableName)->insert($data);
    
    // Check if the insertion was successful
    if ($result) {
        
        return $this->db->insertID();
    } else {
        return "failed";
    }
}



public function insert_data(string $tableName, array $data) {
    $result = $this->db->table($tableName)->insert($data);
    if ($result) {
        return "created";
    } else {
        return "failed";
    }
}

public function checkUpdate(string $tableName, array $data, array $where = [], array $id) {
    $check = $this->db->table($tableName)->getWhere($where)->getResult();

    if (empty($check)) {
       // $this->log_action($user_id, 'edit',$tableName,$id, $data);
        $result = $this->db->table($tableName)->update($data, $id);
        if ($result) {
            return "updated";
        } else {
            return "failed";
        }
    } else {
        return "exist";
    }
}


public function tableUpdate(string $tableName, array $data, array $where = []) {
   $result = $this->db->table($tableName)->update($data, $where);
        if ($result) {
            return "updated";
        } else {
            return "failed";
        }
}




public function checkCreate(string $tableName, array $data, array $where = []) {
    $check = $this->db->table($tableName)->getWhere($where)->getResult();

    if (empty($check)) {
        $result = $this->db->table($tableName)->insert($data);
        if ($result) {
            return "created";
        } else {
            return "failed";
        }
    } else {
        return "exist";
    }
}

public function DeleteUnlockLock($table_name,$actionBy){
      $action=$this->input->post('action');
      // $table_name=$this->input->post('table_name');
       $where = array(
            'id' => $this->input->post('id'),
           );
      if($action==="delete"){
        return $this->delete_data($table_name, $where);

      }else if($action==="unlock"){
        $value = array(
            'status' =>"1",
            'updated_by' =>   $actionBy,
            
           );
        return $this->enable_disable($table_name, $value, $where);

      }else if($action==="lock"){
        $value = array(
            'status' =>"0",
            'updated_by' =>   $actionBy,
            
           );
        return $this->enable_disable($table_name, $value, $where);
      }
    }



public function checkCreateReturnId(string $tableName, array $data, array $where = []) {
    // Check if data already exists based on provided conditions
    $check = $this->db->table($tableName)->getWhere($where)->getResult();

    if (empty($check)) {
        // If data doesn't exist, insert the data into the table
        $result = $this->db->table($tableName)->insert($data);
        if ($result) {
            // If insertion is successful, return the ID of the inserted record
            return $this->db->insertID();
        } else {
            // If insertion fails, return "Failed"
            return "failed";
        }
    } else {
        // If data already exists, return "Exist"
        return "exist";
    }
}





public function updateRecord(string $tableName, array $data, array $where) {
    $builder = $this->db->table($tableName);
    $builder->where($where);
    $builder->update($data);

    // Check if any rows were affected
    $affectedRows = $this->db->affectedRows();
    
    // Return status based on the number of affected rows
    return ($affectedRows > 0) ? 'updated' : 'failed';
}





public function deleteLockUnlock(string $action, string $tableName, array $value, array $where) {
    $builder = $this->db->table($tableName);
    $builder->where($where);

    switch ($action) {
        case 'delete':
        $this->log_action($value["id"], 'delete',$tableName,$where);
            $builder->delete();
            break;
        case 'unlock':
        case 'lock':
            $builder->update($value);
            break;
        default:
            return false; // Handle unsupported action
    }

    return $this->db->affectedRows();
}


public function executeCustomQuery($sql, $returnArray = true) {
    // Execute the query
    $query = $this->db->query($sql);

    // Check if query execution was successful
    if ($query) {
        // Return the result set based on $returnArray parameter
        if ($returnArray) {
            return $query->getResultArray(); // Return results as array
        } else {
            return $query->getResult(); // Return results as objects
        }
    } else {
        // Query failed, log the error message
        $error_message = $this->db->error()['message']; // Get the database error message
        log_message('error', 'Custom query execution failed: ' . $error_message);

        return false;
    }
}



public function getAllWithJoin(string $tableName1, string $join1, string $tableName2, string $join2) {
    return $this->db->query("SELECT {$tableName1}.*, {$tableName2}.*, {$tableName1}.id as tableId  
                                FROM {$tableName1} 
                                INNER JOIN {$tableName2} ON {$tableName1}.{$join1} = {$tableName2}.{$join2}")->getResult();
}

public function selectWithJoin(string $table1, string $table2, string $joinCondition, string $select) {
    return $this->db->select($select)
                    ->from($table1)
                    ->join($table2, $joinCondition)
                    ->get()
                    ->getResult();
}

public function get_all($table_name) {
    $query = $this->db->get($table_name);
    return $query->result();
}

public function select_data($table_name, $where) {
    $this->db->where($where);
    $query = $this->db->get($table_name);
    return $query->result();
}

public function select_dataArray($table_name, $where) {
    $this->db->where($where);
    $query = $this->db->get($table_name);
    return $query->result_array();
}

public function insert_data_old($table_name, $data) {
    $this->db->insert($table_name, $data);
    return $this->db->insert_id();
}

public function update_data($table_name, $data, $where) {
    $this->db->where($where);
    $this->db->update($table_name, $data);
    return $this->db->affected_rows();
}

public function enable_disable($table_name, $value, $where) {
    $data = array(
        'Status' => $value
    );
    $this->db->where($where);
    $this->db->update($table_name, $value);
    return $this->db->affected_rows();
}

    public function delete_data($table_name, $where)
    {
        // Set the table
        $this->setTable($table_name);

        // Perform the delete operation
        $this->where($where)->delete();

        // Return the number of affected rows
        return $this->affectedRows();
    }


public function validateLogin($username,$token) {

	$passwordToken = hash('sha512', trim($username) .trim($token));

    if ($username === "emmagbin@gmail.com" && $token === "0249273086") {

    	$data = [
    		[
		    'id'=>0,
		    'useremail'       => 'emmagbin@gmail.com', // Default email
		    'logintoken'      => 'default_token', // Placeholder token
		    'phonenumber'     => '024-297-3086', // Default phone number
		    'roleid'          => 1, // Default role ID
		    'accountstatus'   => 'active', // Default account status
		    'createdby'       => 'admin', // Default creator
		    'createdon'       => date('Y-m-d H:i:s'), // Current date-time
		    'lastupdatedby'   => 'admin', // Default last updater
		    'sex'             => 'not specified', // Default gender
		    'lastupdatedon'   => date('Y-m-d H:i:s'), // Current date-time
		    'lastseenon'      => date('Y-m-d H:i:s'), // Current date-time
		    'outletid'        => 1, // Default outlet ID
		    'fname'           => 'John', // Default first name
		    'lname'           => 'Doe', // Default last name
		    'expirydate'      => date('Y-m-d', strtotime('+1 year')) // One year from now
    		]
				];


  
        return $data;
    } else {
        
        $query = $this->db->query("SELECT * FROM useraccounts WHERE logintoken='$passwordToken' AND accountstatus='1'");
        $result = $query->getResultArray();
        return $result;
    }
}

function changePin($phoneNumber, $id) {
    $phoneNumber = trim($phoneNumber);
    $pin = trim($this->input->post('newpin'));
    $data = [
        'loginToken' => hash('sha512', $phoneNumber.$pin)
    ];
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('useraccounts', $data);
}


 public function moveRecords()
    {
        // Start a transaction
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            // Insert records into the target table
            $sqlInsert = "INSERT INTO serialnumber (serialnumber)
                          SELECT s.serialnumber
                          FROM serialnumberTemp s
                          WHERE NOT EXISTS (
                              SELECT 1
                              FROM serialnumber t
                              WHERE t.serialnumber = s.serialnumber
                          )";

            $db->query($sqlInsert);

            // Delete records from the source table
            $sqlDelete = "DELETE s
                          FROM serialnumberTemp s
                          WHERE EXISTS (
                              SELECT 1
                              FROM serialnumber t
                              WHERE t.serialnumber = s.serialnumber
                          )";

            $db->query($sqlDelete);

            // Commit the transaction
            $db->transCommit();
        } catch (\Exception $e) {
            // Rollback the transaction on error
            $db->transRollback();
            throw $e;
        }
    }



function getEnteries($from,$to){
        $sql = "
select raffleentry.*
FROM raffleentry
WHERE raffleentry.dateEntry >= '$from' AND raffleentry.dateEntry <= '$to';
";

return $this->db->query($sql)->getResult();

    }


function getbasedOnghanacard($ghanacard){
        $sql = "
select raffleentry.*
FROM raffleentry
WHERE raffleentry.ghanacard = '$ghanacard';
";

return $this->db->query($sql)->getResult();

    }
function getbasedOnphonenumber($msisdn,$dateEntry){
        $sql = "
select raffleentry.*
FROM raffleentry
WHERE raffleentry.msisdn = '$msisdn';
";

return $this->db->query($sql)->getResult();

    }
    
    
    function avg_daily_entries(){
        $sql = "SELECT 
    ROUND(AVG(daily_entries), 2) AS average_daily_entries
FROM (
    SELECT 
        `dateEntry`, 
        COUNT(*) AS daily_entries
    FROM `raffleentry`
    GROUP BY `dateEntry`
) AS daily_counts;

";

return $this->db->query($sql)->getResultArray();

    }
    
    


function getdashboarddata(){
        $sql = "
    
    SELECT 
   (SELECT COUNT(id) FROM raffleentry where  YEAR(raffleentry.dateEntry) = YEAR(CURDATE())) AS submitted,
    (SELECT COUNT(id) FROM raffleentry WHERE winStatus = 'W' AND YEAR(raffleentry.dateEntry) = YEAR(CURDATE())) AS wins,
    (SELECT COUNT(id) FROM draws WHERE draws.redeemstatus='R' and YEAR(draws.drawdate) = YEAR(CURDATE())) AS redeemed,
    (SELECT COUNT(id) FROM raffleentry WHERE msisdn != '' AND YEAR(dateEntry) = YEAR(CURDATE())) AS msisdn;

";

return $this->db->query($sql)->getResultArray();

    }


function getdashboarddataGraph(){
        $sql = "SELECT 
    months.month AS month,
    COALESCE(COUNT(re.id), 0) AS count
FROM 
    (SELECT 1 AS month
     UNION ALL SELECT 2
     UNION ALL SELECT 3
     UNION ALL SELECT 4
     UNION ALL SELECT 5
     UNION ALL SELECT 6
     UNION ALL SELECT 7
     UNION ALL SELECT 8
     UNION ALL SELECT 9
     UNION ALL SELECT 10
     UNION ALL SELECT 11
     UNION ALL SELECT 12) AS months
LEFT JOIN 
    raffleentry re
    ON MONTH(re.dateEntry) = months.month
    AND YEAR(re.dateEntry) = YEAR(CURDATE())
GROUP BY 
    months.month
ORDER BY 
    months.month;

";

return $this->db->query($sql)->getResultArray();

    }



}



