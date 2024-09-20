<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\MasterModel;
use Config\Database;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    public function checkSession()
{
    if (session()->has('electroland')) {
        $session_data = session('electroland');
         return [
            'id' => $session_data['loginId'],
            'branchId' =>  $session_data['branchId'],
            'fulname' =>  $session_data['fulname'],
            'email' =>  $session_data['email'],
            'userrole' =>  $session_data['userrole'],
            'userType'=>$session_data['userType'],
            'roleId'=>$session_data['roleId'],
             'token'=>$session_data['token']  
            
            
        ];
    } else {
        return redirect()->to('Index');
    }
}

public function processResponse($result,$message) {
    // Processing based on $result value
    switch ($result) {
        case "exist":
            $response['message'] = $message." already exists.";
            $response['status'] = 401;
            $response['alertType'] = "info";
            break;
        case "failed":
            $response['message'] = "Action failed.";
            break;
        case "updated":
            $response['message'] = $message." updated successfully.";
            $response['status'] = 201;
            $response['alertType'] = "success";
            break;
        case "created":
            $response['message'] = $message." inserted successfully.";
            $response['status'] = 201;
            $response['alertType'] = "success";
            break;
        default:
            // Handle unexpected values
            $response['message'] = "Unexpected result: $result";
            $response['status'] = 500; // Internal server error
            $response['alertType'] = "error";
            break;
    }

    return $response;
}

function setFlashAndRedirect(string $message, string $alertType, string $redirectTo) {
    // Set session flash data
    $session = session();
    $session->setFlashdata('message', $message);
    $session->setFlashdata('alert-type', $alertType);

    // Redirect to the specified URL
    return redirect()->to($redirectTo);
}



public function createTable()
    {
        $forge = Database::forge();
        $fields = [
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'serialnumber' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'prize' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ];
        $forge->addField($fields);
        $forge->addPrimaryKey('id');
        $forge->createTable('serialnumberTemp', true);
    }

     public function deleteTable()
    {   
        $forge = Database::forge();
        $tableName = 'serialnumberTemp';
        $forge->dropTable($tableName, true);
    }
}
