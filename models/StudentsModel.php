<?php

class StudentsModel {
    function __construct() {
        $this->cnx = new MySqlDB;
    }

    function getStudents() {
        $sql = "SELECT * FROM students";
        $student = $this->cnx->query($sql);
        return $this->asocToArrayObj($student);
    }

    function asocToArrayObj(array $asocs) {
        $objs = [];
        foreach ($asocs as $asoc) {
            $objs[] = new Student($asoc);
        }
        return $objs;
    }
    function asocToArray(array $asocs) {
        $num = [];
        foreach ($asocs as $asoc) {
            $num[] = $asoc["COURSE_ID"];
        }
        return $num;
    }

    function getStudent($id) {
        $sql = "SELECT * FROM students WHERE id=?";
        $prod = $this->cnx->query($sql, [$id]);
        return !empty($prod) ? new Student($prod[0]) : null;
    }


    function createStudent(Student $student) {
        $sql = "INSERT INTO `students` (`id`, `name`, `surname`, `dni`, `telephone`, `garantia`, `pice`, `orientation`, `observations`) VALUES  (?,?,?,?,?,?,?,?,?)";
        $params = [
            $student->getId(),
            $student->getName(),
            $student->getSurname(),
            $student->getDni(),
            $student->getTelephone(),
            $student->getGarantia(),
            $student->getPice(),
            $student->getOrientation(),
            $student->getObservations()
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok ? $this->cnx->lastInsertId() : false;
    }

    function updateStudent(Student $student) {
        $sql = "UPDATE `students` SET `name` = ?, `surname` = ?, `dni` = ?, `telephone` = ?, `garantia` = ?, `pice` = ?, `orientation` = ?, `observations` = ? WHERE `students`.`id` = ?;";
        $params = [
            $student->getName(),
            $student->getSurname(),
            $student->getDni(),
            $student->getTelephone(),
            $student->getGarantia(),
            $student->getPice(),
            $student->getOrientation(),
            $student->getObservations(),
            $student->getId()
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok;
    }

    function deleteStudent($id) {
        $sql = "DELETE FROM `students` WHERE id=?";
        $ok = $this->cnx->execute($sql, [$id]);
        return $ok ;
    }

    function setStudentInCourse($student_id,$course_id){
        $sql= "INSERT INTO `students_courses` (`student_id`, `course_id`) VALUES (?, ?)";
        $params = [
            $student_id,
            $course_id
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok ? $this->cnx->lastInsertId() : false;
    }

    function getStudentsByCourse($course_id){
        $sql= "SELECT * FROM `students_courses` JOIN `students` ON `students_courses`.`student_id` = `students`.`id` WHERE `COURSE_ID`=?;";
        $params = [
            $course_id
        ];
        $students = $this->cnx->query($sql,$params);
        return $this->asocToArrayObj($students);
    }

    function getCoursesByStudent($student_id){
        $sql= "SELECT `COURSE_ID` FROM `students_courses` WHERE `STUDENT_ID`=?;";
        $params = [
            $student_id
        ];
        
        return $this->asocToArray($this->cnx->query($sql,$params));
    }

    function deleteStudentFromCourse($student_id,$course_id) {
        $sql="DELETE FROM `students_courses` WHERE `students_courses`.`student_id` = ? AND `students_courses`.`course_id` = ?";
        $params = [
            $student_id,
            $course_id
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok ;
    }


}
