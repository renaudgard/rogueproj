<?php

function headerHTML(){ ?>
    <header>
        <h1>ROGUE PROJECT</h1>

        <!-- a supprimer une fois les sessions opérationnelles -->
        <button>INSCRIPTION</button>
        <button>CONNEXION</button>

        <?php if(isset($_SESSION['id'])) {
            echo '<button>INSCRIPTION</button>'.PHP_EOL;
            echo '<button>CONNEXION</button>'.PHP_EOL;
        } else {
            echo '<button>MON COMPTE</button>'.PHP_EOL;
            echo '<button>DECONNEXION</button>'.PHP_EOL;
        }
        ?>

        <ul>
            <li><a href="">ACCUEIL</a></li>
            <li><a href="">PRESENTATION DU JEU</a></li>
            <li><a href="">NEWS</a></li>
            <li><a href="">CLASSEMENT</a></li>
            <li><a href="">CONTACT</a></li>
            <?php if(isset($_SESSION['admin'])) {
                echo '<li><a href="">ADMIN</a></li>';
            }
            ?>
        </ul>
    </header>
<?php }

function footerHTML(){ ?>
    <footer>
        <nav>
            <ul>
                <li>ROGUE PROJECT</li>
                <li>A PROPOS
                    <ul>
                        <li><a href="">Le jeu</a></li>
                        <li><a href="">L'équipe</a></li>
                    </ul>
                </li>
                <li>PLAN DU SITE
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

        <img src="" alt="logo facebook">
    </footer>

<?php }