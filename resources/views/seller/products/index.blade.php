@extends('seller.layouts.app')

@section('title', 'صفحه محصولات')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .action-icons i {
            cursor: pointer;
            margin: 0 4px;
            font-size: 18px;
        }

        @media (max-width: 480px) {
            .top-space {
                margin-top: 1.25em;
            }
        }
    </style>
@endpush

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <form method="GET" class="d-flex justify-content-between align-items-center w-100 px-4 py-3 rounded-top"
                  style="background-color: #73b4ff; color: white;">

                <h4 class="mb-0 fw-bold text-white">
                    مدیریت <span style="font-weight: 900;">محصولات</span>
                </h4>

                <div class="input-group input-group-sm w-auto" style="min-width: 200px;">
                    <a href="{{ route('seller.products.index') }}"
                       class="btn btn-secondary btn-sm">
                        نمایش همه
                    </a>
                    <input type="text"
                           name="search"
                           class="form-control form-control-sm"
                           placeholder="...جستجو"
                           value="{{ request('search') }}">

                    <button type="submit" class="input-group-text bg-white border-start-0">
                        <i class="bi bi-search"></i>
                    </button>

                    {{-- Save other parameters --}}
                    @if(request()->has('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif
                    @if(request()->has('dir'))
                        <input type="hidden" name="dir" value="{{ request('dir') }}">
                    @endif
                    @if(request()->has('entries'))
                        <input type="hidden" name="entries" value="{{ request('entries') }}">
                    @endif
                    @if(request()->has('page'))
                        <input type="hidden" name="page" value="{{ request('page') }}">
                    @endif
                </div>
            </form>

            <div style="background-color: white" class="rounded-bottom">
                <div class="d-flex justify-content-between align-items-center
                    px-4 pt-3 pb-2 mb-2 flex-wrap gap-2">

                    <form method="GET" id="entriesForm" class="d-flex align-items-center gap-2">
                        <label for="entries">مورد</label>
                        <select name="entries" id="entries" class="form-select form-select-sm w-auto"
                                onchange="document.getElementById('entriesForm').submit()">
                            @foreach([5, 10, 25, 50, 75] as $count)
                                <option value="{{ $count }}" {{ $entries == $count ? 'selected' : '' }}>
                                    {{ $count }}
                                </option>
                            @endforeach
                        </select>
                        <span>نمایش</span>

                        {{-- Save other parameters --}}
                        @if(request()->has('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif

                        @if(request()->has('dir'))
                            <input type="hidden" name="dir" value="{{ request('dir') }}">
                        @endif

                        @if(request()->has('page'))
                            <input type="hidden" name="page" value="{{ request('page') }}">
                        @endif

                        @if(request()->has('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                    </form>

                    <div class="d-flex gap-2 top-space">
                        <a href="{{ route('seller.products.create') }}">
                            <button class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle"></i>
                                افزودن محصول
                            </button>
                        </a>
                        @php
                            $fields = [
                                'id' => '(#)شناسه',
                                'title' => 'عنوان',
                                'price' => 'قیمت',
                                'quantity' => 'تعداد',
                                'status' => 'وضعیت'
                            ];
                            $currentSort = request('sort', 'id');
                            $currentDir = request('dir', 'asc');
                        @endphp

                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                مرتب‌سازی بر اساس
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($fields as $field => $label)
                                    @php
                                        $isCurrent = $currentSort === $field;
                                        $newDir = ($isCurrent && $currentDir === 'asc') ? 'desc' : 'asc';
                                        $arrow = $isCurrent ? ($currentDir === 'asc' ? '↑' : '↓') : '';
                                    @endphp
                                    <li>
                                        <a class="dropdown-item {{ $isCurrent ? 'active fw-bold' : '' }}"
                                           href="{{ request()->fullUrlWithQuery(['sort' => $field, 'dir' => $newDir]) }}">
                                            {{ $label }} {!! $arrow !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>تصویر</th>
                                <th>توضیحات</th>
                                <th>قیمت</th>
                                <th>تعداد</th>
                                <th>تاریخ ثبت</th>
                                <th>دسته‌بندی</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>
                                        <img src="{{ asset($product->image) }}" alt="تصویر محصول" width="78"
                                             height="54"/>
                                    </td>
                                    <td title="{{ $product->description }}">
                                        {{ \Illuminate\Support\Str::limit($product->description, 20) }}
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        {{ \Morilog\Jalali\Jalalian::fromDateTime($product->created_at)->format('%Y/%m/%d') }}
                                    </td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>
                                        <form action="{{ route('seller.products.changeStatus', $product->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                    class="btn btn-sm {{ $product->status ? 'btn-success' : 'btn-danger' }}"
                                                    title="{{ $product->status ? 'غیر فعال کن' : 'فعال کن' }}">
                                                {{ $product->status ? 'فعال' : 'غیرفعال' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="action-icons">
                                        <a href="{{ route('seller.products.edit', $product->id) }}">
                                            <i class="text-warning bi bi-pencil-fill" title="ویرایش"></i>
                                        </a>
                                        <form action="{{ route('seller.products.destroy', $product->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('آیا از حذف این محصول مطمئن هستید؟')"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-link p-0 m-0 align-baseline text-danger"
                                                    title="حذف">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 1.73em">
                        <div class="d-flex justify-content-between align-items-center">
                            @if($products->total() != 0)
                                <div>
                                    نمایش {{ min($products->total(), $products->count() + ($products->currentPage() - 1) * $products->perPage()) }}
                                    مورد از {{ $products->total() }} مورد
                                </div>
                            @else
                                <div>هیچ محصولی یافت نشد</div>
                            @endif

                            <ul class="pagination pagination-sm mb-0 flex-wrap">
                                <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}">قبلی</a>
                                </li>

                                <li class="page-item {{ $products->currentPage() == 1 ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url(1) }}">1</a>
                                </li>

                                @if ($products->currentPage() > 4)
                                    <li class="page-item d-none d-sm-inline"><span class="page-link">…</span></li>
                                @endif

                                @for ($i = max(2, $products->currentPage() - 1); $i <= min($products->lastPage() - 1, $products->currentPage() + 2); $i++)
                                    <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($products->currentPage() < $products->lastPage() - 3)
                                    <li class="page-item d-none d-sm-inline"><span class="page-link">…</span></li>
                                @endif

                                @if ($products->lastPage() > 1)
                                    <li class="page-item {{ $products->currentPage() == $products->lastPage() ? 'active' : '' }}">
                                        <a class="page-link"
                                           href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                                    </li>
                                @endif

                                <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}">بعدی</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Making space for bottom of the table --}}
        <div style="margin-top: 5.75em"></div>
    </div>
@endsection
