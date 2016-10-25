<?php

function headerHTML(){ ?>
    <header>
        <div class="center">
            <div id="header_title">
                <h1>ROGUE PROJECT</h1>
                <div id="header_connect">
                    <?php if(isset($_SESSION['id'])) {
                        echo '<a href="">INSCRIPTION</a>'.PHP_EOL;
                        echo '<a href="">CONNEXION</a>'.PHP_EOL;
                    } else {
                        echo '<a href="">MON COMPTE</a>'.PHP_EOL;
                        echo '<a href="">DECONNEXION</a>'.PHP_EOL;
                    }
                    ?>
                </div>
            </div>

            <ul class="big">
                <li id="selected"><a href="">ACCUEIL</a></li>
                <li><a href="">PRESENTATION DU JEU</a></li>
                <li><a href="">NEWS</a></li>
                <li><a href="">CLASSEMENT</a></li>
                <li><a href="">CONTACT</a></li>
                <?php if(isset($_SESSION['admin'])) {
                    echo '<li><a href="">ADMIN</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>
<?php }

function footerHTML(){ ?>
    <footer>
        <div class="center">
            <nav>
                <ul class="Footer_Nav big">
                    <li id="Footer_RogueProject">ROGUE PROJECT
                        <ul>
                            <li>
                                <a href=""><img src="Resources/icons/facebook.png" alt="logo facebook"></a>
                            </li>
                            <li>
                                <a href=""><img src="Resources/icons/twitter.png" alt="logo twitter"></a>
                            </li>
                            <li>
                                <a href=""><img src="Resources/icons/youtube.png" alt="logo youtube"></a>
                            </li>
                            <li>
                                <a href=""><img src="Resources/icons/github.png" alt="logo github"></a>
                            </li>
                        </ul>
                    </li>
                    <li id="Footer_APropos">A PROPOS
                        <ul>
                            <li><a href="">Le jeu</a></li>
                            <li><a href="">L'équipe</a></li>
                        </ul>
                    </li>
                    <li id="Footer_PlanDuSite">PLAN DU SITE
                        <ul>
                            <li><a href="">Accueil</a></li>
                            <li><a href="">Présentation du jeu</a></li>
                            <li><a href="">News</a></li>
                            <li><a href="">Classement</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>

<?php }