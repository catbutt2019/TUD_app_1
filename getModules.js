 $(document).ready(function(){

    $(document).on('click', '#getModules', function(e){
  
     e.preventDefault();
  
     var mid = $(this).data('id'); // get id of clicked row
  
     $('#module-content').html(''); // leave this div blank
     $('#module-loader').show();      // load ajax loader on button click
 
     $.ajax({
          url: 'getModules.php',
          type: 'POST',
          data: 'id='+mid,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#module-content').html(''); // blank before load.
          $('#module-content').html(data); // load here
          $('#module-loader').hide(); // hide loader  
     })
     .fail(function(){
          $('#module-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#module-loader').hide();
     });

    });
});/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


