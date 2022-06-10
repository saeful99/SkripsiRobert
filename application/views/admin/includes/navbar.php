<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg">
			<div class="container-fluid">
				<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<?php if($user['disabled']) { ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="btn btn-danger text-white">
								Maintenance.
							</a>
						</li>
					<?php } ?>
                    <li class="nav-item dropdown hidden-caret">
                        <a target="_blank" class="btn btn-primary pb-1 pt-1 pl-3 pr-3" href="<?php anchor_to() ?>"><i class="fas fa-external-link-alt mr-1"></i> Visit Website</a>
					</li>
					<?php if($page_data['update']['status'] == 'available') { ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification bg-danger">1</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">Notifikasi Terbaru</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#" terget="_blank">
												<div class="notif-icon notif-danger"> <i class="fa fa-upload"></i> </div>
												<div class="notif-content">
													<span class="block">
														Pembaruan Tersedia
													</span>
													<span class="time">Anda Masih Menggunakan Versi Lama.</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification bg-secondary">0</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">Notifikasi.</div>
								</li>
								<li>
									<div class="dropdown-title font-weight-light">Tidak Ada Notifikasi.</div>
								</li>
							</ul>
						</li>
					<?php } ?>
                    <li class="nav-item dropdown hidden-caret">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
							<div class="avatar-sm">
								<img src="<?php admin_assets('img/usericon.svg') ?>" class="avatar-img rounded-circle"></i>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-user animated fadeIn">
							<div class="dropdown-user-scroll scrollbar-outer">
								<li>
									<div class="user-box">
										<div class="u-text">
											<h4><?php echo esc(ucfirst($user['fullName'])); ?></h4>
                                            <p class="text-muted"><u><?php echo esc($user['email']); ?></u></p>
                                            <p><span class="badge badge-primary"><strong><?php echo_if($user['role'] == 0, 'Super Admin', 'Admin') ?></strong></span></p>
										</div>
									</div>
								</li>
								<li>
									<a class="dropdown-item" href="<?php anchor_to(ACCOUNT_CONTROLLER . '/me') ?>">Pengaturan</a>
									<a class="dropdown-item" href="<?php anchor_to(AUTH_CONTROLLER . '/logout') ?>">Keluar</a>
								</li>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</nav>