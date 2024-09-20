<?php

namespace App\Controllers;
use App\Models\BulkinsertModel;
use App\Models\UseraccountsModel;
use App\Models\SessionModel;
use App\Models\RolesModel;
use App\Models\RaffleentryModel;
use App\Models\PrizeredeemModel;
use App\Models\SerialnumberModel;
use App\Models\DrawsModel;
use App\Models\MasterModel;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




class Home extends BaseController
{

 protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        $this->data['session'] = $this->session;
        $this->bulkinsert = new BulkinsertModel();
        $this->session = \Config\Services::session();
        helper('url');
        $this->session = session();

        
        $this->master = new MasterModel();
    }


public function exportToExcel()
{
    $fromdatesearch = $this->request->getPost('fromdatesearch');
    $todatesearch = $this->request->getPost('todatesearch');

    // Fetch data based on date range
    if (!empty($fromdatesearch) && !empty($todatesearch)) {
        $data = $this->master->getEnteries($fromdatesearch, $todatesearch);
    } else {
        // Handle the case where dates are not provided, e.g., return an error or all records
        $data = $this->master->getEnteries('1800-01-10','1800-01-01'); // Assuming you have a method to get all entries
    }

    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header row
    $sheet->setCellValue('A1', 'Date Entry');
    $sheet->setCellValue('B1', 'Time Entry');
    $sheet->setCellValue('C1', 'MSISDN');
    $sheet->setCellValue('D1', 'Serial Number');
    $sheet->setCellValue('E1', 'Ghana Card');
    $sheet->setCellValue('F1', 'Region');

    // Fill the spreadsheet with data
    $row = 2; // Start from the second row
    foreach ($data as $item) {
        $sheet->setCellValue('A' . $row, $item->dateEntry);
        $sheet->setCellValue('B' . $row, $item->timeEntry);
        $sheet->setCellValue('C' . $row, $item->msisdn);
        $sheet->setCellValue('D' . $row, $item->serialnumber);
        $sheet->setCellValue('E' . $row, $item->ghanacard);
        $sheet->setCellValue('F' . $row, $item->region);
        $row++;
    }

    // Set the filename and export
    $writer = new Xlsx($spreadsheet);
    $filename = 'EGL_data_export_' . date('Y-m-d_H-i-sA') . '.xlsx';

    // Set headers for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Save the file to output
    $writer->save('php://output');
    exit();
}

public function changepassword(){ 

$sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
            $data = [ 'logintoken' => $this->request->getVar('hashfinal') ];
            $id = ['id' => $this->checkSession()['id']]; 
            $result = $this->master->tableUpdate('useraccounts', $data, $id);
            $response = $this->processResponse($result,'Password');
            echo json_encode($response);

    } else {
        return $sessionResult;
    }  
}


    public function index(): string
    {
        return view('Index');
    }

    function Dashboard(){

// var_dump("helo"); die;
$sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
            $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         
        $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
        $data['token']=$this->checkSession()['token'];
        
        $role= $this->checkSession()['roleId'];
        
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
        
        // var_dump($role); die;

         $data['getdashboarddata'] = $this->master->getdashboarddata();
         $data['Graph'] = $this->master->getdashboarddataGraph();
         
         $data['avg_daily_entries'] = $this->master->avg_daily_entries();
         
         $data['head']="Usage Metrics";
          $data['subhead']="Overview";
         
         
          $data['roles'] = $this->master->getData('roles', array(),true);
          
          

        //   var_dump($data['pageMenuCheck']); die; 
        
          $data['content'] = view('Dashboard',$data);
         return view('Layout',$data);



         } else {
           return $sessionResult;
        }


        
        
    }

     function Verify(){


        $sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
         $data['roles'] = $this->master->getData('roles', array(),true);
         $data['head']="";
          $data['subhead']="";


$searchtype=$this->request->getPost('searchtype');
         $searchinfo=$this->request->getPost('searchinfo');
         



        if($searchtype==="Ghana Card"){

           
             $data['searchoutput'] = $this->master->getData('raffleentry', array('ghanacard' => $searchinfo), false);
             // var_dump($data['searchoutput']); die;
        }else if($searchtype==="Phone Number"){


            
            $data['searchoutput'] =$this->master->getData('raffleentry',array('msisdn'=> $searchinfo), false);

            // var_dump($data['searchoutput']); die;

        }else{
            $data['searchoutput']=$this->master->getData('raffleentry', array('dateEntry' => '1800-01-01'), false);
        }
 

 $role= $this->checkSession()['roleId'];
        
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
        
        
         $data['content'] = view('Verify',$data);
         return view('Layout',$data);
          


         } else {
           return $sessionResult;
        }


         
    }




