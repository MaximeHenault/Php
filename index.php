<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Quizzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz</title>
</head>
<body>
    <header>
        <p>Bienvenue sur le Quizz</p>
    </header>
    <nav>
        <?php
	    include('appmvc.php');

	    if(isset($_GET['page'])) $page = $_GET['page'];
	    else $page = 1;

	    $monapp = new AppMVC();
	
        if(isset($_GET['question'])) $question = $_GET['question'];
        else $question = 1; 

        $monapp -> afficherPage($page, $question);
        ?>

        <button type = "submit">Valider</button>

        <?php
        //$monapp -> verifierreponse($question);
        $monapp -> bouton($question+1);
        ?>

        
    </nav>
    <footer>
        <p>Pour plus de quizz -><p>
    </footer>

    <script src = "index.js"></script>
</body>
</html>
