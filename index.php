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
    //Test
	$name = $email = $nameErr = $emailErr = $phone = $phoneErr = $position = $positionErr = $web = $webErr = $facebook = $facebookErr = "";
        $image= "0";
        $fontStyle="Arial";
        $fontNameSize=20;
        $fontPositionSize=20;
        $fontContactSize=17;
	$canvasHeight = 591;
	$canvasWidth = $canvasHeight * 1.8;
	$basicWidth=$canvasWidth*(15/250);
	$nameHeight = $canvasHeight*(55/250);
	$nameWidth = $basicWidth;
	$positionHeight = $canvasHeight*(85/250);
	$positionWidth = $basicWidth;
	$contactHeight = $canvasHeight*(130/250);
	$contactWidth = $basicWidth + $canvasWidth*(10/250);
	//$fontName=$canvasHeight*(30/250);
	//$fontPosition=$canvasHeight*(20/250);
	//$fontContact=$canvasHeight*(17/250);


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
  if (!empty($_POST["image"])) {
    $image = test_input($_POST["image"]);
  }
  if (!empty($_POST["fontStyle"])) {
    $fontStyle = test_input($_POST["fontStyle"]);
  }
  if (!empty($_POST["resetName"])) {
    unset($_POST['nameWidth']);
		unset($_POST['nameHeight']);
		unset($_POST['resetName']);
                unset($_POST['fontNameSize']);
	}
  if (!empty($_POST["resetPosition"])) {
    unset($_POST['positionWidth']);
		unset($_POST['positionHeight']);
		unset($_POST['resetPosition']);
                unset($_POST['fontPositionSize']);
	}
  if (!empty($_POST["resetContact"])) {
    unset($_POST['contactWidth']);
		unset($_POST['contactHeight']);
		unset($_POST['resetContact']);
                unset($_POST['fontContactSize']);
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
  if (!empty($_POST["fontNameSize"])) {
    $fontNameSize = test_input($_POST["fontNameSize"]);
    if (!preg_match("/^[1-9]*$/",$fontNameSize)) {
      $fontNameSize=20;
      $Post["fontNameSize"]= $fontNameSize;
    };
  }else{
            $_POST["fontNameSize"] = $fontNameSize;
	}
  if (!empty($_POST["fontPositionSize"])) {
    $fontPositionSize = test_input($_POST["fontPositionSize"]);
    if (!preg_match("/^[1-9]*$/",$fontPositionSize)) {
      $fontPositionSize=20;
      $Post["fontPositionSize"]= $fontPositionSize;
    };
  }else{
            $_POST["fontPositionSize"] = $fontPositionSize;
	}
  if (!empty($_POST["fontContactSize"])) {
    $fontContactSize = test_input($_POST["fontContactSize"]);
    if (!preg_match("/^[1-9]*$/",$fontContactSize)) {
      $fontContactSize=17;
      $Post["fontContactSize"]= $fontContactSize;
    };
  }else{
            $_POST["fontContactSize"] = $fontContactSize;
	}
}
//echo $fontStyle;
    //$fontName=$canvasHeight*($fontNameSize/250);
    //$fontPosition=$canvasHeight*(20/250);
    //$fontContact=$canvasHeight*(17/250);

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
        var OPZ=document.getElementById("opzsrc");
        var MZ=document.getElementById("mzsrc");
        var FN=document.getElementById("fnsrc");
        var Prah=document.getElementById("prahsrc");
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
	var fontNameSize= canvasHeight*(<?php echo $fontNameSize;?> /250);
	var fontPositionSize= canvasHeight*(<?php echo $fontPositionSize; ?> /250);
	var fontContactSize= canvasHeight*(<?php echo $fontContactSize; ?>/250);
        var image = <?php echo $image; ?>;
        var fontStyle ="<?php echo $fontStyle; ?>";
	var height=0;
	if (canvas.getContext)
	{
		canvas.style.height = "250px";
		canvas.style.width = "450px";
		var cxt=canvas.getContext("2d");
		cxt.fillStyle="#FFFFFF";
		cxt.fillRect(0,0,canvas.width,canvas.height);
		var fillName = canvas.getContext("2d");
		fillName.font = fontNameSize.toString()+"px " + fontStyle;
		fillName.fillStyle = "black";
		fillName.textAlign = "left";
		fillName.fillText(name, nameWidth, nameHeight);
		var fillPosition = canvas.getContext("2d");
		fillPosition.font = fontPositionSize.toString()+"px Arial";
		fillPosition.fillStyle = "black";
		fillPosition.textAlign = "left";
		fillPosition.fillText(position, positionWidth, positionHeight);
		if(phone!=""){
		var drawPhone = canvas.getContext("2d");
		drawPhone.drawImage(phoneimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250),canvasHeight*(15/250),canvasHeight*(15/250));
		var fillPhone = canvas.getContext("2d");
		fillPhone.font = fontContactSize.toString()+"px Arial";
		fillPhone.fillStyle = "black";
		fillPhone.textAlign = "left";
		fillPhone.fillText(phone, contactWidth, contactHeight);
		height=height + (canvasHeight/12.5);
		}
		if (email!=""){
		var drawEmail = canvas.getContext("2d");
		drawEmail.drawImage(emailimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250)+height,canvasHeight*(15/250),canvasHeight*(15/250));
		var fillEmail = canvas.getContext("2d");
		fillEmail.font = fontContactSize.toString()+"px Arial";
		fillEmail.fillStyle = "black";
		fillEmail.textAlign = "left";
		fillEmail.fillText(email, contactWidth, contactHeight+height);
		height=height + (canvasHeight/12.5)
		}
		if (web!=""){
		var drawWeb = canvas.getContext("2d");
		drawWeb.drawImage(webimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250)+height,canvasHeight*(15/250),canvasHeight*(15/250));
		var fillWeb = canvas.getContext("2d");
		fillWeb.font = fontContactSize.toString()+"px Arial";
		fillWeb.fillStyle = "black";
		fillWeb.textAlign = "left";
		fillWeb.fillText(web, contactWidth, contactHeight+height);
		height=height + (canvasHeight/12.5)
		}
		if (facebook!=""){
		var drawFacebook = canvas.getContext("2d");
		drawFacebook.drawImage(fbimg, contactWidth-canvasHeight*(20/250), contactHeight-canvasHeight*(13/250)+height,canvasHeight*(15/250),canvasHeight*(15/250));
		var fillFacebook = canvas.getContext("2d");
		fillFacebook.font = fontContactSize.toString()+"px Arial";
		fillFacebook.fillStyle = "black";
		fillFacebook.textAlign = "left";
		fillFacebook.fillText(facebook, contactWidth, contactHeight+height);
		height=height + (canvasHeight/12.5)
		}
                if (image!=""){
                    switch(image) {
                        case 1:
                            var drawBottomImage= canvas.getContext("2d");
                            var opzheight=canvasHeight*(30/250);
                            var opzwidth=opzheight*(1703/353);
                            drawBottomImage.drawImage(OPZ,canvasHeight*(10/250), canvasHeight-canvasHeight*(35/250),opzwidth,opzheight);
                            var drawBottomMZ=canvas.getContext("2d");
                            var mzwidth=opzheight*(1913/396);
                            drawBottomMZ.drawImage(MZ,canvasHeight*(10/250)+opzwidth, canvasHeight-canvasHeight*(35/250),mzwidth,opzheight); 
                            var drawBottomFN=canvas.getContext("2d");
                            var fnwidth=opzheight*(757/268);
                            drawBottomFN.drawImage(FN,canvasHeight*(10/250)+opzwidth+mzwidth, canvasHeight-canvasHeight*(35/250),fnwidth,opzheight);    
                            var drawBottomPrah=canvas.getContext("2d");
                            var prahwidth=opzheight*(1200/599);
                            drawBottomPrah.drawImage(Prah,canvasHeight*(10/250)+opzwidth+mzwidth+fnwidth, canvasHeight-canvasHeight*(35/250),prahwidth,opzheight);                        
                        break;
                        case 2:
                            // code block
                            break;
                        case 3:
                            // code block
                            break;
                        case 4:
                            // code block
                            break;
                        default:
                             // code block
                    };
                };
		canvas.style.height = "250px";
		canvas.style.width = "450px";
		var button = document.getElementById('btn-download');
		button.addEventListener('click', function (e) {
			var dataURL = canvas.toDataURL('image/png');
			button.href = dataURL;
		});
		
		
		//canvas.style.height = "250px";
		//canvas.style.width = "450px";
	}
}
</script>
<table>
	<img id="phonesrc" src="phone.png" style="display:none;" >
	<img id="emailsrc" src="email.png" style="display:none;" >
	<img id="websrc" src="web.png" style="display:none;" >
	<img id="fbsrc" src="fb.png" style="display:none;" >
	<img id="fnsrc" src="fn.jpg" style="display:none;" >
	<img id="opzsrc" src="opz.jpg" style="display:none;" >
	<img id="prahsrc" src="prah.png" style="display:none;" >
	<img id="mzsrc" src="mz.jpg" style="display:none;" >
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<caption>Business Card</caption>
		<tr>
			<td>Name:</td>
			<td>
                                <input type="text" id="name" name="name" value="<?php echo $name;?>" style="width:100px">
                                <input type="number" id="fontNameSize" name="fontNameSize" value="<?php echo round($fontNameSize);?>" min="1" max="99" style="width:30px">
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
				<input type="text" id="position" name="position" value="<?php echo $position;?>" style="width:100px">
                                <input type="number" id="fontPositionSize" name="fontPositionSize" value="<?php echo round($fontPositionSize);?>" min="1" max="99" style="width:30px">
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
				<input type="text" id="phone" name="phone" value="<?php echo $phone;?>" style="width:100px">
                                <input type="number" id="fontContactSize" name="fontContactSize" value="<?php echo round($fontContactSize);?>" min="1" max="99" style="width:30px">
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
				<input type="text" id="email" name="email" value="<?php echo $email;?>" style="width:100px">
				<span class="error"> <?php echo $emailErr;?></span>
                                <select id="fontStyle" name="fontStyle">
                                <option value="Arial" <?php if ($fontStyle=="Arial"){echo "selected";};?>>Arial</option>
                                <option value="Helvetica" <?php if ($fontStyle=="Helvetica"){echo "selected";};?>>Helvetica</option>
                                <option value="Baskerville" <?php if ($fontStyle=="Baskerville"){echo "selected";};?>>Baskerville</option>
                                <option value="Courier" <?php if ($fontStyle=="Courier"){echo "selected";};?>>Courier</option>
                                <option value="TimesNewRoman" <?php if ($fontStyle=="TimesNewRoman"){echo "selected";};?>>Times New Roman</option>
                                <option value="Times" <?php if ($fontStyle=="Times"){echo "selected";};?>>Times</option>
                                <option value="Courier New" <?php if ($fontStyle=="Courier New"){echo "selected";};?>>Courier New</option>
                                <option value="Arial Narrow" <?php if ($fontStyle=="Arial Narrow"){echo "selected";};?>>Arial Narrow</option>
                                <option value="Candara" <?php if ($fontStyle=="Candara"){echo "selected";};?>>Candara</option>
                                <option value="Geneva" <?php if ($fontStyle=="Geneva"){echo "selected";};?>>Geneva</option>
                                <option value="Calibri" <?php if ($fontStyle=="Calibri"){echo "selected";};?>>Calibri</option>
                                <option value="Optima" <?php if ($fontStyle=="Optima"){echo "selected";};?>>Optima</option>
                                <option value="Cambria" <?php if ($fontStyle=="Cambria"){echo "selected";};?>>Cambria</option>
                                <option value="Monaco" <?php if ($fontStyle=="Monaco"){echo "selected";};?>>Monaco</option>
                        </select>
			</td>
		</tr>
		<tr>
			<td>Web:</td>
			<td>
				<input type="text" id="web" name="web" value="<?php echo $web;?>" style="width:100px">
				<span class="error"> <?php echo $webErr;?></span>
			</td>
		</tr>
		<tr>
			<td>Facebook:</td>
			<td>
				<input type="text" id="facebook" name="facebook" value="<?php echo $facebook;?>" style="width:100px">
				<span class="error"> <?php echo $facebookErr;?></span>
			</td>
                </tr>
                <tr>
                    <td><label for="image">Choose image:</label></td>
                    <td>
                        <select id="image" name="image"  style="width:105px">
                            <option value="" <?php if ($image==""){echo "selected";};?>></option>
                            <option value="1" <?php if ($image==1){echo "selected";};?>>Version 1</option>
                            <option value="2" <?php if ($image==2){echo "selected";};?>>Version 2</option>
                            <option value="3" <?php if ($image==3){echo "selected";};?>>Version 3</option>
                            <option value="4" <?php if ($image==4){echo "selected";};?>>Version 4</option>
                        </select>
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