function redemption(){

$sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
        $data = [
                    'winStatus' => 'W'
                ];
            $id = ['id' => $this->request->getVar('id')]; 
            $result = $this->master->tableUpdate('raffleentry', $data, $id);
            $notification = [
                'message'    => 'Redemption Successful',
                'alert-type' => 'success'
            ];
        $this->session->setFlashdata($notification);
        return redirect()->back();
    } else {
        return $sessionResult;
    }  
}
     function Draws(){

$data['head']="";
          $data['subhead']="";
        $sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
         $data['roles'] = $this->master->getData('roles', array(),true);
$datesearch=$this->request->getPost('datesearch');
        if($datesearch!=""){
             $data['searchoutput'] = $this->master->getData('draws', array('drawdate' => $datesearch), false);
        }else{
            $data['searchoutput']=$this->master->getData('draws', array('drawdate' => '1900-01-01'), false);
        }
        
        
         $role= $this->checkSession()['roleId'];
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
        
        
         $data['content'] = view('Draws',$data);
         return view('Layout',$data);
          


         } else {
           return $sessionResult;
        }




        
    }

    

    function UploadData(){
        $sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
         $data['roles'] = $this->master->getData('roles', array(),true);
         

        $this->deleteTable();
         $data['roles'] = $this->master->getData('roles', array(),true);
         $data['head']="";
          $data['subhead']="";
          
          
           $role= $this->checkSession()['roleId'];
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);

         $data['content'] = view('Upload');
         
         return view('Layout',$data);
         
} else {
           return $sessionResult;
        }
    }
    function Enteries(){

        $sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
        
        $data['head']="";
          $data['subhead']="";
          
$fromdatesearch=$this->request->getPost('fromdatesearch');
         $todatesearch=$this->request->getPost('todatesearch');

        if($fromdatesearch!="" && $todatesearch!=""){
             $data['searchoutput'] = $this->master->getEnteries( $fromdatesearch, $todatesearch);
             $data['searchdatefrom']=$fromdatesearch;
             $data['searchdateto']=$todatesearch;
        }else{
            $data['searchoutput']=$this->master->getEnteries('1800-01-10','1800-01-01');
            $data['searchdatefrom']='';
             $data['searchdateto']='';
        }
 $data['roles'] = $this->master->getData('roles', array(),true);
 
  $role= $this->checkSession()['roleId'];
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
        
         $data['content'] = view('Enteries',$data);
         return view('Layout',$data);
          


         } else {
           return $sessionResult;
        }


         
    }

function Preview(){
    
    

    $sessionResult = $this->checkSession();
        if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];

         $data['serialnumbertemp'] = $this->master->getData('serialnumberTemp', array(),false);
         
        //  var_dump($data['serialnumbertemp']); die;
        $data['roles'] = $this->master->getData('roles', array(),true);
         $data['head']="";
          $data['subhead']="";
        
        
         $role= $this->checkSession()['roleId'];
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
        
         $data['content'] = view('Preview',$data);
         return view('Layout',$data);



         } else {
           return $sessionResult;
        }
    }

function submitEntries(){


        try {
            $this->master->moveRecords();
        //      
       return redirect()->to('Upload')->with('message', 'Enteries Submited Successful')->with('alert-type', 'success');

        } catch (\Exception $e) {

 $notification = [
                'message'    => 'This Serial Numbers Already Exist',
                'alert-type' => 'error'
            ];
        $this->session->setFlashdata($notification);
             return redirect()->back();
            // return redirect()->to('/error')->with('message', 'An error occurred: ' . $e->getMessage());
        }

}

     function Roles(){
       $sessionResult = $this->checkSession();
        if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
        
        
        $data['head']="Role Management";
          $data['subhead']="Overview";
          
          
         $data['roles'] = $this->master->getData('roles', array(),true);

        //  $data['roles'] = $this->master->getData('roles', array(),false);

          $results = $this->master->getData('roles', array(), false);
            foreach ($results as &$result) {
                $result->tablename = 'roles'; 
            }
            
            
             $role= $this->checkSession()['roleId'];
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
            $data['Allroles']=$results;
        $data['content'] = view('Roles',$data);
        return view('Layout',$data);

         } else {
           return $sessionResult;
        }
    }

  function Users(){
       $sessionResult = $this->checkSession();
        if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
        
        $data['head']="User Management";
          $data['subhead']="Overview";

        
          $results = $this->master->getData('useraccounts', array(), false);
            foreach ($results as &$result) {
                $result->tablename = 'useraccounts'; 
            }
            $data['users']=$results;
            
            $data['roles'] = $this->master->getData('roles', array(),true);
            
            
             $role= $this->checkSession()['roleId'];
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
        
        
        
        $data['content'] = view('Users',$data);
        return view('Layout',$data);

         } else {
           return $sessionResult;
        }
    }
    
    function showRoomEnterRecord(){
       $sessionResult = $this->checkSession();
        if (is_array($sessionResult)) {
        $id = $this->checkSession()['id'];
        $branchId=$this->checkSession()['branchId'];
        $data['userType']=$this->checkSession()['userType'];
        $data['fulname']=$this->checkSession()['fulname'];         $data['email']=$this->checkSession()['email'];         $data['token']=$this->checkSession()['token'];         $data['token']=$this->checkSession()['token'];
        
        $data['head']="Serial Numbers Management";
          $data['subhead']="Overview";

        
          $results = $this->master->getData('useraccounts', array(), false);
            foreach ($results as &$result) {
                $result->tablename = 'useraccounts'; 
            }
            $data['users']=$results;
            
            $data['roles'] = $this->master->getData('roles', array(),true);
            
             $role= $this->checkSession()['roleId'];
        $data['pageMenuCheck'] = $this->master->getData('roles', array('id'=>$role),false);
        
        
        
        $data['content'] = view('showRoomEnterRecord',$data);
        return view('Layout',$data);

         } else {
           return $sessionResult;
        }
    }
 
