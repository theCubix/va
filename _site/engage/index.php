

<?php
$firstNameErr = $lastNameErr = $emailErr = $descriptionErr = "";
$firstName = $lastName = $email = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "Vorname wird benötigt";
    } else {
        $firstName = test_input($_POST["firstName"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
            $firstNameErr = "Nur Buchstaben sind erlaubt"; 
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["lastName"])) {
            $lastNameErr = "Nachname wird benötigt";
        } else {
            $lastName = test_input($_POST["lastName"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
                $lastNameErr = "Nur Buchstaben sind erlaubt"; 
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "E-Mail Adresse wird benötigt";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Ungültiges E-Mailadressen-Format"; 
            }
        }
    }
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["description"])) {
            $descriptionErr = "Bemerkung wird benötigt";
        } else {
            $description = test_input($_POST["description"]);
        }

    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ((!empty($firstName)) && (!empty($lastName)) && (!empty($email)) && (!empty($description))) {
    $to      = 'timon.forrer@gmail.com';
    $subject = $firstName . " " . $lastName . " möchte Voltage Arc buchen!";
    $message = $firstName . " schrieb" . "\n" . $description;
    $headers = 'From: ' . $firstName . " " . $lastName . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
?>




<!DOCTYPE HTML>
<html lang="de">
    <head>
        
        
        <base href="http://www.voltagearc.com">
        
		
        
        <meta property="og:image" content="http://www.voltagearc.com/uploads/drums.jpg"/>
        
        <meta property="og:title" content="Buchen" />
        <meta property="og:url" content="http://www.voltagearc.com/engage/index.php" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#424242">
        <title>Buchen – Voltage Arc Website</title>
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat:400,700" rel="stylesheet">
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <link rel="icon" href="/uploads/icon192x192.png">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
             })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-86605317-2', 'auto');
            ga('send', 'pageview');
        </script>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.8";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        
        <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand"  href="/" >Voltage Arc</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li ><a href="/">Start</a></li>
                <li ><a href="/events/">Veranstaltungen</a></li>
                <li ><a href="/gallery/">Galerie</a></li>
                <li ><a href="/blog/">Blog</a></li>
                <li class="active"><a href="/engage/">Buchen</a></li>
            </ul>
        </div>
    </div>
</nav>

        
                <div class="fullscreen-image" style="background-image:url(/uploads/drums.jpg)" title="">
            <div id="backgroundOverlay">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="material-shadow-1 material-section col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    <h1>Buchen</h1>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <div class="form-group">
            <label>Vorname</label>
            <input type="text" class="form-control" placeholder="Vorname" name="firstName">
            <span class="help-block"><?php echo $firstNameErr;?></span>
        </div>
        
        <div class="form-group">
            <label>Nachname</label>
            <input type="text" class="form-control" placeholder="Nachname" name="lastName">
            <span class="help-block"><?php echo $lastNameErr;?></span>
        </div>
        
        <div class="form-group">
            <label>E-Mail Adresse</label>
            <input type="text" class="form-control" placeholder="E-Mail" name="email">
            <span class="help-block"><?php echo $emailErr;?></span>
        </div>
        
        <div class="form-group">
            <label>Hier hast du Platz, den Anlass zu beschreiben und das gewünschten Datum anzugeben.</label>
            <textarea rows="5" class="form-control" cols="30" placeholder="Bemerkung" name="description"></textarea>
            <span class="help-block"><?php echo $descriptionErr;?></span>
        </div>
        
        <input type="submit" value="Submit" value="Absenden" class="btn btn-default pull-right" name="submit">
        
    </form>
    
    <p class="label label-default"><span class="glyphicon glyphicon-exclamation-sign"></span> Alle Felder müssen ausgefüllt sein.</p>

</div>

                </div>
            </div>
        </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/custom.js"></script>
        <script type="text/javascript">
        ;( function( $ ) {
            
            $( '.swipebox' ).swipebox();
            
        } )( jQuery );
        </script>
        
        <div class="dark-background">
    <footer class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h1>Voltage Arc</h1>
                <p><a href="https://maps.google.com/?q=Luzernerstrasse+14,+5712+Beinwil+am+See" target="_blank">Luzernerstrasse 14 / Postfach 50</a></p>
                <p><a href="https://maps.google.com/?q=Luzernerstrasse+14,+5712+Beinwil+am+See" target="_blank">5712 Beinwil am See</a></p>
                <p><a href="tel:0796898660">079 689 86 60</a></p>
            </div>
            <div class="social col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h1>Folge uns!</h1>
                <p><a href="https://fb.me/VoltageArc" target="_blank">Facebook</a></p>
                <p><a href="https://www.instagram.com/voltage_arc/" target="_blank">Instagram</a></p>
                <p><a href="https://www.youtube.com/channel/UCdARchfQvlOBcMNZynTPRCg" target="_blank">YouTube</a></p>
            </div>
        </div>
    </footer>
</div>

        
    </body>
</html>
