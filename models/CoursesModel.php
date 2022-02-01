<?php
class CoursesModel {

    function __construct() {
        $this->cnx = new MySqlDB;
    }

    function getCourses() {

        $sql = "SELECT * FROM courses";
        $courses = $this->cnx->query($sql);
        return $this->asocToArrayObj($courses);
    }

    function asocToArrayObj(array $asocs) {
        $objs = [];
        foreach ($asocs as $asoc) {
            $objs[] = new Course($asoc);
        }
        return $objs;
    }
    
    function getCourse($id) {

        $sql = "SELECT * FROM courses WHERE id=?";
        $prod = $this->cnx->query($sql, [$id]);
        return !empty($prod) ? new Course($prod[0]) : null;
    }

    function createCourse($course) {
        $sql = "INSERT INTO `courses` (`id`, `name`, `start_date`, `end_date`, `duration`, `place`, `schedule`, `contact_email`, `contact_telephone`, `description`, `web_link`, `pdf_link`, `image_link`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = [
            $course->getId(),
            $course->getName(),
            $course->getStart_date(),
            $course->getEnd_date(),
            $course->getDuration(),
            $course->getPlace(),
            $course->getSchedule(),
            $course->getContact_email(),
            $course->getContact_telephone(),
            $course->getDescription(),
            $course->getWeb_link(),
            $course->getPdf_link(),
            $course->getImage_link(),
            $course->getStatus()
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok ? $this->cnx->lastInsertId() : false;
    }
    function editCourse($course) {
        $sql = "UPDATE `courses` SET `name`=?, `start_date`=?, `end_date`=?, `duration`=?, `place`=?, `schedule`=?, `contact_email`=?, `contact_telephone`=?, `description`=?, `web_link`=?, `pdf_link`=?, `image_link`=?, `status`=? WHERE id=?";
        $params = [
            $course->getName(),
            $course->getStart_date(),
            $course->getEnd_date(),
            $course->getDuration(),
            $course->getPlace(),
            $course->getSchedule(),
            $course->getContact_email(),
            $course->getContact_telephone(),
            $course->getDescription(),
            $course->getWeb_link(),
            $course->getPdf_link(),
            $course->getImage_link(),
            $course->getStatus(),
            $course->getId()
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok;
    }
    function deleteCourse($id) {
        $sql = "DELETE FROM `courses` WHERE id=?";
        $ok = $this->cnx->execute($sql, [$id]);
        return $ok ;
    }





}