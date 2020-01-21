
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
        
    <div id="mapCanvas" style="width: 100%; height: 400px; margin-top:0;">&#160;</div>
    <div id="directionsPanel">
        <a href="#geoLocation" id="useGPS"></a>
        <p class="or"></p>
        <div class="directionInputs" style="display: none;">
            <form>
                <p>
                    <label>A</label>
                    <input type="text" value="" id="dirSource" />
                </p>
                <p>
                    <label>B</label>
                    <input type="text" value="Aungier Street" id="dirDestination" />
                </p>
                <p>
                    <label>B</label>
                    <input type="text" value="Bolton Street" id="dirDestination2" />
                </p>
                <p>
                    <label>B</label>
                    <input type="text" value="Technological University Dublin,Kevin Street" id="dirDestination3" />
                </p>
                <p>
                    <label>B</label>
                    <input type="text" value="TU Dublin Grangegorman" id="dirDestination4" />
                </p>
                <a href="#reset" id="paneReset">Reset</a>
            </form>
            <div>
            </div>
            </div>
        <h6 style="margin-left: 7px;">Where are you going?</h6>
    
        `<div class="container-fluid">
              <div class="row">
                  <div class="col">
      <a class="btn btn-primary" id="getDirections"><h5>Aungier Street</h5></a>
                  </div>
        <div class="col">
      <a class="btn btn-primary" id="getDirections2"><h5>Bolton Street</h5></a>
            </div>
            </div>
         
              <div class="row">
            <div class="col">
      <a class="btn btn-primary" id="getDirections3"><h5>Kevin Street</h5></a>
            </div>
           
    <div class="col">
      <a class="btn btn-primary" id="getDirections4"><h5>Grangegorman</h5></a>
        </div>
            </div>
    </div>
    
    
  
 
        
        
        
        <div class="container-fluid">
        
                
                
                
       
       
        <div id="directionSteps">
            <p class="msg"></p>
        </div>
        <a href="#toggleBtn" id="paneToggle" class="out">&lt;</a>
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
        
 

      

    
    
    
    
    
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCucXdCts1IHHYyLRf4nWEEpLaa-hLcflM&callback=init&libraries=places" async defer></script>
   
   <script>
    function init() {
        initMap();
    }
    </script>
    <script>
        var initMap = function() {
            
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    fetchAddress(position);
                });
            }
            

    var map,
        directionsService, directionsDisplay,
        autoSrc, autoDest, pinA, pinB,

        markerA = new google.maps.MarkerImage('m1.png',
            new google.maps.Size(24, 27),
            new google.maps.Point(0, 0),
            new google.maps.Point(12, 27)),
        markerB = new google.maps.MarkerImage('m2.png',
            new google.maps.Size(24, 28),
            new google.maps.Point(0, 0),
            new google.maps.Point(12, 28)),

        // Caching the Selectors		
        $Selectors = {
            mapCanvas: jQuery('#mapCanvas')[0],
            dirPanel: jQuery('#directionsPanel'),
            dirInputs: jQuery('.directionInputs'),
            dirSrc: jQuery('#dirSource'),
            dirDst: jQuery('#dirDestination'),
            dirDst2: jQuery('#dirDestination2'),
            dirDst3: jQuery('#dirDestination3'),
            dirDst4: jQuery('#dirDestination4'),
            getDirBtn: jQuery('#getDirections'),
            getDirBtn2: jQuery('#getDirections2'),
            getDirBtn3: jQuery('#getDirections3'),
            getDirBtn4: jQuery('#getDirections4'),
            dirSteps: jQuery('#directionSteps'),
            paneToggle: jQuery('#paneToggle'),
            useGPSBtn: jQuery('#useGPS'),
            paneResetBtn: jQuery('#paneReset')
        };

    function autoCompleteSetup() {
        autoSrc = new google.maps.places.Autocomplete($Selectors.dirSrc[0]);
        autoDest = new google.maps.places.Autocomplete($Selectors.dirDst[0]);
        autoDest = new google.maps.places.Autocomplete($Selectors.dirDst2[0]);
         autoDest = new google.maps.places.Autocomplete($Selectors.dirDst3[0]);
         autoDest = new google.maps.places.Autocomplete($Selectors.dirDst4[0]);
    } // autoCompleteSetup Ends

    function directionsSetup() {
        directionsService = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer({
            
        });
 
        directionsDisplay.setPanel($Selectors.dirSteps[0]);
    } // direstionsSetup Ends

    function trafficSetup() {
        // Creating a Custom Control and appending it to the map
        var controlDiv = document.createElement('div'),
            controlUI = document.createElement('div'),
            trafficLayer = new google.maps.TrafficLayer();

        jQuery(controlDiv).addClass('gmap-control-container').addClass('gmnoprint');
        jQuery(controlUI).text('Traffic').addClass('gmap-control');
        jQuery(controlDiv).append(controlUI);

        // Traffic Btn Click Event	  
        google.maps.event.addDomListener(controlUI, 'click', function() {
            if (typeof trafficLayer.getMap() == 'undefined' || trafficLayer.getMap() === null) {
                jQuery(controlUI).addClass('gmap-control-active');
                trafficLayer.setMap(map);
            } else {
                trafficLayer.setMap(null);
                jQuery(controlUI).removeClass('gmap-control-active');
            }
        });
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(controlDiv);
    } // trafficSetup Ends

    function mapSetup() {
        map = new google.maps.Map($Selectors.mapCanvas, {
            zoom: 15,
            gestureHandling: "greedy",
            center: new google.maps.LatLng(53.338545, -6.26607),

            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DEFAULT,
                position: google.maps.ControlPosition.TOP_RIGHT
            },

            panControl: true,
            panControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            },

            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.RIGHT_TOP
            },

            scaleControl: true,
            streetViewControl: true,
            overviewMapControl: true,

            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        autoCompleteSetup();
        directionsSetup();
        trafficSetup();
    } // mapSetup Ends 

    function directionsRender(source, destination) {
        $Selectors.dirSteps.find('.msg').hide();
        directionsDisplay.setMap(map);

        var request = {
            origin: source,
            destination: destination,
            provideRouteAlternatives: false,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
            
        };

        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {

                directionsDisplay.setDirections(response);

                var _route = response.routes[0].legs[0];

                pinA = new google.maps.Marker({ position: _route.start_location, map: map, icon: markerA }),
                    pinB = new google.maps.Marker({ position: _route.end_location, map: map, icon: markerB });
            }
        });
    } // directionsRender Ends

    function fetchAddress(p) {
        var Position = new google.maps.LatLng(p.coords.latitude, p.coords.longitude),
            Locater = new google.maps.Geocoder();

        Locater.geocode({ 'latLng': Position }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var _r = results[0];
                $Selectors.dirSrc.val(_r.formatted_address);
            }
        });
    } // fetchAddress Ends

    function invokeEvents() {
        // Get Directions
        $Selectors.getDirBtn.on('click', function(e) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    fetchAddress(position);
                });
            }
            e.preventDefault();
            var src = $Selectors.dirSrc.val(),
                dst = $Selectors.dirDst.val();

            directionsRender(src, dst);
        });
        
        $Selectors.getDirBtn2.on('click', function(e) {
             if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    fetchAddress(position);
                });
            }
            e.preventDefault();
            var src1 = $Selectors.dirSrc.val(),
                dst2 = $Selectors.dirDst2.val();

            directionsRender(src1, dst2);
        });
        
        $Selectors.getDirBtn3.on('click', function(e) {
             if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    fetchAddress(position);
                });
            }
            e.preventDefault();
            var src3 = $Selectors.dirSrc.val(),
                dst3 = $Selectors.dirDst3.val();

            directionsRender(src3, dst3);
        });
        
          $Selectors.getDirBtn4.on('click', function(e) {
               if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    fetchAddress(position);
                });
            }
            e.preventDefault();
            var src4 = $Selectors.dirSrc.val(),
                dst4 = $Selectors.dirDst4.val();

            directionsRender(src4, dst4);
        });


        // Reset Btn
        $Selectors.paneResetBtn.on('click', function(e) {
            $Selectors.dirSteps.html('');
            $Selectors.dirSrc.val('');
            $Selectors.dirDst.val('');

            if (pinA) pinA.setMap(null);
            if (pinB) pinB.setMap(null);

            directionsDisplay.setMap(null);
        });

        // Toggle Btn
        $Selectors.paneToggle.toggle(function(e) {
            $Selectors.dirPanel.animate({ 'left': '-=305px' });
            jQuery(this).html('&gt;');
        }, function() {
            $Selectors.dirPanel.animate({ 'left': '+=305px' });
            jQuery(this).html('&lt;');
        });

        // Use My Location / Geo Location Btn
       
            
     
     
    } //invokeEvents Ends 

    mapSetup();
    invokeEvents();
};
        </script>
  </body>
</html>