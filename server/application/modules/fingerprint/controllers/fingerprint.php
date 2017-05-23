<?php

/**
 * Class company
 * @property fingerprint_model $fingerprint_model
 */
class fingerprint extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('fingerprint_model');
        $this->load->library("Datatables");
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->currentuser = $this->session->all_userdata();
    }

    function SaveFingerprint_POST(){
        $data['u_id']=$this->encrypt->decode($this->post('id'));
        $data['ANSI']=$this->post('AnsiTemplate');
        $data['BitmapData']=$this->post('BitmapData');
        $data['ISO']=$this->post('IsoTemplate');
        $data['ISOImage']=$this->post('IsoImage');
        $data['RawData']=$this->post('RawData');
        $data['WsqImage ']=$this->post('WsqImage');
        $data['Nfiq']=$this->post('Nfiq');
        $data['Quality']=$this->post('Quality');
        $id=$this->fingerprint_model->saveFingerprint($data);

        if($id){
            $this->response(array('success'=>true,'id'=>$id),200);
        }else{
            $this->response(array('success'=>false),400);
        }
    }

    function get_fingerprint_POST(){
        $result=$this->fingerprint_model->get_fingerPrints($this->encrypt->decode($this->post('id')));
        if($result){
            $this->response($result,200);
        }else{
            $this->response(array('success'=>false),400);
        }
    }

    
}

?>