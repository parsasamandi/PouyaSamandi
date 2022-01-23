{{-- Url Address --}}
<a class="nav-link" href="{{ $route }}">
    <div class="sb-nav-link-icon">
        <i class="{{ $fontAwesome }}"></i>
    </div>
    {{ $text }}
</a>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#education" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
    Education
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="education" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="/education/newEducation">New Education</a>
        <a class="nav-link" href="/education/educationList">Education List</a>
        <!-- <a class="nav-link" href="/education/educationList">New University links</a> -->
    </nav>
</div>