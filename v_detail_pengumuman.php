<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Pengumuman</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">

				<!-- Blog Content -->
				<div class="col-lg-8">
					<div class="blog_content">
						<div class="blog_title"><?= $pengumuman->judul_pengumuman?></div>
						<div class="blog_meta">
							<ul>
								<li>Post on <a href=""><?= $pengumuman->tgl_pengumuman?></a></li>
								<li>By <a href="">Admin</a></li>
							</ul>
						</div>
						<div class="blog_image"><img src="<?= base_url('img/foto_pengumuman/'.$pengumuman->foto_pengumuman)?>" height="500px" width="100%" alt=""></div>
						<p><?= $pengumuman->isi_pengumuman?></p>
						<div class="blog_quote d-flex flex-row align-items-center justify-content-start">
						</div>
						<div class="blog_images">
						</div>
					</div>
					<div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<div class="blog_social ml-lg-auto">
						</div>
					</div>
					<!-- Comments -->
					<div class="comments_container">
						<ul class="comments_list">
							<li>
								<div class="comment_item d-flex flex-row align-items-start jutify-content-start">
									<div class="comment_content">
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
									</div>
								</div>
								<ul>
									<li>
										<div>
											<div>
												<div>
												</div>
												<div>
												</div>
												<div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li>
							</li>
						</ul>
						<div>
								<div>
									<input type="checkbox" id="checkbox_notify" name="regular_checkbox" class="regular_checkbox checkbox_account" checked>
								</div>
								<div>
									
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Blog Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Latest News -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">pengumuman Terkini</div>
							<div class="sidebar_latest">

								<!-- Latest Course -->
								<?php foreach ($latest_pengumuman as $key => $value) { ?>

								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="<?= base_url('img/foto_pengumuman/'.$value->foto_pengumuman) ?>" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="<?= base_url('home/detail_pengumuman/'.$value->slug_pengumuman)?>"><?= $value->judul_pengumuman?></a></div>
										<i class="fa fa-history" aria-hidden="true"></i>
												<span><?= $value->tgl_pengumuman?></span>
										<div class="latest_price">baca</div>
									</div>
								</div>

							<?php } ?>

							</div>
						</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="newsletter">
		<div class="newsletter_background" style="background-image:url(<?= base_url() ?>template/front-end/images/newsletter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
