<div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
    <div class="sidebar__overlay d-none"></div>
    <div class="header__right d-flex flex-grow-1 item-center">
        <span class="bars"></span>
    </div>
    <div class="header__left d-flex flex-end item-center margin-top-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout cursor-pointer" style="background: none" title="خروج"></button>
        </form>
    </div>
</div>
