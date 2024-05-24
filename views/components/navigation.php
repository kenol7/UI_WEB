<nav>
  <div>
    <h1>UKM FASILKOM</h1>
    <a href="./" class="navigasi">
      <ion-icon name="home-outline"></ion-icon>
      Home</a>
    <a href="/mahasiswacreate" class="navigasi">
      <ion-icon name="book-outline"></ion-icon>
      Form</a>
      <?php
      if (!isset($_SESSION['username'])) {
    ?>
    <a href="./login" class="navigasi">
      <ion-icon name="log-in-outline"></ion-icon>
      Login
    </a>
    <?php
    }
    ?>
    <?php
      if (isset($_SESSION['username'])) {
    ?>
    <a href="./logout" class="navigasi">
      <ion-icon name="log-out-outline"></ion-icon>
      logout
    </a>
    <?php
    }
    ?>
    
  </div>
</nav>