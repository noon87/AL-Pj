<?php

	// Inialize session
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}
	
	//www.cardinalsolutions.com/cardinal/blog/portals/2013/11/developing_yammerap.html
	//https://www.yammer.com/pdfs/Yammer_Embed_Install_Guide.pdf
	//group id 3913771
?>

<html>
<head>		
	<script src="https://assets.yammer.com/platform/yam.js"></script>
    <script>
      yam.config({appId: "iK8LZEUpwVloTXoygs67A"});
    </script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>	
	<h1>Feed on Yammer</h1>
		<p><?php include("Header.php"); ?></p>
		<p>   </p>
		<p>   </p>
		<p>   </p>
		<p>   </p>
	
	<form id="networkForm">
		<p>Enter your network: <input type="text" name="network">
			<input type="button" value="Show Network" onclick="showFeed(this.form)">
		</p>
	</form>

	
	<script>
	function showFeed(frm){
		if(frm.network.value==""){
			alert("Please Enter network to show Feed.")
		}else{		
			yam.connect.embedFeed(
			{
				container: '#embedded-feed',
				network: frm.network.value
			});
			frm.network.value = "";
		}
	}	
    </script>
	<div id="embedded-feed"></div>
</body>
</html>