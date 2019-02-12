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
            <a href="/papers" class="nav-link <?php if($currenturl == "papers"){ echo "active"; } ?>">Kranten</a>
        </li>
        <li>
            <a href="/flyers" class="nav-link <?php if($currenturl == "flyers"){ echo "active"; } ?>">Folders</a>
        </li>
        <li>
            <a href="#" class="nav-link <?php if($currenturl == "areas"){ echo "active"; } ?>">Wijken</a>
        </li>
        <li>
            <a href="#" class="nav-link <?php if($currenturl == "vacancies"){ echo "active"; } ?>">Vacatures</a>
        </li>
        <li>
            <a href="#" class="nav-link <?php if($currenturl == "couriers"){ echo "active"; } ?>">Koeriers</a>
        </li>
        <li>
            <a href="#" class="nav-link <?php if($currenturl == "complaints"){ echo "active"; } ?>">Klachten</a>
        </li>

        <span>Gebruikers</span>
        <li>
            <a href="#" class="nav-link <?php if($currenturl == "users"){ echo "active"; } ?>">Admins</a>
        </li>
        <li>
            <a href="#" class="nav-link <?php if($currenturl == "deliverers"){ echo "active"; } ?>">Bezorgers</a>
        </li>
        <li>
            <a href="#" class="nav-link <?php if($currenturl == "mail"){ echo "active"; } ?>">Email bezorgers</a>
        </li>
    </ul>
</nav>