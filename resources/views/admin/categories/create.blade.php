@extends('admin.layouts.app')

@section('title', 'ایجاد دسته بندی')

@php
    $breadcrumbs = [
        ['url' => route('admin.categories.index'), 'label' => 'دسته بندی ها'],
        ['url' => route('admin.categories.create'), 'label' => 'ایجاد دسته بندی ها'],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
    <div class="main-content">
        <div class="col-12 bg-white padding-30 border-radius-3" style="margin-bottom: 30px;">
            <p class="box__title margin-bottom-20">ایجاد دسته بندی جدید</p>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="width-100">
                @csrf
                <div class="margin-bottom-20">
                    <input type="text" name="title" placeholder="نام دسته بندی" class="text width-100">
                    @include('components.error', ['field' => 'title'])
                </div>

                <button type="submit" class="btn btn-netcopy_net width-100" style="padding: 12px 25px;">
                    اضافه کردن
                </button>
            </form>
        </div>
    </div>
@endsection
