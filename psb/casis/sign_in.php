<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Sign in Calon Siswa</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/signin.css" rel="stylesheet">

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="verifikasi.html" method="post">
        <h2 class="form-signin-heading">Sign in Calon Siswa</h2>
        <input type="text" name="noreg" class="form-control" placeholder="No. pendaftaran" required autofocus>
        <input type="password" name="passwd" class="form-control" placeholder="Password" required>
        <!--
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        -->
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>

    </div> 

  </body>
</html>
