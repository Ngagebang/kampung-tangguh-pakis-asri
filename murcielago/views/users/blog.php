<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">

								<h1 class="text-dark font-weight-bold text-8">Blog</h1>
<span class="sub-title text-dark">Berikut adalah berita dan kegiatan di dalam Kampung Tangguh Semeru Perumahan Pakis Asri</span>
							</div>

							<div class="col-md-12 align-self-center order-1">

								<ul class="breadcrumb d-block text-center">
									<li><a href="#">Home</a></li>
									<li class="active">Blog</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row">
						<div class="col-lg-3">
							<aside class="sidebar">
								<form action="page-search-results.html" method="get">
									<div class="input-group mb-3 pb-1">
										<input class="form-control text-1" placeholder="Pencarian ... " name="s" id="s" type="text">
										<span class="input-group-append">
											<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
										</span>
									</div>
								</form>
								<h5 class="font-weight-bold pt-4">Categories</h5>
								<ul class="nav nav-list flex-column mb-5">
									<li class="nav-item"><a class="nav-link" href="#">Kampung Tangguh</a></li>
									<!-- <li class="nav-item">
										<a class="nav-link active" href="#">Photos (4)</a>
										<ul>
											<li class="nav-item"><a class="nav-link" href="#">Animals</a></li>
											<li class="nav-item"><a class="nav-link active" href="#">Business</a></li>
											<li class="nav-item"><a class="nav-link" href="#">Sports</a></li>
											<li class="nav-item"><a class="nav-link" href="#">People</a></li>
										</ul>
									</li>
									<li class="nav-item"><a class="nav-link" href="#">Videos (3)</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Lifestyle (2)</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Technology (1)</a></li> -->
								</ul>
								<div class="tabs tabs-dark mb-4 pb-2">
									<ul class="nav nav-tabs">
										<li class="nav-item active"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent Post</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="recentPosts">
											<ul class="simple-post-list">
                        <?php
                        $no=0;
                        foreach($berita as $b){
                        $no++;
                        // $cari_gambarx = $this->m_data->ordernya_limit_where(array('token_gambar' => $b->token_gambar),'id_gambar','DESC','gambar_berita','1')->row();
                         ?>
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="<?php echo base_url('p/post/'.$b->slug.'') ?>">
																<img src="<?php echo base_url('assets/') ?>img/berita/<?php echo $b->gambar ?>" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="<?php echo base_url('p/post/'.$b->slug.'') ?>"><?php echo $b->judul_berita ?></a>
														<div class="post-meta">
															 <?php echo date('M d , Y',strtotime($b->created)) ?>
														</div>
													</div>
												</li>
                      <?php } ?>
											</ul>
										</div>
									</div>
								</div>
							</aside>
						</div>
						<div class="col-lg-9">
							<div class="blog-posts">

								<div class="row px-3">
                  <?php
                  $no=0;
                  foreach($data->result() as $row){
                  $no++;
                  // $cari_gambar = $this->m_data->ordernya_limit_where(array('token_gambar' => $row->token_gambar),'id_gambar','DESC','gambar_berita','1')->row();
                   ?>
									<div class="col-sm-6">
										<article class="post post-medium border-0 pb-0 mb-5">
											<div class="post-image">
												<a href="<?php echo base_url('p/post/'.$row->slug.'') ?>">
													<img src="<?php echo base_url('assets/') ?>img/berita/<?php echo $row->gambar ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
												</a>
											</div>

											<div class="post-content">

												<h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="<?php echo base_url('p/post/'.$row->slug.'') ?>"><?php echo $row->judul_berita ?></a></h2>
												<p><?php echo substr(ucfirst(strip_tags($row->isi_berita)),0,100) ?> ...</p>

												<div class="post-meta">
													<span><i class="far fa-user"></i> By <a href="#">Angger Pangestu Ari</a> </span>
													<span><i class="far fa-folder"></i> <a href="#">Kampung Tangguh</a> </span>
													<!-- <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> -->
													<span class="d-block mt-2"><a href="<?php echo base_url('p/post/'.$row->slug.'') ?>" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
												</div>

											</div>
										</article>
									</div>
                <?php } ?>
								</div>

								<div class="row">
									<div class="col">
                    <?php echo $pagination; ?>
										<!-- <ul class="pagination float-right">
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
										</ul> -->
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

			</div>
