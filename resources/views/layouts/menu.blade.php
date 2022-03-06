

<li class="nav-item">
    <a href="{{ route('proftfolioCategories.index') }}"
       class="nav-link {{ Request::is('proftfolioCategories*') ? 'active' : '' }}">
        <p>Proftfolio Categories</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('testimonials.index') }}"
       class="nav-link {{ Request::is('testimonials*') ? 'active' : '' }}">
        <p>Testimonials</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('teamTypes.index') }}"
       class="nav-link {{ Request::is('teamTypes*') ? 'active' : '' }}">
        <p>Team Types</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('teamMembers.index') }}"
       class="nav-link {{ Request::is('teamMembers*') ? 'active' : '' }}">
        <p>Team Members</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sliders.index') }}"
       class="nav-link {{ Request::is('sliders*') ? 'active' : '' }}">
        <p>Sliders</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('contact_page') }}"
       class="nav-link {{ Request::is('contact_page') ? 'active' : '' }}">
        <p>Contact Page</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('home_style_page') }}"
       class="nav-link {{ Request::is('home_style_page') ? 'active' : '' }}">
        <p>Home Style</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('setting_page') }}"
       class="nav-link {{ Request::is('setting_page') ? 'active' : '' }}">
        <p>App Config</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('protfolioItems.index') }}"
       class="nav-link {{ Request::is('protfolioItems*') ? 'active' : '' }}">
        <p>Protfolio Items</p>
    </a>
</li>


