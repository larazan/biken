		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li <?php if($this->uri->segment(1) == 'homes-medium'){ echo 'class="active"'; }?>><a href="<?= base_url()?>homes-medium">Home</a></li>
						<li <?php if($this->uri->segment(1) == 'shoplist'){ echo 'class="active"'; }?>><a href="<?= base_url()?>shoplist/1">Shop</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>