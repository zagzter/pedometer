<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico') ;?>"/>
	<title>Pedometer - Manage your Steps!</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/bootstrap/css/bootstrap.min.css') ;?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/daterangerpicker/daterangepicker.css') ;?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/morris/morris.css') ;?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/toastr/toastr.min.css') ;?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ;?>" rel="stylesheet">
</head>
<body>

	<div id="main" class="container-fluid h-100">
		
		<div class="row justify-content-center align-items-center h-100">
			<div class="card col-10" id="dashboard">
				<div class="card-body">