		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li <?php if($this->uri->segment(2) == ''){ echo 'class="active"'; }?>><a href="<?= base_url()?>homes-standard">Home</a></li>
						<li <?php if($this->uri->segment(2) == 'shop'){ echo 'class="active"'; }?>><a href="<?= base_url()?>shop/1">Shop</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>