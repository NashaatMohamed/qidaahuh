<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
    <?php $links = auth()->user()->links;
    $topMenus = $links->where('parent_id',0)->where('show_in_menu',1);
    // dd($topMenus);
    ?>
    @foreach($topMenus as $topMenu)
        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">{{$topMenu->title}}</span><i
                    class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <?php $subMenus = $links->where('parent_id',$topMenu->id)->where('show_in_menu',1); ?>
                    @foreach($subMenus as $subMenu)
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{route($subMenu->route)}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{$subMenu->title}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </li>
    @endforeach
</ul>
