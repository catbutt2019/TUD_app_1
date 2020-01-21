var apiKey='AIzaSyAZMFb0we9U2I94w9B7GOwh8Wq8iSqWtyQ';
var channelId='UCiCp8uOdwckGnX0TXHTSkdg'; //channel id

$(document).ready(function(){

	$.get(
		"https://www.googleapis.com/youtube/v3/channels", {
			part:'contentDetails',
			id:channelId,
			key:apiKey},
			function(data) {
				$.each(data.items, function(i,item){
					pid=item.contentDetails.relatedPlaylists.uploads;
					fetchVideo(pid);
				});
			}
	);
	function fetchVideo(pid) {
		$.get(
			"https://www.googleapis.com/youtube/v3/playlistItems", {
				part:'snippet',
				maxResults:5,
				playlistId:pid,
				key: 'AIzaSyAZMFb0we9U2I94w9B7GOwh8Wq8iSqWtyQ'},
				function(data) {
					$.each(data.items, function(i,item){
						var vid_title=item.snippet.title;
						var vid_thumb=item.snippet.thumbnails.default.url;
						var vid_id=item.snippet.resourceId.videoId;
						var vid_container=$('#videos');
						var videoEle='<div class="video vidEle" data-id="'+vid_id+'">'+
								        '<a href="#top">'+
								          '<img class="v-img" src="'+vid_thumb+'"/>'+
								          
								        //'</a>'+
								      '</div>'
						vid_container.append(videoEle);
					});
				}
		);
	}

 	$(document).on('click','.vidEle',function(){
 		$('#player_vid').attr('src','https://www.youtube.com/embed/'+$(this).data('id')+'?autoplay=1');
 		
 	});
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


