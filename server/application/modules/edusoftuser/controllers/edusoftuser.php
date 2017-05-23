<?php

/**
 * @property  edusoftuser_model $edusoftuser_model
 */
class edusoftuser extends REST_Controller
{

    private $currentuser;

    function __construct()
    {
        parent::__construct();
        $this->load->model('edusoftuser_model');
        $this->load->library("Datatables");
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->load->library('phpmailer');
        $this->currentuser = $this->session->all_userdata();

        //     $this->checkOnline();
    }

    function courseList_GET()
    {
//        var_dump($this->currentuser['user_role']->loginId);
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->edusoftuser_model->CourseList($this->currentuser['user_role']->loginId);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(false, 404);

            }
        } else {
            $this->response("Session Timeout.", 503);
        }

    }

    function videoList_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->edusoftuser_model->VideoList($this->currentuser['user_role']->loginId);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(false, 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function userDetails_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->edusoftuser_model->userDetails($this->currentuser['user_role']->loginId);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(false, 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function updateUserDetails_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data['FirstName'] = $this->post('FirstName');
            $data['MiddleName'] = $this->post('MiddleName');
            $data['LastName'] = $this->post('LastName');
            $data['MobileNo'] = $this->post('MobileNo');
            $data['JoiningOn'] = $this->post('JoiningOn');
            $data['Address'] = $this->post('Address');
            $data['Summary'] = $this->post('Summary');
            $data = $this->edusoftuser_model->updateUserDetails($data, $this->currentuser['user_role']->loginId);
            if ($data) {
                $this->response(true, 200);
            } else {
                $this->response(false, 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function subscriptions_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = $this->edusoftuser_model->subscription($this->currentuser['user_role']->loginId);
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(false, 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function presentationList_GET()
    {
//        $this->output->enable_profiler(TRUE);
        if (@$this->currentuser['user_role']->loginId) {
            $data = false;
            $results = $this->edusoftuser_model->presntationList($this->currentuser['user_role']->loginId);
            if ($results) {
                $data = array();
                foreach ($results as $result) {
                    $CourseId = $this->encrypt->encode($result->CourseId);
                    $ChapterId = $this->encrypt->encode($result->ChapterId);
                    $id = $this->encrypt->encode($result->Id);
                    $data[$CourseId]['course'] = $result->Course;
                    $data[$CourseId]['page'] = 'course';
                    $data[$CourseId]['coursePresentation'] = $result->coursePresentation != null ? true : false;
                    $data[$CourseId]['courseVideo'] = $result->courseVideo != null ? true : false;
                    if (!is_null($ChapterId)) {
                        $data[$CourseId]['chapter'][$ChapterId]['chapter'] = $result->ChapterName;
                        $data[$CourseId]['chapter'][$ChapterId]['page'] = 'chapter';
                        $data[$CourseId]['chapter'][$ChapterId]['chapterPresentation'] = $result->chapterPresentation != null ? true : false;
                        $data[$CourseId]['chapter'][$ChapterId]['chapterVideo'] = $result->chapterVideo != null ? true : false;
                    }
                    if (!is_null($id)) {
                        $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['Lesson'] = $result->LessonName;
                        $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['page'] = 'lesson';
                        $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['LessonPresentation'] = $result->LessonsPresentation != null ? true : false;
                        $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['LessonVideo'] = $result->LessonsVideo != null ? true : false;
                    }
                }
            }
//            $data = $this->encode($data, 'Id');
            if ($data) {
                $this->response($data, 200);
            } else {
                $this->response(false, 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function pdf_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $data = false;
            if ($this->get('page') == 'course') $data['pdf'] = $this->edusoftuser_model->coursePdf($this->encrypt->decode($this->get('id')), $this->currentuser['user_role']->loginId);
            else if ($this->get('page') == 'chapter') $data['pdf'] = $this->edusoftuser_model->chapterPdf($this->encrypt->decode($this->get('id')), $this->currentuser['user_role']->loginId);
            else if ($this->get('page') == 'lesson') $data['pdf'] = $this->edusoftuser_model->lessonPdf($this->encrypt->decode($this->get('id')), $this->currentuser['user_role']->loginId);
           /* if(@$data['pdf']->LessonId) {
                $data['next'] = $this->edusoftuser_model->nextprevPage($this->encrypt->decode($this->get('id')), $data['pdf']->LessonId);
                $data['next']->prev = $this->encrypt->encode($data['next']->prev);
                $data['next']->next = $this->encrypt->encode($data['next']->next);
            }*/
            if (@$data['pdf']) {
                $this->response($data, 200);
            } else {
                $this->response($this->encrypt->decode($this->get('id')), 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function encode($data, $var)
    {
        foreach ($data as $key => $value) {
            $data[$key]->$var = $this->encrypt->encode($value->$var);
        }
        return $data;
    }

    function askAnExpert_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            $email = $this->post('EmailId');
            $from = "info@edudoc.in";
            $name = $this->post('name');
            $subject = 'Mail from ' . $email;
            $body = $this->post('request');
//        $address=array('milind.phadtare@gmail.com');
            $address = array('info@edudoc.in');
            if ($this->edusoftuser_model->sendMail($from, $name, $subject, $body, $address)) {
                $this->response('Mail sent successfully', 200);
            } else {
                $this->response('Unable to send mail.', 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function nextprevPage_GET()
    {
        $presentationId = @$this->post('');
        $lessonId = @$this->post('');
        $result = $this->edusoftuser_model->nextprevPage($presentationId, $lessonId);
        if ($result) {

        }
    }

    function test_GET()
    {
//        if (@$this->currentuser['user_role']->loginId) {
        $data = false;
        $result = $this->edusoftuser_model->presntationList(1);
        if ($result) {
            $data = array();
            foreach ($result as $result) {
                $CourseId = $this->encrypt->encode($result->CourseId);
                $ChapterId = $this->encrypt->encode($result->ChapterId);
                $id = $this->encrypt->encode($result->Id);
                $data[$CourseId]['course'] = $result->ChapterName;
                $data[$CourseId]['page'] = 'course';
                $data[$CourseId]['coursePresentation'] = $result->coursePresentation != null ? true : false;
                $data[$CourseId]['courseVideo'] = $result->courseVideo != null ? true : false;
                if (!is_null($ChapterId)) {
                    $data[$CourseId]['chapter'][$ChapterId]['chapter'] = $result->ChapterName;
                    $data[$CourseId]['chapter'][$ChapterId]['page'] = 'chapter';
                    $data[$CourseId]['chapter'][$ChapterId]['chapterPresentation'] = $result->chapterPresentation != null ? true : false;
                    $data[$CourseId]['chapter'][$ChapterId]['chapterVideo'] = $result->chapterVideo != null ? true : false;
                }
                if (!is_null($id)) {
                    $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['Lesson'] = $result->LessonName;
                    $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['page'] = 'lesson';
                    $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['LessonPresentation'] = $result->LessonsPresentation != null ? true : false;
                    $data[$CourseId]['chapter'][$ChapterId]['Lessons'][$id]['LessonVideo'] = $result->LessonsVideo != null ? true : false;
                }
            }
        }
        if ($data) {
            $this->response($data, 200);
        } else {
            $this->response(false, 404);
        }
//        } else {
//            $this->response("Session Timeout.", 503);
//        }
    }

    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function comments_GET()
    {
        if (@$this->currentuser['user_role']->loginId) {
            if ($this->get('page') == 'course') $data['video'] = $this->edusoftuser_model->courseComments($this->encrypt->decode($this->get('id')));
            else if ($this->get('page') == 'chapter') $data['video'] = $this->edusoftuser_model->chapterComments($this->encrypt->decode($this->get('id')));
            else if ($this->get('page') == 'lesson') $data['video'] = $this->edusoftuser_model->lessonComments($this->encrypt->decode($this->get('id')));
//            var_dump($data['video']);
            if (@$data['video']) {
                $newArray['video'] = array_filter($data['video'], function ($video) {
                    return $video->position = $video->Id == $this->currentuser['user_role']->loginId ? 'right' : 'left';
                });
                $this->response($newArray, 200);
            } else {
                $this->response($this->encrypt->decode($this->get('id')), 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

    function comments_POST()
    {
        if (@$this->currentuser['user_role']->loginId) {
            if ($this->post('page') == 'course') $data['video'] = $this->edusoftuser_model->addCourseComments($this->encrypt->decode($this->post('id')), $this->currentuser['user_role']->loginId,$this->post('message'));
            else if ($this->post('page') == 'chapter') $data['video'] = $this->edusoftuser_model->addChapterComments($this->encrypt->decode($this->post('id')), $this->currentuser['user_role']->loginId,$this->post('message'));
            else if ($this->post('page') == 'lesson') $data['video'] = $this->edusoftuser_model->addLessonComments($this->encrypt->decode($this->post('id')), $this->currentuser['user_role']->loginId,$this->post('message'));
            if (@$data['video']) {
                $this->response($data, 200);
            } else {
                $this->response($this->encrypt->decode($this->get('id')), 404);
            }
        } else {
            $this->response("Session Timeout.", 503);
        }
    }

}


?>