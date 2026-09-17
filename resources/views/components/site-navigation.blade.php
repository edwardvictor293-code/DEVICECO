<header class="nav-wrap glass-panel" data-nav>
    <a class="brand" href="{{ url('/') }}" data-transition aria-label="DEVICECO home">
        <span class="brand-mark">D</span>
        <span>DEVICECO</span>
    </a>
    <nav class="desktop-nav" aria-label="Primary navigation">
        <a href="{{ url('/') }}" data-transition class="{{ request()->routeIs('home') || request()->is('/') ? 'is-active' : '' }}">Home</a>
        <a href="{{ route('bicycles.index') }}" data-transition class="{{ request()->routeIs('bicycles.*') ? 'is-active' : '' }}">Bicycles</a>
        <a href="{{ route('technology') }}" data-transition class="{{ request()->routeIs('technology') ? 'is-active' : '' }}">Technology</a>
        <a href="{{ route('configurator') }}" data-transition class="{{ request()->routeIs('configurator') ? 'is-active' : '' }}">Configurator</a>
        <a href="{{ route('compare') }}" data-transition class="{{ request()->routeIs('compare') ? 'is-active' : '' }}">Compare</a>
        <a href="{{ route('routes') }}" data-transition class="{{ request()->routeIs('routes*') ? 'is-active' : '' }}">Routes</a>
        <a href="{{ route('journal') }}" data-transition class="{{ request()->routeIs('journal*') ? 'is-active' : '' }}">Journal</a>
    </nav>
    <div class="nav-actions">
        <a class="account-link" href="{{ auth()->check() ? route('dashboard') : route('login') }}" data-transition>
            {{ auth()->check() ? 'Account' : 'Sign in' }}
        </a>
        <button class="menu-toggle" type="button" aria-label="Open menu" aria-expanded="false" data-menu-toggle>
            <span></span><span></span>
        </button>
    </div>
    <div class="mobile-menu" data-mobile-menu aria-hidden="true">
        <div class="mobile-menu-inner">
            <p class="section-kicker">DEVICECO / Navigate</p>
            <a href="{{ url('/') }}" data-transition>Home <span>00</span></a>
            <a href="{{ route('bicycles.index') }}" data-transition>Bicycles <span>01</span></a>
            <a href="{{ route('technology') }}" data-transition>Technology <span>02</span></a>
            <a href="{{ route('configurator') }}" data-transition>Configurator <span>03</span></a>
            <a href="{{ route('compare') }}" data-transition>Compare <span>04</span></a>
            <a href="{{ route('routes') }}" data-transition>Routes <span>05</span></a>
            <a href="{{ route('journal') }}" data-transition>Journal <span>06</span></a>
            <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" data-transition>Account <span>07</span></a>
        </div>
    </div>
</header>
