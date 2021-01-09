<footer id="footer">
				<div class="container">
					<div class="footer-ribbon">
						<span>Get in Touch</span>
					</div>
					<div class="row py-5 my-4">
						<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
							<a href="<?php echo base_url() ?>" class="logo pr-0 pr-lg-3">
								<img alt="Kampung Tangguh Pakis Asri" src="<?php echo base_url('assets/') ?>logo kampung tangguh_baru2.png" class="opacity-7 bottom-4" height="100">
							</a>
						</div>
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
							<h5 class="text-3 mb-3">POSTINGAN TERBARU</h5>
							<ul class="list-unstyled mb-0">
								<?php
								$beritay = $this->m_data->ordernya_limit('id_berita','DESC','berita','3')->result();
								$no=0;
								foreach($beritay as $bx){
								$no++;
								?>
								<li class="media mb-3 pb-1">
									<article class="d-flex">
										<a href="#">
											<img class="mr-3 rounded-circle" src="<?php echo base_url('assets/') ?>img/berita/<?php echo $bx->gambar ?>" alt="<?php echo $bx->judul_berita ?>" style="max-width: 50px;">
										</a>
										<div class="media-body">
											<a href="<?php echo base_url('p/post/'.$bx->slug.'') ?>">
												<h6 class="text-3 text-color-light opacity-8 ls-0 mb-1"><?php echo $bx->judul_berita ?></h6>
												<p class="text-2 mb-0"><?php echo date('M d , Y',strtotime($bx->created)) ?></p>
											</a>
										</div>
									</article>
								</li>
							<?php } ?>
							</ul>
						</div>
						<!-- <div class="col-md-6 col-lg-3 mb-5 mb-md-0">
							<h5 class="text-3 mb-3">RECENT COMMENTS</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-3 pb-1">
									<a href="#">
										<p class="text-3 text-color-light opacity-8 mb-1"><i class="fas fa-angle-right text-color-primary"></i><strong class="ml-2">John Doe</strong> commented on <strong class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
										<p class="text-2 mb-0">12:55 AM Dec 19th</p>
									</a>
								</li>
								<li>
									<a href="#">
										<p class="text-3 text-color-light opacity-8 mb-1"><i class="fas fa-angle-right text-color-primary"></i><strong class="ml-2">John Doe</strong> commented on <strong class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
										<p class="text-2 mb-0">12:55 AM Dec 19th</p>
									</a>
								</li>
							</ul>
						</div> -->
						<div class="col-md-6 col-lg-2">
							<h5 class="text-3 mb-3">KATEGORI</h5>
							<p>
								<a href="#"><span class="badge badge-dark bg-color-black badge-sm py-2 mr-1 mb-2 text-uppercase">KAMPUNG TANGGUH SEMERU</span></a>
							</p>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container py-2">
						<div class="row py-4">
							<div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
								<p>© <a href="<?php echo base_url() ?>">Kampung Tangguh Semeru Pakis Asri</a> Copyright 2019. All Rights Reserved. | Developed By. <a href="https://www.instagram.com/angger.23/">Angger Pangestu Ari</a> - Design By. <a href="https://themeforest.net/user/okler">Okler</a></p>
							</div>
							<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
								<nav id="sub-menu">
									<ul>
										<li><a href="https://www.instagram.com/kampungtangguhpakisasri/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>

		<!-- Vendor -->
		<script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/popper/umd/popper.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/common/common.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/vide/jquery.vide.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/vivus/vivus.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url('assets/') ?>js/theme.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="<?php echo base_url('assets/') ?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo base_url('assets/') ?>js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url('assets/') ?>js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

	</body>
</html>
