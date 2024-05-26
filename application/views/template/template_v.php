<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sistem Manajemen Seminar</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav.png') ?>" />

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<?php $this->load->view('template/css') ?>
<style>.bg {
  animation:slide 3s ease-in-out infinite alternate;
  background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
  bottom:0;
  left:-50%;
  opacity:.5;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}

.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:4s;
}

.bg3 {
  animation-duration:5s;
}

@keyframes slide {
  0% {
    transform:translateX(-25%);
  }
  100% {
    transform:translateX(25%);
  }
}</style>
</head>

<body class="">

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

  
</div>



Resources1× 0.5× 0.25×Rerun
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<?php $this->load->view('template/navbar') ?>
	<?php $this->load->view('template/header') ?>


	<div class="pcoded-main-container">
		<div class="pcoded-wrapper">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">


						<!-- start content here -->
							<?php echo $contents ?>
						<!-- end content -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('template/js') ?>
</body>

</html>