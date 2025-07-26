@extends('admin.layouts.app')

@section('title', 'بروزرسانی نقش')

@php
    /** @var Spatie\Permission\Models\Role $role */
    $breadcrumbs = [
        ['url' => route('admin.roles.index'), 'label' => 'نقش ها'],
        ['url' => route('admin.roles.edit', $role->id) , 'label' => "بروزرسانی نقش $role->id"],
    ];
@endphp

@section('breadcrumb')
    @include('admin.layouts.breadcrumb', ['items' => $breadcrumbs])
@endsection

@section('content')
    <div class="main-content">
        <div class="col-12 bg-white padding-30 border-radius-3" style="margin-bottom: 30px;">
            <p class="box__title margin-bottom-20">بروزرسانی نقش</p>
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="width-100">
                @csrf
                @method('PUT')
                <div class="margin-bottom-20">
                    <input type="text" name="label" placeholder="نام نقش" class="text width-100"
                           value="{{ $role->label }}">
                    @include('components.error', ['field' => 'label'])

                    @role('super_admin')
                        @if(!in_array($role->name, ['super_admin', 'admin', 'seller','customer']))
                            <input type="text" name="name" placeholder="نام انگلیسی(سیستمی) نقش" class="text width-100"
                                   value="{{ $role->name }}">
                            @include('components.error', ['field' => 'name'])
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
