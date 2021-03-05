<?php
    /* include 'index.php'; */
    /* include 'test.php'; */
    $message_sent = false;
    
    if(isset($_POST['email']) && $_POST['email'] != ''){

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];
        
            /* $to = "///@///.///";   */                        // sihtmärgi emaili aadress
            $body = "";
        
            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";
        
            mail($to, $messageSubject, $body);

            $message_sent = true;
        }
    }

    $target = '';
    if(isset($_POST['test_btn'])){
      echo("XXX");
      /* $target = "Torma";
      testFunction($target); */
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eesti Trip</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">                <!-- Bootstrap stylesheet -->
    <link rel="stylesheet" href="style/style.css">                      <!-- Stylesheet -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">         <!-- Bootstrap navigation bar -->
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Eestimaa Trip</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2 rounded-pill" type="search" placeholder="Otsisõna" aria-label="Search">
              <button class="btn btn-primary" type="submit">Otsi</button>
            </form>
          </div>
        </div>
    </nav>

    <div id="name" style="color: cadetblue;"><h1>Eestimaa Trip</h1></div>

<div id="body">             
                            <!-- tegelik HTML kehand  -->
                            <!-- kaart huvipunktidega -->

        <?php include 'map.php';?>

                          <!-- MAAKONDADE NUPUD -->
        <div id="maakonnad">
            <button type="button" class="btn" onclick="window.location.href='har.php#siht'" style="background-color: #ffe4b7;">Harjumaa</button>
            <button type="button" class="btn" onclick="window.location.href='hii.php#siht'" style="background-color: #aedde3;">Hiiumaa</button>
            <button type="button" class="btn" onclick="window.location.href='ivi.php#siht'" style="background-color: #c6b2d7;">Ida-Virumaa</button>
            <button type="button" class="btn" onclick="window.location.href='jog.php#siht'" style="background-color: #ffde6a;">Jõgevamaa</button>
            <button type="button" class="btn" onclick="window.location.href='jar.php#siht'" style="background-color: #fabfc5;">Järvamaa</button>
            <button type="button" class="btn" onclick="window.location.href='laa.php#siht'" style="background-color: #cfe39b;">Läänemaa</button>
            <button type="button" class="btn" onclick="window.location.href='lvi.php#siht'" style="background-color: #ced1a6;">Lääne-Virumaa</button>
            <button type="button" class="btn" onclick="window.location.href='par.php#siht'" style="background-color: #aacdeb;">Pärnumaa</button>
            <button type="button" class="btn" onclick="window.location.href='pol.php#siht'" style="background-color: #b4dbae;">Põlvamaa</button>
            <button type="button" class="btn" onclick="window.location.href='rap.php#siht'" style="background-color: #fabea6;">Raplamaa</button>
            <button type="button" class="btn" onclick="window.location.href='saa.php#siht'" style="background-color: #98d3bf;">Saaremaa</button>
            <button type="button" class="btn" onclick="window.location.href='tar.php#siht'" style="background-color: #e8eeb0;">Tartumaa</button>
            <button type="button" class="btn" onclick="window.location.href='val.php#siht'" style="background-color: #fddab2;">Valgamaa</button>
            <button type="button" class="btn" onclick="window.location.href='vil.php#siht'" style="background-color: #fee191;">Viljandimaa</button>
            <button type="button" class="btn" onclick="window.location.href='vor.php#siht'" style="background-color: #b8d98a;">Võrumaa</button>
        </div><br>

                          <!-- siia kuvame sihtmärgid --> 

        <?php
        $first = rand(1, 56);
        $second = rand(1, 56);
        $third = rand(1, 56);
        /* echo $first." ".$second." ".$third; */

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "eesti_trip";

        // Ühenduse loomine - Procedural version
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Kas ühendus toimib?
        if (!$conn) {
            die("Ühenduse loomine ei õnnestunud: " . mysqli_connect_error());
            exit;
        }
        /* echo"Ühenduse loomine õnnestus!"; */

        $sql = "SELECT tunnus, nimi, maakond, info, asukoht, iframe FROM siht WHERE id='$first' OR id='$second' OR id='$third'";

        if ($result=mysqli_query($conn,$sql)) {
            if(mysqli_num_rows($result)>0){
                echo"<div class='cards'>";
                while($row=mysqli_fetch_array($result)){
                    echo"<div class='card'>";
                    echo"<div class='card_container'>";
                    echo"<img class='location' src='img/".$row['tunnus'].".jpg' alt=''>";
                    echo"</div>";
                    echo"<div class='details'>";
                    echo"<h3>".$row['nimi']."</h3>";
                    echo"<div class='mk'><b>".$row['maakond']."</b></div>";
                    echo"<p>".$row['info']."</p>";
                    echo"<p><a target='_blank' href=".$row['asukoht'].">Google Maps link</a></p>";
                    /* echo$row['iframe']; */			// google kaart
                    echo"</div>";
                    echo"</div>";
                } //Read väljastatud
                echo"</div class='cards'>";
                mysqli_free_result($result);
                } else {
                    echo"Kirjeid ei leitud!";
                }     //Sisesmise IF-lause lõpp 
        } else {
            echo "Viga: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>

        </div><br><br>
        </div><br><br>
    </div><br><br>
                        <!-- LINGID -->                   
    
    <?php include 'links.php';?>

                        <!-- KONTAKTIVORM -->
    <script>
        function myFunction(){
            document.getElementById("output").innerHTML = "Sa klikkisid nupul";
        }
    </script>
    <?php
    if($message_sent):
    ?>

      <h3>Tänud, me võtame teiega ühendust!</h3>

    <?php
    else:
    ?>
    <div class="form-container">
      <form action="index.php" method="POST" class="form">
        <div class="form-group">
          <label for="name" class="form-label">Nimi</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Jane Doe" tabindex="1" required>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="jane@doe.com" tabindex="2" required>
        </div>
        <div class="form-group">
          <label for="subject" class="form-label">Teema</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Tere!" tabindex="3" required>
        </div>
        <div class="form-group">
          <label for="message" class="form-label">Sõnum</label>
          <textarea name="message" id="message" cols="30" rows="6" placeholder="Sisesta sõnum..." tabindex="4"></textarea>
        </div><br>
        <div>
          <button type="submit" class="btn btn-secondary formbutton">Saada sõnum!</button>
        </div>
      </form>
    </div><br>
    <?php
    endif;
    ?>
    
    <script type="text/javascript" src="js/bootstrap.min.js"></script>  <!-- Bootstrap script -->
</body>
<p>&copy; 2021 Martin Maasik, Rasmus Raaga</p>
</html>