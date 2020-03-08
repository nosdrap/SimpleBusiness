<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Business</title>
<style>
table {
  border: 1px solid black;
}
</style>
</head>

<body>
<?php
	$name = $email = $nameErr = $emailErr = $phone = $phoneErr = $position = $positionErr = $web = $webErr = $facebook = $facebookErr = "";
	$canvasHeight = 591;
	$canvasWidth = $canvasHeight * 1.8;
	$basicWidth=$canvasWidth*(15/250);
	$nameHeight = $canvasHeight*(55/250);
	$nameWidth = $basicWidth;
	$positionHeight = $canvasHeight*(85/250);
	$positionWidth = $basicWidth;
	$contactHeight = $canvasHeight*(130/250);
	$contactWidth = $basicWidth + $canvasWidth*(10/250);
	$fontName=$canvasHeight*(30/250);
	$fontPosition=$canvasHeight*(20/250);
	$fontContact=$canvasHeight*(17/250);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  /*if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {*/
    $name = test_input($_POST["name"]);
    /*if (!preg_match("/^[a-zA-ZéíáýžřčšěťľúůóďňĚŠČŘŽÝÁÍÉŤĎĽÚŮŇ., ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }*/
  if (!empty($_POST["position"])) {
    $position = test_input($_POST["position"]);
    /*if (!preg_match("/^[a-zA-ZéíáýžřčšěťľúůóďňĚŠČŘŽÝÁÍÉŤĎĽÚŮŇ., ]*$/",$position)) {
      $positionErr = "Only letters and white space allowed";
    }*/
  }
  if (!empty($_POST["phone"])) {
    $phone = test_input($_POST["phone"]);
    /*if (!preg_match("/^[1-9+ ]*$/",$phone)) {
      $phoneErr = "Only numbers and white space allowed";
    }*/
  }
  if (!empty($_POST["email"])) {
    $email = test_input($_POST["email"]);
    /*if (!preg_match("/^[a-zA-Z1-9@. ]*$/",$email)) {
      $emailErr = "Only letters and white space allowed";
    }
		if (strpos($email, '@') == false){
			$emailErr = "Not valid email";
		}else if(strpos($email, '.') == false){
			$emailErr = "Not valid email";
		}else if (strpos($email, '.') <= strpos($email, '@')){
			$emailErr = "Not valid email";
		}*/
  }
  if (!empty($_POST["web"])) {
    $web = test_input($_POST["web"]);
    /*if (!preg_match("/^[1-9+ ]*$/",$web)) {
      $webErr = "Only numbers and white space allowed";
    }*/
  }
  if (!empty($_POST["facebook"])) {
    $facebook = test_input($_POST["facebook"]);
    /*if (!preg_match("/^[1-9+ ]*$/",$facebook)) {
      $facebookErr = "Only numbers and white space allowed";
    }*/
  }
  if (!empty($_POST["resetName"])) {
    unset($_POST['nameWidth']);
		unset($_POST['nameHeight']);
		unset($_POST['resetName']);
	}
  if (!empty($_POST["resetPosition"])) {
    unset($_POST['positionWidth']);
		unset($_POST['positionHeight']);
		unset($_POST['resetPosition']);
	}
  if (!empty($_POST["resetContact"])) {
    unset($_POST['contactWidth']);
		unset($_POST['contactHeight']);
		unset($_POST['resetContact']);
	}
  if (!empty($_POST["nameHeight"])) {
    $nameHeight = test_input($_POST["nameHeight"]);
  }else{
		$_POST["nameHeight"] = $nameHeight;
	}
  if (!empty($_POST["nameWidth"])) {
    $nameWidth = test_input($_POST["nameWidth"]);
  }else{
		$_POST["nameWidth"] = $nameWidth;
	}
  if (!empty($_POST["positionHeight"])) {
    $positionHeight = test_input($_POST["positionHeight"]);
  }else{
		$_POST["positionHeight"] = $positionHeight;
	}
  if (!empty($_POST["positionWidth"])) {
    $positionWidth = test_input($_POST["positionWidth"]);
  }else{
		$_POST["positionWidth"] = $positionWidth;
	}
  if (!empty($_POST["contactHeight"])) {
    $contactHeight = test_input($_POST["contactHeight"]);
  }else{
		$_POST["contactHeight"] = $contactHeight;
	}
  if (!empty($_POST["contactWidth"])) {
    $contactWidth = test_input($_POST["contactWidth"]);
  }else{
		$_POST["contactWidth"] = $contactWidth;
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<script>
window.onload = function() {
	var phoneimg=document.getElementById("phonesrc");
	var emailimg=document.getElementById("emailsrc");
	var webimg=document.getElementById("websrc");
	var fbimg=document.getElementById("fbsrc");
        var canvas=document.getElementById("myCanvas");
        var OPZ=document.getElementById("opz");
        var MZ=document.getElementById("mz");
        var FN=document.getElementById("fn");
        var Prah=document.getElementById("prah");
	var name = "<?php echo $name; ?>";
	var position = "<?php echo $position; ?>";
	var phone = "<?php echo $phone; ?>";
	var email = "<?php echo $email; ?>";
	var web = "<?php echo $web; ?>";
	var facebook = "<?php echo $facebook; ?>";
	var nameHeight = <?php echo $nameHeight; ?>;
	var nameWidth = <?php echo $nameWidth; ?>;
	var positionHeight = <?php echo $positionHeight; ?>;
	var positionWidth = <?php echo $positionWidth; ?>;
	var contactHeight = <?php echo $contactHeight; ?>;
	var contactWidth = <?php echo $contactWidth; ?>;
	var canvasHeight= <?php echo $canvasHeight; ?>;
	var fontName= <?php echo $fontName; ?>;
	var fontPosition= <?php echo $fontPosition; ?>;
	var fontContact= <?php echo $fontContact; ?>;
	var height=0;
	if (canvas.getContext)
	{
		var cxt=canvas.getContext("2d");
		cxt.fillStyle="#FFFFFF";
		cxt.fillRect(0,0,canvas.width,canvas.height);
		var fillName = canvas.getContext("2d");
		fillName.font = fontName.toString()+"px Arial";
		fillName.fillStyle = "black";
		fillName.textAlign = "left";
		fillName.fillText(name, nameWidth, nameHeight);
		var fillPosition = canvas.getContext("2d");
		fillPosition.font = fontPosition.toString()+"px Arial";
		fillPosition.fillStyle = "black";
		fillPosition.textAlign = "left";
		fillPosition.fillText(position, positionWidth, positionHeight);
		if(phone!=""){
		var drawPhone = canvas.getContext("2d");
		drawPhone.drawImage(phoneimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250),canvasHeight*(15/250),canvasHeight*(15/250));
		var fillPhone = canvas.getContext("2d");
		fillPhone.font = fontContact.toString()+"px Arial";
		fillPhone.fillStyle = "black";
		fillPhone.textAlign = "left";
		fillPhone.fillText(phone, contactWidth, contactHeight);
		height=height + (canvasHeight/12.5);
		}
		if (email!=""){
		var drawEmail = canvas.getContext("2d");
		drawEmail.drawImage(emailimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250)+height,canvasHeight*(15/250),canvasHeight*(15/250));
		var fillEmail = canvas.getContext("2d");
		fillEmail.font = fontContact.toString()+"px Arial";
		fillEmail.fillStyle = "black";
		fillEmail.textAlign = "left";
		fillEmail.fillText(email, contactWidth, contactHeight+height);
		height=height + (canvasHeight/12.5)
		}
		if (web!=""){
		var drawWeb = canvas.getContext("2d");
		drawWeb.drawImage(webimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250)+height,canvasHeight*(15/250),canvasHeight*(15/250));
		var fillWeb = canvas.getContext("2d");
		fillWeb.font = fontContact.toString()+"px Arial";
		fillWeb.fillStyle = "black";
		fillWeb.textAlign = "left";
		fillWeb.fillText(web, contactWidth, contactHeight+height);
		height=height + (canvasHeight/12.5)
		}
		if (facebook!=""){
		var drawFacebook = canvas.getContext("2d");
		drawFacebook.drawImage(fbimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250)+height,canvasHeight*(15/250),canvasHeight*(15/250));
		var fillFacebook = canvas.getContext("2d");
		fillFacebook.font = fontContact.toString()+"px Arial";
		fillFacebook.fillStyle = "black";
		fillFacebook.textAlign = "left";
		fillFacebook.fillText(facebook, contactWidth, contactHeight+height);
		height=height + (canvasHeight/12.5)
		}
		var button = document.getElementById('btn-download');
		button.addEventListener('click', function (e) {
			var dataURL = canvas.toDataURL('image/png');
			button.href = dataURL;
		});
		
		
		canvas.style.height = "250px";
		canvas.style.width = "450px";
	}
}
</script>
<table>
	<img id="phonesrc" src="phone.png" style="display:none;" >
	<img id="emailsrc" src="email.png" style="display:none;" >
	<img id="websrc" src="web.png" style="display:none;" >
	<img id="fbsrc" src="fb.png" style="display:none;" >
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<caption>Business Card</caption>
		<tr>
			<td>Name:</td>
			<td><input type="text" id="name" name="name" value="<?php echo $name;?>">
				 <input type="hidden" name="nameWidth" value="<?php echo $nameWidth;?>">
				 <input type="hidden" name="nameHeight" value="<?php echo $nameHeight;?>">
				<button name="nameHeight" type="submit" value=<?php echo ($nameHeight-5);?>>/\</button>
				<button name="nameHeight" type="submit" value=<?php echo ($nameHeight+5);?>>\/</button>
				<button name="nameWidth" type="submit" value=<?php echo ($nameWidth-5) ;?>> &lt </button>
				<button name="nameWidth" type="submit" value=<?php echo ($nameWidth+5) ;?>> &gt </button>
				<button name="resetName" type="submit" value=1> reset </button>
				<span class="error"> <?php echo $nameErr;?></span>
			</td>
		</tr>
		<tr>
			<td>Position:</td>
			<td>
				<input type="text" id="position" name="position" value="<?php echo $position;?>">
				 <input type="hidden" name="positionWidth" value="<?php echo $positionWidth;?>">
				 <input type="hidden" name="positionHeight" value="<?php echo $positionHeight;?>">
				<button name="positionHeight" type="submit" value=<?php echo ($positionHeight-5);?>>/\</button>
				<button name="positionHeight" type="submit" value=<?php echo ($positionHeight+5);?>>\/</button>
				<button name="positionWidth" type="submit" value=<?php echo ($positionWidth-5) ;?>> &lt </button>
				<button name="positionWidth" type="submit" value=<?php echo ($positionWidth+5) ;?>> &gt </button>
				<button name="resetPosition" type="submit" value=1> reset </button>
				<span class="error"> <?php echo $positionErr;?></span>
			</td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td>
				<input type="text" id="phone" name="phone" value="<?php echo $phone;?>">
				 <input type="hidden" name="contactWidth" value="<?php echo $contactWidth;?>">
				 <input type="hidden" name="contactHeight" value="<?php echo $contactHeight;?>">
				<button name="contactHeight" type="submit" value=<?php echo ($contactHeight-5);?>>/\</button>
				<button name="contactHeight" type="submit" value=<?php echo ($contactHeight+5);?>>\/</button>
				<button name="contactWidth" type="submit" value=<?php echo ($contactWidth-5) ;?>> &lt </button>
				<button name="contactWidth" type="submit" value=<?php echo ($contactWidth+5) ;?>> &gt </button>
				<button name="resetContact" type="submit" value=1> reset </button>
				<span class="error"> <?php echo $phoneErr;?></span>
			</td>
		</tr>
		<tr>
			<td>E-mail:</td>
			<td>
				<input type="text" id="email" name="email" value="<?php echo $email;?>">
				<span class="error"> <?php echo $emailErr;?></span>
			</td>
		</tr>
		<tr>
			<td>Web:</td>
			<td>
				<input type="text" id="web" name="web" value="<?php echo $web;?>">
				<span class="error"> <?php echo $webErr;?></span>
			</td>
		</tr>
		<tr>
			<td>Facebook:</td>
			<td>
				<input type="text" id="facebook" name="facebook" value="<?php echo $facebook;?>">
				<span class="error"> <?php echo $facebookErr;?></span>
			</td>
                </tr>
		<tr>
			<td>Adress:</td>
			<td>
				<input type="text" id="facebook" name="facebook" value="<?php echo $facebook;?>">
				<span class="error"> <?php echo $facebookErr;?></span>
			</td>
                </tr>
		<tr>
			<td colspan="2" style="text-align:center"><input type="submit" value="Apply">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center">
				<canvas id="myCanvas" width="<?php echo $canvasWidth;?>" height="<?php echo $canvasHeight;?>" style="border:1px solid #000000;"></canvas>
			</td>
		</tr>
	</form>
	<form action="">
		<tr>
			<td colspan="2" style="text-align:center"><input type="submit" value="Reset">
			</td>
		</tr>
	</form>
</table>
<a href="#" class="button" id="btn-download" download="<?php echo $name;?> vizitka.png">Download</a>


</body>
</html>