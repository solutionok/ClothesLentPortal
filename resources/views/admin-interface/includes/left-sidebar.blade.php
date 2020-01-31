<div class="page-sidebar">
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{!! URL('/') !!}" style="line-height:28px" target="_blank" id="config-website-name">{{ $configuration->name }}</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{!!asset(Auth::user()->profile_picture_custom_size)!!}" class='file-preview-image picture-display'>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{!!asset(Auth::user()->profile_picture_custom_size)!!}" class='file-preview-image picture-display'>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{ ucwords(Auth::user()->first_name.' '.Auth::user()->last_name) }}</div>
                    <div class="profile-data-title">Administrator</div>
                </div>
                <div class="profile-controls">
                    <a href="{!! URL('admin/configuration') !!}" class="profile-control-left"><span class="fa fa-info"></span></a>
                </div>
            </div>                                                                        
        </li>
        <li class="{!! Request::segment(2) == NULL ? 'active' : '' !!}">
            <a href="{{URL('admin') }}">
                <span class="glyphicon glyphicon-dashboard"></span>
                <span class="xn-text">Dashboard</span>
            </a>
        </li>
        <li class="{!!Request::segment(2) == 'content-management' ? 'active' : ''!!}">
            <a href="{!! URL('admin/content-management') !!}">
                <span class="fa fa-file"></span>
                <span class="xn-text">Content Management</span>
            </a>
        </li>
        <li class="{!!Request::segment(2) == 'users-management' ? 'active' : ''!!}">
            <a href="{!! URL('admin/users-management') !!}">
                <span class="fa fa-group"></span>
                <span class="xn-text">Users Management</span>
            </a>
        </li>
        <li class="{!!Request::segment(2) == 'product-management' ? 'active' : ''!!}">
            <a href="{!! URL('admin/product-management') !!}">
                <span class="fa fa-shopping-cart"></span>
                <span class="xn-text">Product Management</span>
            </a>
        </li>
        <li class="{!!Request::segment(2) == 'news-management' ? 'active' : ''!!}">
            <a href="{!! URL('admin/news-management') !!}">
                <span class="fa fa-book"></span>
                <span class="xn-text">News Management</span>
            </a>
        </li>
        <li class="{!!Request::segment(2) == 'category-management' ? 'active' : ''!!}">
            <a href="{!! URL('admin/category-management') !!}">
                <span class="fa fa-bars"></span>
                <span class="xn-text">Category Management</span>
            </a>
        </li>
        <li class="{!!Request::segment(2) == 'cleaning-management' ? 'active' : ''!!}">
            <a href="{!! URL('admin/cleaning-management') !!}">
                <span class="fa fa-bars"></span>
                <span class="xn-text">Cleaning Management</span>
            </a>
        </li>
        <li class="{!! Request::segment(2) == 'configuration' ? 'active' : '' !!}">
            <a href="{!! URL('admin/configuration') !!}">
                <span class="fa fa-wrench"></span>
                <span class="xn-text">Configuration</span>
            </a>
        </li>
        
        <li class="{!! Request::segment(2) == 'transaction-history' ? 'active' : '' !!}">
            <a href="{!! URL('admin/transaction-history') !!}">
                <span class="fa fa-wrench"></span>
                <span class="xn-text">Transaction History</span>
            </a>
        </li>
        
        <li class="{!! Request::segment(2) == 'faq-management' ? 'active' : '' !!}">
            <a href="{!! URL('admin/faq-management') !!}">
                <span class="fa fa-wrench"></span>
                <span class="xn-text">FAQS Management</span>
            </a>
        </li>

        <li class="{!! Request::segment(2) == 'statistics' ? 'active' : '' !!}">
            <a href="{!! URL('admin/statistics') !!}">
                <span class="fa fa-wrench"></span>
                <span class="xn-text">Statistics</span>
            </a>
        </li>
    </ul>
</div>