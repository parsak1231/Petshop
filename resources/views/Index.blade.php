@extends('layouts.app')

@section('title', 'صفحه اصلی')

@push('scripts')
    <script src="{{ asset('Js/owl.carousel.js') }}"></script>
@endpush

@push('styles')
    <style>
        .not-found {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 250px;
        }
    </style>
@endpush

@section("content")
    <section class="container">
        <div class="row">
            <div class="col-lg-12 p-0 mb-3">
                <div id="owl-mainslider" class="owl-carousel owl-theme text-center">
                    <div class="item">
                        <img src="{{ asset('Img/slider-1.jpg') }}" class="img-fluid radius-slide" alt="slider1"/>
                    </div>

                    <div class="item">
                        <img src="{{ asset('Img/slider-2.jpg') }}" class="img-fluid radius-slide" alt="slider2"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($products->count() > 0)
        <section class="bg-gray pb-4">
            <div class="container p-4 radius20 mt-5">
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h2>محصولات جدید</h2>
                    <a class="d-flex align-items-center a-button radius55 py-2 px-4"
                       href="{{ route('site.products.index') }}">
                        <span class="ml-2">همه محصولات</span>
                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.8019 6.17453H2.56566C2.00285 6.17453 1.53613 5.70782 1.53613 5.14501C1.53613 4.5822 2.00285 4.11548 2.56566 4.11548H10.8019C11.3647 4.11548 11.8314 4.5822 11.8314 5.14501C11.8314 5.70782 11.3647 6.17453 10.8019 6.17453Z"
                                fill="#fff"/>
                            <path
                                d="M5.31096 10.2918C5.05014 10.2918 4.78933 10.1958 4.58342 9.98985L0.465311 5.87174C0.067227 5.47366 0.067227 4.81476 0.465311 4.41667L4.58342 0.298563C4.98151 -0.099521 5.64041 -0.099521 6.03849 0.298563C6.43657 0.696647 6.43657 1.35554 6.03849 1.75363L2.64791 5.14421L6.03849 8.53479C6.43657 8.93287 6.43657 9.59177 6.03849 9.98985C5.83258 10.1958 5.57177 10.2918 5.31096 10.2918Z"
                                fill="#fff"/>
                        </svg>
                    </a>
                </div>
                <p class="mb-5">
                    انواع محصولات باکیفیت برای پت های دوست داشتنی شما
                </p>

                @if($products->count() >= 4)
                    <div class="owl-product owl-carousel">
                        @foreach($products as $product)
                            <div class="item">
                                <div class="card-body mb-3 text-center">
                                    <a href="{{ route('site.products.show', $product->id) }}">
                                        <img class="img-fluid" src="{{ asset($product->image) }}" alt="تصویر محصول">
                                    </a>
                                    <div>
                                        <h5 class="my-2 YekanBakhFaNum-SemiBold">
                                            <a href="{{ route('site.products.show', $product->id) }}">{{ $product->title }}</a>
                                        </h5>
                                        <span
                                            class="color-orange YekanBakhFaNum-Bold fa18">{{ number_format($product->price) }}</span>
                                        <span class="color-orange YekanBakhFaNum-Regular fa14">تومان</span>
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if($product->quantity > 0)
                                                <form action="{{ route('site.cart.add', $product->id) }}" method="POST"
                                                      class="d-flex">
                                                    @csrf
                                                    <button type="submit"
                                                            class="add-to-cart hoverable outlined d-flex align-items-center"
                                                            style="border: none; outline: none">
                                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15 21.25C15.9665 21.25 16.75 20.4665 16.75 19.5C16.75 18.5335 15.9665 17.75 15 17.75C14.0335 17.75 13.25 18.5335 13.25 19.5C13.25 20.4665 14.0335 21.25 15 21.25Z"
                                                                fill="#FFAA00"/>
                                                            <path
                                                                d="M7 21.25C7.9665 21.25 8.75 20.4665 8.75 19.5C8.75 18.5335 7.9665 17.75 7 17.75C6.0335 17.75 5.25 18.5335 5.25 19.5C5.25 20.4665 6.0335 21.25 7 21.25Z"
                                                                fill="#FFAA00"/>
                                                            <path
                                                                d="M3.59 2.69L3.39 5.14C3.35 5.61 3.72 6 4.19 6H19.5C19.92 6 20.27 5.68 20.3 5.26C20.43 3.49 19.08 2.05 17.31 2.05H5.02C4.92 1.61 4.72 1.19 4.41 0.84C3.91 0.31 3.21 0 2.49 0H0.75C0.34 0 0 0.34 0 0.75C0 1.16 0.34 1.5 0.75 1.5H2.49C2.8 1.5 3.09 1.63 3.3 1.85C3.51 2.08 3.61 2.38 3.59 2.69Z"
                                                                fill="#FFAA00"/>
                                                            <path
                                                                d="M19.2601 7.5H3.92005C3.50005 7.5 3.16005 7.82 3.12005 8.23L2.76005 12.58C2.62005 14.29 3.96005 15.75 5.67005 15.75H16.7901C18.2901 15.75 19.6101 14.52 19.7201 13.02L20.0501 8.35C20.0901 7.89 19.7301 7.5 19.2601 7.5Z"
                                                                fill="#FFAA00"/>
                                                        </svg>
                                                        <span class="text-center ml-2">افزودن به سبد خرید</span>
                                                    </button>
                                                </form>
                                            @else
                                                <div class="d-flex">
                                                    <div class="add-to-cart hoverable unavailable">
                                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 1L20 20" stroke="#FF0000" stroke-width="2"/>
                                                            <path d="M20 1L1 20" stroke="#FF0000" stroke-width="2"/>
                                                        </svg>
                                                        <span class="text-center text-danger">ناموجود</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="card-body mb-3 text-center">
                                    <a href="{{ route('site.products.show', $product->id) }}">
                                        <img class="img-fluid" src="{{ asset($product->image) }}"
                                             alt="{{ $product->name }}">
                                    </a>
                                    <div>
                                        <h5 class="my-2 YekanBakhFaNum-SemiBold">
                                            <a href="{{ route('site.products.show', $product->id) }}">{{ $product->title }}</a>
                                        </h5>
                                        <span
                                            class="color-orange YekanBakhFaNum-Bold fa18">{{ number_format($product->price) }}</span>
                                        <span class="color-orange YekanBakhFaNum-Regular fa14">تومان</span>
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if($product->quantity > 0)
                                                <form action="{{ route('site.cart.add', $product->id) }}" method="POST"
                                                      class="d-flex">
                                                    @csrf
                                                    <button type="submit"
                                                            class="add-to-cart hoverable outlined d-flex align-items-center"
                                                            style="border: none; outline: none">
                                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15 21.25C15.9665 21.25 16.75 20.4665 16.75 19.5C16.75 18.5335 15.9665 17.75 15 17.75C14.0335 17.75 13.25 18.5335 13.25 19.5C13.25 20.4665 14.0335 21.25 15 21.25Z"
                                                                fill="#FFAA00"/>
                                                            <path
                                                                d="M7 21.25C7.9665 21.25 8.75 20.4665 8.75 19.5C8.75 18.5335 7.9665 17.75 7 17.75C6.0335 17.75 5.25 18.5335 5.25 19.5C5.25 20.4665 6.0335 21.25 7 21.25Z"
                                                                fill="#FFAA00"/>
                                                            <path
                                                                d="M3.59 2.69L3.39 5.14C3.35 5.61 3.72 6 4.19 6H19.5C19.92 6 20.27 5.68 20.3 5.26C20.43 3.49 19.08 2.05 17.31 2.05H5.02C4.92 1.61 4.72 1.19 4.41 0.84C3.91 0.31 3.21 0 2.49 0H0.75C0.34 0 0 0.34 0 0.75C0 1.16 0.34 1.5 0.75 1.5H2.49C2.8 1.5 3.09 1.63 3.3 1.85C3.51 2.08 3.61 2.38 3.59 2.69Z"
                                                                fill="#FFAA00"/>
                                                            <path
                                                                d="M19.2601 7.5H3.92005C3.50005 7.5 3.16005 7.82 3.12005 8.23L2.76005 12.58C2.62005 14.29 3.96005 15.75 5.67005 15.75H16.7901C18.2901 15.75 19.6101 14.52 19.7201 13.02L20.0501 8.35C20.0901 7.89 19.7301 7.5 19.2601 7.5Z"
                                                                fill="#FFAA00"/>
                                                        </svg>
                                                        <span class="text-center ml-2">افزودن به سبد خرید</span>
                                                    </button>
                                                </form>
                                            @else
                                                <div class="d-flex">
                                                    <div class="add-to-cart hoverable unavailable">
                                                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 1L20 20" stroke="#FF0000" stroke-width="2"/>
                                                            <path d="M20 1L1 20" stroke="#FF0000" stroke-width="2"/>
                                                        </svg>
                                                        <span class="text-center text-danger">ناموجود</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @else
        <section class="bg-gray not-found mt-4">
            <h3>هیچ محصولی یافت نشد</h3>
        </section>
    @endif

    <section class="container-fluid text-lg-right text-center my-4">
        <div class="container py-2">
            <div class="row">
                <div class="col-lg-7 pl-lg-5">
                    <h2 class="mt-5">درباره ما</h2>
                    <p class="mb-3">
                        پت هوم، سرزمین حیوانات خانگی با محصولات باکیفیت برای پت های شما
                    </p>
                    <h3 class="mt-4 color-orange">سرزمین حیوانات خانگی</h3>
                    <p class="my-4">
                        فروشگاه اینترنتی پت‌ هوم با عشق به حیوانات خانگی راه‌اندازی شده تا تجربه‌ای راحت و مطمئن برای صاحبان پت‌ها فراهم کنیم. ما باور داریم هر حیوان خانگی لایق بهترین مراقبت و توجه است، به همین دلیل مجموعه‌ای کامل از غذاها، لوازم بهداشتی، اسباب‌بازی‌ها و تجهیزات مورد نیاز را گردآوری کرده‌ایم...
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <a class="d-flex align-items-center a-button radius55 py-2 px-4"
                           href="{{ route('site.about') }}">
                            <span class="ml-2">بیشتر بخوانید</span>
                            <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8019 6.17453H2.56566C2.00285 6.17453 1.53613 5.70782 1.53613 5.14501C1.53613 4.5822 2.00285 4.11548 2.56566 4.11548H10.8019C11.3647 4.11548 11.8314 4.5822 11.8314 5.14501C11.8314 5.70782 11.3647 6.17453 10.8019 6.17453Z"
                                    fill="#fff"/>
                                <path
                                    d="M5.31096 10.2918C5.05014 10.2918 4.78933 10.1958 4.58342 9.98985L0.465311 5.87174C0.067227 5.47366 0.067227 4.81476 0.465311 4.41667L4.58342 0.298563C4.98151 -0.099521 5.64041 -0.099521 6.03849 0.298563C6.43657 0.696647 6.43657 1.35554 6.03849 1.75363L2.64791 5.14421L6.03849 8.53479C6.43657 8.93287 6.43657 9.59177 6.03849 9.98985C5.83258 10.1958 5.57177 10.2918 5.31096 10.2918Z"
                                    fill="#fff"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-center mt-5">
                    <img src="{{ asset('Img/about-us.png') }}" class="img-fluid wapp" alt="about_us"/>
                </div>
            </div>
        </div>
    </section>

    @if($topComments->count() > 0)
        <section class="bg-question pb-3">
            <div class="m-3 question-bg">
                <section class="container p-4 radius20 mt-5 mb-2">
                    <div class=" text-center mt-3">
                        <h2 class="mt-5">نظرات مشتریان</h2>
                        <p class="mb-3">همواره در تلاشیم تا رضایت شمارو جلب کنیم،شما لایق بهترین ها هستید.</p>
                    </div>
                    <div class="mx-lg-5">
                        <div>
                            <div id="owl-Story" class="owl-carousel owl-theme text-center py-2 px-md-3">
                                @foreach($topComments as $comment)
                                    <div class="item">
                                        <div
                                            class="d-flex card flex-row justify-content-center align-items-center text-right mt-3 p-6 commernt-res">
                                            <div>
                                                <svg class="img-fluid pic155 p-1 rounded-circle ml-lg-5"
                                                     viewBox="0 0 64 64" role="img" aria-label="User icon"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="32" cy="32" r="32" fill="#ff9800"/>
                                                    <circle cx="32" cy="22" r="10" fill="#ffffff"/>
                                                    <path d="M16 51c0-8.837 7.163-16 16-16s16 7.163 16 16v4H16v-4z"
                                                          fill="#ffffff"/>
                                                </svg>
                                            </div>
                                            <div class="m-2">
                                                <p>{{ $comment->content }}</p>
                                                <div class="pt-2">
                                                    <p class="text-dark bottom_p">
                                                        {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                                    </p>
                                                    <span>
                                                @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $comment->rating)
                                                                <svg width="15" height="14" viewBox="0 0 15 14"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.24563 10.8425L3.38813 12.8706L4.125 8.575L1 5.53313L5.3125 4.90813L7.24125 1L9.17 4.90813L13.4825 5.53313L10.3575 8.575L11.0944 12.8706L7.24563 10.8425Z"
                                                                fill="#FDC736" stroke="#FDC736"
                                                                stroke-width="2"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                        </svg>
                                                            @else
                                                                <svg width="15" height="14" viewBox="0 0 15 14"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.24563 10.8425L3.38813 12.8706L4.125 8.575L1 5.53313L5.3125 4.90813L7.24125 1L9.17 4.90813L13.4825 5.53313L10.3575 8.575L11.0944 12.8706L7.24563 10.8425Z"
                                                                fill="#C4C4C4" stroke="#C4C4C4"
                                                                stroke-width="2"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"/>
                                                        </svg>
                                                            @endif
                                                        @endfor
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    @else
        <section class="bg-question not-found mt-3">
            <h3>هیچ نظری ثبت نشده است</h3>
        </section>
    @endif
@endsection
