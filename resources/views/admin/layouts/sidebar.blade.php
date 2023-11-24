<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> GREYSCAPE</a></div>
<div class="sl-sideleft">
    <div class="sl-sideleft-menu">
        <a href="{{ route('dashboard') }}" class="sl-menu-link @yield('dashboard')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
        </a>

        <a href="#" class="sl-menu-link @yield('project')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Project</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
           <li class="nav-item"><a href="{{route('projects.index')}}" class="nav-link @yield('projects.list')">All Projects</a></li>
           <li class="nav-item"><a href="{{route('projects.create')}}" class="nav-link @yield('add-project')">Add New Project</a></li>
        </ul>
        <a href="{{route('categories.index')}}" class="sl-menu-link @yield('category')">
            <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-clone tx-22"></i>
                    <!-- <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i> -->
                    <span class="menu-item-label">Category</span>
            </div>
        </a>
        <a href="{{route('sliders.index')}}" class="sl-menu-link @yield('slider')">
            <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-arrows tx-20"></i>
                    <span class="menu-item-label">Slider</span>
            </div>
        </a>
        <!-- <a href="{{route('videos.index')}}" class="sl-menu-link @yield('video')">
            <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-suitcase tx-20"></i>
                    <span class="menu-item-label">Video</span>
            </div>
        </a> -->
        <a href="{{route('about.index')}}" class="sl-menu-link @yield('about')">
            <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-globe tx-20"></i>
                    <span class="menu-item-label">About </span>
            </div>
        </a>
        <a href="{{route('contact.index')}}" class="sl-menu-link @yield('contact')">
            <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-phone tx-20"></i>
                    <span class="menu-item-label">Contact </span>
            </div>
        </a>
        <!-- <a href="{{route('project.card')}}" class="sl-menu-link @yield('product-card')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Others</span>
                
            </div>
        </a> -->
        
    </div>
    <br>
</div>

