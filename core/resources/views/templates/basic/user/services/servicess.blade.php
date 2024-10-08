@extends($activeTemplate . 'layouts.mainuser')
@section('content')

    <div class="content-body default-height">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="user/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">All Services</a></li>
                </ol>
            </div>

            <div class="row">

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
                                                <select id="state-dropdown" required name="service" placeholder="Choose service"
                                                        class="form-control">
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
                                                <input type="number" disabled id="result2" name="charge" class="form-control">


                                                </input>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-6 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg mb-5" role="button">Order</button>
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






            </div>
        </div>
    </div>
@endsection
