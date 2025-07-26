<section class="container-fluid bkg p-0">
    <div class="row">
        <div class="col-lg-12 p-0 mb-3">
            <div class="bg-package d-flex align-items-center justify-content-center">
                <div class="breadcrumb radius15">
                    <ul>
                        <li>
                            <a href="{{ route('site.home') }}">خانه</a>
                        </li>
                        @isset($items)
                            @foreach($items as $item)
                                <span>/&nbsp;</span>
                                <li>
                                    <a href="{{ $item['url'] }}" class="current">
                                        {{ $item['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
