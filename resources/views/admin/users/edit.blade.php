@extends('admin.layouts.app')

@section('title', 'ویرایش مدیر')

@php
    /** @var App\Models\User $user */
    $breadcrumbs = [
        ['url' => route('admin.users.index'), 'label' => 'کاربران'],
        ['url' => route('admin.roles.edit', $user->id) , 'label' => "بروزرسانی مدیر$user->id"],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
    <div class="main-content">
        <div class="col-12 bg-white padding-30 border-radius-3" style="margin-bottom: 30px;">
            <p class="box__title margin-bottom-20">بروزرسانی مدیر</p>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="width-100">
                @csrf
                @method('PUT')
                <div class="margin-bottom-20">
                    <input type="text" name="first_name" placeholder="نام مدیر" value="{{ $user->first_name }}"
                           class="text width-100">
                    @include('components.error', ['field' => 'first_name'])

                    <input type="text" name="last_name" placeholder="نام خانوادگی مدیر" value="{{ $user->last_name }}"
                           class="text width-100">
                    @include('components.error', ['field' => 'last_name'])

                    <input type="email" name="email" placeholder="ایمیل مدیر" value="{{ $user->email }}"
                           class="text width-100">
                    @include('components.error', ['field' => 'email'])

                    <input type="password" name="password" placeholder="پسورد مدیر" class="text width-100">
                    @include('components.error', ['field' => 'password'])

                    <input type="password" name="password_confirmation" placeholder="تکرار پسورد مدیر"
                           class="text width-100">

                    <input type="text" name="phone" placeholder="تلفن مدیر" value="{{ $user->phone }}"
                           class="text width-100">
                    @include('components.error', ['field' => 'phone'])

                    @role('super_admin')
                        @if(auth()->user()->id != $user->id)
                            <select name="role" class="width-100">
                                @foreach($allowedRoles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->label }}
                                    </option>
                                @endforeach
                            </select>
                            @include('components.error', ['field' => 'role'])
                        @endif
                    @endrole
                </div>

                <button type="submit" class="btn btn-netcopy_net width-100" style="padding: 12px 25px;">
                    بروزرسانی کردن
                </button>
            </form>
        </div>
    </div>
@endsection
