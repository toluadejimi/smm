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


                            <div class="card b-radius--10">
                                <div class="card-body p-0">
                                    <div class="table-responsive--sm table-responsive">
                                        <table class="table--light style--two table">
                                            <thead>
                                                <tr>
                                                    <th>@lang('Trx')</th>
                                                    <th>@lang('Transacted')</th>
                                                    <th>@lang('Amount')</th>
                                                    <th>@lang('Post Balance')</th>
                                                    <th>@lang('Detail')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($transactions as $trx)
                                                <tr>
                                                    <td>
                                                        <strong>{{ $trx->trx }}</strong>
                                                    </td>
                
                                                    <td>
                                                        {{ showDateTime($trx->created_at) }}<br>{{ diffForHumans($trx->created_at)
                                                        }}
                                                    </td>
                
                                                    <td class="budget">
                                                        <span
                                                            class="fw-bold @if ($trx->trx_type == '+') text-success @else text-danger @endif">
                                                            {{ $trx->trx_type }} {{ showAmount($trx->amount) }}
                                                            {{ $general->cur_text }}
                                                        </span>
                                                    </td>
                
                                                    <td class="budget">
                                                        {{ showAmount($trx->post_balance) }} {{ __($general->cur_text) }}
                                                    </td>
                
                                                    <td class="break_line">{{ __($trx->details) }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @if ($transactions->hasPages())
                                <div class="card-footer">
                                    {{ $transactions->links() }}
                                </div>
                                @endif
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


