<?php
    $route = Route::current();
    $currenturl = Route::currentRouteName();
    $pos = strpos($currenturl, ".");
    $currenturl = substr($currenturl, 0, $pos);
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Navigatie</h3>
    </div>

    <ul class="list-unstyled components">
        <span>Menu</span>
        <li>
            <a href="/papers" class="nav-link {{ $currenturl == "papers" ? 'active' : '' }}">Kranten</a>
        </li>
        <li>
            <a href="/flyers" class="nav-link {{ $currenturl == "flyers" ? 'active' : '' }}">Folders</a>
        </li>
        <li>
            <a href="/districts" class="nav-link {{ $currenturl == "districts" ? 'active' : '' }}">Routes</a>
        </li>
        <li>
            <a href="/areas" class="nav-link {{ $currenturl == "areas" ? 'active' : '' }}">Wijken</a>
        </li>
        <li>
            <a href="/streets" class="nav-link {{ $currenturl == "streets" ? 'active' : '' }}">Straten</a>
        </li>
        <li>
            <a href="/addresses" class="nav-link {{ $currenturl == "addresses" ? 'active' : '' }}">Adressen</a>
        </li>
        <li>
            <a href="#" class="nav-link {{ $currenturl == "vacancies" ? 'active' : '' }}">Vacatures</a>
        </li>
        <li>
            <a href="#" class="nav-link {{ $currenturl == "couriers" ? 'active' : '' }}">Koeriers</a>
        </li>
        <li>
            <a href="#" class="nav-link {{ $currenturl == "complaints" ? 'active' : '' }}">Klachten</a>
        </li>

        <span>Gebruikers</span>
        <li>
            <a href="#" class="nav-link {{ $currenturl == "admins" ? 'active' : '' }}">Admins</a>
        </li>
        <li>
            <a href="#" class="nav-link {{ $currenturl == "delivery" ? 'active' : '' }}">Bezorgers</a>
        </li>
        <li>
            <a href="#" class="nav-link {{ $currenturl == "emails" ? 'active' : '' }}">Email bezorgers</a>
        </li>
    </ul>
</nav>