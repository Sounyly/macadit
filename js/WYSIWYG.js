//fonction pour rendre utilisable les bouton de mise en forme, bold, italic...
	function commande(nom, argument){
	    if (typeof argument === 'bold') {
	        argument = '';

	    }
	    // demander le lien à l'utilisateur avec un prompt
	    switch(nom)
	    {
	    case "createLink":
	        argument = prompt("Quelle est l'adresse du lien ?");
	    break;
	    case "insertImage":
    		argument = prompt("Quelle est l'adresse de l'image ?");
		break;
		}
		// executer la commande
	     document.execCommand(nom, false, argument);

	  
	  
	}