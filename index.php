<script src='js/jquery-3.3.1.min.js'></script>

<div id="main_movie_area"><video id="main_movie" src="videos/main/1.m4v" autoplay autobuffer /></div>

<div id="ads_area"><video id="ads" src="videos/ads/1.mp4" autobuffer /></div>

<div>
<?php
$dir = 'videos/ads';
$dir_arr = scandir($dir);
$dir_arr_cnt = count($dir_arr) - 2;
?>
</div>

<script type="text/javascript"> 

$(document).ready(function() {
	$('#ads_area').hide();
	
	var ad_src_cnt = '1';
	var ad_src = '';
	var ad_cnt = <?php echo $dir_arr_cnt; ?>;
	
	window.setInterval(function(){
		$('#main_movie').get(0).pause();
		$('#main_movie_area').hide();
		
		ad_src = 'videos/ads/'+ad_src_cnt+'.mp4';
		
		if(ad_src_cnt < ad_cnt) {
			ad_src_cnt = parseInt(ad_src_cnt) + 1;
		}else{
			ad_src_cnt = 1;
		}
				
		$('#ads').attr('src', ad_src);
		$("#ads")[0].load();
	
		$('#ads').get(0).play();
		$('#ads_area').show();
		
		document.getElementById('ads').addEventListener('ended',handler,false);
		
	}, 10000);
})

function handler(e) {
	// set src for next a
	$('#main_movie').get(0).play();
	$('#main_movie_area').show();
	$('#ads_area').hide();
}

</script>