@extends('layouts.app')

@section('title', 'صفحه محصولات')

<body class="rtl">
        <div class="clearfix"></div>

        <section class="container-fluid bkg p-0">
            <div class="row">
                <div class="col-lg-12 p-0 mb-3">
                    <div class="bg-package d-flex align-items-center justify-content-center">
                        <div class="breadcrumb radius15">
                            <ul class="">
                                <li><a href="#">خانه / </a></li>
                                <li><a href="#" class="current">فروشگاه</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mb-4">
            <div class="row">
                <div class="col-xl-3 order-xl-0 pt-3 order-1 mb-3">
                    <div class="d-flex align-items-center justify-content-center mb-3 bg-title-sidebar p-2 radius15">
                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.2658 0.97876C28.7008 0.97876 30.6746 4.67863 30.6746 7.81348C30.6746 10.9483 28.7008 13.489 26.2658 13.489C23.8307 13.489 21.8569 10.9479 21.8569 7.81348C21.8569 4.6791 23.8307 0.97876 26.2658 0.97876Z" fill="#FFAA00"/>
                            <path d="M13.7387 0.97876C16.1737 0.97876 18.1475 4.67863 18.1475 7.81348C18.1475 10.9483 16.1737 13.489 13.7387 13.489C11.3036 13.489 9.32983 10.9479 9.32983 7.81348C9.32983 4.6791 11.3036 0.97876 13.7387 0.97876Z" fill="#FFAA00"/>
                            <path d="M0.534818 17.5109C-0.500563 14.9255 -0.0464077 11.2055 2.01777 10.3819C4.08194 9.55835 6.97583 11.9425 8.01027 14.5283C9.04471 17.1142 8.20934 19.8781 6.1447 20.7017C4.08005 21.5252 1.56879 20.0967 0.534818 17.5109Z" fill="#FFAA00"/>
                            <path d="M39.4698 17.5109C38.4344 20.0963 35.9241 21.5253 33.8599 20.7017C31.7957 19.8782 30.9604 17.1142 31.9943 14.5284C33.0283 11.9426 35.9227 9.55745 37.9868 10.3819C40.051 11.2064 40.5037 14.9251 39.4698 17.5109Z" fill="#FFAA00"/>
                            <path d="M35.776 31.7942C35.3054 29.679 34.1759 27.7667 32.9292 25.9965C30.0075 21.85 25.329 17.6627 20.0025 17.6627C14.698 17.6627 9.99787 21.8491 7.07574 25.9965C5.82905 27.7667 4.7019 29.6766 4.22892 31.7942C3.75593 33.9119 4.01478 36.2805 5.3283 37.9991C6.64182 39.7176 9.13097 40.5816 11.0756 39.649C12.2324 39.0953 13.169 37.9789 14.4448 37.8712C15.6167 37.773 16.6521 38.5608 17.6291 39.2198C18.335 39.696 19.1869 40.1294 20.0025 40.135C20.8181 40.1294 21.6694 39.696 22.3758 39.2198C23.3529 38.5617 24.3882 37.773 25.5601 37.8712C26.836 37.9789 27.7721 39.0934 28.9293 39.649C30.874 40.5816 33.3631 39.7214 34.6766 38.001C35.9902 36.2805 36.249 33.9123 35.776 31.7942ZM24.6424 29.2432C24.0414 30.3403 23.0931 31.3063 22.2921 32.0579C21.8629 32.4609 21.4108 32.8388 20.9381 33.1899H20.9353C20.6648 33.3882 20.338 33.4951 20.0025 33.4951C19.6669 33.4951 19.3402 33.3882 19.0697 33.1899H19.0669C18.5941 32.8388 18.142 32.4609 17.7129 32.0579C16.9128 31.3058 15.9635 30.3403 15.3626 29.2432C14.866 28.3374 14.6067 27.3423 14.8637 26.3053C15.1103 25.3116 15.8953 24.4387 16.8582 24.3169C17.9717 24.1759 19.2683 24.9586 20.0025 25.8573C20.7366 24.9586 22.0332 24.1764 23.1467 24.3174C24.1096 24.4392 24.8946 25.3121 25.1413 26.3058C25.3982 27.3423 25.1389 28.3374 24.6424 29.2432Z" fill="#FFAA00"/>
                            </svg>

                            <h3 class="mr-3">دسته بندی</h3>


                    </div>

                    <div class="card side-category p-4 mb-3">
                            <ul class="list-unstyled">

                            <li><a href="#"><span>روانشناسی</span></a>
                                <a href="#">
                                    <div class="arrow-cat d-flex align-items-center justify-content-center">
                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.8019 6.17453H2.56566C2.00285 6.17453 1.53613 5.70782 1.53613 5.14501C1.53613 4.5822 2.00285 4.11548 2.56566 4.11548H10.8019C11.3647 4.11548 11.8314 4.5822 11.8314 5.14501C11.8314 5.70782 11.3647 6.17453 10.8019 6.17453Z" fill="#292D32"/>
                                        <path d="M5.31096 10.2918C5.05014 10.2918 4.78933 10.1958 4.58342 9.98985L0.465311 5.87174C0.067227 5.47366 0.067227 4.81476 0.465311 4.41667L4.58342 0.298563C4.98151 -0.099521 5.64041 -0.099521 6.03849 0.298563C6.43657 0.696647 6.43657 1.35554 6.03849 1.75363L2.64791 5.14421L6.03849 8.53479C6.43657 8.93287 6.43657 9.59177 6.03849 9.98985C5.83258 10.1958 5.57177 10.2918 5.31096 10.2918Z" fill="#292D32"/>
                                    </svg>
                                    </div>
                                </a>
                            </li>
                            <li><a href="#"><span>روانشناسی</span></a>
                                <a href="#">
                                    <div class="arrow-cat d-flex align-items-center justify-content-center">
                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.8019 6.17453H2.56566C2.00285 6.17453 1.53613 5.70782 1.53613 5.14501C1.53613 4.5822 2.00285 4.11548 2.56566 4.11548H10.8019C11.3647 4.11548 11.8314 4.5822 11.8314 5.14501C11.8314 5.70782 11.3647 6.17453 10.8019 6.17453Z" fill="#292D32"/>
                                        <path d="M5.31096 10.2918C5.05014 10.2918 4.78933 10.1958 4.58342 9.98985L0.465311 5.87174C0.067227 5.47366 0.067227 4.81476 0.465311 4.41667L4.58342 0.298563C4.98151 -0.099521 5.64041 -0.099521 6.03849 0.298563C6.43657 0.696647 6.43657 1.35554 6.03849 1.75363L2.64791 5.14421L6.03849 8.53479C6.43657 8.93287 6.43657 9.59177 6.03849 9.98985C5.83258 10.1958 5.57177 10.2918 5.31096 10.2918Z" fill="#292D32"/>
                                    </svg>
                                    </div>
                                </a>
                            </li>
                            <li><a href="#"><span>روانشناسی</span></a>
                                <a href="#">
                                    <div class="arrow-cat d-flex align-items-center justify-content-center">
                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.8019 6.17453H2.56566C2.00285 6.17453 1.53613 5.70782 1.53613 5.14501C1.53613 4.5822 2.00285 4.11548 2.56566 4.11548H10.8019C11.3647 4.11548 11.8314 4.5822 11.8314 5.14501C11.8314 5.70782 11.3647 6.17453 10.8019 6.17453Z" fill="#292D32"/>
                                        <path d="M5.31096 10.2918C5.05014 10.2918 4.78933 10.1958 4.58342 9.98985L0.465311 5.87174C0.067227 5.47366 0.067227 4.81476 0.465311 4.41667L4.58342 0.298563C4.98151 -0.099521 5.64041 -0.099521 6.03849 0.298563C6.43657 0.696647 6.43657 1.35554 6.03849 1.75363L2.64791 5.14421L6.03849 8.53479C6.43657 8.93287 6.43657 9.59177 6.03849 9.98985C5.83258 10.1958 5.57177 10.2918 5.31096 10.2918Z" fill="#292D32"/>
                                    </svg>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>


                    <div class="my-3 text-center">

                        <img src="Img/banner-pet.png" alt="" class="radius30">

                    </div>

                </div>

                <div class="col-xl-9 pt-3 order-xl-1 pl-4 order-0 mb-3">

                    <div class="row">

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card-body mb-3 text-center">
                                <a href="page-shop.html">
                                    <img class="img-fluid" src="Img/product-1.jpg">
                                </a>
                                <div>
                                    <h5 class="my-2 YekanBakhFaNum-SemiBold"><a class="card-pro" href="page-shop.html">غذای مخصوص سگ</a></h5>
                                    <span class="color-orange YekanBakhFaNum-Bold fa18">540.000</span>
                                    <span class="color-orange YekanBakhFaNum-Regular fa14">تومان</span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="add-to-cart hoverable outlined">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 21.25C15.9665 21.25 16.75 20.4665 16.75 19.5C16.75 18.5335 15.9665 17.75 15 17.75C14.0335 17.75 13.25 18.5335 13.25 19.5C13.25 20.4665 14.0335 21.25 15 21.25Z" fill="#FFAA00"/>
                                                    <path d="M7 21.25C7.9665 21.25 8.75 20.4665 8.75 19.5C8.75 18.5335 7.9665 17.75 7 17.75C6.0335 17.75 5.25 18.5335 5.25 19.5C5.25 20.4665 6.0335 21.25 7 21.25Z" fill="#FFAA00"/>
                                                    <path d="M3.59 2.69L3.39 5.14C3.35 5.61 3.72 6 4.19 6H19.5C19.92 6 20.27 5.68 20.3 5.26C20.43 3.49 19.08 2.05 17.31 2.05H5.02C4.92 1.61 4.72 1.19 4.41 0.84C3.91 0.31 3.21 0 2.49 0H0.75C0.34 0 0 0.34 0 0.75C0 1.16 0.34 1.5 0.75 1.5H2.49C2.8 1.5 3.09 1.63 3.3 1.85C3.51 2.08 3.61 2.38 3.59 2.69Z" fill="#FFAA00"/>
                                                    <path d="M19.2601 7.5H3.92005C3.50005 7.5 3.16005 7.82 3.12005 8.23L2.76005 12.58C2.62005 14.29 3.96005 15.75 5.67005 15.75H16.7901C18.2901 15.75 19.6101 14.52 19.7201 13.02L20.0501 8.35C20.0901 7.89 19.7301 7.5 19.2601 7.5Z" fill="#FFAA00"/>
                                                    </svg>

                                                <span class="text-center">افزودن به سبد خرید</span>
                                            </div>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card-body mb-3 text-center">
                                <a href="page-shop.html">
                                    <img class="img-fluid" src="Img/product-2.jpg">
                                </a>
                                <div>
                                    <h5 class="my-2 YekanBakhFaNum-SemiBold"><a class="card-pro" href="page-shop.html">غذای مخصوص سگ</a></h5>
                                    <span class="color-orange YekanBakhFaNum-Bold fa18">540.000</span>
                                    <span class="color-orange YekanBakhFaNum-Regular fa14">تومان</span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="add-to-cart hoverable outlined">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 21.25C15.9665 21.25 16.75 20.4665 16.75 19.5C16.75 18.5335 15.9665 17.75 15 17.75C14.0335 17.75 13.25 18.5335 13.25 19.5C13.25 20.4665 14.0335 21.25 15 21.25Z" fill="#FFAA00"/>
                                                    <path d="M7 21.25C7.9665 21.25 8.75 20.4665 8.75 19.5C8.75 18.5335 7.9665 17.75 7 17.75C6.0335 17.75 5.25 18.5335 5.25 19.5C5.25 20.4665 6.0335 21.25 7 21.25Z" fill="#FFAA00"/>
                                                    <path d="M3.59 2.69L3.39 5.14C3.35 5.61 3.72 6 4.19 6H19.5C19.92 6 20.27 5.68 20.3 5.26C20.43 3.49 19.08 2.05 17.31 2.05H5.02C4.92 1.61 4.72 1.19 4.41 0.84C3.91 0.31 3.21 0 2.49 0H0.75C0.34 0 0 0.34 0 0.75C0 1.16 0.34 1.5 0.75 1.5H2.49C2.8 1.5 3.09 1.63 3.3 1.85C3.51 2.08 3.61 2.38 3.59 2.69Z" fill="#FFAA00"/>
                                                    <path d="M19.2601 7.5H3.92005C3.50005 7.5 3.16005 7.82 3.12005 8.23L2.76005 12.58C2.62005 14.29 3.96005 15.75 5.67005 15.75H16.7901C18.2901 15.75 19.6101 14.52 19.7201 13.02L20.0501 8.35C20.0901 7.89 19.7301 7.5 19.2601 7.5Z" fill="#FFAA00"/>
                                                    </svg>

                                                <span class="text-center">افزودن به سبد خرید</span>
                                            </div>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card-body mb-3 text-center">
                                <a href="page-shop.html">
                                    <img class="img-fluid" src="Img/product-3.jpg">
                                </a>
                                <div>
                                    <h5 class="my-2 YekanBakhFaNum-SemiBold"><a class="card-pro" href="page-shop.html">غذای مخصوص سگ</a></h5>
                                    <span class="color-orange YekanBakhFaNum-Bold fa18">540.000</span>
                                    <span class="color-orange YekanBakhFaNum-Regular fa14">تومان</span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="add-to-cart hoverable outlined">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 21.25C15.9665 21.25 16.75 20.4665 16.75 19.5C16.75 18.5335 15.9665 17.75 15 17.75C14.0335 17.75 13.25 18.5335 13.25 19.5C13.25 20.4665 14.0335 21.25 15 21.25Z" fill="#FFAA00"/>
                                                    <path d="M7 21.25C7.9665 21.25 8.75 20.4665 8.75 19.5C8.75 18.5335 7.9665 17.75 7 17.75C6.0335 17.75 5.25 18.5335 5.25 19.5C5.25 20.4665 6.0335 21.25 7 21.25Z" fill="#FFAA00"/>
                                                    <path d="M3.59 2.69L3.39 5.14C3.35 5.61 3.72 6 4.19 6H19.5C19.92 6 20.27 5.68 20.3 5.26C20.43 3.49 19.08 2.05 17.31 2.05H5.02C4.92 1.61 4.72 1.19 4.41 0.84C3.91 0.31 3.21 0 2.49 0H0.75C0.34 0 0 0.34 0 0.75C0 1.16 0.34 1.5 0.75 1.5H2.49C2.8 1.5 3.09 1.63 3.3 1.85C3.51 2.08 3.61 2.38 3.59 2.69Z" fill="#FFAA00"/>
                                                    <path d="M19.2601 7.5H3.92005C3.50005 7.5 3.16005 7.82 3.12005 8.23L2.76005 12.58C2.62005 14.29 3.96005 15.75 5.67005 15.75H16.7901C18.2901 15.75 19.6101 14.52 19.7201 13.02L20.0501 8.35C20.0901 7.89 19.7301 7.5 19.2601 7.5Z" fill="#FFAA00"/>
                                                    </svg>

                                                <span class="text-center">افزودن به سبد خرید</span>
                                            </div>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card-body mb-3 text-center">
                                <a href="page-shop.html">
                                    <img class="img-fluid" src="Img/product-4.jpg">
                                </a>
                                <div>
                                    <h5 class="my-2 YekanBakhFaNum-SemiBold"><a class="card-pro" href="page-shop.html">غذای مخصوص سگ</a></h5>
                                    <span class="color-orange YekanBakhFaNum-Bold fa18">540.000</span>
                                    <span class="color-orange YekanBakhFaNum-Regular fa14">تومان</span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="add-to-cart hoverable outlined">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 21.25C15.9665 21.25 16.75 20.4665 16.75 19.5C16.75 18.5335 15.9665 17.75 15 17.75C14.0335 17.75 13.25 18.5335 13.25 19.5C13.25 20.4665 14.0335 21.25 15 21.25Z" fill="#FFAA00"/>
                                                    <path d="M7 21.25C7.9665 21.25 8.75 20.4665 8.75 19.5C8.75 18.5335 7.9665 17.75 7 17.75C6.0335 17.75 5.25 18.5335 5.25 19.5C5.25 20.4665 6.0335 21.25 7 21.25Z" fill="#FFAA00"/>
                                                    <path d="M3.59 2.69L3.39 5.14C3.35 5.61 3.72 6 4.19 6H19.5C19.92 6 20.27 5.68 20.3 5.26C20.43 3.49 19.08 2.05 17.31 2.05H5.02C4.92 1.61 4.72 1.19 4.41 0.84C3.91 0.31 3.21 0 2.49 0H0.75C0.34 0 0 0.34 0 0.75C0 1.16 0.34 1.5 0.75 1.5H2.49C2.8 1.5 3.09 1.63 3.3 1.85C3.51 2.08 3.61 2.38 3.59 2.69Z" fill="#FFAA00"/>
                                                    <path d="M19.2601 7.5H3.92005C3.50005 7.5 3.16005 7.82 3.12005 8.23L2.76005 12.58C2.62005 14.29 3.96005 15.75 5.67005 15.75H16.7901C18.2901 15.75 19.6101 14.52 19.7201 13.02L20.0501 8.35C20.0901 7.89 19.7301 7.5 19.2601 7.5Z" fill="#FFAA00"/>
                                                    </svg>

                                                <span class="text-center">افزودن به سبد خرید</span>
                                            </div>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card-body mb-3 text-center">
                                <a href="page-shop.html">
                                    <img class="img-fluid" src="Img/product-5.jpg">
                                </a>
                                <div>
                                    <h5 class="my-2 YekanBakhFaNum-SemiBold"><a class="card-pro" href="page-shop.html">غذای مخصوص سگ</a></h5>
                                    <span class="color-orange YekanBakhFaNum-Bold fa18">540.000</span>
                                    <span class="color-orange YekanBakhFaNum-Regular fa14">تومان</span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="add-to-cart hoverable outlined">
                                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 21.25C15.9665 21.25 16.75 20.4665 16.75 19.5C16.75 18.5335 15.9665 17.75 15 17.75C14.0335 17.75 13.25 18.5335 13.25 19.5C13.25 20.4665 14.0335 21.25 15 21.25Z" fill="#FFAA00"/>
                                                    <path d="M7 21.25C7.9665 21.25 8.75 20.4665 8.75 19.5C8.75 18.5335 7.9665 17.75 7 17.75C6.0335 17.75 5.25 18.5335 5.25 19.5C5.25 20.4665 6.0335 21.25 7 21.25Z" fill="#FFAA00"/>
                                                    <path d="M3.59 2.69L3.39 5.14C3.35 5.61 3.72 6 4.19 6H19.5C19.92 6 20.27 5.68 20.3 5.26C20.43 3.49 19.08 2.05 17.31 2.05H5.02C4.92 1.61 4.72 1.19 4.41 0.84C3.91 0.31 3.21 0 2.49 0H0.75C0.34 0 0 0.34 0 0.75C0 1.16 0.34 1.5 0.75 1.5H2.49C2.8 1.5 3.09 1.63 3.3 1.85C3.51 2.08 3.61 2.38 3.59 2.69Z" fill="#FFAA00"/>
                                                    <path d="M19.2601 7.5H3.92005C3.50005 7.5 3.16005 7.82 3.12005 8.23L2.76005 12.58C2.62005 14.29 3.96005 15.75 5.67005 15.75H16.7901C18.2901 15.75 19.6101 14.52 19.7201 13.02L20.0501 8.35C20.0901 7.89 19.7301 7.5 19.2601 7.5Z" fill="#FFAA00"/>
                                                    </svg>

                                                <span class="text-center">افزودن به سبد خرید</span>
                                            </div>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center mx-auto">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item active"><a class="page-link" href="#">3</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        </div>

        <script src="Js/jquery.min.js"></script>
        <script src="Js/bootstrap.min.js"></script>
        <script src="Js/my-script.js"></script>
        <script src="Js/custom.js"></script>

</body>

<!-- Mirrored from mahdghanon.ir/pet-home/pet-home/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Nov 2024 07:31:23 GMT -->
</html>
