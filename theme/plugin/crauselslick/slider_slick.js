$(document).ready(function(){
		$('.slidepeople-responsive').slick({
		  infinite: true,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 4,
		  nextArrow: '<button class="btn btn-default right"><i class="fa fa-angle-right"></i></button>',
		  prevArrow: '<button class="btn btn-default left "><i class="fa fa-angle-left"></i></button>',
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: false
			  }
			},
			{
			  breakpoint: 900,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		  ]
		});
    });