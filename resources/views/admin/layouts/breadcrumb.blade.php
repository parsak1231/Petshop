<div class="breadcrumb">
    <ul>
        <li>
            <a href="{{ route('admin.dashboard') }}">
                پیشخوان
            </a>
        </li>
        @isset($items)
            @foreach($items as $item)
                <span>/&nbsp;</span>
                <li>
                    <a href="{{ $item['url'] }}" class="{{ $loop->last ? 'is-active' : '' }}">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        @endisset
    </ul>
</div>
