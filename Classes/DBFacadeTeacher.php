

<?php

session_start();

include("./Teacher.php");
  
  
class DBFacadeTeacher
{
    
    function getConnection()
    {

        $con =  new mysqli("localhost","root","","learning_management_system");

       if($con == false)
       die ("\n  Database not connected successfully ...");
             
             return $con;

    }


    function TeacherLogIn($account)
    {
         $mail=$account->getMail();
         $pwd=$account->getPassword();

         $conn = $this->getConnection();


       $query = " SELECT * FROM Account WHERE Email =  '$mail'AND Type='Teacher' ";
       $result = mysqli_query($conn,$query);

       if(mysqli_num_rows($result)!= 0 )
       {

           $row = mysqli_fetch_assoc($result);

           if($row['Password']== "$pwd")
           {
              $query2 = " SELECT * FROM teacher WHERE TeacherID =  '$mail' ";
              $res = mysqli_query($conn,$query2);

              $row = mysqli_fetch_assoc($res);

               $teacher = new Teacher($row['TeacherID'], $row['DeptNo'], $row['Email'], $row['TeacherName'] ,$row['Designation']);
              // $manager->Display();

              // echo $manager->getTeacherID();


            //    $name=$manager->getDeptName();
             
           

            //    $_SESSION['manager'] = serialize($name);

            $id = $teacher->getTeacherID();
            //    echo "$id";
            // session_destroy();

               $_SESSION['teach'] = serialize($id);
            
            
              header("location: ../teacher.php");
                    

           }


           else
           {
                 echo "Incorrect Password.........!!<br>";

           }


       }


       else
       {
          echo "Invalid Account.........!!<br>";
       }
        
    }

   

}
  




?>


