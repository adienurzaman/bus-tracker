<?php $segment = $this->uri->segment('1'); ?>
<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

	<div class="sidebar-header">
		<div class="sidebar-title text-muted">
			Menu Utama
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li  class="nav-expanded <?php if($segment == 'dashboard'){echo "nav-active";} ?>">
						<a href="<?php echo site_url('dashboard'); ?>">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li  class="nav-expanded <?php if($segment == 'data'){echo "nav-active";} ?>">
						<a href="<?php echo site_url('data'); ?>">
							<i class="fa fa-table" aria-hidden="true"></i>
							<span>Data</span>
						</a>
					</li>
					
				</ul>
			</nav>

			<hr class="separator" />
		</div>

	</div>

</aside>
<!-- end: sidebar -->