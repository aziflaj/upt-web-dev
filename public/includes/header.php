<?php session_start() ?>
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
      <?php if (isset($_SESSION['id'])): ?>
      <div class="user-handle">
        Welcome <?= $_SESSION['user_handle'] ?>
      </div>
      <?php endif; ?>


      <ul class="header-links">
        <li>
          <a href="/">Kreu</a>
        </li>
        <li>
          <a href="/about.php">Rreth nesh</a>
        </li>

        <?php if (isset($_SESSION['id'])): ?>
            <?php if ($_SESSION['type_id'] == 2): // student ?>
              <li>
                <a href="/interests.php">Interesat e mia</a>
              </li>

            <?php elseif ($_SESSION['type_id'] == 3): // company ?>
              <li>
                <a href="#">Punet e mia</a>
              </li>

            <?php elseif($_SESSION['type_id'] == 1): // admin ?>
              <li>
                <a href="#">Administratoret</a>
              </li>
              <li>
                <a href="#">Kompanite</a>
              </li>
            <?php endif; ?>

          <li>
            <a href="settings.php">Settings</a>
          </li>
          <li>
            <a href="/logout.php">Dil</a>
          </li>
        <?php else: ?>
          <li>
            <a href="/login.php">Hyr</a>
          </li>
          <li>
            <a href="/signup.php">Regjistrohu</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
