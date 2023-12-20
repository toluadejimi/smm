@extends($activeTemplate . 'layouts.mainuser')
@section('content')

<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-7">
                                            <h2 class="mb-0"> Hi, {{ Auth::user()->username }}</h2>
                                            <span>Get Amazing prices on all our products.
                                            </span>
                                            <a href="service" class="btn btn-rounded">Explore Services</a>
                                        </div>
                                        <div class="col-xl-5 col-sm-5 ">
                                            <img src="{{url('')}}/assets/public/assets/images/chart.png" alt="" class="sd-shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body card-padding d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h4 class="mb-3 text-nowrap">Balance</h4>
                                                    <div class="d-flex align-items-center">
                                                        <h2 class="">{{ $general->cur_sym }}{{
                                                            showAmount($widget['balance']) }}</h2>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div
                                                class="card-body card-padding d-flex align-items-center justify-content-between">
                                                <div class="w-75">
                                                    <h4 class="mb-3 text-nowrap">Total Spent</h4>
                                                    <div class="d-flex align-items-center">
                                                        <h2 class="">{{ $general->cur_sym }}{{
                                                            showAmount($widget['balance']) }}</h2>

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">

                                                <div>
                                                    <div class="">
                                                        <h2 class="fs-32 font-w700 counter">{{
                                                            $widget['total_transaction'] }}</h2>
                                                        <a class="mb-0 text-nowrap "
                                                            href="{{ route('user.transactions') }}">Total
                                                            Transaction</a>
                                                    </div>
                                                </div>
                                                <div id="NewCustomers"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">


                                                        <h2 class="fs-32 font-w700 counter">{{
                                                            $widget['total_transaction'] }}</h2>
                                                        <a class="mb-0 text-nowrap "
                                                            href="{{ route('user.transactions') }}">Total Deposit</a>

                                                    </div>
                                                </div>
                                                <div id="NewCustomers1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <h4 class="card-title">Recent Orders</h4>

                            </div>


                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Category</th>
                                                <th>Service	Link</th>
                                                <th>Quantity</th>
                                                <th>Start Counter</th>
                                                <th>Remains</th>
                                                <th>Date</th>
                                                <th>Status</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($pending as $data)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td class="break_line">{{ __($item->category->name ) ?? "service" }}</td>
                                                <td class="break_line">
                                                    {{ __($item->service->name ?? "service" )  }}</td>
                                                <td class="break_line"><a
                                                        href="{{ empty(parse_url($item->link, PHP_URL_SCHEME)) ? 'https://' : null }}{{ $item->link }}"
                                                        target="_blank">{{ $item->link }}</a></td>
                                                <td>{{ $item->quantity ?? "0" }}</td>
                                                <td>{{ $item->start_counter ?? "0" }}</td>
                                                <td>{{ $item->remain ?? "0" }}</td>
                                                <td>{{ showDateTime($item->created_at) ?? "date" }}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <span
                                                            class="text--small badge fw-normal badge--warning">@lang('Pending')</span>
                                                    @elseif($item->status == 1)
                                                        <span
                                                            class="text--small badge fw-normal badge--primary">@lang('Processing')</span>
                                                    @elseif($item->status == 2)
                                                        <span
                                                            class="text--small badge fw-normal badge--success">@lang('Completed')</span>
                                                    @elseif($item->status == 3)
                                                        <span
                                                            class="text--small badge fw-normal badge--danger">@lang('Cancelled')</span>
                                                    @else
                                                        <span
                                                            class="text--small badge fw-normal badge--dark">@lang('Refunded')</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage)
                                                    }}
                                                </td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
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

</div>

@endsection()


