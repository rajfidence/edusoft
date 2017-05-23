<?php

/**
 * Class company
 *
 * @property profile_model $profile_model
 */
class profile extends REST_Controller
{

    private $currentuser;
    private $UserAccess;
    private $CandidateData;
    private $ApptData;
    private $uploadData = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->library("Datatables");
        $this->load->library('encrypt');
        $this->load->library('form_validation');

    }

    /**
     * @purpose : provides data for Medical Profiles
     * @author  : sonali
     * @Date    : 19/1/2016
     */
    function ListMedicalProfiles_POST()
    {
        $currentuser = $this->session->userdata('user_role');
        if ($currentuser) {
            $co_id = $currentuser->co_id;
            if ($this->profile_model->validate_companyId($co_id)) {
                $data['ProfileList'] = $this->profile_model->ProfileList($co_id);
                if ($data['ProfileList']) {
                    $this->response(json_decode($data['ProfileList']), 200);
                } else {
                    $this->response('No Data Found', 404);
                }
            } else {
                $this->response('No company with this Id exists', 403);
            }
        } else {
            $this->response('Server Session Closed Unexpectedly',503);
        }
    }

    /**
     * Profile Details
     *
     * @author Rashmin Kawatkar
     * @date   : 09-06-16
     */
    function profileList_POST()
    {
        $testData = $this->profile_model->get_linked_tests();
        $candidateData = array();
        if ($profileId = $this->post('profileId')) {
            $candidateData = $this->profile_model->selectedProfile($this->encrypt->decode($profileId));
        }
        $profileTests = array();
        if ($testData) {
            $profileTests['ProfileDetail'] = $candidateData;
            foreach ($testData as $key => $value) {
                $profileTests['TestList'][$value->cat_name][$key]['test_name'] = $value->test_name;
                $profileTests['TestList'][$value->cat_name][$key]['test_id'] = $value->test_id;
                if (@$candidateData->SelectedTests) {
                    if (in_array($value->test_id, json_decode($candidateData->SelectedTests))) $profileTests['TestList'][$value->cat_name][$key]['Selected'] = true;
                }
            }
        }
        $this->response($profileTests, 200);
    }

    function profileExists_GET()
    {
        $currentUser  = $this->session->all_userdata();

        $profile['Profile_name'] = $this->get('profileName');
        $profile['Co_id'] = $currentUser['user_role']->co_id;
        $profile['void'] = 0;
        $profileId = $this->profile_model->profileExists($profile);
        if ($profileId) $this->response(array('profileId' => $this->encrypt->encode($profileId->Profile_id)), 200);
        else $this->response(array('success' => false), 404);
    }

    function addProfile_POST()
    {
        $currentUser  = $this->session->all_userdata();
        $profile = $this->post('profileDetails');
        $profile['Co_id'] = $currentUser['user_role']->co_id;
        $lid = $currentUser['user_role']->loginId;
        $result = $this->profile_model->addProfile($profile);
        $ntype = 7; // notification type
        $this->profile_model->callProcedureNotification($result,$ntype,$profile['Co_id'],$lid);
        if ($result)
        {
            $this->response(array('success' => true), 200);
        }

        else $this->response(array('success' => false), 403);
    }

    function editProfile_POST()
    {
        $currentUser  = $this->session->all_userdata();
        $profileId = $this->encrypt->decode($this->post('profileId'));
        $profile = $this->post('profileDetails');
        $profile['Co_id'] = $currentUser['user_role']->co_id;
        $lid =  $currentUser['user_role']->loginId;

        $result = $this->profile_model->editProfile($profileId,$profile);
        $ntype = 18;
        $this->profile_model->callProcedureNotification($profileId,$ntype,$profile['Co_id'],$lid);
        if ($result)
            $this->response(array('success' => true), 200);
        else $this->response(array('success' => false), 403);
    }

    function deleteProfile_DELETE($profileId)
    {
        if ($this->profile_model->deleteProfile($this->encrypt->decode($profileId))) $this->response(array('success' => true), 200);
        else $this->response(array('success' => false), 403);
    }
}

?>