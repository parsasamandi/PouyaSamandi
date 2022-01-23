<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#education" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="{{ $fontAwesome }}"></i></div>
    {{ $text }}
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="education" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
         {{-- Content --}}
         {{ $content }}
    </nav>
</div>