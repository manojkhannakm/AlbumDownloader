<html>
	<head>
		<meta property="fb:app_id" content="309297819153849" />
		<meta property="og:url" content="http://apps.facebook.com/fbalbumdownloader/" />
		<meta property="og:site_name" content="Album downloader" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="https://fbcdn-photos-a.akamaihd.net/photos-ak-snc7/v85006/141/309297819153849/app_1_309297819153849_1445798013.gif" />
		<meta property="og:description" content="Downloads facebook albums." />
		<title>Album downloader by Manoj khanna</title>
		<script language="" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	</head>
	<body onload="onload()">
		<div id="fb-root"></div>
		<script>
			var graphdata, picscount;
			function onload() {
				$("#title").fadeIn(500);
				setTimeout(function() {
					$("#subtitle").animate({marginLeft:"0px"},750);
					$("#form").animate({marginLeft:"0px"},750);
					setTimeout(function() {
						$("#fblike").animate({marginTop:"0px"},250);
						$("#fbcomments").animate({marginTop:"0px"},250);
					}, 500);
				}, 500);
			}
			(function(d){
     				var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     				if (d.getElementById(id)) { return; }
     				js = d.createElement('script'); js.id = id; js.async = true;
     				js.src = "//connect.facebook.net/en_US/all.js";
     				ref.parentNode.insertBefore(js, ref);
   			}(document));
  			window.fbAsyncInit = function() {
	    			FB.init({
		      			appId: '309297819153849',
		      			channelUrl: 'channel.html',
	     		 		status: true,
		      			cookie: true,
      					xfbml: true,
					oauth: true
	    			});
	  		};
   			function getimgs() {
				var url = document.getElementById('url').value;
				$("#loading").show(750);
				$("#notloading").hide(750);
				$("#butbar").stop(true,true).animate({opacity:"0.0",marginBottom:"-46px"},750);
				setTimeout(function() {
					if (url.split('a.').length > 1) {
						url = url.split('a.')[1];
						url = url.split('.')[0];
						if (url) {
							FB.api('/' + url + '?fields=name,from,count,photos.fields(images).limit(5000)', function(response) {
								graphdata = response;
								picscount = response.count;
								if (picscount) {
									var html = '<span style="color: rgb(0, 200, 0); font-family:trebuchet ms,helvetica,sans-serif; font-size: 14px;"><strong>Found ' + picscount + ' photos!<br/>from ' + response.name + ' of ' + response.from.name + '</strong></span><br/><br/><table cellspacing = "15">';
									var roundedpicscount = picscount - (picscount % 6);
									for (var i = 0; i < roundedpicscount; i += 6) {
										html += '<tr>';
										for (var j = 0; j < 6; j++) {
											var k = i + j;
											html += '<td align="left" valign="top" style="position:relative;"><img src="' + response.photos.data[k].images[7].source + '" style="position:relative;" onclick=onmclick("'+k+'") onmouseover=onmover("'+k+'") onmouseout=onmout("'+k+'") /><img src="chkmark.png" id="chkmark' + k + '" style="opacity:1;position:absolute;top:-9px;left:-9px;" /></td>';
										}
										html += '</tr>';
									}
									if ((picscount % 6) > 0) {
										html += '<tr>';
										for (var i = roundedpicscount; i < picscount; i++) {
											html += '<td align="left" valign="top" style="position:relative;"><img src="' + response.photos.data[i].images[7].source + '" style="position:relative;" onclick=onmclick("'+i+'") onmouseover=onmover("'+i+'") onmouseout=onmout("'+i+'") /><img src="chkmark.png" id="chkmark' + i + '" style="opacity:1;position:absolute;top:-9px;left:-9px;" /></td>';
										}
										html += '</tr>';
									}
									html += '</table>';
									document.getElementById('notloading').innerHTML = html;
									setTimeout(function() {
										$("#loading").hide(750);
										$("#notloading").show(750);
										$("#butbar").stop(true,true).animate({opacity:"1.0",marginBottom:"0px"},750);
									}, 1000);
								} else {
									document.getElementById('notloading').innerHTML = '<span style="color: rgb(255, 0, 0); "><strong><span style="font-family:trebuchet ms,helvetica,sans-serif;"><span style="font-size: 14px; ">Invalid URL!</span></span></strong></span>';
									setTimeout(function() {
										$("#loading").hide(750);
										$("#notloading").show(750);
									}, 1000);
								}
							});
						} else {
							document.getElementById('notloading').innerHTML = '<span style="color: rgb(255, 0, 0); "><strong><span style="font-family:trebuchet ms,helvetica,sans-serif;"><span style="font-size: 14px; ">Invalid URL!</span></span></strong></span>';
							setTimeout(function() {
								$("#loading").hide(750);
								$("#notloading").show(750);
							}, 1000);
						}
					} else {
						document.getElementById('notloading').innerHTML = '<span style="color: rgb(255, 0, 0); "><strong><span style="font-family:trebuchet ms,helvetica,sans-serif;"><span style="font-size: 14px; ">Invalid URL!</span></span></strong></span>';
						setTimeout(function() {
							$("#loading").hide(750);
							$("#notloading").show(750);
						}, 1000);
					}
				}, 750);
    			}
			function onmclick(i) {
				if (document.getElementById("chkmark" + i).style.opacity == 1) {
					$("#chkmark" + i).stop(true,true).animate({opacity:"0.5"},100);
					$("#chkmark" + i).stop(true,true).animate({height:"24px",width:"25px"},100);
				} else {
					$("#chkmark" + i).stop(true,true).animate({opacity:"1.0"},100);
					$("#chkmark" + i).stop(true,true).animate({height:"26px",width:"27px"},100);
				}
			}
			function onmover(i) {
				if (document.getElementById("chkmark" + i).style.opacity == 1) {
					$("#chkmark" + i).stop(true,true).animate({height:"26px",width:"27px"},100);
				} else {
					$("#chkmark" + i).stop(true,true).animate({opacity:"0.5"},100);
				}
			}
			function onmout(i) {
				if (document.getElementById("chkmark" + i).style.opacity == 1) {
					$("#chkmark" + i).stop(true,true).animate({height:"24px",width:"25px"},100);
				} else {
					$("#chkmark" + i).stop(true,true).animate({opacity:"0.0"},100);
				}
			}
			function selectall() {
				document.getElementById('but1').src = "/buttons/1c.png";
				for (var i = 0; i < picscount; i++) {
					$("#chkmark" + i).stop(true,true).animate({opacity:"1.0"},250);
				}
				setTimeout(function() {
					document.getElementById('but1').src = "/buttons/1b.png";
				}, 250);
			}
			function unselectall() {
				document.getElementById('but2').src = "/buttons/2c.png";
				for (var i = 0; i < picscount; i++) {
					$("#chkmark" + i).stop(true,true).animate({opacity:"0.0"},250);
				}
				setTimeout(function() {
					document.getElementById('but2').src = "/buttons/2b.png";
				}, 250);
			}
			function download() {
				document.getElementById('but3').src = "/buttons/3c.png";
				document.getElementById('but3').src = "/buttons/3b.png";
				var selpicsarr = new Array();
				for (var i = 0; i < picscount; i++) {
					if (document.getElementById("chkmark" + i).style.opacity == 1) {
						selpicsarr[i] = graphdata.photos.data[i].images[0].source;
					}
				}
				document.getElementById('selpics').value = graphdata.name + ',' + graphdata.from.name + ',' + selpicsarr;
				document.getElementById('selpicsform').submit();
			}
		</script>
		<br/>
		<div id="fblike" style="margin-top:-1000px;overflow:hidden;position:absolute;left:30;"><div class="fb-like" data-href="http://apps.facebook.com/fbalbumdownloader/" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div></div>
		<center>
			<span id="title" style="display: none;"><img src="title.png"/></span><br/>
			<span id="subtitle" style="margin-left:-3000px;overflow:hidden;"><img src="subtitle.png"/></span><br/><br/><br/>
			<div id="form" style="margin-left:3000px;overflow:hidden;">
				<span style="font-family:trebuchet ms,helvetica,sans-serif;font-size:14px;"><strong>Copy and paste the URL of the album to be downloaded:</strong></span><br/><br/>
				<input type="text" id="url" size="125" onkeyup="if (event.keyCode == 13) { getimgs(); }" /><br/>
				<font size="2px">Example: https://www.facebook.com/media/set/?set=a.2374923123.723942.123932742439</font><br/><br/>
				<input type="button" value="Get images!" onclick="getimgs()" /><br/><br/>
			</div>
			<img src="loading.gif" id="loading" style="display:none;" />
			<div id="notloading" style="display:none;"></div><br/><br/>
			<div id="fbcomments" style="margin-top:1000px;overflow:hidden;"><div class="fb-comments" data-href="http://apps.facebook.com/fbalbumdownloader/" data-num-posts="5" data-width="500"></div></div>
			<center id="butbar" style="opacity:0;margin-bottom:-46px;position:fixed;width:100%;bottom:10;">
				<img src="/buttons/1a.png" style="position:absolute;" /><img src="/buttons/1b.png" id="but1" style="position:relative;opacity:0;" onclick=selectall() onmouseover=$("#but1").stop(true,true).animate({opacity:"1.0"},250) onmouseout=$("#but1").stop(true,true).animate({opacity:"0.0"},250) /><img src="/buttons/2a.png" style="position:absolute;" /><img src="/buttons/2b.png" id="but2" style="position:relative;opacity:0;" onclick=unselectall() onmouseover=$("#but2").stop(true,true).animate({opacity:"1.0"},250) onmouseout=$("#but2").stop(true,true).animate({opacity:"0.0"},250) /><img src="/buttons/3a.png" style="position:absolute;" /><img src="/buttons/3b.png" id="but3" style="position:relative;opacity:0;" onclick=download() onmouseover=$("#but3").stop(true,true).animate({opacity:"1.0"},250) onmouseout=$("#but3").stop(true,true).animate({opacity:"0.0"},250) />
			</center>
			<div style="display:none">
				<form id="selpicsform" method="POST" action="http://fighterpro.webege.com/default.php">
					<input type="text" id="selpics" name="selpics" size="50" />
				</form>
			</div>
		</center>
 	</body>
</html>