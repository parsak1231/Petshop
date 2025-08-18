@extends('seller.layouts.app')

@section('title', )

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="row" style="direction: rtl">
                    <div class="col-md-6 col-xl-3">
                        <div class="card bg-grd-primary order-card">
                            <div class="card-body">
                                <h6 class="text-white">تعداد محصولات با موجودی کم:</h6>
                                <h2 class="text-end text-white">
                                    <span>{{ number_format($lowStockProductCount) }}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card bg-grd-success order-card">
                            <div class="card-body">
                                <h6 class="text-white">میانگین فروش محصولات:</h6>
                                <h2 class="text-end text-white">
                                    <span>{{ number_format($averageSale) }} تومان</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card bg-grd-warning order-card">
                            <div class="card-body">
                                <h6 class="text-white">درآمد امروز:</h6>
                                <h2 class="text-end text-white">
                                    <span>{{ number_format($todayRevenue) }} تومان</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card bg-grd-danger order-card">
                            <div class="card-body">
                                <h6 class="text-white">مشتری با بیشترین مبلغ خرید:</h6>
                                @if($bestCustomer)
                                <h2 class="text-end text-white">
                                    <span>
                                        {{ $bestCustomer->first_name }} {{ $bestCustomer->last_name }}
                                    </span>
                                </h2>
                                @else
                                    <h2 class="text-end text-white">
                                        وجود ندارد
                                    </h2>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="entries-selector">
                                <form method="GET" id="entriesForm" class="d-inline-block">
                                    <label>مورد</label>
                                    <select name="entries" class="form-select form-select-sm d-inline-block w-auto mx-1" onchange="document.getElementById('entriesForm').submit()">
                                        @foreach([5, 10, 20, 25] as $count)
                                            <option value="{{ $count }}" {{ $entries == $count ? 'selected' : '' }}>
                                                {{ $count }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span>نمایش</span>
                                </form>
                            </div>
                            <h5 class="m-0">محصولات اخیر</h5>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table" style="text-align: center">
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان</th>
                                        <th>تصویر</th>
                                        <th>(تومان)قیمت</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ ثبت</th>
                                    </tr>
                                    @foreach($latestProducts as $latestProduct)
                                    <tr>
                                        <td>{{ $latestProduct->id }}</td>
                                        <td>{{ $latestProduct->title }}</td>
                                        <td>
                                            <img src="{{ asset($latestProduct->image) }}" alt="تصویر محصول"
                                                 class="img-fluid" style="width: 50px; height: 40px"/>
                                        </td>
                                        <td>{{ number_format($latestProduct->price) }}</td>
                                        <td>
                                            <span class="badge {{ $latestProduct->status ? 'bg-success': 'bg-danger'}}">
                                                {{ $latestProduct->status ? 'فعال' : 'غیرفعال' }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ \Morilog\Jalali\Jalalian::fromDateTime($latestProduct->created_at)->format('%Y/%m/%d') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                @if($latestProducts->count() == 0)
                                    <p style="text-align: center">هیچ محصولی یافت نشد</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
