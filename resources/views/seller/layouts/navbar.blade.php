<header class="pc-header">
    <div class="m-header" style="margin-left: -20px">
        <a href="{{ route('site.home') }}" class="b-brand text-primary">
            <img src="{{ asset('assets/images/logo-white.svg') }}" alt="logo image"/>
        </a>
    </div>
    <div class="header-wrapper">
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ph ph-list"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ph ph-list"></i>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="list-unstyled">
            <li class="dropdown pc-h-item header-user-profile">
                <a
                    class="pc-head-link dropdown-toggle arrow-none me-0"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    data-bs-auto-close="outside"
                    aria-expanded="false"
                >
                </a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0 -15px 0 0; padding: 0;">
                    @csrf
                    <button class="btn btn-link d-flex align-items-center" style="color: white; font-size: 18px; text-decoration: none;">
                            خروج
                    </button>
                </form>
            </li>
        </ul>
    </div>
</header>
