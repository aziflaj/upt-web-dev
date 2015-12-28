<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portali i Punes per Studentet</title>
    <meta name="author" content="Aldo Ziflaj">
    <meta name="description" content="Portali i Punes per studente, detyre kursi ne UptWebDesign">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/modules.css">

    <script src="assets/js/utils.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="row header">
      <ul class="header-links">
        <li>
          <a href="/">Kreu</a>
        </li>
        <li>
          <a href="">Rreth nesh</a>
        </li>

        <?php if (isset($_SESSION['id'])): ?>
        <li>
          <a href="#">Settings</a>
        </li>
        <li>
          <a href="/logout.php">Dil</a>
        </li>
        <?php else: ?>
        <li>
          <a href="login.php">Hyr</a>
        </li>
        <li>
          <a href="signup.php">Regjistrohu</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
