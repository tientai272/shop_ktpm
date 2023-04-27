<?php if (isset($idslide)) : ?>
	<div class="slider-container">
		<div class="slider" id="revolutionSlider" data-plugin-revolution-slider data-plugin-options='{"startheight": 700}'>
			<ul>
				<li data-transition="fade" data-slotamount="13" data-masterspeed="300">
					<img src="public/upload/slides/<?= $slide['slide_img1'] ?>" class="img-fluid" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<div class="tp-caption sft stb visible-lg" data-x="177" data-y="100" data-speed="300" data-start="1000" data-easing="easeOutExpo"><img src="public/img/slides/slide-title-border.png" alt=""></div>
					<div class="tp-caption top-label lfl stl" data-x="227" data-y="100" data-speed="300" data-start="500" data-easing="easeOutExpo"></div>
					<div class="tp-caption sft stb visible-lg" data-x="530" data-y="100" data-speed="300" data-start="1000" data-easing="easeOutExpo"><img src="public/img/slides/slide-title-border.png" alt=""></div>
<!---->
				</li>
				<li data-transition="fade" data-slotamount="5" data-masterspeed="1000">
					<img src="public/upload/slides/<?= $slide['slide_img2'] ?>" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

					<div class="tp-caption bottom-label sft stb" data-x="585" data-y="250" data-speed="500" data-start="2000" data-easing="easeOutExpo"><?= $slide['slide_text2'] ?></div>
				</li>
				<li data-transition="fade" data-slotamount="5" data-masterspeed="1700">
					<img src="public/upload/slides/<?= $slide['slide_img3'] ?>" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

					<div class="tp-caption bottom-label sft stb" data-x="585" data-y="250" data-speed="500" data-start="2000" data-easing="easeOutExpo"><?= $slide['slide_text3'] ?></div>
				</li>
			</ul>
		</div>
	</div>
	<div class="home-intro" id="home-intro">
		<div class="container">
			<div class="row">
				<div class="col-md-8">

				</div>
				<div class="col-md-4">
					<div class="get-started">
						<a href="search" class="btn btn-lg btn-primary">Đi đến trang tìm kiếm!</a>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>