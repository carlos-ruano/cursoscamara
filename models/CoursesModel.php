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

}