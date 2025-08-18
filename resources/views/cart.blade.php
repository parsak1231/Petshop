@extends('layouts.app')

@section('title', 'سبد خرید')

@section('breadcrumb')
    @include('layouts.breadcrumb', $items = [
        ['url' => route('site.cart.index'), 'label' => "سبد خرید"]
    ])
@endsection

@section('content')
    <section class="container mb-4">
        @include('components.error-custom')
        @if($order && $order->details->isNotEmpty())
        <div class="row">
            <div class="col-xl-4 order-xl-1 pt-3 order-1 mb-3">
                <div class="card side-category p-4 mb-3">
                    @php
                        $totalQuantity = $order?->details->sum('quantity') ?? 0;
                        $totalPrice = $order?->details
                        ->sum(fn($detail) => $detail->product->price * $detail->quantity) ?? 0;
                    @endphp
                    <ul class="list-unstyled">
                        <li class="p-3 bg-title-sidebar radius15">قیمت کالاها ({{ $totalQuantity }} عدد):
                            <div class="d-flex align-items-center justify-content-center">
                                {{ number_format($totalPrice) }} تومان
                            </div>
                        </li>
                    </ul>
                    <li>
                        هزینه این سفارش هنوز پرداخـت نشده و در صورت اتمــام موجــودی
                        کالا ها از سبد خرید شما حدف می شوند.
                    </li>
                    <form action="{{ route('site.cart.checkout') }}" method="POST" class="d-inline">
                        @csrf
                        <input value="ثبت سفارش و پرداخت" type="submit"
                               class="a-button radius55 py-3 px-4 text-center mt-3 ml-2"
                               style="width: 100%; border:none; outline:none; cursor: pointer" />
                    </form>
                </div>
            </div>

            <div class="col-xl-8 order-xl-0 order-0 mb-3">
                <div class="card m-3 p-4">
                    <div class="item">
                        <div class="text-center">
                            @foreach($order?->details ?? [] as $detail)
                                <div class="d-flex align-items-center justify-content-between mb-cart
                                    {{ !$loop->first ? 'bt-cart' : '' }} cart-res">
                                    <div class="col-lg-3">
                                        <img src="{{ asset($detail->product->image) }}" alt="تصویر محصول">
                                    </div>
                                    <div class="col-lg-2">{{ $detail->product->title }}</div>
                                    <div class="col-lg-2">{{ number_format($detail->product->price) }} تومان</div>
                                    <div class="col-lg-3">
                                        <div
                                            class="input-group d-flex align-items-center justify-content-center cart-increment radius20">
                                            <form method="POST" action="{{ route('site.cart.update', $detail) }}">
                                                @csrf
                                                @method('PATCH')
                                                <span class="input-group-btn">
                                                    <button type="submit" class="quantity-right-plus btn p-3 mt-1"
                                                            data-type="plus" name="quantity"
                                                            value="{{ $detail->quantity + 1 }}">
                                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.41602 1.71582V13.8158" stroke="#FFAA00"
                                                                  stroke-width="2.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                            <path d="M13.599 7.76782H1.25195" stroke="#FFAA00"
                                                                  stroke-width="2.5" stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </form>

                                            <span class="input-cart form-control input-number">
                                                {{ $detail->quantity }}
                                            </span>

                                            <form method="POST" action="{{ route('site.cart.update', $detail) }}">
                                                @csrf
                                                @method('PATCH')
                                                <span class="input-group-btn">
                                                    <button type="submit" class="quantity-left-minus btn p-3 mt-1"
                                                            data-type="minus"
                                                            name="quantity" value="{{ $detail->quantity - 1 }}">
                                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.599 7.76782H1.25195"
                                                                  stroke="#FFAA00"
                                                                  stroke-width="2.5"
                                                                  stroke-linecap="round"
                                                                  stroke-linejoin="round"/>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <form method="POST" action="{{ route('site.cart.remove', $detail) }}">
                                            @csrf
                                            @method('DELETE')
                                            <span class="input-group-btn">
                                                <button type="submit" class="quantity-left-minus btn p-3 mt-1"
                                                        data-type="minus">
                                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13.7663 7.31201C13.7663 7.31201 13.3343 12.675 13.0833 14.934C13.0768 15.172 13.0227 15.4063 12.9242 15.623C12.8257 15.8398 12.6847 16.0346 12.5097 16.1959C12.3346 16.3573 12.129 16.4819 11.905 16.5625C11.6809 16.6431 11.443 16.6779 11.2053 16.665C9.12829 16.702 7.04829 16.705 4.97129 16.665C4.73834 16.6729 4.50615 16.6345 4.28815 16.552C4.07014 16.4696 3.87065 16.3447 3.70121 16.1847C3.53177 16.0246 3.39575 15.8326 3.30101 15.6196C3.20627 15.4066 3.15471 15.177 3.14929 14.944C2.89729 12.665 2.46729 7.31701 2.46729 7.31701"
                                                            stroke="#FFAA00" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"/>

                                                        <path d="M14.8692 4.74121H1.36621" stroke="#FFAA00" stroke-width="2"
                                                              stroke-linecap="round" stroke-linejoin="round"/>

                                                        <path
                                                            d="M12.2663 4.74211C11.9632 4.74202 11.6694 4.63698 11.435 4.44484C11.2006 4.2527 11.0399 3.98531 10.9803 3.68811L10.7873 2.72011C10.7293 2.50318 10.6014 2.31147 10.4232 2.17476C10.2451 2.03805 10.0268 1.964 9.80229 1.96411H6.43128C6.20675 1.964 5.98846 2.03805 5.81034 2.17476C5.63222 2.31147 5.50424 2.50318 5.44629 2.72011L5.25129 3.68711C5.19195 3.98416 5.03166 4.25152 4.79762 4.44382C4.56357 4.63612 4.2702 4.74152 3.96729 4.74211"
                                                            stroke="#FFAA00" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"/>
                                                    </svg>
                                                    <span style="color: black; font-size: 14px">حذف</span>
                                                </button>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="alert alert-warning fa18" style="width:100%; height:200px;display:flex;align-items: center;justify-content: center">
                سبد خرید شما خالی است.
            </div>
    </section>
    @endif
@endsection
