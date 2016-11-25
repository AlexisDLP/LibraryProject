    <?php
    
    $login_valide = "alex";
    $motdepasse_valide = "library";

    if (isset($_POST['login']) && isset($_POST['pwd'])) {

            if ($login_valide == $_POST['login'] && $motdepasse_valide == $_POST['pwd']) {
    		
    		session_start ();
    		
                $_SESSION['login'] = $_POST['login'];
    		$_SESSION['pwd'] = $_POST['pwd'];

    		header ('location: Gestion.php');
    	}
    	else {
    		
    		echo '<body onLoad="alert(\'Mot de passe incorrect...\')">';
    		
    		echo '<meta http-equiv="refresh" content="0;URL=identification.php">';
    	}
    }
    else {
    	echo 'Veuillez remplir le formulaire.';
    }
    ?>