<div class="sidebar__nav border-top border-left">
    <div style="margin-bottom: -40px;height: 51px"></div>
    <ul>
        <li class="item-li i-home">
            <a href="{{ route('site.home') }}">صفحه اصلی سایت</a>
        </li>
        <li class="item-li i-dashboard {{ request()->routeIs('admin.dashboard') ? 'is-active': '' }}">
            <a href="{{ route('admin.dashboard') }}">پیشخوان</a>
        </li>
        <li class="item-li i-courses {{ request()->routeIs('admin.roles.index') ? 'is-active': '' }}">
            <a href="{{ route('admin.roles.index') }}">نقش ها</a>
        </li>
        <li class="item-li i-users {{ request()->routeIs('admin.users.index') ? 'is-active': '' }}">
            <a href="{{ route('admin.users.index') }}">کاربران</a>
        </li>
        <li class="item-li i-categories {{ request()->routeIs('admin.categories.index') ? 'is-active': '' }}">
            <a href="{{ route('admin.categories.index') }}">دسته بندی ها</a>
        </li>
        <li class="item-li i-slideshow {{ request()->routeIs('admin.products.index') ? 'is-active': '' }}">
            <a href="{{ route('admin.products.index') }}">محصولات</a>
        </li>
        <li class="item-li i-comments {{ request()->routeIs('admin.comments.index') ? 'is-active': '' }}">
            <a href="{{ route('admin.comments.index') }}">نظرات</a>
        </li>
    </ul>
</div>
