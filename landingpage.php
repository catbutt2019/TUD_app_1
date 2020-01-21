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

<style>

  .card-img-top 
{
    object-fit: cover;
    border: none;
    height: 150px;
    border-radius: 3px;
  
}
 
  
  .img-fluid {
      color: white;
      display: inline-block;
      width: 280px;
     border: none;
     margin-left: 12px;
  }
  
  .scrolling-news {
       overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  margin-left: 25px;
  margin-bottom: 25px;
  }
 


</style>




</head>
<body>
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-end" id="home-icon">
        <img src="img/userICON.png" alt="" height="40px"/>
        </div>
    </div>
    <div class="row">
            <div class="col">
                <h4> TUD News</h4>
                <p style="margin-top:3px; color: #8b8b8b;">Thursday, 25 May 2019 </p>
            </div>
</div>

    <div class="row">
        <div class="col">
        <h6>Headlines</h6>
        </div>
    </div>
    
</div>
    
 <div class="scrolling-news">
 
  <div class="card img-fluid">
      <img class="card-img-top"style="background-image: 
    linear-gradient(
      rgba(10, 77, 108, 0.3),
      rgba(10, 77, 108, 0.3)
    ), url(https://www.irishtimes.com/polopoly_fs/1.2840533.1546189072!/image/image.jpg_gen/derivatives/box_620_330/image.jpg);">
    <div class="card-img-overlay">
      <h4 class="card-title">John Doe</h4>
      <b class="card-text">Some example text some example text.</b>
    </div>
  </div>
          <div class="card img-fluid">
      <img class="card-img-top"style="background-image: 
    linear-gradient(
      rgba(0, 15, 200, 0.5),
      rgba(0, 15, 200, 0.5)
    ), url(https://www.irishtimes.com/polopoly_fs/1.2840533.1546189072!/image/image.jpg_gen/derivatives/box_620_330/image.jpg);">
    <div class="card-img-overlay">
      <h4 class="card-title">John Doe</h4>
      <b class="card-text">Some example text some example text.</b>
    </div>
  </div> 
</div>
    
   

    
   
    
    
    
  
</div>
    <div id="videos-container">
  <div id="top"></div>
  <div id="Loader">
  <div class="container-load">
    <div class="loader">
      <div class="loader">
        <div class="loader">
         <div class="loader">
          <div class="loader">
            <div class="loader">
      </div>
      </div>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
</div>

    
  <h6>Latest Videos from TUD</h6>
 
  <div class="hero-img">
    <div class="caption">
      <iframe id="player_vid" class="video"  width="100%" height="200px" src="https://www.youtube.com/embed/JlTpxxFHG5c" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
    <div class="scrolling-wrapper ">
       <div class="card ml-40"> <div id='videos'>
    </div></div>
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
        

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/youtube.js" type="text/javascript"></script>
<script type="text/javascript" src="js/ajaxlivesearch.js"></script>

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
