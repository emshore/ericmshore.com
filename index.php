<html>
<head>
<title>Eric M. Shore</title>
<link href='http://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
<style>
	body {
        font-family: 'Amatic SC', cursive;
        font-size: 30px;
     }
	  
	 h1 {
		font-size: 40px;
		font-weight: bold;
		display: inline;
	 }

</style>

<?PHP

include ("functions.php");
//include("css/css.php");
include("script.php");

require_once 'Zend/Loader.php';
    Zend_Loader::loadClass('Zend_Gdata_Photos');
    Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
    Zend_Loader::loadClass('Zend_Gdata_AuthSub');

?>
</head>
<body>
	<div style='position:fixed; top:0; left:0; width:200px; padding:10px;'>
		<h1>Eric M. Shore</h1><br>
		who i am<br>
		what i do<img src='img/arrow_rt.png' border='0' alt=''><br>
		where i go<br>
		what i make<br>
		what i like<br>
		where to follow<br>
	</div>
	<div style='position:relative; top:0; left:200px; width:1000px;'>

	<?PHP
		$update = 0;
		if(isset($_GET['u']))
			$update = $_GET['u'];
			
		if ($update == 1) {
			set_time_limit(0); 
			$images = getUpdatedWhoIAmImages();
			//$html = imageBoxesToHTML($images, "whoiam");
			//writeFile($html, "txt/whoiam.txt");
			set_time_limit(30);
		}
		
		$dirname = "img/whoiam/";
		$images = glob("$dirname*.jpg");
		$counter = 1;
		$col1 = "";
		$col2 = "";
		$col3 = "";
		foreach($images as $image) {
			$imgsrc = "<img src='$image' width='300'>";
			if ($counter % 3 == 1) $col1 .= $imgsrc;
			else if ($counter % 3 == 2) $col2 .= $imgsrc;
			else if ($counter % 3 == 0) $col3 .= $imgsrc;
			$counter++;
		}
				
		echo "
		<div style='width: 900px;'>
		 <div style='float: left; width: 300px;'>$col1</div>
		 <div style='float: left; width: 300px;'>$col2</div>
		 <div style='float: left; width: 300px;'>$col3</div>
		 <br style='clear: both;' />
		</div>";

	?>
	<br><br><br>
	2014 Year in Review<br>
	<iframe src="https://player.vimeo.com/video/118355435?color=ffffff&title=0&byline=0&portrait=0" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<br>
	<br>
	2013 Year in Review<br>
	<iframe src="https://player.vimeo.com/video/83981092?color=ffffff&title=0&byline=0&portrait=0" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

	</div>
</body>
</html>