<?php

ob_start();

?>

    <main class="flex wrap">
        <section class="carousel">
            <div id="banner" class="carousel-item flex ">
                <img class="slide-image" src="./IMG//8_The-Expendables-3.jpg">
                <span>-action-</span>
                <p> La trilogie Expendables </p>
                <a href="index.php?action=filmAcceuil2" class="btn">VOIR PLUS</a>
            </div>
            <div id="banner" class="carousel-item flex ">
                <img class="slide-image2" src="/IMG/thefastandthefuriousbig.jpg">
                <span>-vroum vroum-</span>
                <p>The Fast and the Furious</p>
                <a href="index.php?action=filmAcceuil1" class="btn">VOIR PLUS</a>
            </div>
            
        </section>
    </main>
    <script src="/js//app.js"></script>
<?php

$contenu = ob_get_clean();
require "./views/template.php";


