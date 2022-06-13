
<div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="<?= base_url('assets/images/logo.png') ?>" class="w-100" alt="Funda of Web IT">
      </div>
      <div class="col-md-9">

      </div>
    </div>
  </div>
</div>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">
  <div class="container">
    <!--  For Mpbile View -->
    <a class="navbar-brand d-block d-sm-none d-md-none" href="#">
      <img src="<?= base_url('assets/images/logo.png') ?>" alt="Funda of Web IT">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('index.php') ?>">Home</a>
        </li>
          <?php

          $navCategory = "SELECT * FROM categories WHERE navbar_status = '0' AND status = '0'";
          $result = mysqli_query($conn, $navCategory);
          $num_row = mysqli_num_rows($result);

          if ($num_row > 0){
            foreach($result as $navItems){
                ?>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="<?= base_url('category/'.$navItems["slug"]); ?>"><?= $navItems["name"]; ?></a>
                      <!-- <a class="nav-link text-white" href="category.php?title=<?= $navItems["slug"]; ?>"><?= $navItems["name"]; ?></a> -->
                    </li>
                <?php 
            }
          }

          ?>

        
<!--  the drop down . i used the auth_user session because it contains informations i want to use like first and last name-->

        <?php if (isset($_SESSION["auth_user"])) : ?>
<!-- if the person is logged in, show this part of the navbar else -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?= $_SESSION["auth_user"]["user_name"]; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li>
          <!-- we created a form here for the logout -->
          <form action="<?= base_url('allcode.php'); ?>" method="POST"> 
          <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
        </form>
          </li>
          </ul>
        </li>
<!-- drop down ends here -->
        <?php else : ?>
<!-- if the person is not logged in , show this other part of the navbar -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('login.php'); ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('register.php'); ?>">Register</a>
        </li>
          
        <?php endif;  ?> <!--  end of php if -->

      </ul>
    </div>
  </div>
</nav>