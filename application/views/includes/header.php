<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forward DMMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/icons.css">

<link href="<?php echo base_url();?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="<?php echo base_url();?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/fonts/font.css">
  
<style type="text/css">

.onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "ON";
    padding-left: 10px;
    background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 56px;
    border: 2px solid #999999; border-radius: 20px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}
</style>
<style>
.bg-darklight{
  background-color: #173F5F !important;
}

a.bg-darklight:hover, a.bg-darklight:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #173F5F !important;
}
.bg-darkblue{
  background-color: #1F639C !important;
}

a.bg-darkblue:hover, a.bg-darkblue:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #1F639C !important;
}
.bg-bluelight{
  background-color: #3CAEA3 !important;
}

a.bg-bluelight:hover, a.bg-darkblue:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #3CAEA3 !important;
}
.bg-yellow{
  background-color: #F6D65D !important;
}

a.bg-yellow:hover, a.bg-yellow:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #F6D65D !important;
}
p ,h3,i{
  color:white;
}
.bg-orange{
  background-color: #4FC1E9 !important;
}

a.bg-orange:hover, a.bg-orange:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #4FC1E9 !important;
}
.bg-purple{
  background-color: #48CFAD !important;
}

a.bg-purple:hover, a.bg-purple:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #48CFAD !important;
}
.bg-green{
  background-color: #A0D468 !important;
}

a.bg-green:hover, a.bg-green:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #A0D468 !important;
}
.bg-GRAPEFRUIT{
  background-color: #ED5565 !important;
}

a.bg-GRAPEFRUIT:hover, a.bg-GRAPEFRUIT:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #ED5565 !important;
}
.bg-LAVENDER{
  background-color: #AC92EC !important;
}

a.bg-LAVENDER:hover, a.bg-LAVENDER:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #AC92EC !important;
}
.bg-SUNFLOWER{
  background-color: #5D9CEC !important;
}

a.bg-SUNFLOWER:hover, a.bg-SUNFLOWER:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #5D9CEC !important;
}


</style>

        <meta name="description" content="DMMS Dashboard">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url();?>/assets/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url();?>/assetscss/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>/assets/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>/assets/img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="<?php echo base_url();?>/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="<?php echo base_url();?>/assets/css/datagrid/datatables/datatables.bundle.css">
    </head>