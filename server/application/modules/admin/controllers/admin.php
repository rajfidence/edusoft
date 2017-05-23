<?php

/**
 * @property  admin_model $admin_model
 */
class admin extends REST_Controller
{

    private $currentuser;

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library("Datatables");
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->load->library('phpmailer');
        $this->currentuser = $this->session->all_userdata();
    }

    function packageList_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->admin_model->packageList();
            if ($data) {
                $this->response(json_decode($data), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function packageList_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->admin_model->packageList();
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function package_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $id = $this->encrypt->decode($this->get('Id'));
            $data['package'] = $this->admin_model->package($id);
            $course = $this->admin_model->selectedCourses($id);
            $data['course']=array();
            if($course){
                foreach ($course as $key=>$value){
                    $data['course'][$key]=$this->encrypt->encode($value->CourseId);
                }
            }
            if ($data['package']) {
                $this->response($data, 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function packageAdd_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $package = $this->post('Package');
            $course = $this->post('courses');
            $this->db->trans_start();
            $id=$this->admin_model->packagemasterAdd($package);
            $courses=array();
            foreach($course as $key=>$value){
                $courses[$key]['PackageId']=$id;
                $courses[$key]['CourseId']=$this->encrypt->decode($value);
            }
            $this->admin_model->packageAdd($courses);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->response(array('Error' => 'Unable to add package'), 400);
            } else {
                $this->db->trans_complete();
                $this->response(array('Success' => 'Package added successfully',), 200);
            }

        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function packageUpdate_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $package = $this->post('Package');
            $course = $this->post('courses');
            $courses=array();
            $this->db->trans_start();
            $id = $this->encrypt->decode($this->post('Id'));
            $this->admin_model->packagemasterUpdate($id, $package);
            $this->admin_model->packageCourseDelete($id);
            foreach($course as $key=>$value){
                $courses[$key]['PackageId']=$id;
                $courses[$key]['CourseId']=$this->encrypt->decode($value);
            }

            $this->admin_model->packageAdd($courses);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->response(array('Error' => 'Unable to add package'), 400);
            } else {
                $this->db->trans_complete();
                $this->response(array('Success' => 'Package added successfully',), 200);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function courseList_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->admin_model->CourseList();
            if ($data) {
                $this->response(json_decode($data), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function courseList_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->admin_model->Courses();
            if ($data) {
                $this->response($this->encodeData($data, 'Id'), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function course_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $id = $this->encrypt->decode($this->get('Id'));
            $data = $this->admin_model->Course($id);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function courseAdd_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->post('course');
            $data = $this->admin_model->Course($data);
            if ($data) {
                $this->response(json_decode($data), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function courseUpdate_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->post('course');
            $id = $this->encrypt->decode($this->post('Id'));
            $data = $this->admin_model->courseUpdate($id, $data);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function chapterList_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->admin_model->chapterList();
            if ($data) {
                $this->response(json_decode($data), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function chapterList_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $id = $this->encrypt->decode($this->get('Id'));
            $data = $this->admin_model->chapters($id);
            if ($data) {
                $this->response($this->encodeData($data, 'Id'), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function chapter_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $id = $this->encrypt->decode($this->get('Id'));
            $data = $this->admin_model->chapter($id);
            if ($data) {
                $this->response($this->encodeData($data, 'CourseId'), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function chapterAdd_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->post('chapter');
            $data['CourseId']=$this->encrypt->decode($data['CourseId']);
            $data = $this->admin_model->chapterAdd($data);
            if ($data) {
                $this->response(json_decode($data), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function chapterUpdate_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->post('chapter');
            $data['CourseId']=$this->encrypt->decode($data['CourseId']);
            $id = $this->encrypt->decode($this->post('Id'));
            $data = $this->admin_model->chapterUpdate($id, $data);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function lessonList_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->admin_model->lessonList();
            if ($data) {
                $this->response(json_decode($data), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function lessonList_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $id = $this->encrypt->decode($this->post('Id'));
            $data = $this->admin_model->lesson($id);
            if ($data) {
                $this->response($this->encodeData($data, 'Id'), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function lesson_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $id = $this->encrypt->decode($this->get('Id'));
            $data = $this->admin_model->lesson($id);
            if ($data) {
                $this->response($this->encodeData($data, array('CourseId','ChapterId')), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function lessonAdd_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->post('lesson');
            unset($data['CourseId']);
            $data['ChapterId']=$this->encrypt->decode($data['ChapterId']);
            $data = $this->admin_model->lessonAdd($data);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function lessonUpdate_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->post('lesson');
            unset($data['CourseId']);
            $data['ChapterId']=$this->encrypt->decode($data['ChapterId']);
            $id = $this->encrypt->decode($this->post('Id'));
            $data = $this->admin_model->lessonUpdate($id, $data);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function encodeData($data, $field)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_array($field)) {
                    foreach ($field as $field) {
                        $value->$field = $this->encrypt->encode($value->$field);
                    }
                } else {
                    $value->$field = $this->encrypt->encode($value->$field);
                }
                $data[$key] = $value;
            }
            return $data;
        } else if (is_object($data)) {
            if (is_array($field)) {
                foreach ($field as $field) {
                    $data->$field = $this->encrypt->encode($data->$field);
                }
            }else{
                $data->$field = $this->encrypt->encode($data->$field);
            }
            return $data;
        }
        return false;
    }

    function users_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $id = $this->encrypt->decode($this->get('Id'));
            $data = $this->admin_model->chapter($id);
            if ($data) {
                $this->response($this->encodeData($data, 'CourseId'), 200);
            } else {
                $this->response('No Data Found', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

}
