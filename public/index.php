<?php
require ('../model/database.php');
require ('../model/assignment_db.php');
require ('../model/course_db.php');
echo "<h1 
style='font-size: xx-large; color: orangered; font-family:Arial Black,fantasy; font-weight: bold; text-align: center'>Assignment Tracker<h1/>";

$assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$course_name = filter_input(INPUT_POST, 'course_name', FILTER_SANITIZE_STRING);

$course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
 if (!$course_id){
     $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
 }

 $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
 if (!$action){
     $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
     if (!$action){
         $action = 'list_assignments';
     }
 }

 switch ($action){
     case 'list_courses':
         $courses = getAllCourses();
         include ('../view/course_list.php');
         break;
     case 'addingSingleCourse':
         addingSingleCourse($course_name, "this course is wonderful");
         header("Location: .?action=list_courses");
         break;
     case 'addingSingleAssignment':
         if($course_id && $description){
             addingSingleAssignment($course_id, $description);
             header("Location: .?course_id=$course_id");
         }else{
            $error = "Invalid assignment date. check all fields and try again." ;
            include ('../view/error.php');
            exit();
         }
         break;
     case 'deleteSingleCourse':
         if ($course_id){
             try {
                 deleteSingleCourse($course_id);
             }catch (PDOException $exception){
                 $error = "You cannot delete a course if assignment exit in the course";
                 include ('../view/error.php');
                 exit();
             }
             header("Location: .?action=list_courses");
         }
         break;
     case 'deleteSingleAssignment':
         if ($assignment_id){
             deleteSingleAssignment($assignment_id);
             header("Location: .?course_id=$course_id");
         }else{
             $error = "Missing or incorrect assignment id.";
             include ('../view/error.php');
         }
         break;
     default:
         $course_name = getCourseName($course_id);
         $courses = getAllCourses();
         $assignments = getAllAssignmentsByCourses($course_id);
         include ('../view/assignments_list.php');
 }

