<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Buc motor</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, height=device-height" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" /> </head>

<body>
    <div class="header-algemeneContainer">
        <div class="header">
            <div class="logo">
                <h1>BUC motor</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">ACCUEIL</a></li>
                    <li><a href="Article-vente.php">VENTES</a></li>
                    <li>
                        <div class="autremenu center"><a href="contact.php">CONTACT</a></div>
                    </li>
                    <li><a href="about.php" class="active">NOUS BUC</a></li>
                    <li><a href="inscription.php">INSCRIPTION </a>|<a href="Connexion.php"> CONNEXION</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!---header-algemeneContainer--->
    <div class="algemeneContainer">
        <div class="linksContainer">
            <div class="recherche">
                <div class="title">
                    <h1>Site Search</h1>
                    <div class="recherche-input">
                        <input name="" type="text" class="input-style" /> </div>
                    <div class="recherche-btn"><img src="images/recherche-btn.jpg" alt="recherche" /></div>
                </div>
            </div>
            <div class="block2">
                <?php include_once('Personnels/personnel.php'); ?>
            </div>
        </div>
    </div>
    <!---linksContainer--->
    <div class="rechtsContainer center">
        <div class="page-content">
            <div class="panel mar-bottom">
                <div class="title">
                    <h1 class="cssbutton align">A Propos de nous</h1>
                    <p class="align">&nbsp;</p>
                    <h3>BUC motor est une entreprise de vente des pièces de motos détachées et en gros, et vous fournit aussi ses services en réparation.Si dessous vous trouverez un aperçu de nos different menbre du personnel.</h3>
                </div>
                <div class="content">
                    <div class="box mar-Right">
                        <div class="panel"> <img src="images/image4.jpg" alt="image" width="220" height="260" />
                            <div class="title">
                                <h1>Web designer</h1>
                            </div>
                            <div class="content">
                                <p>Gère le site web de l'ntreprise</p>
                                <div class="button"><a href="#">More Info</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="panel"> <img src="images/image5.jpg" alt="image" width="220" height="260" />
                            <div class="title">
                                <h1>Employé polyvalent</h1>
                            </div>
                            <div class="content">
                                <p>touche un peu à tout dans l'entrprise</p>
                                <div class="button"><a href="#">More Info</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearing"></div>
                    <div class="box">
                        <div class="panel"> <img src="images/image6.jpg" alt="image" width="220" height="260" />
                            <div class="content">
                                <div class="title">
                                    <h1>Comptable</h1>
                                </div>
                                <div class="content">
                                    <p>Gère la comptabilité de l'entreprise</p>
                                    <div class="button"><a href="#">More Info</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearing"></div>
        </div>
        <!---page--->
    </div>
    <!---Rightcol--->
    </div>
    <?php include_once('footer/footer.php'); ?>

</html>
