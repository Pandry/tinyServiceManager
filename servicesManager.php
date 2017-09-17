<?php
$password = "changeMe";
$allowedServices = [["apache2", ["restart", "reload"]], ["sshd", []]];

if (isset($_POST['password'])) {
	if ($_POST['password'] == $password) {
		// IMPORTANT:
		//
		// # visudo
		// www-data ALL=NOPASSWD: <path/to/script>
		//  OR
    // www-data ALL=NOPASSWD: ALL
    

		foreach($allowedServices as $serv) {
			if ($_POST['value'] == $serv[0]) {
				// service allowed
				foreach($serv[1] as $act) {
					if ($act == $_POST['action']) {
            //Method present
						shell_exec("sudo service $serv[0] $act");
						die(1);
					}
				}
			}
		}
		die("500");
	}
	else {
		// Wrong password
		die("-10");
	}
	die("-100");
}
else {
  //No password
}
?><html>
<head>
<title>Services Manager</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Ubuntu|Courgette);@import url(http://weloveiconfonts.com/api/?family=entypo);div.mainPanel,div.mainPanel div.txt{position:relative}*{font-family:Ubuntu,sans-serif;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-transition:all .2s ease-out;-moz-transition:all .2s ease-out;-ms-transition:all .2s ease-out;-o-transition:all .2s ease-out;transition:all .2s ease-out;-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-ms-backface-visibility:hidden;backface-visibility:hidden}body,html{width:100%;height:100%;padding:0;margin:0;background:url(https://subtlepatterns.com/patterns/tweed.png);-webkit-transition:all 0s;-moz-transition:all 0s;-ms-transition:all 0s;-o-transition:all 0s;transition:all 0s}div.mainPanel{width:100%;max-width:500px;padding:20px;margin:0 auto;top:50%;-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);transform:translateY(-50%);background-color:rgba(221,221,221,.6);-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;-webkit-box-shadow:0 0 5px 1px #333;-moz-box-shadow:0 0 5px 1px #333;box-shadow:0 0 5px 1px #333}div.mainPanel input{width:100%;margin:8px 0;padding:12px}div.mainPanel div.service a:before,div.mainPanel div.txt label:before{font-family:entypo,sans-serif;text-align:center;width:50px;height:50px}div.mainPanel div.txt input[type=text],div.mainPanel div.txt input[type=password]{color:#555;text-shadow:0 1px #FFF;padding:12px 12px 12px 45px;border:1px solid #888;border:2px solid transparent;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;outline:0;background-color:rgba(255,255,255,.8)}div.mainPanel div.txt input[type=text]:focus,div.mainPanel div.txt input[type=text]:hover,div.mainPanel div.txt input[type=password]:focus,div.mainPanel div.txt input[type=password]:hover{background-color:#FFF}div.mainPanel div.txt input[type=text]:focus,div.mainPanel div.txt input[type=password]:focus{border-color:#27ae60}div.mainPanel div.txt label{cursor:text}div.mainPanel div.txt label:before{display:inline-block;position:absolute;left:0;top:0;font-size:1.1em;color:#2ecc71;line-height:58px}div.mainPanel div.service{display:-webkit-box;display:-moz-box;display:-ms-flexbox;display:-webkit-flex;display:flex;margin-bottom:10px}div.mainPanel div.service a{display:inline-block;-webkit-flex:1;-moz-flex:1;flex:1;text-align:center;text-decoration:none;outline:0}div.mainPanel div.service a:before{display:inline-block;padding:0;font-size:2em;color:#444;line-height:50px;text-shadow:0 1px rgba(255,255,255,.4);-webkit-transition:all .2s ease-out;-moz-transition:all .2s ease-out;-ms-transition:all .2s ease-out;-o-transition:all .2s ease-out;transition:all .2s ease-out;-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%}div.mainPanel div.service a:focus:before,div.mainPanel div.service a:hover:before{color:#FFF;-webkit-transition:all .2s ease-out,box-shadow .3s ease-out .1s;-moz-transition:all .2s ease-out,box-shadow .3s ease-out .1s;-ms-transition:all .2s ease-out,box-shadow .3s ease-out .1s;-o-transition:all .2s ease-out,box-shadow .3s ease-out .1s;transition:all .2s ease-out,box-shadow .3s ease-out .1s}div.mainPanel div.service a:active:before{-webkit-transform:scale(.9);-moz-transform:scale(.9);-ms-transform:scale(.9);-o-transform:scale(.9);transform:scale(.9);-webkit-transition:all 0s;-moz-transition:all 0s;-ms-transition:all 0s;-o-transition:all 0s;transition:all 0s}div.mainPanel div.service a.stop:before{content:"\25a0"}div.mainPanel div.service a.stop:focus:before,div.mainPanel div.service a.stop:hover:before{text-shadow:0 1px #700E0E;background-color:#A81616;-webkit-box-shadow:0 0 0 4px rgba(152,59,59,.6);-moz-box-shadow:0 0 0 4px rgba(152,59,59,.6);box-shadow:0 0 0 4px rgba(152,59,59,.6)}div.mainPanel div.service a.stop:active:before{-webkit-box-shadow:0 0 0 4px rgba(152,59,59,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);-moz-box-shadow:0 0 0 4px rgba(152,59,59,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);box-shadow:0 0 0 4px rgba(152,59,59,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6)}div.mainPanel div.service a.start:before{content:"\25b6"}div.mainPanel div.service a.start:focus:before,div.mainPanel div.service a.start:hover:before{text-shadow:0 1px #0b6e34;background-color:#12b370;-webkit-box-shadow:0 0 0 4px rgba(16,155,74,.6);-moz-box-shadow:0 0 0 4px rgba(16,155,74,.6);box-shadow:0 0 0 4px rgba(16,155,74,.6)}div.mainPanel div.service a.start:active:before{-webkit-box-shadow:0 0 0 4px rgba(153,155,16,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);-moz-box-shadow:0 0 0 4px rgba(16,155,74,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);box-shadow:0 0 0 4px rgba(16,155,74,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6)}div.mainPanel div.service a.restart:before{content:"\27f3"}div.mainPanel div.service a.restart:focus:before,div.mainPanel div.service a.restart:hover:before{text-shadow:0 1px #999b10;background-color:#999b10;-webkit-box-shadow:0 0 0 4px rgba(153,155,16,.6);-moz-box-shadow:0 0 0 4px rgba(153,155,16,.6);box-shadow:0 0 0 4px rgba(153,155,16,.6)}div.mainPanel div.service a.restart:active:before{-webkit-box-shadow:0 0 0 4px rgba(153,155,16,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);-moz-box-shadow:0 0 0 4px rgba(153,155,16,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);box-shadow:0 0 0 4px rgba(153,155,16,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6)}div.mainPanel div.service a.reload:before{content:"\1f504"}div.mainPanel div.service a.reload:focus:before,div.mainPanel div.service a.reload:hover:before{text-shadow:0 1px #0649a0;background-color:#0649a0;-webkit-box-shadow:0 0 0 4px rgba(6,73,160,.6);-moz-box-shadow:0 0 0 4px rgba(6,73,160,.6);box-shadow:0 0 0 4px rgba(6,73,160,.6)}div.mainPanel div.service a.reload:active:before{-webkit-box-shadow:0 0 0 4px rgba(6,73,160,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);-moz-box-shadow:0 0 0 4px rgba(6,73,160,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6);box-shadow:0 0 0 4px rgba(6,73,160,.6),0 0 0 4px #333,0 1px 0 4px rgba(255,255,255,.6)}div.mainPanel div.hr{display:-webkit-box;display:-moz-box;display:-ms-flexbox;display:-webkit-flex;display:flex;width:100%;margin:40px 0;color:#555;text-shadow:0 1px rgba(255,255,255,.4)}div.mainPanel div.hr div{font-family:Courgette,cursive;font-size:1.2em}div.mainPanel div.hr div:first-child,div.mainPanel div.hr div:last-child{-webkit-flex:1;-moz-flex:1;flex:1;position:relative}div.mainPanel div.hr div:first-child:before,div.mainPanel div.hr div:last-child:before{content:' ';position:absolute;top:50%;left:0;right:0;height:1px;background-color:#5F5F5F;-webkit-box-shadow:0 1px 0 rgba(255,255,255,.2);-moz-box-shadow:0 1px 0 rgba(255,255,255,.2);box-shadow:0 1px 0 rgba(255,255,255,.2)}div.mainPanel div.hr div:first-child{margin-right:20px}div.mainPanel div.hr div:last-child{margin-left:20px}@media only screen and (max-width:555px){div.mainPanel{width:90%}}@media only screen and (max-width:400px){div.mainPanel{width:100%;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}}
</style>
</head>
<body>
<div class="mainPanel">
    <div class="txt">
        <input id="pwd" type="password" placeholder="Password" />
        <label for="pwd" class="entypo-lock"></label>
    </div>
    <?php
foreach($allowedServices as $serv) { ?>
    <div class="hr">
        <div></div>
        <div style="margin-right: 8px;height: 15px;width: 15px;border-radius: 100px;background-color:<?php
	if (shell_exec(" ps -A | grep $serv[0]") == "") { ?>#A81616 <?php
	}
	else { ?>rgb(18, 179, 112) <?php
	} ?>;margin-top: 3.5px;"></div>
        <div><?php echo strtoupper($serv[0]); ?></div>
        <div></div>
    </div>
    <div class="service">
        <?php
	foreach($serv[1] as $action) {
		echo "<a onclick=\"serviceAction(this)\" class=\"$action\" value=\"$serv[0]\" action=\"$action\"></a>\n";
	}

?>
    </div>
<?php
} ?>
</div>
<script>
function serviceAction(element){
  loadXMLDoc("?value="+element.getAttribute("value")+"&action="+element.getAttribute("action")+"&password="+document.getElementById("pwd").value);

}

function loadXMLDoc(url) {
  var method = "POST";
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
               switch(xmlhttp.responseText){
                  case "1":
                  sessionStorage.setItem('password', document.getElementById("pwd").value);
                  alert("Success!");
                  location.reload();
                  break;
                  case "-10":
                  alert("Wrong password!");
                  break;
                  case "-100":
                  alert("No password");
                  break;
                }
        }
    };
    xmlhttp.open(method, "?", true);
    if(method != "GET"){
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(url.substring(url.indexOf("?")+1));
    }else{
      xmlhttp.send();
    }
}

// Set password on start
if (sessionStorage.getItem('password') != null){
  document.getElementById("pwd").value = sessionStorage.getItem('password');
}
</script>
</body>
