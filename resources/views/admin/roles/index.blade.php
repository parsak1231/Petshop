@extends('admin.layouts.app')

@section('title', 'صفحه نقش ها')

@php
    $breadcrumbs = [
        ['url' => route('admin.roles.index'), 'label' => 'نقش ها'],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
<div class="main-content font-size-13">
    <div class="tab__box">
        <div class="tab__items">
            <a class="tab__item is-active" href="{{ route('admin.roles.index') }}">لیست نقش ها</a>
            @role('super_admin')
                <a class="tab__item " href="{{ route('admin.roles.create') }}">ایجاد نقش جدید</a>
            @endrole
        </div>
    </div>
    <div class="table__box" style="overflow-x: auto">
        <table class="table">
            <thead role="rowgroup">
            <tr role="row" class="title-row">
                <th class="p-r-90">شناسه</th>
                <th>نام نقش</th>
                <th>نام انگلیسی نقش</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr role="row">
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->label }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        {{ \Morilog\Jalali\Jalalian::fromDateTime($role->created_at)->format('%Y/%m/%d') }}
                    </td>
                    <td>
                        @role('super_admin')
                            <form action="{{ route('admin.roles.destroy', $role->id) }}"
                                  method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirmDelete(event, {{ $role->protected ? 'true' : 'false' }})">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="item-delete mlg-15 cursor-pointer" style="background: none" title="حذف"></button>
                            </form>
                        @endrole
                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="item-edit" title="ویرایش"></a>
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
    <script>
        window.confirmDelete = function(event, isProtected) {
            if (isProtected) {
                alert("این نقش محافظت‌شده است و قابل حذف نیست.");
                event.preventDefault();
                return false;
            }

            if (!confirm("آیا مطمئنی که می‌خواهی این نقش را حذف کنی؟")) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
@endpush
