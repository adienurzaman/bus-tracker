<!doctype html>
<html class="fixed">
	<head>
		<?php $this->load->view('layout/head'); ?>
	</head>
	<body>
		<section class="body"> 
			 <?php $this->load->view('layout/header'); ?>
			<div class="inner-wrapper"> 
				<?php $this->load->view('layout/sidebar'); ?> 
				<section role="main" class="content-body">
					<header class="page-header">
						<h2><?php echo @$sess_location;?></h2>					
						
					</header>
					<!-- start: page -->					
					<!-- CONTEN COY -->
					<?php $this->load->view('laman/'.$tampilan); ?>
					<!-- end: page -->
				</section>
			</div>
			
		</section>
		<?php $this->load->view('layout/footer_js'); ?>
	</body>
</html>