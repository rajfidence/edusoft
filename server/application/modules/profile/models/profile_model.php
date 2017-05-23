<?php

class profile_model extends CI_Model
{

    function validate_companyId($co_id)
    {
        $this->db->select('com_name');
        $this->db->from('comp_login');
        $this->db->where('id', $co_id);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? true : false;
    }

    /**
     * functions to fetch profile list
     *
     * @author : sonali
     *         Date: 19/1/2016
     */
    function ProfileList($co_id)
    {
        $this->load->library('Datatables');
        $this->datatables->select('CONCAT(IFNULL(`tbl_doctorlist`.`FirstName`,"")," ",IFNULL(`tbl_doctorlist`.`MiddelName`,"")," ",IFNULL(`tbl_doctorlist`.`LastName`,"")) AS dr_name,
                           tbl_profilemaster.Profile_id as profile_id,
         				   tbl_profilemaster.Profile_name,
         				   tbl_profilemaster.Profile_desc,
                           CONCAT(tbl_profilemaster.Age_from,"-",tbl_profilemaster.Age_to) as profile_age,
                           DATE_FORMAT(tbl_profilemaster.CreatedDateTime,"%m-%d-%Y") as CreatedDateTime,
                           tbl_profilemaster.EditedDateTime', false)
            ->from('tbl_profilemaster')
            ->join('comp_login','comp_login.id=tbl_profilemaster.Co_id')
            ->join('tbl_coclinicref','comp_login.id=tbl_coclinicref.Co_id')
            ->join('tbl_doctorlist','tbl_doctorlist.Id=tbl_coclinicref.doctor_id')
            ->where('tbl_profilemaster.Co_id', $co_id)
            ->where('tbl_profilemaster.void', 0)
            ->edit_column('profile_id', '@encode1', 'profile_id');
           // ->add_column('view', '<a class="label label-default" ui-sref="app.editprofile({profileId:\'@encode1\'})"><i class="fa fa-pencil"></i></a>&nbsp;<a class="label label-danger" ng-click="deleteProfile(\'@encode1\')"><i class="fa fa-times"></i></a>','Profile_id');
             return $this->datatables->generate();
    }

    /**
     * Profile Page Dynamic Test Names
     * @Author: Dinesh
     */
    function get_linked_tests()
    {
        $this->db->select('tbl_testmaster.test_name,tbl_testmaster.cat_id,tbl_testmaster.test_id,tbl_testcategory.cat_name');
        $this->db->from('tbl_testmaster');
        $this->db->join('tbl_testcategory','tbl_testmaster.cat_id = tbl_testcategory.cat_id');
        $this->db->where('tbl_testmaster.cat_id NOT IN (2,8,9,12,13,14,15,16,17,20)');
        $this->db->where('tbl_testmaster.Active',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();

        } else {
            return false;
        }
    }

    function selectedProfile($profileId){
        $this->db->select('Profile_name,Profile_desc,SelectedTests,Age_from,Age_to,sex,Base_rate');
        $this->db->from('tbl_profilemaster');
        $this->db->where('tbl_profilemaster.Profile_id',$profileId);
        $this->db->where('tbl_profilemaster.void',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }
    }
    function profileExists($profile){
        $this->db->select('Profile_id');
        $this->db->from('tbl_profilemaster');
        $this->db->where($profile);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return false;
        }
    }

    function addProfile($profile){
        $query = $this->db->insert('tbl_profilemaster',$profile);
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    function editProfile($profileId,$profile){
        $this->db->where('Profile_id',$profileId);
        return $this->db->update('tbl_profilemaster',$profile);
    }
    function deleteProfile($profileId){
        $data['void']=1;
        $this->db->where('Profile_id',$profileId);
        return $this->db->update('tbl_profilemaster',$data);
    }

    function callProcedureNotification($id,$ntype,$co_id,$lid) {
        $this->db->query("CALL notification_procedure($id,$ntype,$co_id,$lid)");
    }

}

?>