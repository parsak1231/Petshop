@extends('admin.layouts.app')

@section('title', )

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .restore-text {
            background: none;
            text-decoration: none;
            color: #636E72;
        }
        .restore-text:hover {
            text-decoration: underline;
        }
    </style>
@endpush

@section('breadcrumb')
    @include('admin.layouts.breadcrumb')
@endsection

@section('content')
    <div class="main-content">
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد کاربران ثبت نامی: {{ $totalUsers }} نفر</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>پر استفاده ترین دسته بندی:</p>
                <p>{{ $mostUsedCategory?->title }}</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد نقش های تعریف شده: {{ $totalRoles }} عدد</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-bottom-10">
                <p>آخرین محصول حذف شده:</p>
                @if($lastDeletedProduct)
                <p>{{ $lastDeletedProduct?->title }}</p>
                <p>تاریخ حذف: {{ \Morilog\Jalali\Jalalian::fromDateTime($lastDeletedProduct?->deleted_at)?->format('%Y/%m/%d') }}
                </p>
                <br>
                <form action="{{ route('admin.products.restore', $lastDeletedProduct->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="cursor-pointer restore-text">
                        <i class="bi bi-arrow-counterclockwise"></i> بازگردانی محصول
                    </button>
                </form>
                @else
                <p style="color: red">موردی برای نمایش وجود ندارد</p>
            </div>
            @endif
        </div>
        <div class="row bg-white no-gutters font-size-13">
            <div class="title__row">
                <p>کاربران آنلاین</p>
                <form method="GET" id="perPageForm">
                    <div style="display: flex; align-items: center;">
                        <span style="margin-left: 10px;">نمایش</span>
                        <select name="entries"
                                onchange="document.getElementById('perPageForm').submit();">
                            @foreach([5, 10, 20, 25] as $count)
                                <option value="{{ $count }}" {{ $entries == $count ? 'selected' : '' }}>
                                    {{ $count }}
                                </option>
                            @endforeach
                        </select>
                        <span style="margin-right: 10px">مورد</span>
                    </div>
                </form>
            </div>
            <div class="table__box" style="overflow-x: auto">
                <table class="table">
                    <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>شماره موبایل</th>
                        <th>نقش</th>
                        <th>ایمیل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($onlineUsers as $user)
                        <tr role="row">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->roles->first()->label }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
