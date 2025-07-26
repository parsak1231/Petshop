@extends('admin.layouts.app')

@section('title', 'صفحه نظرات')

@php
    $breadcrumbs = [
        ['url' => route('admin.products.index'), 'label' => 'نظرات'],
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
                    <a class="tab__item is-active" href="{{ route('admin.comments.index') }}">نمایش همه نظرات</a>
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
                    {{-- Save page parameter --}}
                    @if(request()->has('page'))
                        <input type="hidden" name="page" value="{{ request('page') }}">
                    @endif
                    <span>مورد در هر صفحه</span>
                </form>
            </div>

            <div class="tab__pagination">
                @if($comments->previousPageUrl())
                    <a href="{{ $comments->previousPageUrl() }}" class="tab__page">صفحه قبل</a>
                @endif
                @if($comments->nextPageUrl())
                    <a href="{{ $comments->nextPageUrl() }}" class="tab__page">صفحه بعد</a>
                @endif
            </div>
        </div>

        <div class="table__box" style="overflow-x: auto">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th class="p-r-90">شناسه</th>
                    <th>عنوان محصول</th>
                    <th>نام کاربر</th>
                    <th>فامیلی کاربر</th>
                    <th>محتوا</th>
                    <th>امتیاز</th>
                    <th>تاریخ ثبت</th>
                    <th>وضعیت محصول</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->product?->title }}</td>
                        <td>{{ $comment->user?->first_name }}</td>
                        <td>{{ $comment->user?->last_name }}</td>
                        <td title="{{ $comment->content }}">
                            {{ \Illuminate\Support\Str::limit($comment->content, 20) }}
                        </td>
                        <td>{{ $comment->rating }} ستاره</td>
                        <td>
                            {{ \Morilog\Jalali\Jalalian::fromDateTime($comment->created_at)->format('%Y/%m/%d') }}
                        </td>
                        <td style="color:{{ $comment->product?->status ? 'green' : 'red' }}">
                            {{ $comment->product?->status ? 'فعال' : 'غیرفعال' }}
                        </td>
                        <td>
                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
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
