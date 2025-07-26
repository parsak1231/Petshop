@extends('admin.layouts.app')

@section('title', 'ایجاد مدیر')

@php
    $breadcrumbs = [
        ['url' => route('admin.users.index'), 'label' => 'کاربران'],
        ['url' => route('admin.users.create'), 'label' => 'ایجاد مدیران'],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
    <div class="main-content">
        <div class="col-12 bg-white padding-30 border-radius-3" style="margin-bottom: 30px;">
            <p class="box__title margin-bottom-20">ایجاد مدیر جدید</p>
            <form action="{{ route('admin.users.store') }}" method="POST" class="width-100">
                @csrf
                <div class="margin-bottom-20">
                    <input type="text" name="first_name" placeholder="نام مدیر" class="text width-100">
                    @include('components.error', ['field' => 'first_name'])

                    <input type="text" name="last_name" placeholder="نام خانوادگی مدیر" class="text width-100">
                    @include('components.error', ['field' => 'last_name'])

                    <input type="email" name="email" placeholder="ایمیل مدیر" class="text width-100">
                    @include('components.error', ['field' => 'email'])

                    <input type="password" name="password" placeholder="پسورد مدیر" class="text width-100">
                    @include('components.error', ['field' => 'password'])

                    <input type="password" name="password_confirmation" placeholder="تکرار پسورد مدیر"
                           class="text width-100">

                    <input type="text" name="phone" placeholder="تلفن مدیر" class="text width-100">
                    @include('components.error', ['field' => 'phone'])

                    @role('super_admin')
                        <select name="role" class="width-100">
                            @foreach($allowedRoles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->label }}
                                </option>
                            @endforeach
                        </select>
                        @include('components.error', ['field' => 'role'])
                    @endrole
                </div>
                <button type="submit" class="btn btn-netcopy_net width-100" style="padding: 12px 25px;">
                    اضافه کردن
                </button>
            </form>
        </div>
    </div>
@endsection
