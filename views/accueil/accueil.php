<?php

ob_start();

?>

    <main class="flex wrap">
        <section class="carousel">
            <div id="banner" class="carousel-slide flex ">
                <img class="slide-image" src="./IMG//8_The-Expendables-3.jpg">
                <span>-action-</span>
                <p> La trilogie Expendables </p>
                <a href="#" class="btn">VOIR PLUS</a>
            </div>
        </section>
    </main>

<?php

$contenu = ob_get_clean();
require "./views/template.php";


