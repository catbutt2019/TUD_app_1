<?php

$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');

use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

    $handler = new Handler();
    $handler->getJavascriptAntiBot();
?>

 <!DOCTYPE html>  
 <html lang="en">
    <head>
        <title>TUD FEED</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/APP_4.css" rel="stylesheet" type="text/css"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head> 
      <body>
          <!-- Search Form Demo -->
          <div class="d-flex justify-content-center">
<div style="clear: both" class="text-center">
    <input type="text" class='mySearch text-center' id="ls_query" placeholder="Quick Email Search" style ="outline: none;">
</div>
          </div>
<!-- /Search Form Demo -->
    <div class="container-fluid">
        
        <div class="d-flex justify-content-center" >
        <img src="img/userICON.png" alt="" height="80px;" id="icon"/>
        </div>
        <div class ="text-center" id="bio">
            <h6>Keith Gardiner</h6>
        </div>
        <div class ="text-center">
            Lecturer
        </div>
   
        
        
        
        
        
        
        <nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Modules</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Students</a>
						
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<table class="table">       
    <thead>
        <tr>
        <th></th>
        <th></th>
        <th></th>
        </tr>
    </thead>
              
    <tbody>
           
    <?php
              
        require_once 'dbconfig.php';
              
        $query = "SELECT * FROM moduleTable";
        $stmt = $DBcon->prepare( $query );
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
           
        <td><?php echo $row['moduleName']; ?></td>
        <td>
            <button data-toggle="modal" data-target="#module-modal" data-id="<?php echo $row['moduleNo']; ?>" id="getModules" class="btn btn-sm btn-info"><i class="fas fa-info"></i></button>
        </td>
        </tr>
        <?php
      }
   ?>

   </tbody>
</table>
                                            
                               
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					 <table class="table table-striped table-bordered">
              
    <thead>
        <tr>
        <th></th>
        <th>Student</th>
        <th>View Profile</th>
        </tr>
    </thead>
              
    <tbody>
           
    <?php
              
        require_once 'dbconfig.php';
              
        $query = "SELECT * FROM studentTable";
        $stmt = $DBcon->prepare( $query );
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
        <td>
            <img src="img/userICON.png" alt="user" width="40px" />
        </td>   
        <td><?php echo $row['firstName']."&nbsp;".$row['lastName']; ?></td>
        <td>
        <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['studentID']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
        </td>
        </tr>
        <?php
      }
   ?>

   </tbody>
</table>	
                                            
                                            
                                            
                                            
                                            
                                            
                                            
					
				</div>
                                </div>
         
          
         <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog"> 
     <div class="modal-content">  
   
        <div class="modal-header"> 
            <h4> <i class="fas fa-user-alt"></i></h4><br>
           <h4 class="modal-title">
           Student Profile
           </h4> 
        </div> 
            
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="ajax-loader.gif">
           </div>
                            
           <!-- mysql data will be load here -->                          
           <div id="dynamic-content"></div>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div>                    
    </div> 
  </div>
</div> 
     <div id="module-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog"> 
     <div class="modal-content">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title">
           <i class="glyphicon glyphicon-user"></i> Student Profile
           </h4> 
        </div> 
            
        <div class="modal-body">                     
           <div id="module-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="ajax-loader.gif">
           </div>
                            
           <!-- mysql data will be load here -->                          
           <div id="module-content"></div>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div>                    
    </div> 
  </div>
</div>              
           
          
                    
                    
                    
                    
                    
                    
                    
          
          
          
          
           <div class="footer">
      <div class="row text-center">
          <div class="col text-center">
            <a href="landingpage.php" class="btn btn-white fa-2x"> <i class="fas fa-home"></i></a>
            <p class="text-center">Home</p>
          </div>
          <div class="col text-center">
           <a href="map.php" class="btn btn-white fa-2x"> <i class="far fa-map"></i></a>
            <p class="text-center">Map</p>
          </div>
          <div class="col text-center">
              <a href="reminder.php" class="btn btn-white fa-2x"><i class="far fa-bell"></i></a>
            <p class="center-text">Reminder</p>
          </div>
       <div class="col text-center">
     <a href="profile.php" class="btn btn-white fa-2x"> <i class="far fa-user"></i></a>
     <p class="center-text">Profile</p>
          </div>
        </div> 
     </div>
        

          
          
                                </div>    
          
          
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="YoutubeAPI.js" type="text/javascript"></script>
    <script src="getModules.js" type="text/javascript"></script>
    <script src="getStudents.js" type="text/javascript"></script>
    <script src="js/ajaxlivesearch.js" type="text/javascript"></script>
    <script>
jQuery(document).ready(function(){
    jQuery(".mySearch").ajaxlivesearch({
        loaded_at: <?php echo time(); ?>,
        token: <?php echo "'" . $handler->getToken() . "'"; ?>,
        max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
        onResultClick: function(e, data) {
            // get the index 0 (first column) value
            var selectedOne = jQuery(data.selected).find('td').eq('0').text();

            // set the input value
            jQuery('#ls_query').val(selectedOne);

            // hide the result
            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
        },
        onResultEnter: function(e, data) {
            // do whatever you want
            // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
        },
        onAjaxComplete: function(e, data) {

        }
    });
})
</script>
    
    
    
    
    
    
    
      </body>
 </html>
        