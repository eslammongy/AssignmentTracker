  <?php

      $dsn = 'mysql:host=localhost;dbname=assignment_tracker';
      $userName = 'root';
      $password = "";

      try{
          $db = new PDO($dsn, $userName, $password);
      }catch(PDOException $exception){
          $error = "DataBase Error: ";
          $error .= $exception->getMessage();
          include ('view/error.php');
          exit();
      }