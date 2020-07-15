<html> 
	<head>
		<title> offersnearme </title>


		<?php 

		$action = $post['surl'];
		// echo $action;

		// print_r($post);

		?>

	</head>
	<body onload="document.forms.f1.submit();"> 
		<h1> <center> Loading.... </center></h1>
		<h2> <center> Transaction in progress..... <br> Please Do not refresh...</center> </h2>
		<span class="main"> </span>
		<span class="main2"> </span>
		<span class="main3"> </span>
		<span class="main4"> </span>
		<form action="<?=$action?>" method="post" name="f1">
			<?php foreach($post as $p => $val){ ?>
				<input type="hidden" name="<?=$p?>" value="<?=$val?>">
			<?php } ?>
				<input type="hidden" name="addedon" value="<?=$addedon?>">
				<input type="hidden" name="mode" value="<?=$mode?>">
		</form> 

	</body>
</html>


<style type="text/css">
		
	.main{
		position: absolute;
		display: block;
		background: red;
		width: 20px;
		height: 150px;
		top: 45%;
		left: 45%;
		transform: translate(-50%, -50%);
		animation: animation 6s ease infinite;
	}

	.main2{
		position: absolute;
		display: block;
		background: red;
		width: 150px;
		height: 20px;
		top: 45%;
		left: 45%;
		transform: translate(-50%, -50%);
		animation: animation 6s ease infinite;
	}

	.main3{
		position: absolute;
		display: block;
		background: red;
		width: 20px;
		height: 150px;
		top: 45%;
		left: 55%;
		transform: translate(-50%, -50%);
		animation: animation 6s ease infinite;
	}

	.main4{
		position: absolute;
		display: block;
		background: red;
		width: 150px;
		height: 20px;
		top: 65%;
		left: 45%;
		transform: translate(-50%, -50%);
		animation: animation 6s ease infinite;
	}

	@keyframes animation{
		0%{
			transform: rotate(360deg);
			background: green;
		}50%{
			transform: rotate(-360deg);
			background: pink;
		}100%{
			transform: rotate(360deg);
			background: green;
		}
	}





</style>