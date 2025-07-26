@extends('admin.layouts.app')

@section('title', 'بروزرسانی دسته بندی')

@php
    /** @var \App\Models\Category $category */
    $breadcrumbs = [
        ['url' => route('admin.categories.index'), 'label' => 'دسته بندی ها'],
        ['url' => route('admin.categories.edit', $category->id) , 'label' => "بروزرسانی دسته بندی $category->id"],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
    <div class="main-content">
        <div class="col-12 bg-white padding-30 border-radius-3" style="margin-bottom: 30px;">
            <p class="box__title margin-bottom-20">بروزرسانی دسته بندی</p>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="width-100">
                @csrf
                @method('PUT')
                <div class="margin-bottom-20">
                    <input type="text" name="title" placeholder="نام دسته بندی" class="text width-100"
                           value="{{ $category->title }}">
                    @if($errors->any())
                        <small class="text-danger" style="color:red">
                            {{ $errors->first() }}
                        </small>
                    @endif
                </div>

                <button type="submit" class="btn btn-netcopy_net width-100" style="padding: 12px 25px;">
                    بروزرسانی کردن
                </button>
            </form>
        </div>
    </div>
@endsection