function ShowRoomSave(){
    //  $serialNo= $this->request->getPost('serialNo');
//   echo $serialNo;
    
     $sessionResult = $this->checkSession();
        if (is_array($sessionResult)) {
            $tableName = 'serialnumber';
            $data = [
                    'serialnumber' => $this->request->getPost('serialNo'),
                    'status'=>'A'
                   ];
                  
                   
                  $where = ['serialnumber' => $this->request->getPost('serialNo')];
                  $result = $this->master->checkCreate($tableName, $data, $where);
                  $response = $this->processResponse($result,"Serial Number(s)");
                  echo json_encode($response);
        } else {
           return $sessionResult;
        }
        
        
  
}
function NewRole(){
     $sessionResult = $this->checkSession();
        if (is_array($sessionResult)) {
            $tableName = 'roles';
            $data = [
                    'rolename' => $this->request->getPost('rolename'),
                    'serialnumber' => $this->request->getPost('serialnumber'),
                    'reports' => $this->request->getPost('reports'),
                    'draws' => $this->request->getPost('draws'),
                    'user_management' => $this->request->getPost('user_management'),
                    'show_room_management'=>$this->request->getPost('show_room_management'),
                    'rolestatus' => 1,
                    'createdon' => date('Y-M-d H:i:sa'),
                    'createdby'=>$this->checkSession()['id']
                   ];
                   $where = ['rolename' => $this->request->getPost('rolename')];
                   $result = $this->master->checkCreate($tableName, $data, $where);
                   $response = $this->processResponse($result,'Role');
                   echo json_encode($response);
        } else {
           return $sessionResult;
        }
}

function UpdateRole(){
 $sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
        $data = [
                    'rolename' => $this->request->getPost('rolename'),
                    'serialnumber' => $this->request->getPost('serialnumber'),
                    'reports' => $this->request->getPost('reports'),
                    'draws' => $this->request->getPost('draws'),
                    'user_management' => $this->request->getPost('user_management'),
                    'show_room_management'=>$this->request->getPost('show_room_management'),
                    'lastupdatedon'=>date('Y-M-d H:i:sa'),
                ];
            $where = ['rolename' => $this->request->getVar('rolename')];
            $id = ['id' => $this->request->getVar('id')]; 
            $oldname=$this->request->getVar('rolenameold'); 

            if($oldname===$this->request->getPost('rolename')){
                    $result = $this->master->tableUpdate('roles', $data, $id);
            }else{
                $result = $this->master->checkUpdate('roles', $data, $where, $id);
            }
            $response = $this->processResponse($result,'Role');
            echo json_encode($response);
    } else {
        return $sessionResult;
    }
        
    }


function NewUser(){
     $sessionResult = $this->checkSession();
        if (is_array($sessionResult)) {
            $tableName = 'useraccounts';
            $data = [
                    'useremail' => $this->request->getPost('useremail'),
                    'phonenumber' => $this->request->getPost('phonenumber'),
                    'roleid' => $this->request->getPost('roleid'),
                    'sex' => $this->request->getPost('sex'),
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'logintoken'=>hash('sha512', $this->request->getVar('useremail') . $this->request->getVar('phonenumber')),
                    'accountstatus' => 1,
                    'createdon' => date('Y-M-d H:i:sa'),
                    'createdby'=>$this->checkSession()['id']
                   ];
                   $where = ['useremail' => $this->request->getPost('useremail')];
                   $result = $this->master->checkCreate($tableName, $data, $where);
                   $response = $this->processResponse($result,'User');
                   echo json_encode($response);
        } else {
           return $sessionResult;
        }
}




