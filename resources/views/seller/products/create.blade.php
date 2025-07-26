@extends('seller.layouts.app')

@section('title', 'اضافه کردن محصول')

@push('styles')
    <style>
        label {
            font-size: 1.21em;
        }

        select {
            direction: rtl !important;
            background-position: left 0.75rem center !important;
            padding-left: 2.25rem !important;
            padding-right: 0.75rem !important;
        }
    </style>
@endpush

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="col-sm-12" style="direction: rtl">
                <div class="card">
                    <div class="card-header">
                        <h4>فرم ایجاد محصول</h4>
                    </div>
                    <div class="card-body">
                        <form class="validate-me" id="validate-me" enctype="multipart/form-data"
                              action="{{ route('seller.products.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label text-lg-end">عنوان محصول:</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="title" id="title" />
                                </div>
                                @include('components.error', ['field' => 'title'])
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label text-lg-end">
                                    قیمت محصول(تومان):
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="price" id="price" />
                                </div>
                                @include('components.error', ['field' => 'price'])
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label text-lg-end">تعداد محصول:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="quantity" id="quantity" />
                                </div>
                                @include('components.error', ['field' => 'quantity'])
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label text-lg-end">
                                    بارگذاری تصویر:
                                </label>
                                <div class="col-lg-6">
                                    <input name="image" id="image" type="file" class="form-control" />
                                </div>
                                @include('components.error', ['field' => 'image'])
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label text-lg-end">
                                    توضیحات محصول:
                                </label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                @include('components.error', ['field' => 'description'])
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label text-lg-end">
                                    انتخاب دسته‌بندی:
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="category" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @include('components.error', ['field' => 'category'])
                            </div>
                            <div class="row mb-0">
                                <div class="col-lg-4 col-form-label"></div>
                                <div class="col-lg-6">
                                    <input type="submit" class="btn btn-primary" value="تایید"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div style="margin-top: 6em"></div>
        </div>
    </div>
@endsection
