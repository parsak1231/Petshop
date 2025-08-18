@extends('layouts.app')

@section('title', 'محصولات')

@section('breadcrumb')
    @include('layouts.breadcrumb',
        $items = array(['url' => route('site.products.index'), 'label' => 'فروشگاه']))
@endsection

@push('styles')
    <style>
        .not-found {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px;
        }
    </style>
@endpush

@section('content')
    <section class="container mb-4">
        @include('components.error-custom')
        @if($products->count())
            <div class="row">
                <div class="col-xl-9 pt-3 order-xl-1 pl-4 order-0 mb-3">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card-body mb-3 text-center">
                                    <a href="{{ route('site.products.show', $product->id) }}">
                                        <img style="width:220px;height:150px" src="{{ asset($product->image) }}"
                                             alt="عکس محصول">
                                    </a>
                                    <div>
                                        <h5 class="my-2 YekanBakhFaNum-SemiBold">
                                            <a class="card-pro" href="{{ route('site.products.show', $product->id) }}">
                                                {{ $product->title }}
                                            </a>
                                        </h5>
                                        @if($product->quantity <= 0)
                                            <span class="color-orange YekanBakhFaNum-Regular" style="font-size: 16px">
                                                قیمت قبلی:
                                            </span>
                                        @endif
                                        <span
                                            class="color-orange YekanBakhFaNum-Bold fa18">
                                            {{ number_format($product->price) }}
                                        </span>
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
                    @php
                        $currentPage = $products->currentPage();
                        $lastPage = $products->lastPage();
                        $start = max(1, $currentPage - 2);
                        $end = min($lastPage, $currentPage + 2);
                    @endphp

                    @if ($lastPage > 1)
                        <div class="row mt-3">
                            <div class="col-12 text-center mx-auto">
                                <ul class="pagination justify-content-center flex-wrap">

                                    <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                        <a class="page-link"
                                           href="{{ $currentPage > 1 ? $products->url($currentPage - 1) : '#' }}">
                                            <span class="d-none d-sm-inline">صفحه قبل</span>
                                            {{-- For small screens --}}
                                            <span class="d-inline d-sm-none">صفحه قبل</span>
                                        </a>
                                    </li>

                                    @if ($start > 1)
                                        <li class="page-item d-none d-sm-block">
                                            <a class="page-link" href="{{ $products->url(1) }}">1</a>
                                        </li>
                                        @if ($start > 2)
                                            <li class="page-item disabled d-none d-sm-block">
                                                <span class="page-link" style="border-radius: 30px">...</span>
                                            </li>
                                        @endif
                                    @endif

                                    @for ($i = $start; $i <= $end; $i++)
                                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }} d-none d-sm-block">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($end < $lastPage)
                                        @if ($end < $lastPage - 1)
                                            <li class="page-item disabled d-none d-sm-block">
                                                <a class="page-link">...</a>
                                            </li>
                                        @endif
                                        <li class="page-item d-none d-sm-block">
                                            <a class="page-link"
                                               href="{{ $products->url($lastPage) }}">{{ $lastPage }}</a>
                                        </li>
                                    @endif

                                    <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                                        <a class="page-link"
                                           href="{{ $currentPage < $lastPage ? $products->url($currentPage + 1) : '#' }}">
                                            <span class="d-none d-sm-inline">صفحه بعد</span>
                                            {{-- For small screens --}}
                                            <span class="d-inline d-sm-none">صفحه بعد</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="not-found">
                <h3>هیچ محصولی یافت نشد</h3>
            </div>
        @endif
    </section>
@endsection
