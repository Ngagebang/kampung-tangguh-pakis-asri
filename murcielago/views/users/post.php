<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">

								<h1 class="text-dark font-weight-bold text-8"><?php echo $berita->judul_berita ?></h1>
							</div>

							<div class="col-md-12 align-self-center order-1">

								<ul class="breadcrumb d-block text-center">
									<li><a href="<?php echo base_url() ?>">Home</a></li>
									<li class="active"><?php echo $berita->judul_berita ?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post border-0 m-0 p-0">
                  <div class="post-image ml-0">
                    <?php
                    $cari_gambar = $this->m_data->ordernya_limit_where(array('token_gambar' => $berita->token_gambar),'id_gambar','DESC','gambar_berita','1')->row();
                     ?>
										<a href="<?php echo base_url('p/post/'.$berita->slug.'') ?>">
											<img src="<?php echo base_url('assets/') ?>img/berita/<?php echo $berita->gambar ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
										</a>
									</div>

                  <div class="row">
    								        <div class="col">
    									<div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
    										<div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                          <?php
                          $cari_gambarx = $this->m_data->where('gambar_berita',array('token_gambar' => $berita->token_gambar))->result();
                          $no=0;
                          foreach($cari_gambarx as $cx){
                          $no++;
                           ?>
                          <div>
    												<a class="img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon" href="<?php echo base_url('assets/') ?>img/uploads/<?php echo $cx->gambar ?>">
    													<img class="img-fluid" src="<?php echo base_url('assets/') ?>img/uploads/<?php echo $cx->gambar ?>" alt="<?php echo $berita->judul_berita ?>">
    												</a>
    											</div>
                        <?php } ?>
    										</div>
    									</div>
    								</div>

    							</div>
<hr>
									<div class="post-content ml-0">

                    <?php echo $berita->isi_berita ?>


										<div class="post-block mt-5 post-share">
											<h4 class="mb-3">Share this Post</h4>

											<!-- AddThis Button BEGIN -->
											<div class="addthis_toolbox addthis_default_style ">
												<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
												<a class="addthis_button_tweet"></a>
												<a class="addthis_button_pinterest_pinit"></a>
												<a class="addthis_counter addthis_pill_style"></a>
											</div>
											<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
											<!-- AddThis Button END -->

										</div>

										<div class="post-block mt-4 pt-2 post-author">
											<h4 class="mb-3">Author</h4>
											<div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
												<a href="blog-post.html">
													<img src="https://www.xaprb.com/media/2018/08/kitten.jpg" alt="">
												</a>
											</div>
											<p><strong class="name"><a href="#" class="text-4 pb-2 pt-2 d-block">Angger Pangestu Ari</a></strong></p>
											<p>Seorang manusia biasa.</></p>
										</div>



									</div>
								</article>
								<div id="disqus_thread"></div>
								<script>

								/**
								*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
								*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

								var disqus_config = function () {
								this.page.url = '<?php echo base_url('p/post/'.$slugx.'') ?>';  // Replace PAGE_URL with your page's canonical URL variable
								this.page.identifier = '<?php echo $slugx ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
								};

								(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://kampungtangguhsemerupakisasri.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
								})();
								</script>
								<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
							</div>
						</div>
					</div>

				</div>

			</div>
