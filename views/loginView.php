<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/loginController.php');

class loginView {
    public function head() {
        ?>
        <head>
          <title>EL AMAL ACADEMY</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../css/login.css">
        </head>
        <?php
    }

    public function form() {
        ?>
      <h2>Connectez vous MAINTENANT !</h2>
      <form method="post">
        <div class="image">
          <img src="../images/logos/laurel.png" alt="Avatar" class="icon">
        </div>

        <div class="mailEtPass">
          <label for="email"><b>Email</b></label>
          <input type="text" id="email" placeholder="Entrer votre email" name="email" required>

          <label for="psw"><b>Mot de passe</b></label>
          <input type="password" id="psw" placeholder="Entrer votre mot de passe" name="psw" required>
      
          <input id="unsub" type="submit" value="Connexion" name="submit">
        </div>
      </form>

      <?php
      $controler = new loginController();
      $result=$controler->login();
    }

    public function loginBody() { 
      ?>
          <body>
          <?php
          $this->form();
          echo '</body>';
      }

      public function afficherLoginPage() {
        echo '<html>';
        $this->head();
        $this->loginBody();
        echo '</html>';
    }
}