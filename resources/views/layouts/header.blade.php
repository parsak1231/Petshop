<div class="off-canvas-wrap ">
    <div class="close-off-canvas-wrap">
        <a href="#" id="of-close-off-canvas">
            <svg class="mt-3" width="12" height="12" viewBox="0 0 22 22" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M2 3L18.9706 19.9706" stroke="black" stroke-width="4" stroke-linecap="round"/>
                <path d="M19.0874 2.47266L2.11684 19.4432" stroke="black" stroke-width="4" stroke-linecap="round"/>
            </svg>
        </a>
    </div>

    <div class="off-canvas-inner">
        <div id="of-mobile-nav" class="mobile-menu-wrap">
            <div class="d-block text-center my-3">
                <a href="{{ route('site.home') }}" class="current py-2">
                    <img src="{{ asset('Img/logo.svg') }}" alt="logo"/>
                </a>
            </div>
            <ul class="mobile-menu">
                <li class="current-menu-item">
                    <a href="{{ route('site.home') }}">صفحه اصلی</a>
                </li>
                <li class="current-menu-item">
                    <a href="{{ route('site.products.index') }}">محصولات</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        دسته‌بندی‌ها
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <a class="dropdown-item"
                               href="{{ route('site.categories.show', $category->id) }}">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="current-menu-item">
                    <a href="{{ route('register.form') }}">ثبت نام</a>
                </li>
                <li class="current-menu-item">
                    <a href="{{ route('login.form') }}">ورود</a>
                </li>
                <li class="current-menu-item">
                    <a href="{{ route('site.about') }}">درباره ما</a>
                </li>
                <li class="current-menu-item">
                    <a href="{{ route('site.contact') }}">تماس با ما</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<header class="main_header wide_header">
    <div class="header_container">
        <div class="menu_wrapper menu_sticky header-btop">
            <div class="container p_relative h86">

                <div id="navigation" class="of-drop-down of-main-menu" role="navigation">
                    <ul class="menu">
                        <li>
                            <a href="{{ route('site.home') }}" class="current py-2">
                                <img src="{{ asset("Img/logo.svg") }}" alt="logo"/>
                            </a>
                        </li>
                        <li><a href="{{ route('site.home') }}">صفحه اصلی</a></li>
                        <li><a href="{{ route('site.products.index') }}">محصولات</a></li>
                        <li class="dropdown-desktop">
                            <a>دسته‌بندی‌ها</a>
                            <div class="dropdown-menu-desktop">
                                @foreach($categories as $category)
                                    <a href="{{ route('site.categories.show', $category->id) }}">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li><a href="{{ route('site.about') }}">درباره ما</a></li>
                        <li><a href="{{ route('site.contact') }}">تماس با ما</a></li>
                    </ul>
                </div>

                <div class="m_login d-flex">
                    <div class="shoping-cart radius30">
                        <a href="{{ route('site.cart.index') }}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 2H3.74001C4.82001 2 5.67 2.93 5.58 4L4.75 13.96C4.61 15.59 5.89999 16.99 7.53999 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82001"
                                    stroke="#222221" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M16.25 22C16.9404 22 17.5 21.4404 17.5 20.75C17.5 20.0596 16.9404 19.5 16.25 19.5C15.5596 19.5 15 20.0596 15 20.75C15 21.4404 15.5596 22 16.25 22Z"
                                    stroke="#222221" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M8.25 22C8.94036 22 9.5 21.4404 9.5 20.75C9.5 20.0596 8.94036 19.5 8.25 19.5C7.55964 19.5 7 20.0596 7 20.75C7 21.4404 7.55964 22 8.25 22Z"
                                    stroke="#222221" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 8H21" stroke="#222221" stroke-width="1.5" stroke-miterlimit="10"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <div class="login px-4 py-2 radius55 d-flex align-items-center hide-on-mobile">
                        @guest
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.4399 19.05L15.9599 20.57L18.9999 17.53" stroke="white"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.4501 10.79 7.5601 8.84 7.5601 6.44C7.5501 3.99 9.5401 2 11.9901 2C14.4401 2 16.4301 3.99 16.4301 6.44C16.4301 8.84 14.5301 10.79 12.1601 10.87Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M11.99 21.8099C10.17 21.8099 8.36004 21.3499 6.98004 20.4299C4.56004 18.8099 4.56004 16.1699 6.98004 14.5599C9.73004 12.7199 14.24 12.7199 16.99 14.5599"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                            <a class="mr-2" href="{{ route('register.form') }}">ثبت نام | ورود</a>
                        @else
                            <form action="{{ route('logout') }}" method="POST"
                                  style="display: flex; align-items: center; padding: 0; margin: 0; border: none; background: none;">
                                @csrf
                                <button type="submit" class="mr-2 d-flex align-items-center"
                                        style="background: none; border: none; color: white; cursor: pointer; padding: 0; font: inherit;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" style="margin-left: 6px;">
                                        <path d="M16 17L21 12L16 7" stroke="white" stroke-width="1.5"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 12H9" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M12 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H12"
                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                    خروج
                                </button>
                            </form>
                        @endguest
                    </div>
                </div>

                <div class="is-show mobile-nav-button">
                    <a id="of-trigger" class="icon-wrap" href="#">
                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5401 8.81063C19.1748 8.81063 20.5001 7.48539 20.5001 5.85062C20.5001 4.21586 19.1748 2.89062 17.5401 2.89062C15.9053 2.89062 14.5801 4.21586 14.5801 5.85062C14.5801 7.48539 15.9053 8.81063 17.5401 8.81063Z"
                                fill="#292D32"/>
                            <path
                                d="M6.46 8.81063C8.09476 8.81063 9.42 7.48539 9.42 5.85062C9.42 4.21586 8.09476 2.89062 6.46 2.89062C4.82524 2.89062 3.5 4.21586 3.5 5.85062C3.5 7.48539 4.82524 8.81063 6.46 8.81063Z"
                                fill="#292D32"/>
                            <path
                                d="M17.5401 21.1095C19.1748 21.1095 20.5001 19.7842 20.5001 18.1495C20.5001 16.5147 19.1748 15.1895 17.5401 15.1895C15.9053 15.1895 14.5801 16.5147 14.5801 18.1495C14.5801 19.7842 15.9053 21.1095 17.5401 21.1095Z"
                                fill="#292D32"/>
                            <path
                                d="M6.46 21.1095C8.09476 21.1095 9.42 19.7842 9.42 18.1495C9.42 16.5147 8.09476 15.1895 6.46 15.1895C4.82524 15.1895 3.5 16.5147 3.5 18.1495C3.5 19.7842 4.82524 21.1095 6.46 21.1095Z"
                                fill="#292D32"/>
                        </svg>
                    </a>
                </div>
                <div class="logo-mobile d-none">
                    <a href="{{ route('site.home') }}" class="current py-2">
                        <img src="{{ asset('Img/logo.svg') }}" alt="logo"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
