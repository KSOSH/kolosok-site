<?php
/*
** evovideo — custom TV for MODx Evolution
** Version 1.0 by ProjectSoft, projectsoft@studionions.com
*/
if (IN_MANAGER_MODE != 'true') {
 die('<h1>Error:</h1><p>Please use the MODx content manager instead of accessing this file directly.</p>');
}
$site_url = MODX_SITE_URL;
$includeOnce_evotv = <<<EOD
<style>
.iframe_block {
	padding-top:10px;
	position: relative;
	max-width: 600px;
}
.embed {
	overflow: hidden;
}
.embed-responsive {
    position: relative;
    display: block;
    height: 0;
    padding: 0;
    overflow: hidden;
}
.embed-responsive-16by9 {
    padding-bottom: 56.25%;
}
.embed-responsive .embed-responsive-item, .embed-responsive iframe, .embed-responsive embed, .embed-responsive object, .embed-responsive video {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    height: 100%;
    width: 100%;
    border: 0;
}
.evovideo_image {
	display: block;
	max-width: 300px;
}
.evovideo_frame {
	max-width: 300px;
}
</style>

<script>
	var setIdEvoVideo = function(tv){
		var el = document.getElementById(tv),
			span = document.getElementById("block_img_" + tv),
			div = document.getElementById("block_iframe_" + tv),
			errorLoad = function(e){
				e.preventDefault();
				this.onerror = null;
				this.parentElement.innerHTML = "";
				return !1;
			},
			img, iframe;
		/*console.log(el);*/
		span.innerHTML = div.innerHTML = "";
		let data = new FormData();
		data.append('link_evovideo', el.value);
		let xhr = new XMLHttpRequest();
		xhr.open('POST', '/assets/tvs/EvoVideo/EvoVideo.index.php', true);
		xhr.onloadend = function() {
			if (xhr.status == 200) {
				let vd = JSON.parse(xhr.response);
				window.top.console.log(vd);
				if(vd.video){
					div.innerHTML = vd.video;
				}
				if(vd.image){
					let re = /^assets/i;
					if ((m = re.exec(vd.image)) !== null) {
						span.innerHTML = '<img src="/' + vd.image +'?hash=' + (new Date().getTime()) + '">';
					}else{
						span.innerHTML = '<img src="' + vd.image +'">';
					}
				}
			} else {
				window.top.console.log("Ошибка " + this.status);
			}
		}
		xhr.onerror = function() {
			window.top.console.log("Ошибка запроса " + el.value);
		};
		xhr.send(data);
	};
</script>
EOD;
if(!defined('EVOVIDEOTV')) {
	echo $includeOnce_evotv;
	define('EVOVIDEOTV', 1);
}
$value = empty($row['value']) ? $row['default_text'] : $row['value'];
$id = $row['id'];
$output_YTv = <<<EOD
<input type="text" id="tv{$id}" name="tv{$id}" value="{$value}" style="width: 100%;" onchange="setIdEvoVideo('tv{$id}');documentDirty=true;"/>
&nbsp;<span id="block_img_tv{$id}" class="evovideo_image"></span><br />
<div class="iframe_block evovideo_frame">
	<div id="block_iframe_tv{$id}"></div>
</div>
<script>
setIdEvoVideo("tv{$id}");
</script>
EOD;
echo $output_YTv;
?>
