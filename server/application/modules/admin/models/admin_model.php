<?php

class admin_model extends CI_Model
{

    /**
     * @return string
     */
    function packageList()
    {
        $this->load->library('Datatables');
        $this->datatables->select('packagemaster.Id, 
        packagemaster.PackageName, 
        packagemaster.Description, 
        packagemaster.Amount')
            ->from('packagemaster');
        $this->datatables->add_column('Id', '@encode1', 'Id');
        return $this->datatables->generate();
    }

    /**
     * @return string
     */
    function packages()
    {
        $this->db->select('packagemaster.Id, 
        packagemaster.PackageName')
            ->from('packagemaster');
        return $this->datatables->generate();
    }

    /**
     * @param $id
     * @return string
     */
    function package($id)
    {
        $this->db->select('packagemaster.PackageName, 
        packagemaster.Description,
        packagemaster.Amount')
            ->from('packagemaster')
            ->where('packagemaster.Id', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    /**
     * @param $data array
     * @return bool
     */
    function packagemasterAdd($data)
    {
        $this->db->insert('packagemaster', $data);
        return $this->db->insert_id();
    }

    /**
     * @param $id
     * @param $data array
     * @return bool
     */
    function packagemasterUpdate($id, $data)
    {
        $this->db->where('Id', $id);
        return $this->db->update('packagemaster', $data);
    }

    /**
     * @return string
     */
    function CourseList()
    {
        $this->load->library('Datatables');
        $this->datatables->select('coursemaster.Id, coursemaster.Course, coursemaster.Description')
            ->from('coursemaster');
        $this->datatables->add_column('Id', '@encode1', 'Id');
        return $this->datatables->generate();
    }

    /**
     * @return string
     */
    function Courses()
    {
        $this->db->select('coursemaster.Id, coursemaster.Course')
            ->from('coursemaster');
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    /**
     * @param $id
     * @return string
     */
    function Course($id)
    {
        $this->db->select('coursemaster.Course, 
        coursemaster.Description, 
        coursemaster.Presentation, 
        coursemaster.Video')
            ->from('coursemaster')
            ->where('coursemaster.Id', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    /**
     * @param $data array
     * @return bool
     */
    function courseAdd($data)
    {
        return $this->db->insert('coursemaster', $data);
    }

    /**
     * @param $id
     * @param $data array
     * @return bool
     */
    function courseUpdate($id, $data)
    {
        $this->db->where('Id', $id);
        return $this->db->update('coursemaster', $data);
    }

    /**
     * @return string
     */
    function chapterList()
    {
        $this->load->library('Datatables');
        $this->datatables->select('chapter.Id, coursemaster.Course, chapter.ChapterName, chapter.Description')
            ->from('chapter')
            ->join('coursemaster', 'coursemaster.Id=chapter.CourseId');
        $this->datatables->add_column('Id', '@encode1', 'Id');
        return $this->datatables->generate();
    }

    /**
     * @param $id
     * @return string
     */
    function chapters($id)
    {
        $this->db->select('chapter.Id, 
        chapter.ChapterName')
            ->from('chapter')
            ->where('chapter.CourseId', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    /**
     * @param $id
     * @return string
     */
    function chapter($id)
    {
        $this->db->select('chapter.CourseId, 
        chapter.ChapterName, 
        chapter.Description, 
        chapter.Presentation, 
        chapter.Video')
            ->from('chapter')
            ->join('coursemaster', 'coursemaster.Id=chapter.CourseId')
            ->where('chapter.Id', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    /**
     * @param $data array
     * @return bool
     */
    function chapterAdd($data)
    {
        return $this->db->insert('chapter', $data);
    }

    /**
     * @param $id
     * @param $data array
     * @return bool
     */
    function chapterUpdate($id, $data)
    {
        $this->db->where('Id', $id);
        return $this->db->update('chapter', $data);
    }

    /**
     * @return string
     */
    function lessonList()
    {
        $this->load->library('Datatables');
        $this->datatables->select('coursemaster.Id, coursemaster.Course, chapter.ChapterName, lessons.LessonName, lessons.Description')
            ->from('lessons')
            ->join('chapter', 'chapter.Id=lessons.ChapterId')
            ->join('coursemaster', 'coursemaster.Id=chapter.CourseId');
        $this->datatables->add_column('Id', '@encode1', 'Id');
        return $this->datatables->generate();
    }

    /**
     * @param $id
     * @return string
     */
    function lessons($id)
    {
        $this->db->select('coursemaster.Id,
        lessons.ChapterId,
        lessons.LessonName')
            ->from('lessons')
            ->join('coursemaster', 'coursemaster.Id=chapter.CourseId')
            ->where('lessons.ChapterId', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    /**
     * @param $id
     * @return string
     */
    function lesson($id)
    {
        $this->db->select('chapter.CourseId,
        lessons.ChapterId,
        lessons.LessonName,
        lessons.Description,
        lessons.Presentation,
        lessons.Video')
            ->from('lessons')
            ->join('chapter', 'chapter.Id=lessons.ChapterId')
            ->where('lessons.Id', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    /**
     * @param $data array
     * @return bool
     */
    function lessonAdd($data)
    {
        return $this->db->insert('lessons', $data);
    }

    /**
     * @param $id
     * @param $data array
     * @return bool
     */
    function lessonUpdate($id, $data)
    {
        $this->db->where('Id', $id);
        return $this->db->update('lessons', $data);
    }

    /**
     * @param $data array
     * @return bool
     */
    function packageAdd($data)
    {
        return $this->db->insert_batch('packages', $data);
    }

    /**
     * @param $id
     * @param $data array
     * @return bool
     */
    function packageUpdate($data)
    {
        return $this->db->update_batch('packages', $data, 'PackageId');
    }

    /**
     * @param $id
     * @return bool
     */
    function packageDelete($id)
    {
        $this->db->where('Id', $id);
        return $this->db->update('packages', array('void' => 1));
    }
    function packageCourseDelete($id)
    {
        $this->db->where('PackageId', $id);
        return $this->db->delete('packages');
    }

    function selectedCourses($id){
        $this->db->select('packages.CourseId')
            ->from('packages')
            ->where('packages.PackageId', $id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }
}
