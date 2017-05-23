<?php
/*
Author: Daniel Gutierrez
Date: 9/18/12
Version: 1.0
*/

/**
 * Class Users
 *
 * @property user_model $user_model         Company Model
 */
class Users extends REST_Controller
{
    private $currentuser;

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->currentuser = $this->session->all_userdata();
        //$this->load->library('migration');

        /*if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }*/
    }

    public function index_put()
    {
        echo 'Test';
    }

    function index_GET()
    {
        //$this->response($data);
        $data = array('id' => $this->get('id', true));
        //echo CI_VERSION;
    }

    function login_GET()
    {
        $user_email = $this->get('username');
        $password = $this->get('password');
        $data['userdata'] = $this->user_model->validate_user($user_email, $password);
        if ($data['userdata']) {
            $this->session->set_userdata('X-API_KEY', $data['userdata']->key);
            $this->session->set_userdata('UserDetails', $data['userdata']);
            $this->response(['APIKEY' => $data['userdata']->key,
                'UserDetails' => $this->session->all_userdata()], 200);
            
        } else {
            $this->response('Not Found', 404);
        }
    }


    function login_PUT()
    {
        $this->response([
            'returned from upload:' => 'Test',
        ]);
    }

    /**
     * User Login
     *
     * @author Rashmin
     * @date   23-12-15
     */
    function login_POST()
    {

        $login['user.EmailId'] = $this->post('username');
        $login['user.Password'] = $this->post('password');
        $user_details = $this->user_model->validate_user($login);
        if ($user_details) {
           // $this->config->set_item('sess_expiration', 10);
            
           // $this->session = new CI_Session();

            $data['logged_in'] = true;
            $data['user_role'] = $user_details;
            $currentuser = $this->session->userdata('user_role');
            $this->session->set_userdata($data);
            $SessionTime =$this->session->sess_expiration;
            $this->response(
                ['id' => $this->session->userdata('session_id'),
                    'user' => [
                        'id' => $this->session->userdata('session_id'),
                        'session' => $this->session->userdata('user_role'),
                        'role' => 'admin',
                        'user' => $user_details->FirstName . ' ' . $user_details->LastName,
                        'UserAccess' => $user_details->UserModuleAccess,
                        'key' => $user_details->API_KEY,
                        'lid' => $user_details->loginId,
                        'time'=>$SessionTime
                    ]]);
        } else {
            $this->response(false, 400);
        }

//        }
    }

    function testSession_GET()
    {
        $this->session->sess_destroy();
    }

    private function _is_logged_in()
    {
        if ($this->session->userdata('logged_in')) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Function for password recover
     * @Auther: Abhishek.k
     * Date:23-08-2016
     */
    
    function passwordRecovery_POST()
    {
        $username = $this->post('data');
        $verify = $this->user_model->userverifiction($username);
        if($verify) {
            $rand['ChangePasswordKey'] = uniqid();
            $this->user_model->updatepasswordkey($rand, $username);
            $from='demo@edudoc.in';
            $name='demo';
            $body='Please click on the link to change your password 
                   http://edusoft.edudoc.in/#/page/newpassword/'. $rand['ChangePasswordKey'] ;
            $subject='Password Reset';
            $address= array($username);
            $this->user_model->sendMail($from,$name, $subject, $body, $address);
            $this->response('Password Change Request Has Been Proceeds Please Check Your Mail',201);
        } else {
            $this->response('No User Found with this Email',404);
        }
    }
    
    function passwordUpdate_POST()
    {
        $resetid = $this->post('rid');
        $password = $this->post('newpass');
        $change = $this->user_model->newpasswordupdate($resetid, $password);
        if($change){
            $this->user_model->setpasswordkey($resetid);        // set password key to null after new password is set
            $this->response('Password Has Been Changed',200);
        } else {
            $this->response('Enable to change password',403);
        }
    }

    /*
     * Function for Password Key Status
     * @Author: Abhishek.k
     * Date: 07-11-2016
     */

    function passKeyStatus_GET() {
        $resetid = $this->get('rid');
        $result = $this->user_model->changekeystatus($resetid);
        if($result) {
            $this->response($result,200);
        } else {
            $this->response("Password Key is Expired.",404);
        }
    }
}

?>