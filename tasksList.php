<?php

	// Inialize session
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}
?>
<html>

	<head>
		<title>Tasks List</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body>
		<h1>Tasks List</h1>
		<p><?php include("Header.php"); ?></p>
		<!--<b><?php echo $_SESSION['username']; ?></b>-->
		<p>   </p>
		<p>   </p>
		<p>   </p>
		<p>   </p>
		<h2>   List of overdue tasks</h2>
		<table id="tasks_table">
			<tr>
				<th>Task ID</th>
				<th>Title</th>
				<th>Due Date</th>
				<th>Assignee Name</th>
				<th>Action</th>
			</tr>
			<tr>
				<td id="td0">001</td>
				<td id="td1">task1</td>
				<td id="td2">17/02/2014</td>
				<td id="td3">Jill</td>
				<td><button onclick="sendFeedToYammer(1)">Send Tasks to Yammer.</button></td>
			</tr>
			<tr>
				<td id="td0">002</td>
				<td id="td1">task2</td>
				<td id="td2">18/02/2014</td>
				<td id="td3">Jack</td>
				<td><button onclick="sendFeedToYammer(2)">Send Tasks to Yammer.</button></td>
			</tr>
			<tr>
				<td id="td0">003</td>
				<td id="td1">task3</td>
				<td id="td2">19/02/2014</td>
				<td id="td3">Joe</td>
				<td><button onclick="sendFeedToYammer(3)">Send Tasks to Yammer.</button></td>
			</tr>
		</table>
		
		<script src="https://assets.yammer.com/platform/yam.js"></script>
		<script>yam.config({appId: "iK8LZEUpwVloTXoygs67A"});</script>
		
		<script>			
			function sendFeedToYammer(x){
			var id = document.getElementById("tasks_table").rows[x].cells.namedItem("td0").innerHTML;
				var title = document.getElementById("tasks_table").rows[x].cells.namedItem("td1").innerHTML;
				var dueDate = document.getElementById("tasks_table").rows[x].cells.namedItem("td2").innerHTML;
				var assignee = document.getElementById("tasks_table").rows[x].cells.namedItem("td3").innerHTML;
				var msg ="Task #"+id+" "+title+" was due on "+dueDate+". "+assignee+" can you please look into this.";

				yam.getLoginStatus( function(response) {
					if (response.authResponse) {
						yam.request(
						  { url: "https://www.yammer.com/api/v1/messages.json?access_token=HodUEmQu8CQDKxNdSuWt9Q"
						  , method: "POST"
						  , data: { "body" : msg}
						  , success: function () { alert("Post was Successful!: "); }
						  , error: function () { alert("Post was Unsuccessful..."); }
						  }
						);
					} else {
						yam.login( function (response) {
						  if (!response.authResponse) {
							yam.request(
							  { url: "https://www.yammer.com/api/v1/messages.json?access_token=HodUEmQu8CQDKxNdSuWt9Q"
							  , method: "POST"
							  , data: { "body" : msg}
							  , success: function () { alert("Post was Successful!: "); }
							  , error: function () { alert("Post was Unsuccessful..."); }
							  }
							);
						  }
						});
					}
				});
			}
		</script>
		
	</body>

</html>