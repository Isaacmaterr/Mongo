<?php
require_once '../../../vendor/autoload.php';
require_once '../../../index.php';
?>


<div class="container">

    <form class="form-signin" action="indexAction.php" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="Email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="Senha" class="form-control" placeholder="Password" required="">
       
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="logar">Logar</button>
      </form>

    </div>

