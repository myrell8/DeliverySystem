<?php
    $route = Route::current();
    $currenturl = Route::currentRouteName();
    $pos = strpos($currenturl, ".");
    $currenturl = substr($currenturl, 0, $pos);
?>

<nav id="sidebar" class="scrollbar-custom">
    <div class="sidebar-header">
        <h3>Navigatie</h3>
    </div>

    <ul class="list-unstyled components scrollbar-custom">
        <span>Menu</span>
        <li>
            <a href="/papers" class="nav-link {{ $currenturl == "papers" ? 'active' : '' }}">Kranten</a>
        </li>
        <li>
            <a href="/flyers" class="nav-link {{ $currenturl == "flyers" ? 'active' : '' }}">Folders</a>
        </li>
        <li>
            <a href="/flyerlinks" class="nav-link {{ $currenturl == "flyerlinks" ? 'active' : '' }}">Koppeling (Folders)</a>
        </li>
        <li>
            <a href="/districts" class="nav-link {{ $currenturl == "districts" ? 'active' : '' }}">Wijken</a>
        </li>
        <li>
            <a href="/vacancies" class="nav-link {{ $currenturl == "vacancies" ? 'active' : '' }}">Vacatures</a>
        </li>
        <li>
            <a href="/complaints" class="nav-link {{ $currenturl == "complaints" ? 'active' : '' }}">Klachten</a>
        </li>

        <span>Regio</span>
        <li>
            <a href="/areas" class="nav-link {{ $currenturl == "areas" ? 'active' : '' }}">Locaties</a>
        </li>
        <li>
            <a href="/streets" class="nav-link {{ $currenturl == "streets" ? 'active' : '' }}">Straten</a>
        </li>
        <li>
            <a href="/addresses" class="nav-link {{ $currenturl == "addresses" ? 'active' : '' }}">Adressen</a>
        </li>     

        <span>Gebruikers</span>
        <li>
            <a href="/admins" class="nav-link {{ $currenturl == "admins" ? 'active' : '' }}">Admins</a>
        </li>
        <li>
            <a href="/deliverers" class="nav-link {{ $currenturl == "deliverers" ? 'active' : '' }}">Bezorgers</a>
        </li>
        <li>
            <a href="/mails" class="nav-link {{ $currenturl == "mails" ? 'active' : '' }}">Email bezorgers</a>
        </li>
        <li>
            <a href="/couriers" class="nav-link {{ $currenturl == "couriers" ? 'active' : '' }}">Koeriers</a>
        </li>
    </ul>
</nav>