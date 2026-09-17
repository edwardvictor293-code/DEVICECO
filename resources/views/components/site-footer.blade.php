<footer class="footer site-footer">
    <div class="footer-brand">
        <a class="brand" href="{{ url('/') }}" data-transition>
            <span class="brand-mark">D</span><span>DEVICECO</span>
        </a>
        <p>Precision in motion.</p>
    </div>
    <div class="footer-links" aria-label="Footer navigation">
        <a href="{{ route('bicycles.index') }}" data-transition>Bicycles</a>
        <a href="{{ route('routes') }}" data-transition>Routes</a>
        <a href="{{ route('journal') }}" data-transition>Journal</a>
        <a href="{{ route('contact') }}" data-transition>Contact</a>
        <a href="{{ route('privacy') }}" data-transition>Privacy</a>
    </div>
    <small>© {{ now()->year }} DEVICECO. Built for the long way forward.</small>
</footer>
