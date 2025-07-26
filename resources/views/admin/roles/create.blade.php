@extends('admin.layouts.app')

@section('title', 'ایجاد نقش')

@php
    $breadcrumbs = [
        ['url' => route('admin.roles.index'), 'label' => 'نقش ها'],
        ['url' => route('admin.roles.create'), 'label' => 'ایجاد نقش ها'],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
    <div class="main-content">
        <div class="col-12 bg-white padding-30 border-radius-3" style="margin-bottom: 30px;">
            <p class="box__title margin-bottom-20">ایجاد نقش جدید</p>
            <form action="{{ route('admin.roles.store') }}" method="POST" class="width-100">
                @csrf
                <div class="margin-bottom-20">
                    <input type="text" name="label" placeholder="نام نقش" class="text width-100">
                    @include('components.error', ['field' => 'label'])

                    <input type="text" name="name" placeholder="نام انگلیسی(سیستمی) نقش" class="text width-100">
                    @include('components.error', ['field' => 'name'])
                </div>

                <button type="submit" class="btn btn-netcopy_net width-100" style="padding: 12px 25px;">
                    اضافه کردن
                </button>
            </form>
        </div>
    </div>
@endsection
