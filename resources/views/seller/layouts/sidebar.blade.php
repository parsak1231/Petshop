<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="navbar-content">
            <ul class="pc-navbar">

                <li class="pc-item">
                    <a href="{{ route('seller.dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph ph-gauge"></i>
                        </span>
                        <span class="pc-mtext">داشبورد</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('login.form') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-lock"></i></span>
                        <span class="pc-mtext">ورود</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('register.form') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-user-circle-plus"></i></span>
                        <span class="pc-mtext">ثبت نام</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('seller.products.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <img src="{{ asset('assets/images/product.svg') }}" alt="product" width="22" height="22"/>
                        </span>
                        <span class="pc-mtext">محصولات</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
