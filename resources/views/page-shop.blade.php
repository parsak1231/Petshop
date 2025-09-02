@extends('layouts.app')

@section('title', "قیمت و خرید $product->title")

@section('breadcrumb')
    @include('layouts.breadcrumb',
        $items = [
            ['url' => route('site.products.index'), 'label' => "فروشگاه"],
            ['url' => route('site.products.show', $product->id), 'label' => "$product->title"]
        ])
@endsection

@push('styles')
    <style>
        .rating {
            direction: rtl;
            unicode-bidi: bidi-override;
            text-align: right;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ccc;
            font-size: 30px;
            padding: 0 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .rating input:checked ~ label,
        .rating input:hover ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #f5b301;
        }

        .login-comment:hover {
            color: orange;
        }
    </style>
@endpush

@section('content')
    <section class="container mb-4">
        @include('components.error-custom')
        @if(session('success_comment'))
            <div class="alert alert-success">
                {{ session('success_comment') }}
            </div>
        @endif
        <div class="row">
            <div class="col-xl-9 order-xl-0 order-0">
                <div class="card m-3 p-4">
                    <div>
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-6 d-flex align-items-center pic-product">
                                <div class="white-box text-center">
                                    <img src="{{ asset($product->image) }}" class="img-responsive" alt="تصویر محصول">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-6 ">
                                <h4 class="box-title">{{ $product->title }}</h4>
                                <hr>
                                <ul class="list-unstyled">
                                    @if($product->comments->whereNotNull('rating')->count() > 0)
                                    <div class="rating">
                                        <div class="stars d-flex align-items-center">
                                            <span class="color-gray">امتیاز:</span>
                                            <span>&nbsp;</span>
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.24563 10.8425L3.38813 12.8706L4.125 8.575L1 5.53313L5.3125 4.90813L7.24125 1L9.17 4.90813L13.4825 5.53313L10.3575 8.575L11.0944 12.8706L7.24563 10.8425Z"
                                                    fill="#FDC736" stroke="#FDC736" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="review-no mr-2">
                                                {{ round($product->comments->avg('rating'), 1) }}
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                    <li class="color-gray">
                                        دسته بندی:
                                        <span class="color-dark">{{ $product->category->title }}</span>
                                    </li>
                                    <li class="color-gray">
                                        موجودی:
                                        @if($product->quantity > 0)
                                            <span class="color-dark">{{ $product->quantity }} عدد در انبار</span>
                                        @else
                                            <span style="color:red">ناموجود</span>
                                        @endif
                                    </li>
                                    <li class="color-gray">
                                        توضیحات محصول:
                                        <p class="color-dark">{{ $product->description }}</p>
                                    </li>
                                </ul>
                                <div class="d-flex align-items-center justify-content-between my-4">
                                    @if($product->quantity > 0)
                                        <form action="{{ route('site.cart.add', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-lightorng btn-rounded mr-1"
                                                    data-toggle="tooltip"
                                                    title="افزودن به سبد خرید">
                                                افزودن به سبد خرید
                                            </button>
                                        </form>
                                        <h3 class="color-orange YekanBakhFaNum-Bold fa18">
                                            {{ number_format($product->price) }}
                                            <span class="YekanBakhFaNum-Regular fa14">تومان</span>
                                        </h3>
                                    @else
                                        <h3 class="color-orange YekanBakhFaNum-Bold fa18">
                                            <span class="YekanBakhFaNum-Regular"
                                                  style="font-size: 16px">
                                                قیمت قبلی:
                                            </span>
                                            {{ number_format($product->price) }}
                                            <span class="YekanBakhFaNum-Regular fa14">تومان</span>
                                        </h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-3 p-4">
                    <div class="mytab-vertical bg-lighten p-3 radius15">
                        <ul class="nav nav-tabs" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="vertical-tab1" data-toggle="tab"
                                   href="#content-tab1" role="tab" aria-controls="profile" aria-selected="false">
                                    نظرات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vertical-tab2" data-toggle="tab"
                                   href="#content-tab2" role="tab" aria-controls="contact"
                                   aria-selected="false">
                                    ثبت نظر
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myContentTab3">
                            <div class="tab-pane fade show active" id="content-tab1" role="tabpanel"
                                 aria-labelledby="vertical-tab1">
                                <div class="mb-4"></div>
                                @if(!$product->comments->isEmpty())
                                    <div class="comments-list">
                                        @foreach($product->comments as $comment)
                                            <div class="comment-item mb-4 p-4 bg-light radius15">
                                                <div class="comment-header d-flex justify-content-between mb-3">
                                                    <div class="comment-author d-flex align-items-center">
                                                        <div class="author-avatar mr-3"
                                                             style="transform: translate(10px, -10px);">
                                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="20" cy="20" r="20" fill="#FFAA00"/>
                                                                <g style="transform: translate(0, -3px);">
                                                                    <path
                                                                        d="M20 22C22.7614 22 25 19.7614 25 17C25 14.2386 22.7614 12 20 12C17.2386 12 15 14.2386 15 17C15 19.7614 17.2386 22 20 22Z"
                                                                        fill="white"/>
                                                                    <path
                                                                        d="M20 24C14.4772 24 10 28.4772 10 34C10 34.5523 10.4477 35 11 35H29C29.5523 35 30 34.5523 30 34C30 28.4772 25.5228 24 20 24Z"
                                                                        fill="white"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-0">
                                                                {{ $comment->user->first_name }}
                                                                {{ $comment->user->last_name }}
                                                            </h5>
                                                            <div class="comment-date text-muted">
                                                                {{ \Morilog\Jalali\Jalalian::forge($comment->created_at)->ago() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-rating">
                                                        <div class="stars d-flex">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-body">
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted text-center mt-5 fa18">
                                        برای این محصول تا به حال نظری داده نشده است.
                                    </p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="content-tab2" role="tabpanel"
                                 aria-labelledby="vertical-tab2">
                                @auth
                                    @if(auth()->user()->hasRole('customer'))
                                        <h3 class="mb-2">فرم ثبت نظر</h3>
                                        <form method="POST" action="{{ route('site.comments.store') }}">
                                            @csrf
                                            <div class="form-group comment-page-blog">
                                                <div class="rating mb-3">
                                                    <input type="radio" name="rating" id="star5" value="5">
                                                    <label for="star5">★</label>
                                                    <input type="radio" name="rating" id="star4" value="4">
                                                    <label for="star4">★</label>
                                                    <input type="radio" name="rating" id="star3" value="3">
                                                    <label for="star3">★</label>
                                                    <input type="radio" name="rating" id="star2" value="2">
                                                    <label for="star2">★</label>
                                                    <input type="radio" name="rating" id="star1" value="1">
                                                    <label for="star1">★</label>
                                                </div>

                                                <textarea name="content" class="form-control area mb-2" cols="60"
                                                          rows="9"
                                                          placeholder="نظر"
                                                          style="height: 150px!important"></textarea>

                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                <button type="submit"
                                                        class="btn btn-lightorng d-flex align-items-center">
                                                    <svg class="ml-2" width="25" height="25" viewBox="0 0 32 32"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M23.8268 29.16C23.4134 29.16 23.0001 29.0534 22.6268 28.8267L17.2801 25.6534C16.7201 25.64 16.1601 25.6001 15.6268 25.5201C15.2668 25.4667 14.9601 25.2267 14.8268 24.88C14.6934 24.5333 14.7601 24.16 15.0001 23.88C15.8801 22.8533 16.3334 21.6267 16.3334 20.32C16.3334 17.0934 13.4934 14.4667 10.0001 14.4667C8.69343 14.4667 7.44009 14.8267 6.38676 15.5201C6.09343 15.7067 5.73343 15.7334 5.41343 15.5867C5.10677 15.44 4.88011 15.1467 4.84011 14.8C4.80011 14.4267 4.77344 14.0534 4.77344 13.6667C4.77344 7.05337 10.5068 1.68005 17.5468 1.68005C24.5868 1.68005 30.3201 7.05337 30.3201 13.6667C30.3201 17.2934 28.6401 20.6267 25.6801 22.9067L26.1334 26.5334C26.2401 27.4401 25.8401 28.2934 25.0801 28.7867C24.7068 29.0267 24.2668 29.16 23.8268 29.16ZM17.5334 23.64C17.7201 23.6267 17.9068 23.6801 18.0668 23.7867L23.6534 27.1067C23.8001 27.2001 23.9201 27.1601 24.0001 27.1067C24.0668 27.0667 24.1734 26.9601 24.1468 26.7734L23.6268 22.56C23.5868 22.1867 23.7468 21.8267 24.0401 21.6134C26.7601 19.7067 28.3201 16.8 28.3201 13.64C28.3201 8.13335 23.4934 3.65336 17.5468 3.65336C11.8268 3.65336 7.13343 7.81341 6.78676 13.0401C7.78676 12.6534 8.86678 12.4401 9.98678 12.4401C14.5868 12.4401 18.3201 15.96 18.3201 20.2933C18.3334 21.4667 18.0534 22.6 17.5334 23.64Z"
                                                            fill="white"/>
                                                        <path
                                                            d="M6.10636 30.3335C5.7597 30.3335 5.42636 30.2402 5.11969 30.0402C4.51969 29.6535 4.1997 28.9868 4.2797 28.2802L4.54637 26.2268C2.74637 24.7601 1.67969 22.5868 1.67969 20.3068C1.67969 17.7068 3.0397 15.2801 5.3197 13.8268C6.69304 12.9334 8.31969 12.4535 10.013 12.4535C14.613 12.4535 18.3464 15.9734 18.3464 20.3068C18.3464 22.0668 17.7064 23.8001 16.533 25.1735C15.0264 27.0001 12.773 28.0668 10.293 28.1468L7.03969 30.0801C6.74636 30.2535 6.42636 30.3335 6.10636 30.3335ZM9.99969 14.4535C8.69303 14.4535 7.43969 14.8135 6.38635 15.5068C4.67969 16.6001 3.66636 18.3868 3.66636 20.3068C3.66636 22.1601 4.57303 23.8535 6.17303 24.9468C6.4797 25.1602 6.63969 25.5201 6.59969 25.8934L6.30636 28.1735L9.49302 26.2802C9.65302 26.1868 9.82636 26.1334 9.99969 26.1334C11.9597 26.1334 13.813 25.2935 14.9864 23.8668C15.8664 22.8268 16.333 21.6001 16.333 20.2934C16.333 17.0801 13.493 14.4535 9.99969 14.4535Z"
                                                            fill="white"/>
                                                    </svg>
                                                    ثبت نظر
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <p class="text-danger text-center mt-5 fa18">تنها کاربران مشتری می‌توانند نظر
                                            بدهند.</p>
                                    @endif
                                @else
                                    <p class="text-muted text-center mt-5 fa18">
                                        برای ارسال نظر، ابتدا
                                        <a href="{{ route('login.form') }}" class="color-orange login-comment">
                                            وارد شوید
                                        </a>
                                    </p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
