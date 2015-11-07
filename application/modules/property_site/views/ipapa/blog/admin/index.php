<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPAPA Blog | Admin Dashboard</title>
    <!-- Favicons -->
    <link rel="shortcut icon"    href="<?php echo base_url();?>assets/ipapa/images/img/ico/favicon.ico" type="image/x-icon"> 
    
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

</head>
<body>
<aside class="right-side">
<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Manage Articles</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Manage Articles</li>
                    </ol>
                </section>
<!-- Main content -->
<section class="content">
<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
    <div>
		<?php echo $output; ?>
    </div>
    </div>
    </div>
    </div>
    </div>
</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

</body>
       
</html>
