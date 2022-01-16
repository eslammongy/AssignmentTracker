<?php

// fetch all date from dateBase
function getAllAssignmentsByCourses($course_id){
    global $db;
    if($course_id){
        $query = 'SELECT A.ID, A.DESCRIPTION, C.courseName FROM assignments A LEFT JOIN 
                  courses C ON A.CourseID = C.CourseID WHERE A.CourseID = :course_id ORDER BY A.ID';
    }else{
        $query = 'SELECT A.ID, A.DESCRIPTION, C.courseName FROM assignments A LEFT JOIN 
                  courses C ON A.CourseID = C.CourseID ORDER BY C.CourseID';
    }
    $statement = $db->prepare($query);
    $statement->bindValue('course_id', $course_id);
    $statement-> execute();
    $assignments = $statement-> fetchAll();
    $statement->closeCursor();
    return $assignments;

}

// delete single assignment
function deleteSingleAssignment($assignment_id){
    global $db;
    $query = 'DELETE FROM assignments WHERE ID = :assignment_id';
    $statement = $db->prepare($query);
    $statement->bindValue('assignment_id', $assignment_id);
    $statement-> execute();
    $assignments = $statement-> fetchAll();
    $statement->closeCursor();

}

//  adding single assignment
function addingSingleAssignment($course_id, $description){
    global $db;
    $query = 'INSERT INTO assignments (Description, CourseID) VALUES (:Description, :CourseID)';
    $statement = $db->prepare($query);
    $statement->bindValue('Description', $description);
    $statement->bindValue('CourseID', $course_id);
    $statement-> execute();
    $assignments = $statement-> fetchAll();
    $statement->closeCursor();

}

