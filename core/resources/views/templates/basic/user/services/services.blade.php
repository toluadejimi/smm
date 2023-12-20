@extends($activeTemplate . 'layouts.mainuser')
@section('content')
<style>
    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float {
        margin-top: 16px;
    }
</style>

<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All Services</a></li>
            </ol>
        </div>

        <div class="row">

            <div class="col-xl-12 col-md-12 p-6">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="facebook">
                                    <div class="center"><img class="center"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/facebook.svg"
                                            width="50" height="50" alt=""></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3 mb-1">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="youtube">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/youtube.svg"
                                            width="50" height="50" alt=""></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="instagram">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/instagram.svg"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="tiktok">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/tiktok.svg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="spotify">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/spotify.svg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3 mb-1">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="twitter">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/twitter.svg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="snapchat">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/snapchat.svg"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="telegram">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/telegram.svg"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="soundcloud">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/soundcloud.svg"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="linkedin">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/linkedin.svg"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="twitch">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/twitch.svg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-3">
                        <div class="card b-radius--10">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="media brand-category" data-id="pintrest">
                                    <div class="icon"><img class="img-responsive"
                                            src="https://yourpanelassets.com/projects/pak2p/img/svg/pintrest.svg"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-6">

                <div class="card b-radius--10 mb-4 my-5">
                    <div class="card-body">
                        <h5 class="p-2 mb-4">New Order</h5>



                        <form action="order/create" method="post">
                            @csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group mb-3">

                                        <label>Choose Category</label>

                                        <select name="cat" class="form-control" id="country-dropdown">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                @endforeach

                                        </select>


                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-3">

                                        <div class="form-group mb-3">
                                            <label>Choose Service</label>
                                            <select id="state-dropdown" required name="service"
                                                placeholder="Choose service" class="form-control">
                                            </select>



                                        </div>




                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mb-3">

                                        <div class="form-group mb-3">
                                            <label>Link</label>
                                            <input type="text" placeholder="Enter Link" autofocus id="link" required
                                                name="link" class="form-control">
                                            </input>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mb-3">

                                        <div class="form-group mb-3">
                                            <label>Quantity</label>
                                            <input type="number" autofocus id="num1" required name="qty"
                                                placeholder="Enter quantity" class="form-control">
                                            </input>
                                            <span class="text-muted" id="min">Min:</span> | <span class="text-muted"
                                                id="max">Max:</span>
                                        </div>

                                        <input type="number" hidden id="min2" name="min">



                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mb-3">

                                        <div class="form-group mb-3">
                                            <label>Charge</label>
                                            <input type="number" disabled id="result2" name="charge"
                                                class="form-control">


                                            </input>
                                        </div>
                                    </div>

                                </div>



                                <div class="col-6 col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg mb-5"
                                        role="button">Order</button>
                                </div>




                            </div>

                        </form>





                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card b-radius--10 mb-4 my-5">
                    <div class="card-body p-2">
                        <label class="p-2">Order Information</label>



                        <div class="row p-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <h5 class="" value=" " id="price"> </h5>
                                </div>

                            </div>
                        </div>

                        <div class="row p-4">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Details</label>
                                    <p class="" id="details"> </p>
                                </div>

                            </div>

                        </div>




                    </div>


                </div>
            </div>

        </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="{{ $whatsapp_link }}" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

                               /*------------------------------------------
                               --------------------------------------------
                               Country Dropdown Change Event
                               --------------------------------------------
                               --------------------------------------------*/
                               $('#country-dropdown').on('change', function () {
                                   var cat = this.value;
                                   $("#state-dropdown").html('');
                                   $.ajax({
                                       url: "{{url('api/process-request')}}",
                                       type: "GET",
                                       data: {
                                            cat: cat,
                                           _token: '{{csrf_token()}}'
                                       },
                                       dataType: 'json',
                                       success: function (result) {
                                          console.log(result)


                                          $('#state-dropdown').html('<option value="">-- Select Service --</option>');
                                          $.each(result.services, function (key, value) {
                                              $("#state-dropdown").append('<option value="' + value
                                                  .id + '">' + value.name + '</option>');
                                          });

                                          $('#city-dropdown').html('<option value="">-- Amount --</option>');
                                       }
                                   });
                               });


                              /*------------------------------------------
                               --------------------------------------------
                               State Dropdown Change Event
                               --------------------------------------------
                               --------------------------------------------*/
                               $('#state-dropdown').on('change', function () {
                                var cat = this.value;
                                $("#city-dropdown").html('');
                                $.ajax({
                                    url: "{{url('api/process-info')}}",
                                    type: "GET",
                                    data: {
                                        cat: cat,
                                        _token: '{{csrf_token()}}'
                                    },
                                    dataType: 'json',
                                    success: function (res) {
                                       console.log(res)
                                       $.each(res.services, function (key, value) {
                                        document.getElementById('price').innerHTML = value.price_per_k;
                                        document.getElementById('min').innerHTML = value.min;
                                        document.getElementById('max').innerHTML =  value.max;
                                        document.getElementById('details').innerHTML =  value.name;


                                        const price2 =  document.getElementById('price').value = value.price_per_k;
                                        const min2 =    document.getElementById('min2').value = value.min;


                                        });


                                    }
                                });
                            });

                        });







    </script>


    <script>
        $('input').keyup(function() { // run anytime the value changes

        var num1 = document.getElementById('num1').value; // convert it to a float
        var rate = document.getElementById('price').value; // convert it to a float

        var result =  document.getElementById('result2').value = Number(num1) * Number(rate);

        console.log(result);
        console.log(num1);
        console.log(rate);



    });
    </script>

    <script>
        (function($) {
            "use strict";

            $('.detailsBtn').on('click', function() {
                var modal = $('#detailsModal');
                var details = $(this).data('details');
                modal.find('#details').html(details);
                modal.modal('show');
            });

            $('.orderBtn').on('click', function() {
                var modal = $('#orderModal');
                $('.resetForm').trigger('reset');
                var url = $(this).data('url');
                var pricePerK = parseFloat($(this).data('price_per_k'));
                var min = $(this).data('min');
                var max = $(this).data('max');
                let apiProviderId = $(this).data('api_provider_id');
                //Calculate total price
                $(document).on("keyup", "#quantity", function() {
                    var quantity = parseInt($('#quantity').val());
                    var totalPrice = parseFloat((pricePerK / 1000) * quantity);
                    modal.find('input[name=price]').val("{{ $general->cur_sym }}" + totalPrice
                        .toFixed(2));
                });

                modal.find('form').attr('action', url);
                modal.find('input[name=quantity]').attr('min', min).attr('max', max);
                modal.find('input[name=min]').val(min);
                modal.find('input[name=max]').val(max);
                modal.find('input[name=api_provider_id]').val(apiProviderId)
                modal.modal('show');
            });

            //Scroll to paginate position
            var pathName = document.location.pathname;
            window.onbeforeunload = function() {
                var scrollPosition = $(document).scrollTop();
                sessionStorage.setItem("scrollPosition_" + pathName, scrollPosition.toString());
            }
            if (sessionStorage["scrollPosition_" + pathName]) {
                $(document).scrollTop(sessionStorage.getItem("scrollPosition_" + pathName));
            }
        })(jQuery);
    </script>

    <script>
        function cardsCenter(){
		/*  testimonial one function by = owl.carousel.js */
		jQuery('.card-slider').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			//center:true,
			slideSpeed: 3000,
			paginationSpeed: 3000,
			dots: true,
			navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
			responsive:{
				0:{
					items:1
				},
				576:{
					items:1
				},	
				800:{
					items:1
				},			
				991:{
					items:1
				},
				1200:{
					items:1
				},
				1600:{
					items:1
				}
			}
		})
	}
	
	jQuery(window).on('load',function(){
		setTimeout(function(){
			cardsCenter();
		}, 1000); 
	});

	jQuery(document).ready(function(){
		setTimeout(function(){
			dlabSettingsOptions.version = 'dark';
			new dlabSettings(dlabSettingsOptions);
		},1000)
		jQuery(window).on('resize',function(){
			dlabSettingsOptions.version = 'dark';
			new dlabSettings(dlabSettingsOptions);
			jQuery('.dz-theme-mode').addClass('active');
		});
	});
    </script>

</div>
@endsection();




