<?php
session_start();
session_regenerate_id(true);

$path = "../";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include('includes/dashboardHeader.php');
?>

	<div class="page" id="app">
		<div class="nav-left">
			<div class="LogoName">
				Header
			</div>
			<div class="navDiv">
				<div class="navName">Menu</div>
				<div class="nav-list">
					<ul>
						<li class="nav-tab a_active waves-effect">
							<a href="html/device/1.html" class="li-a active" target="iframe"><i
									class='bx bx-home-smile'></i>ScoringAnalysis
								<span class="badge badge-pill badge-primary float-right">3</span>
							</a>
						</li>
						<li class="nav-tab nav-ul">
							<a href="javascript:void[0]" class="li-a"><i class='bx bx-cog'></i> UserManage
								<i class='bx bx-chevron-right' style="float: right;"></i></a>
							<div class="nav-box rootId">
								<a href="html/device/2-1.html" class="li-a-a" target="iframe">AccountManage</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="nav-right">
			<div class="nav-top">
				<button type="button" class="btn btn-primary btn-sm hiddenBtn" style="line-height: 10px;"
					@click="isShowLeft" onclick="isShowLeft()">
					<i class="bx bx-grid-alt" style="font-size: 16px;"></i>
				</button>
				<button type="button" class="btn btn-primary btn-sm close" style="line-height: 10px;">
					<i style="font-size: 16px" class="bi bi-power"></i>
				</button>
				<button type="button" id="fullscreen" class="btn btn-primary btn-sm" style="line-height: 10px;">
					<i style="font-size: 16px;font-weight: bold" class="bi bi-fullscreen"></i>
				</button>
				<p style="display:inline;">
					<span class="username"
						style="display:inline-block;margin-left: 20px;border-bottom: #0d6efd 2px solid">Administrator</span> Welcom!
				</p>
			</div>
			<div class="content-page">
				<iframe name="iframe" width="100%" height="100%" style="border: 1px rgb(17, 84, 191) solid"
					frameborder="0" src="html/device/1.html"></iframe>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function () {


			let navflag = true;
			$('li').click(function (e) {
				$(this).siblings().each(function () {
					$(this).removeClass('a_active');
					// $(this).removeClass('a_active');
					$(this).find('.nav-box').css('height', '0')
		
					if ($(this).attr('class').indexOf('nav-ul') != -1) {
						$(this).find('.bx-chevron-right').css('transform', 'rotateZ(0deg)')
						$(this).find('.bx-chevron-right').css('transition', 'all .5s')
						$(this).removeClass('nav-show')
					}
				})

				$(this).addClass('a_active')
				$(this).find('.li-a').addClass('active')

				$(this).find('.bx-chevron-right').css('transform', 'rotateZ(90deg)')
				$(this).find('.bx-chevron-right').css('transition', 'all .5s')
				$(this).addClass('nav-show')
				$(this).find('div').addClass('nav-box')
			})

			$(".li-a-a").click(function () {
				$(".li-a-a").each(function () {
					$(this).removeClass('active-li-a');
				})
				$(this).addClass('active-li-a');
			})
	
			$(".close").click(function () {
				var expires = new Date();
				expires.setTime(expires.getTime() - 10);

				// axios.get("http://localhost:8080/user/close").then(resp => {
				// 	alert("The system will close!!!")
				window.location.href = "./index.html";
				// })
			})
		})


		$(".nav-left").show();

		function isShowLeft() {
			if ($(".nav-left").is(":visible")) {
				$(".nav-right").css("paddingLeft", "0px");
				$(".content-page").css("left", "0px");
				$(".nav-left").hide();
			} else {
				$(".nav-right").css("paddingLeft", "240px");
				$(".content-page").css("left", "240px");
				$(".nav-left").show();
			}
		}

		
		function enterfullscreen() {
			$("#fullscreen").html("<i class='bi bi-fullscreen-exit' style='font-weight: bold;font-size:16px;'></i>");
			var docElm = document.documentElement;
			if (docElm.requestFullscreen) {//W3C
				docElm.requestFullscreen();
			} else if (docElm.mozRequestFullScreen) {//FireFox
				docElm.mozRequestFullScreen();
			} else if (docElm.webkitRequestFullScreen) {//Chrome
				docElm.webkitRequestFullScreen();
			} else if (elem.msRequestFullscreen) {//IE11
				elem.msRequestFullscreen();
			}
		}

		function exitfullscreen() {
			$("#fullscreen").html("<i class='bi bi-fullscreen' style='font-weight: bold;font-size:16px;'></i>");
			if (document.exitFullscreen) {
				document.exitFullscreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
		var a = 0;
		$('#fullscreen').on('click', function () {
			a++;
			a % 2 == 1 ? enterfullscreen() : exitfullscreen();
		})

	</script>
	
<?php include('includes/footer.php'); ?>