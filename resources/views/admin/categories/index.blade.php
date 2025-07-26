@extends('admin.layouts.app')

@section('title', 'صفحه دسته بندی ها')

@php
    $breadcrumbs = [
        ['url' => route('admin.categories.index'), 'label' => 'دسته بندی ها'],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('admin.categories.index') }}">لیست دسته بندی ها</a>
                <a class="tab__item " href="{{ route('admin.categories.create') }}">ایجاد دسته بندی جدید</a>
            </div>
        </div>
        <div class="table__box" style="overflow-x: auto">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th class="p-r-90">شناسه</th>
                    <th>نام دسته بندی</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr role="row">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            {{ \Morilog\Jalali\Jalalian::fromDateTime($category->created_at)->format('%Y/%m/%d') }}
                        </td>
                        <td>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="item-delete mlg-15 cursor-pointer" style="background: none" title="حذف"></button>
                            </form>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="item-edit" title="ویرایش"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/js/tagsInput.js') }}"></script>
@endpush
