<?php
   
 require_once 'dbconfig.php';
 
 if (isset($_REQUEST['id'])) {
   
 $id = intval($_REQUEST['id']);
 $query = "SELECT * FROM moduleTable WHERE moduleNo=:id";
 $stmt = $DBcon->prepare( $query );
 $stmt->execute(array(':id'=>$id));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 extract($row);
 
 ?>
   
 <div class="table-responsive">
  
 <table class="table table-striped table-bordered">
 <tr>
 <th>First Name</th>
 <td><?php echo $moduleName; ?></td>
 </tr>
 <tr>
 <th>Last Name</th>
 <td><?php echo $website; ?></td>
 </tr>
 <tr>
 <th>ModuleNo1</th>
 <td><?php echo $dueDate; ?></td>
 </tr>
 <tr>
 <th>Module No2</th>
 <td><?php echo $location; ?></td>
 </tr>
 <tr>
 <th>Course ID</th>
 <td><?php echo $room; ?></td>
 </tr>
 </table>
   
 </div>
   
 <?php    
}
