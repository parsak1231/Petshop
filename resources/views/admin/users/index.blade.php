@extends('admin.layouts.app')

@section('title', 'صفحه کاربران')

@php
    $breadcrumbs = [
        ['url' => route('admin.users.index'), 'label' => 'کاربران'],
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
                    <a class="tab__item is-active" href="{{ route('admin.products.index') }}">نمایش همه کاربران</a>
                    <a class="tab__item" href="{{ route('admin.users.create') }}">ایجاد مدیران جدید</a>
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
                    @if(request()->has('first_name'))
                        <input type="hidden" name="first_name" value="{{ request('first_name') }}">
                    @endif
                    @if(request()->has('last_name'))
                        <input type="hidden" name="last_name" value="{{ request('last_name') }}">
                    @endif
                    @if(request()->has('email'))
                        <input type="hidden" name="email" value="{{ request('email') }}">
                    @endif
                    @if(request()->has('phone'))
                        <input type="hidden" name="phone" value="{{ request('phone') }}">
                    @endif
                    <span>مورد در هر صفحه</span>
                </form>
            </div>

            <div class="tab__pagination">
                @if($users->previousPageUrl())
                    <a href="{{ $users->previousPageUrl() }}" class="tab__page">صفحه قبل</a>
                @endif
                @if($users->nextPageUrl())
                    <a href="{{ $users->nextPageUrl() }}" class="tab__page">صفحه بعد</a>
                @endif
            </div>
        </div>


        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
            <div class="t-header-search">
                <form action="{{ route('admin.users.index') }}" method="GET">
                    <div class="t-header-searchbox font-size-13">
                        <input type="text" class="text font-size-13" placeholder="جستجوی کاربر">
                        <div class="t-header-search-content ">
                            <input value="{{ request('email') }}" name="email" type="text" class="text" placeholder="ایمیل">
                            <input value="{{ request('phone') }}" name="phone" type="text" class="text" placeholder="شماره">
                            <input value="{{ request('first_name') }}" name="first_name" type="text" class="text" placeholder="نام">
                            <input value="{{ request('last_name') }}" name="last_name" type="text" class="text margin-bottom-20" placeholder="نام خانوادگی">
                            {{-- Save other parameters --}}
                            @if(request()->has('page'))
                                <input type="hidden" name="page" value="{{ request('page') }}">
                            @endif
                            @if(request()->has('entries'))
                                <input type="hidden" name="entries" value="{{ request('entries') }}">
                            @endif
                            <button type="submit" class="btn btn-netcopy_net">جستجو</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table__box" style="overflow-x: auto">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th class="p-r-90">شناسه</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>نقش</th>
                    <th>ایمیل</th>
                    <th>شماره موبایل</th>
                    <th>تاریخ ورود</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->roles->first()?->label }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            {{ \Morilog\Jalali\Jalalian::fromDateTime($user->created_at)->format('%Y/%m/%d') }}
                        </td>
                        <td>
                            @role('super_admin')
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                      style="display:inline-block"
                                      onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item-delete mlg-15 cursor-pointer" style="background: none"
                                            title="حذف">
                                    </button>
                                </form>
                            @endrole
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="item-edit" title="ویرایش"></a>
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
    @if(session('error'))
        <script>alert("{{ session('error') }}");</script>
    @endif
@endpush
