<?php

class edusoftuser_model extends CI_Model
{

    function UniqueKey($UniqueKey)
    {
        $this->db->select('user_appoint.id AS appt_id,
				  user_appoint.ref_no AS ref_no,
		          user_appoint.final_result AS status,
				  user_det.pass_no AS pass_no,
				  user_appoint.cdc AS cdc,
				  comp_login.com_name AS com_name,
				  tbl_rank.rank AS rank_name,
				  tbl_vesselmaster.vessel_name AS vessel_name,
				  tbl_typeofmedical.purpose AS purpose,	 
				  user_det.f_name AS FirstName,
				  user_det.m_name AS MiddleName,
				  user_det.l_name AS LastName,
				  user_det.dob AS DOB,
				  user_appoint.ApptDateTime AS date_of_appt,
				  user_appoint.dr_comments AS Remarks,
				  Clinic_name AS Clinic,
				  ClinicCase AS ClinicCase,
				  tbl_profilemaster.Profile_name,
				  tbl_profilemaster.Profile_desc,
				  tbl_profilemaster.Uploads,
				  user_appoint.report_url as ReportUrl');
        $this->db->from('user_det');
        $this->db->join('user_appoint', 'user_appoint.u_id = user_det.id');
        $this->db->join('tbl_rank', 'user_appoint.rank = tbl_rank.rank_id');
        $this->db->join('tbl_typeofmedical', 'tbl_typeofmedical.Id = user_appoint.purpose');
        $this->db->join('comp_login', 'comp_login.id = user_appoint.comp_id');
        $this->db->join('tbl_vesselmaster', 'tbl_vesselmaster.id = user_appoint.vessel');
        $this->db->join('tbl_clinic_list', 'tbl_clinic_list.Id = user_appoint.ClinicId');
        $this->db->join('tbl_profilemaster', 'user_appoint.Profile_id = tbl_profilemaster.Profile_id');
        $this->db->where('user_appoint.void', 0);
        $this->db->where('user_appoint.UniqueKey', $UniqueKey);

        $query = $this->db->get();
        return $query->result();
    }

    function ReportUpload($ImageDetails, $UniqueKey)
    {
        $data = array('report_url' => $ImageDetails);
        $this->db->where('UniqueKey', $UniqueKey);
        return $this->db->update('user_appoint', $data);
    }

    function CandidateNotes($update, $UniqueKey)
    {
        $this->db->where('UniqueKey', $UniqueKey);
        return $this->db->update('user_appoint', $update);
    }

    function status()
    {
        $this->db->select('*');
        $this->db->from('pate_status');
        $this->db->order_by('status');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function MedFindings()
    {
        $this->db->select('*');
        $this->db->from('tbl_medfindingmaster');
        $this->db->order_by('MedFinding');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function CourseList($id)
    {
        $this->db->select('coursemaster.Course,coursemaster.Description');
        $this->db->from('coursemaster');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id= packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        $this->db->where('user_package.UserId', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function VideoList($id)
    {
        $this->db->select('lessons.LessonName,lessons.Description,videos.FileName');
        $this->db->from('videos');
        $this->db->join('lessons', 'videos.LessonId=lessons.Id');
        $this->db->join('chapter', 'chapter.Id=lessons.ChapterId');
        $this->db->join('coursemaster', 'coursemaster.Id=chapter.CourseId');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id=packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        $this->db->where('user_package.UserId', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function presntationList($id)
    {
        $this->db->select('coursemaster.Id AS CourseId, 
                           coursemaster.Course, 
                           coursemaster.Presentation AS coursePresentation, 
                           coursemaster.Video AS courseVideo, 
                           chapter.Id AS ChapterId, 
                           chapter.ChapterName, 
                           chapter.Presentation AS chapterPresentation, 
                           chapter.Video AS chapterVideo, 
                           lessons.Id, 
                           lessons.LessonName, 
                           lessons.Description, 
                           lessons.Presentation AS LessonsPresentation,
                           lessons.Video AS LessonsVideo');
//        $this->db->from('presentation');
//        $this->db->join('lessons', 'presentation.LessonId=lessons.Id');
        $this->db->from('coursemaster');
        $this->db->join('chapter', 'coursemaster.Id=chapter.CourseId','left');
        $this->db->join('lessons', 'chapter.Id=lessons.ChapterId','left');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id=packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        $this->db->where('user_package.UserId', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function userDetails($id)
    {
        $this->db->select('user.FirstName,
                          user.MiddleName,
                          user.LastName,
                          user.DateOfBirth,
                          user.EmailId,
                          user.MobileNo,
                          user.RegNo,
                          user.Address,
                          user.Summary');
        $this->db->from('user');
        $this->db->where('user.Id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function updateUserDetails($data,$id){
        $this->db->where('Id', $id);
        return $this->db->update('user',$data);
    }

    function subscription($id)
    {
        $this->db->select('coursemaster.Course,coursemaster.Description');
        $this->db->from('coursemaster');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id= packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        $this->db->where('user_package.UserId', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function pdf($id,$page,$userId){

        if($page='course') $this->db->select('presentation.LessonId,presentation.FileName,presentation.name,coursemaster.Course');
        if($page='presentation') $this->db->select('presentation.LessonId,presentation.FileName,presentation.name,coursemaster.Course');
        if($page='lesson') $this->db->select('presentation.LessonId,presentation.FileName,presentation.name,coursemaster.Course');
//        $this->db->from('presentation');
//        $this->db->join('lessons', 'presentation.LessonId=lessons.Id');
        $this->db->from('coursemaster');
        $this->db->join('chapter', 'coursemaster.Id=chapter.CourseId');
        $this->db->join('lessons', 'chapter.Id=lessons.ChapterId');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id=packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        if($page='course') $this->db->where('coursemaster.Id', $id);
        else if($page='presentation') $this->db->where('chapter.Id', $id);
        else if($page='lesson') $this->db->where('lessons.Id', $id);
        $this->db->where('user_package.UserId', $userId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function coursePdf($id,$userId){
        $this->db->select('coursemaster.Course AS name, coursemaster.Description, coursemaster.Presentation, coursemaster.Video');
        $this->db->from('coursemaster');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id=packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        $this->db->where('coursemaster.Id', $id);
        $this->db->where('user_package.UserId', $userId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function chapterPdf($id,$userId){
        $this->db->select('chapter.ChapterName AS name, chapter.Description, chapter.Presentation, chapter.Video');
        $this->db->from('chapter');
        $this->db->join('coursemaster', 'coursemaster.Id=chapter.CourseId');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id=packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        $this->db->where('chapter.Id', $id);
        $this->db->where('user_package.UserId', $userId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function lessonPdf($id,$userId){
        $this->db->select('lessons.LessonName AS name, lessons.Description, lessons.Presentation, lessons.Video');
        $this->db->from('lessons');
        $this->db->join('chapter', 'chapter.Id=lessons.ChapterId');
        $this->db->join('coursemaster', 'coursemaster.Id=chapter.CourseId');
        $this->db->join('packages', 'packages.CourseId=coursemaster.Id');
        $this->db->join('packagemaster', 'packagemaster.Id=packages.PackageId');
        $this->db->join('user_package', 'user_package.PackageId=packagemaster.Id');
        $this->db->where('lessons.Id', $id);
        $this->db->where('user_package.UserId', $userId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
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

    function nextprevPage($presentationId,$lessonId){
        $this->db->select('p2.id as prev, p.id As current, p1.id as next');
        $this->db->_protect_identifiers=false;
        $this->db->from('presentation AS p');
        $this->db->join('presentation AS p1', 'p1.id > p.id','left');
        $this->db->join('presentation AS p1a', 'p1a.id > p.id AND p1a.id < p1.id','left');
        $this->db->join('presentation AS p2', 'p2.id < p.id','left');
        $this->db->join('presentation AS p2a', 'p2a.id < p.id AND p2a.id > p2.id','left');
        $this->db->_protect_identifiers=true;
        $this->db->where('p.id',$presentationId);
        $this->db->where('p.LessonId',$lessonId);
        $this->db->where('p1a.id IS NULL');
        $this->db->where('p2a.id IS NULL');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    function courseComments($videoId){
        $this->db->select('user.Id, user.FirstName,user.LastName,user.DateOfBirth,user.EmailId,comments.Comment,UNIX_TIMESTAMP(comments.CommentDateTime) AS CommentDateTime, "app/img/user/02.jpg" AS avatar');
        $this->db->from('comments');
        $this->db->join('user','user.Id=comments.UserId');
        $this->db->where('CourseId',$videoId);
        $this->db->order_by('comments.CommentDateTime');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function chapterComments($videoId){
        $this->db->select('user.Id, user.FirstName,user.LastName,user.DateOfBirth,user.EmailId,comments.Comment,comments.CommentDateTime, "app/img/user/02.jpg" AS avatar\'');
        $this->db->from('comments');
        $this->db->join('user','user.Id=comments.UserId');
        $this->db->where('ChapterId',$videoId);
        $this->db->order_by('comments.CommentDateTime');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function lessonComments($videoId){
        $this->db->select('user.Id, user.FirstName,user.LastName,user.DateOfBirth,user.EmailId,comments.Comment,comments.CommentDateTime, "app/img/user/02.jpg" AS avatar\'');
        $this->db->from('comments');
        $this->db->join('user','user.Id=comments.UserId');
        $this->db->where('LessonId',$videoId);
        $this->db->order_by('comments.CommentDateTime');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function addCourseComments($videoId,$id,$message){
        $data['CourseId']=$videoId;
        $data['UserId']=$id;
        $data['Comment']=$message;
        return $this->db->insert('comments',$data);
    }
    function addChapterComments($videoId,$id,$message){
        $data['CourseId']=$videoId;
        $data['UserId']=$id;
        $data['Comment']=$message;
        return $this->db->insert('comments',$data);
    }
    function addLessonComments($videoId,$id,$message){
        $data['CourseId']=$videoId;
        $data['UserId']=$id;
        $data['Comment']=$message;
        return $this->db->insert('comments',$data);
    }
}

?>