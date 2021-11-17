</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?php
        
         
      Echo  $Username =  $this->session->userdata('Username');
?></a>
      </li>
 
    </ul>
   <a href="<?php echo base_url("index.php/main/logout") ?>" style="margin-left:85%;background-color:black; font-size:30px;border-radius:10px"> <i class="fa fa-power-off" aria-hidden="true" ></i></a>
  </nav>
  <!-- /.navbar -->