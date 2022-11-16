
<body>
	<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #04</h2>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../login/images/logo.png);  background-size:contain;">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Login</h3>
								</div>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
							</div>
							<?php echo $this->session->flashdata('pesan') ?>
							<?php echo form_open('auth/login')?>
								<div class="form-group mb-3">
									<label class="label">Username</label>
									<input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan Username Anda" name="username">
                                                <?php echo form_error('username','<div class ="text-danger small ml-2">', '</div>'); ?>
								</div>
								<div class="form-group mb-3">
									<label class="label">Password</label>
									<input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukkan Password Anda" name="password">
                                                <?php echo form_error('password','<div class ="text-danger small ml-2">', '</div>'); ?>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
								</div>
							<?php echo form_close() ?>
								<!-- <div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
								</div> -->
							<p class="text-center">Not a member? <a href="<?php echo base_url('registrasi')?>">Daftar</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

