<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
        class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
        m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                <a
                    href="{{route('HomeStatstic.info')}}" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon fas fa-home "></i>
                        <span class="m-menu__link-text"> الصفحة الرئيسية
                        </a>


            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon fas fa-file-medical-alt "></i><span class="m-menu__link-text">
                        المستخدمين</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">


                        <li class="m-menu__item " aria-haspopup="true"><a href='{{ route('user.index') }}'
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">ادارةالمستخدمين</span></a></li>





                    </ul>
                </div>
            </li>


            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon fas fa-file-medical-alt "></i><span class="m-menu__link-text">
                        التصنيفات</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">


                        <li class="m-menu__item " aria-haspopup="true"><a href='{{ route('category.index') }}'
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">ادارةالتصنيفات</span></a></li>





                    </ul>
                </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                href="javascript:;" class="m-menu__link m-menu__toggle"><i
                    class="m-menu__link-icon fas fa-file-medical-alt "></i><span class="m-menu__link-text">
                    التصنيفات الفرعيه</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">


                    <li class="m-menu__item " aria-haspopup="true"><a href='{{ route('sub_category.index') }}'
                            class="m-menu__link "><i
                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                class="m-menu__link-text">ادارةالتصنيفات الفرعيه</span></a></li>





                </ul>
            </div>
        </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon fas fa-file-medical-alt "></i><span class="m-menu__link-text">
                        المنتجات</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">


                        <li class="m-menu__item " aria-haspopup="true"><a href='{{ route('products.indexx') }}'
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">ادارةالمنتجات</span></a></li>

                    </ul>
                </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon fas fa-file-medical-alt "></i><span class="m-menu__link-text">
                        الاعلانات</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">


                        <li class="m-menu__item " aria-haspopup="true"><a href='{{ route('Anoncement.index') }}'
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">ادارة الاعلانات</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                href="javascript:;" class="m-menu__link m-menu__toggle"><i
                    class="m-menu__link-icon fas fa-file-medical-alt "></i><span class="m-menu__link-text">
                   الطلبات</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">


                    <li class="m-menu__item " aria-haspopup="true"><a href='{{route('order.index')}}'
                                                                      class="m-menu__link "><i
                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                class="m-menu__link-text">ادارةالطلبات</span></a></li>





                </ul>
            </div>
        </li>


        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
            href="javascript:;" class="m-menu__link m-menu__toggle"><i
                class="m-menu__link-icon fas fa-file-medical-alt "></i><span class="m-menu__link-text">
                القوائم</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
        <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">


                <li class="m-menu__item " aria-haspopup="true"><a href='{{ route('HomeMony.HomeMony') }}'
                        class="m-menu__link "><i
                            class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                            class="m-menu__link-text">ادارة</span>
                    </a>
                </li>

            </ul>
        </div>
    </li>
        </ul>
    </div>
</div>
