<?php
/*
Author: Daniel Gutierrez
Date: 9/18/12
Version: 1.0
*/
class User_model extends CI_Model{
	
	var $table = "user";
	
	function __construct(){
		parent::__construct();
        $this->load->library('phpmailer');
	}
	
	function signin($data){
        $data['user_det.password']=md5($data['user_det.password']);
        $this->db->select('user_det.id,user_det.f_name,user_det.l_name,keys.key');
        $this->db->from('user_det');
        $this->db->join('keys','keys.id=user_det.api_key');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : false;
	}

    function validate_user($data){
        $data['user.Password']=md5($data['user.Password']);
        $this->db->select('user.FirstName,
                          user.LastName,
                          user.MobileNo,
                          user.EmailId AS email_id,
                          "{}" AS UserModuleAccess,
                          keys.key AS API_KEY,
                          user.Id AS loginId');
        $this->db->from('user');
        $this->db->join('keys','keys.id = user.KeyId');
        $this->db->where($data);
        $query = $this->db->get();
        if($query->num_rows() === 1){
            return $query->row();
        }else{
            return false;
        }
    }

    function userverifiction($username) {
        $this->db->select('user.EmailId, keys.key as API_KEY');
        $this->db->from('user');
        $this->db->join('keys','keys.id = user.KeyId');
        $this->db->where('EmailId',$username);
        $query = $this->db->get();
        if($query->num_rows() ===1){
            return $query->row();
        }else{
            return false;
        }
    }

    function updatepasswordkey($rand, $username){
        $this->db->where('EmailId',$username);
        return $this->db->update('user', $rand);
    }

    function sendMail($from, $name, $subject, $body, $address = false, $AddBCC = false, $attachment = false, $path = '')
    {
        try {
            $body = preg_replace('/\\\\/', '', $body);                          //Strip backslashes
            $this->phpmailer->IsSMTP();                                         // tell the class to use SMTP
            $this->phpmailer->SMTPDebug = 1;                                    // debugging: 1 = errors and messages, 2 = messages only
            $this->phpmailer->SMTPAuth = true;                                  // enable SMTP authentication
            $this->phpmailer->SMTPSecure = "ssl";                               // SSL
            $this->phpmailer->Port = 465;                                       // Port
            $this->phpmailer->Host = "smtpout.asia.secureserver.net";           // SMTP server
            $this->phpmailer->Username = "info@edudoc.in";                      // SMTP server username
            $this->phpmailer->Password = "anay1234";                            // SMTP server password
            $this->phpmailer->From = $from;
            $this->phpmailer->FromName = $name;
            if ($address) {
                foreach ($address as $address) {
                    $this->phpmailer->AddAddress($address);
                }
            }
            if ($AddBCC) {
                foreach ($AddBCC as $AddBCC) {
                    $this->phpmailer->AddAddress($AddBCC);
                }
            }
            if ($attachment) {
                foreach ($attachment as $attachment) {
                    $this->phpmailer->AddAttachment($path . $attachment, $attachment);
                }
            }
            //$this->phpmailer->AddBCC('rakesh@orionlabs.in');
            //$this->phpmailer->AddBCC('girish@orionlabs.in');


            $this->phpmailer->Subject = $subject;

            $this->phpmailer->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
            //$this->phpmailer->WordWrap   = 80; // set word wrap

            $this->phpmailer->MsgHTML($body);

            $this->phpmailer->IsHTML(true); // send as HTML

            $this->phpmailer->Send();
            return true;
            //header("location:3cube_marine/contact_us.php");
        } catch (phpmailerException $e) {
            echo $e->errorMessage();
            return false;
        }
    }

    function newpasswordupdate($resetid, $password) {
        $data['Password'] = md5($password);
        $this->db->where('ChangePasswordKey',$resetid);
        $query = $this->db->update('user',$data);
        if($query) {
            return true;
        }else{
            return false;
        }

    }

    function setpasswordkey($resetid) {
        $this->db->set('ChangePasswordKey',NULL);
        $this->db->where('ChangePasswordKey',$resetid);
        return $this->db->update('user');
        
    }

    function changekeystatus($resetid) {
        $this->db->select('ChangePasswordKey');
        $this->db->from('user');
        $this->db->where('ChangePasswordKey',$resetid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}

?>