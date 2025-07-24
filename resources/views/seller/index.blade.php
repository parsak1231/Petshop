@extends('seller.layouts.app')

@section('title', )

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-primary order-card">
                    <div class="card-body">
                        <h6 class="text-white">Orders Received</h6>
                        <h2 class="text-end text-white"><i class="feather icon-shopping-cart float-start"></i><span>486</span> </h2>
                        <p class="m-b-0">Completed Orders<span class="float-end">351</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-success order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Sales</h6>
                        <h2 class="text-end text-white"><i class="feather icon-tag float-start"></i><span>1641</span> </h2>
                        <p class="m-b-0">This Month<span class="float-end">213</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-warning order-card">
                    <div class="card-body">
                        <h6 class="text-white">Revenue</h6>
                        <h2 class="text-end text-white"><i class="feather icon-repeat float-start"></i><span>$42,562</span></h2>
                        <p class="m-b-0">This Month<span class="float-end">$5,032</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-danger order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Profit</h6>
                        <h2 class="text-end text-white"><i class="feather icon-award float-start"></i><span>$9,562</span></h2>
                        <p class="m-b-0">This Month<span class="float-end">$542</span></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5 style="text-align: right">محصولات اخیر</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table" style="text-align: center">
                                <tr>
                                    <th>شناسه</th>
                                    <th>عنوان</th>
                                    <th>تصویر</th>
                                    <th>(تومان)قیمت</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>هدفون</td>
                                    <td>
                                        <img src="{{ asset('assets/images/widget/p1.jpg') }}" alt="prod img" class="img-fluid" />
                                    </td>
                                    <td>1000</td>
                                    <td>
                                        <span class="badge bg-success">فعال</span>
                                    </td>
                                    <td>1386-12-08</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
