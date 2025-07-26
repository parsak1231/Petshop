@extends('admin.layouts.app')

@section('title', 'صفحه محصولات')

@php
    $breadcrumbs = [
        ['url' => route('admin.products.index'), 'label' => 'محصولات'],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @media (max-width: 376px) {
            .top-space {
                margin-top: 20px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__header">
                <div class="tab__items">
                    <a class="tab__item is-active" href="{{ route('admin.products.index') }}">نمایش همه محصولات</a>
                </div>
                <form method="GET" id="perPageForm" class="tab__select-form top-space">
                    <span>نمایش</span>
                    <select name="entries" onchange="document.getElementById('perPageForm').submit();">
                        @foreach([5, 10, 20, 25, 50] as $count)
                            <option value="{{ $count }}" {{ $entries == $count ? 'selected' : '' }}>
                                {{ $count }}
                            </option>
                        @endforeach
                    </select>
                    {{-- Save other parameters --}}
                    @if(request()->has('page'))
                        <input type="hidden" name="page" value="{{ request('page') }}">
                    @endif

                    @if(request()->has('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <span>مورد در هر صفحه</span>
                </form>
            </div>

            <div class="tab__pagination">
                @if($products->previousPageUrl())
                    <a href="{{ $products->previousPageUrl() }}" class="tab__page">صفحه قبل</a>
                @endif
                @if($products->nextPageUrl())
                    <a href="{{ $products->nextPageUrl() }}" class="tab__page">صفحه بعد</a>
                @endif
            </div>
        </div>


        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
            <div class="t-header-search">
                <form action="{{ route('admin.products.index') }}" method="GET">
                    <div class="t-header-searchbox no-after font-size-13 position-relative">
                        <input type="text" name="search" class="text search-input__box font-size-13"
                               placeholder="جستجوی محصول..." value="{{ request('search') }}">
                        {{-- Save other parameters --}}
                        @if(request()->has('entries'))
                            <input type="hidden" name="entries" value="{{ request('entries') }}">
                        @endif
                        @if(request()->has('page'))
                            <input type="hidden" name="page" value="{{ request('page') }}">
                        @endif
                        <button type="submit" class="search-btn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table__box" style="overflow-x: auto">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th class="p-r-90">شناسه</th>
                    <th>عنوان</th>
                    <th>تصویر</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                    <th>توضیحات</th>
                    <th>نام فروشنده</th>
                    <th>فامیلی فروشنده</th>
                    <th>تاریخ ثبت</th>
                    <th>دسته بندی</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>
                            <img class="img__slideshow" src="{{ asset($product->image) }}" alt="عکس محصول"/>
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td title="{{ $product->description }}">
                            {{ \Illuminate\Support\Str::limit($product->description, 20) }}
                        </td>
                        <td>{{ $product->user?->first_name }}</td>
                        <td>{{ $product->user?->last_name }}</td>
                        <td>
                            {{ \Morilog\Jalali\Jalalian::fromDateTime($product->created_at)->format('%Y/%m/%d') }}
                        </td>
                        <td>{{ $product->category?->title }}</td>
                        <td style="color:{{ $product->status ? 'green' : 'red' }}">
                            {{ $product->status ? 'فعال' : 'غیرفعال' }}
                        </td>
                        <td>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="item-delete mlg-15 cursor-pointer" style="background: none"
                                        title="حذف"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete() {
            return confirm("آیا از حذف این مورد اطمینان دارید؟");
        }
    </script>
@endpush
