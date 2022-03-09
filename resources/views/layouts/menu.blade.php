

<li class="nav-item">
    <a href="{{ route('admin.proftfolioCategories.index') }}"
       class="nav-link {{ Request::is('proftfolioCategories*') ? 'active' : '' }}">
        <p>Proftfolio Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.testimonials.index') }}"
       class="nav-link {{ Request::is('testimonials*') ? 'active' : '' }}">
        <p>Testimonials</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.teamTypes.index') }}"
       class="nav-link {{ Request::is('teamTypes*') ? 'active' : '' }}">
        <p>Team Types</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('admin.teamMembers.index') }}"
       class="nav-link {{ Request::is('teamMembers*') ? 'active' : '' }}">
        <p>Team Members</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.sliders.index') }}"
       class="nav-link {{ Request::is('sliders*') ? 'active' : '' }}">
        <p>Sliders</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.contact_page') }}"
       class="nav-link {{ Request::is('contact_page') ? 'active' : '' }}">
        <p>Contact Page</p>
    </a>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('admin.home_style_page') }}"
       class="nav-link {{ Request::is('home_style_page') ? 'active' : '' }}">
        <p>Home Style</p>
    </a>
</li> --}}

<li class="nav-item">
    <a href="{{ route('admin.setting_page') }}"
       class="nav-link {{ Request::is('setting_page') ? 'active' : '' }}">
        <p>App Config</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.about_page') }}"
       class="nav-link {{ Request::is('about_page') ? 'active' : '' }}">
        <p>About Page</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('admin.protfolioItems.index') }}"
       class="nav-link {{ Request::is('protfolioItems*') ? 'active' : '' }}">
        <p>Protfolio Items</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.service.index') }}"
       class="nav-link {{ Request::is('admin.service*') ? 'active' : '' }}">
        <p>Services</p>
    </a>
</li>


