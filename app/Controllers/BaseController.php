<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Main_model; 

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
     * @var array
     */
    protected $helpers = ['form','url','cookie', 'main'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();


        // OOP object oriented programming
        // Object, Class,

        date_default_timezone_set("Asia/Kolkata");



        $this->validation = \Config\Services::validation();
        $this->session    = \Config\Services::session();
        $this->db         = \Config\Database::connect();
        $this->pager      = \Config\Services::pager();

        $this->main_model = new Main_model();
        $this->session    = session();
        date_default_timezone_set('Asia/kolkata');
        $this->currentDate = date('Y-m-d H:i:s');
      
        if ($this->session->get('user_key')) 
        {   
            $this->userType = $this->session->get('user_type');
            $userKey = $this->session->get('user_key');
            $query = $this->main_model->getRowData("users","dashboard_type,approved,id","user_key='$userKey'");
            if ($query) 
            {
                $this->memberID = $query['id'];
                $this->accountStatus = $query['approved'];
                 $this->dashboardStatus = $query['dashboard_type'];
            }
        }
        else if(get_cookie('user_key'))
        {
            $this->userType = get_cookie('user_type');
            $user = get_cookie('user_key');
            $userKey = $this->session->get('user_key');
            $query = $this->main_model->getRowData("users","dashboard_type,approved,id","user_key='$user'");
            if ($query) 
            {
                $this->memberID = $query['id'];
                $this->accountStatus = $query['approved'];
                $this->dashboardStatus = $query['dashboard_type'];
            }
        }
    }

}
