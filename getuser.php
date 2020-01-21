<?php
   
 require_once 'dbconfig.php';
 
 if (isset($_REQUEST['id'])) {
   
 $id = intval($_REQUEST['id']);
 $query = "SELECT * FROM studentTable WHERE studentID=:id";
 $stmt = $DBcon->prepare( $query );
 $stmt->execute(array(':id'=>$id));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 extract($row);
 
 ?>
   
 <div class="table-responsive">
  
 <table class="table table-striped table-bordered">
 <tr>
 <th>First Name</th>
 <td><?php echo $firstName; ?></td>
 </tr>
 <tr>
 <th>Last Name</th>
 <td><?php echo $lastName; ?></td>
 </tr>
 <tr>
 <th>Module No1</th>
 <td><?php echo $moduleNo1; ?></td>
 </tr>
 <tr>
 <th>Module No2</th>
 <td><?php echo $moduleNo2; ?></td>
 </tr>
 <tr>
 <th>Course ID</th>
 <td><?php echo $courseID; ?></td>
 </tr>
 </table>
   
 </div>
   
 <?php    
}
 
