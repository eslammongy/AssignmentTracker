<?php

// fetch all courses
function getAllCourses(){
    global $db;
    $query = ' SELECT * FROM courses ORDER BY CourseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

// get single course
function getCourseName($course_id){
    if(!$course_id){
        return "All Courses";
    }
    global $db;
    $query = 'SELECT * FROM courses WHERE CourseID = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue("course_id", $course_id);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    $courseName = $course['courseName'];
    return $courseName;
}

// delete Single Course
function deleteSingleCourse($course_id){
    global $db;
    $query = 'DELETE FROM courses WHERE CourseID = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue("course_id", $course_id);
    $statement->execute();
    $statement->closeCursor();

}

// adding Single Course
function addingSingleCourse($courseName, $courseDesc){
    global $db;
    $query = 'INSERT INTO courses (courseName, courseDesc) VALUES (:courseName, :courseDesc)';
    $statement = $db->prepare($query);
    $statement->bindValue("courseName", $courseName);
    $statement->bindValue("courseDesc", $courseDesc);
    $statement->execute();
    $statement->closeCursor();
}