public function delete_data()
    {
       $deletedRows = $this->master->delete_data($this->request->getVar('tablename'), ['id' => $this->request->getVar('id')]);
       $notification = [
                'message'    => 'Delete Successful',
                'alert-type' => 'success'
            ];
        $this->session->setFlashdata($notification);
        return redirect()->back();
    }

function update_data(){

$sessionResult = $this->checkSession();
if (is_array($sessionResult)) {
        $data = [
                    $this->request->getVar('thevalueField') => $this->request->getPost('thevalue')
                ];
            $id = ['id' => $this->request->getVar('id')]; 
            $result = $this->master->tableUpdate($this->request->getVar('tablename'), $data, $id);
            $notification = [
                'message'    => 'Update Successful',
                'alert-type' => 'success'
            ];
        $this->session->setFlashdata($notification);
        return redirect()->back();
    } else {
        return $sessionResult;
    }
        

            
       
}



 public function upload()
    {
        $data['head']="";
          $data['subhead']="";
        $this->createTable();
        $file = $this->request->getFile('excel_file');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = $file->getRealPath();
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();
            array_shift($data); // Remove header row if present
            
            // Connect to the database
            $db = \Config\Database::connect();
            $builder = $db->table('serialnumberTemp');

            // Empty the table before inserting new data
            $builder->emptyTable(); 

            // Prepare data for bulk insert
            $insertData = [];
            foreach ($data as $row) {
                $insertData[] = [
                    'serialnumber' => $row[0],
                    'status'=>'A'
                    // 'stock' => $row[1],
                    // 'bills' => $row[2],
                    // 'bond' => $row[3],
                    // Add more columns as needed
                ];
            }

            // Perform bulk insert
            if (!empty($insertData)) {
                $builder->insertBatch($insertData);
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data Uploaded successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'No data to insert']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid file']);
        }
    }


//     public function bulkInsert()
// {
//     $data = $this->request->getJSON(true); // Get JSON data from request
//     return 


//     if (is_array($data) && !empty($data)) {
//         $db = \Config\Database::connect();
//         $builder = $db->table('bulkinsert');

//         $insertData = [];
//         foreach ($data as $row) {
//             if (count($row) === 4) { // Adjust according to your table columns
//                 $insertData[] = [
//                     'year' => $row[0],
//                     'stock'  => $row[1],
//                     'bills'      => $row[2],
//                     'bond'=>$row[3]
//                 ];
//             }
//         }

//         $db->transStart();
//         if (!empty($insertData)) {
//             $builder->insertBatch($insertData); // Bulk insert
//         }
//         $db->transComplete();

//         if ($db->transStatus() === false) {
//             return $this->response->setJSON(['status' => 'error', 'message' => 'Error inserting data']);
//         } else {
//             return $this->response->setJSON(['status' => 'success', 'message' => 'Data inserted successfully']);
//         }
//     } else {
//         return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data']);
//     }
// }


// =======================================================================


public function validateLogin()
{
 $result = $this->master->validateLogin($this->request->getVar('username'),$this->request->getVar('token'));
 if (is_array($result) && !empty($result)) {
        // Set session data for validated user
            $user = $result[0];
            // Map SQL result to session array
            $sessArray = [
            'loginId' => $user['id'],
            'branchId' => $user['outletid'],
            'email' => $user['useremail'],
            'fulname' => $user['fname'] . ' ' . $user['lname'],
            'gender' => $user['sex'],
            'contact' => $user['phonenumber'],
            'location' => $user['outletid'],
            'userrole' => $user['roleid'],
            'userType' => $user['createdby'],
            'branchCode' => $user['outletid'],
            'token'=>$user['logintoken'],
            'roleId' => $user['roleid'],
            'session' => session_id()
           ];
            
            $this->session->set('electroland', $sessArray);
        return redirect()->to('Dashboard')->with('message', 'Welcome ' . session('electroland')['fulname']." To ElectroLand Ghana")->with('alert-type', 'success');
    } else {
         return redirect()->to('Index')->with('message', 'Wrong login credentials ')->with('alert-type', 'error');
    }


   

   
}


 public function Logout()
    {
        if (session()->has('electroland')) {
        $session_data = session('electroland');


        


    
        $session = session();

         $this->session->remove('electroland'); 
        $this->session->destroy(); // Destroy the session
        $session->setFlashdata('message', "Logout Successful");
        $session->setFlashdata('alert-type', "success");
        return redirect()->to('Index');







        }else{

        return redirect()->to('Index');
    }

    }






}
