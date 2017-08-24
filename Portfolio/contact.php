<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">

    <title>Buc motor</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, height=device-height" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

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
                        <div class="autremenu center"><a href="contact.php" class="active">CONTACT</a></div>
                    </li>
                    <li><a href="about.php">NOUS BUC</a></li>
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
                    <div class="recherche-input"><input name="" type="text" class="input-style" /></div>
                    <div class="recherche-btn"><img src="images/recherche-btn.jpg" alt="recherche" /></div>
                </div>
            </div>
            <div class="block2">
                <?php include_once('Personnels/personnel.php'); ?>

            </div>
        </div>
    </div>
    <!---linksContainer--->


    <div class="rechtsContainer">
        <div class="page-content">
            <div class="panel mar-bottom">
                <div class="title">
                    <h1 class="cssbutton align">CONTACT</h1>
                    <h2>&nbsp;</h2>
                </div>
                <div class="panel">
                    <div class="title">
                    </div>
                    <div class="content">
                        <form id="form1" name="form1" method="POST" action="sendemail.php">
                            <div class="contact-form mar-top30">
                                <label> <span>Nom complet</span>
              <input type="text" class="input_text" name="name" id="name"/>
            </label>
                                <label> <span>Email</span>
            <input type="text" class="input_text" name="email" id="email"/>
            </label>
                                <label> <span>Suject</span>
              <input type="text" class="input_text" name="subject" id="subject"/>
            </label>
                                <label> <span>Message</span>
            <textarea class="message" name="message" id="message"></textarea>
            <input type="submit" class="button" name="submit" id="submit" value="Envoyer" />
            </label>
                            </div>
                        </form>
                        <div class="adres">
                            <div class="panel">
                                <div class="title">
                                    <h1>Adresse</h1>
                                </div>
                                <div class="content">
                                    <p>Buc Motor: A proximité de Bepanda (Douala- Camaroun)</p>
                                    <p><span>Telephone :</span> (+237) 670 009 747 / 696 173 629</p>
                                    <p><span>Email1 :</span> <a href="mailto:buc2016@gmail.com">bucmotor16@yahoo.fr</a></p>
                                    <p><span>Email2 :</span><a href="mailto:buc2016@gmail.com"> bucmotor16@gmail.com</a></p>
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
</body>

</html>
