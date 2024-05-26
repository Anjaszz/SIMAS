<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sistem Manajemen Seminar</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav.png') ?>" />

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<?php $this->load->view('template/css') ?>
	<style>
		@keyframes animate {
    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }
    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
}

.background {
    position: fixed;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    margin: 0;
    padding: 0;
    background: #ffff;
    overflow: hidden;
}
.background li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.615);
    animation: animate 19s linear infinite;
}




.background li:nth-child(0) {
    left: 56%;
    width: 73px;
    height: 73px;
    bottom: -73px;
    animation-delay: 1s;
}
.background li:nth-child(1) {
    left: 84%;
    width: 70px;
    height: 70px;
    bottom: -70px;
    animation-delay: 5s;
}
.background li:nth-child(2) {
    left: 41%;
    width: 167px;
    height: 167px;
    bottom: -167px;
    animation-delay: 8s;
}
.background li:nth-child(3) {
    left: 25%;
    width: 80px;
    height: 80px;
    bottom: -80px;
    animation-delay: 13s;
}
.background li:nth-child(4) {
    left: 23%;
    width: 143px;
    height: 143px;
    bottom: -143px;
    animation-delay: 5s;
}
.background li:nth-child(5) {
    left: 77%;
    width: 154px;
    height: 154px;
    bottom: -154px;
    animation-delay: 6s;
}
.background li:nth-child(6) {
    left: 76%;
    width: 114px;
    height: 114px;
    bottom: -114px;
    animation-delay: 20s;
}
.background li:nth-child(7) {
    left: 13%;
    width: 150px;
    height: 150px;
    bottom: -150px;
    animation-delay: 28s;
}
.background li:nth-child(8) {
    left: 53%;
    width: 155px;
    height: 155px;
    bottom: -155px;
    animation-delay: 34s;
}
.background li:nth-child(9) {
    left: 85%;
    width: 119px;
    height: 119px;
    bottom: -119px;
    animation-delay: 18s;
}
.background li:nth-child(10) {
    left: 3%;
    width: 126px;
    height: 126px;
    bottom: -126px;
    animation-delay: 49s;
}
.background li:nth-child(11) {
    left: 43%;
    width: 108px;
    height: 108px;
    bottom: -108px;
    animation-delay: 29s;
}
.background li:nth-child(12) {
    left: 81%;
    width: 135px;
    height: 135px;
    bottom: -135px;
    animation-delay: 6s;
}
.background li:nth-child(13) {
    left: 35%;
    width: 86px;
    height: 86px;
    bottom: -86px;
    animation-delay: 26s;
}
.background li:nth-child(14) {
    left: 25%;
    width: 167px;
    height: 167px;
    bottom: -167px;
    animation-delay: 9s;
}
.background li:nth-child(15) {
    left: 66%;
    width: 147px;
    height: 147px;
    bottom: -147px;
    animation-delay: 5s;
}
.background li:nth-child(16) {
    left: 40%;
    width: 168px;
    height: 168px;
    bottom: -168px;
    animation-delay: 74s;
}
.background li:nth-child(17) {
    left: 54%;
    width: 195px;
    height: 195px;
    bottom: -195px;
    animation-delay: 42s;
}
.background li:nth-child(18) {
    left: 45%;
    width: 167px;
    height: 167px;
    bottom: -167px;
    animation-delay: 58s;
}
.background li:nth-child(19) {
    left: 27%;
    width: 110px;
    height: 110px;
    bottom: -110px;
    animation-delay: 16s;
}
.background li:nth-child(20) {
    left: 51%;
    width: 133px;
    height: 133px;
    bottom: -133px;
    animation-delay: 53s;
}
.background li:nth-child(21) {
    left: 2%;
    width: 113px;
    height: 113px;
    bottom: -113px;
    animation-delay: 30s;
}
.background li:nth-child(22) {
    left: 0%;
    width: 135px;
    height: 135px;
    bottom: -135px;
    animation-delay: 24s;
}
.background li:nth-child(23) {
    left: 55%;
    width: 75px;
    height: 75px;
    bottom: -75px;
    animation-delay: 17s;
}
.background li:nth-child(24) {
    left: 36%;
    width: 112px;
    height: 112px;
    bottom: -112px;
    animation-delay: 8s;
}
.background li:nth-child(25) {
    left: 67%;
    width: 149px;
    height: 149px;
    bottom: -149px;
    animation-delay: 7s;
}
	</style>
</head>

<body class="">
<ul class="background">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
</ul>
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

</html>rgba(255, 255, 255, 0.615)rgba(255, 255, 255, 0.598)rgba(255, 162, 2, 0.615)rgba(255, 162, 2, 0.664)