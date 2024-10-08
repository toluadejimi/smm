@extends($activeTemplate . 'layouts.mainuser')
@section('content')


<div class="content-body default-height">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Order History</a></li>
            </ol>
        </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card b-radius--10 mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light ">
                            <thead>
                                <tr>
                                    <th>@lang('Order ID')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Service')</th>
                                    <th>@lang('Link')</th>
                                    <th>@lang('Quantity')</th>
                                    <th>@lang('Start Counter')</th>
                                    <th>@lang('Remains')</th>
                                    <th>@lang('Date')</th>
                                    <th>@lang('Status')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr>
                                        <td>{{ $item->api_order_id }}</td>
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
                                                <span class="text--small badge fw-normal badge-warning">@lang('Pending')</span>
                                            @elseif($item->status == 1)
                                                <span
                                                    class="text--small badge fw-normal badge-warning">@lang('Processing')</span>
                                            @elseif($item->status == 2)
                                                <span
                                                    class="text--small badge fw-normal badge-success">@lang('Completed')</span>
                                            @elseif($item->status == 3)
                                                <span
                                                    class="text--small badge fw-normal badge-danger">@lang('Cancelled')</span>
                                            @elseif($item->status == 5)
                                                <span
                                                    class="text--small badge fw-normal badge-primary">@lang('Partial')</span>
                                            @else
                                                <span
                                                    class="text--small badge fw-normal badge-dark">@lang('Refunded')</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>

                @if ($orders->hasPages())
                    <div class="card-footer">
                        {{ paginateLinks($orders) }}
                    </div>
                @endif
            </div><!-- card end -->

        </div>
    </div>
</div>
</div>
@endsection

@push('breadcrumb-plugins')

        <x-search-form placeholder="Search here ..." />

@endpush


@push('style')
    <style>
        .break_line {
            white-space: initial !important;
        }
    </style>
@endpush
