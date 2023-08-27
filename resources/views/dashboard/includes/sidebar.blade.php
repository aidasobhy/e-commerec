<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="h1 text-center font-weight-bold"><a href=""><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">
                    {{__('Admin/sidebar.dashboard')}}
                    </span></a>

            </li>


          @can('categories')
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('Admin/sidebar.categories')}} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{\App\Models\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.categories')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.categories.create')}}" data-i18n="nav.dash.crypto">{{__('Admin/sidebar.add category')}} </a>
                    </li>
                </ul>
            </li>
         @endcan


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">  {{__('Admin/sidebar.brands')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.brands')}}"
                                          data-i18n="nav.dash.ecommerce">   {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.brands.create')}}" data-i18n="nav.dash.crypto">   {{__('Admin/brands.add brand')}}
                        </a>
                    </li>
                </ul>
            </li>



            @can('tags')
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">  {{__('Admin/sidebar.tags')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Tag::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.tags')}}"
                                          data-i18n="nav.dash.ecommerce">   {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.tags.create')}}" data-i18n="nav.dash.crypto">   {{__('Admin/sidebar.add tag')}}
                             </a>
                    </li>
                </ul>
            </li>
            @endcan



            @can('products')
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">  {{__('Admin/sidebar.products')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.products')}}"
                                          data-i18n="nav.dash.ecommerce">   {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.general.products.create')}}" data-i18n="nav.dash.crypto">   {{__('Admin/sidebar.add product')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('attributes')
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">  {{__('Admin/sidebar.attributes')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Attribute::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.attributes')}}"
                                          data-i18n="nav.dash.ecommerce">   {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.attributes.create')}}" data-i18n="nav.dash.crypto">   {{__('Admin/sidebar.add attribute')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('options')
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">  {{__('Admin/sidebar.options')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Option::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.options')}}"
                                          data-i18n="nav.dash.ecommerce">   {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.options.create')}}" data-i18n="nav.dash.crypto">   {{__('Admin/sidebar.add option')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('roles')
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">  {{__('Admin/sidebar.roles')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Role::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.roles.index')}}"
                                    data-i18n="nav.dash.ecommerce">   {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.roles.create')}}" data-i18n="nav.dash.crypto">   {{__('Admin/sidebar.add role')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endcan


            @can('users')
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">  {{__('Admin/sidebar.users')}} </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{\App\Models\Admin::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('admin.users.index')}}"
                                    data-i18n="nav.dash.ecommerce">   {{__('Admin/sidebar.show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.users.create')}}" data-i18n="nav.dash.crypto">   {{__('Admin/sidebar.add user')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('settings')
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                                        data-i18n="nav.templates.main">{{__('Admin/sidebar.settings')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#"
                           data-i18n="nav.templates.vert.main">{{__('Admin/sidebar.shipping method')}}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('edit.shipping.method','free')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{__('Admin/sidebar.free shipping')}}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shipping.method','inner')}}">
                                    {{__('Admin/sidebar.local shipping')}}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shipping.method','outer')}}"
                                   data-i18n="nav.templates.vert.compact_menu">{{__('Admin/sidebar.flat rate')}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endcan
                    <li><a class="menu-item" href=""
                           data-i18n="nav.templates.vert.main">{{__('Admin/sidebar.main slider')}}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('admin.sliders.create')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{__('Admin/sidebar.slider images')}}</a>
                            </li>
                        </ul>
                    </li>
        </ul>
    </div>

</div>

