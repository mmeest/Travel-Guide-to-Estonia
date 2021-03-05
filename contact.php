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

<?php
    if($message_sent):
    ?>

      <h3>Tänud, me võtame teiega ühendust!</h3>

    <?php
    else:
    ?>
    <div class="form-container">
      <form action="contact.php" method="POST" class="form">
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