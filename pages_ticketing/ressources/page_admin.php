<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page admin</title>
    <link rel="stylesheet" type="text/css" href="page_admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
</head>
<body>

<h1>Vos tickets (administration)</h1>
        <div>
            <br>
        <table class="tickets_support">
            <tr>
                <th class="row1">Ticket ID</th> <!-- identifiant du ticket -->
                <th class="row2">Sujet</th> <!-- titre du ticket -->
                <th class="row3">Priorité</th> <!-- priorité du ticket -->
                <th class="row4">&Eacute;tat</th> <!-- état du ticket -->
                <th class="row5">Actions possibles</th>
            </tr>
            <tr>
                <td>#<?php echo $info['id']; ?>hghg</td>
                <td><?php echo $info['sujet']; ?>fgf</td>
                <td><?php echo $ArrayPriorites[$info['priorite']]; ?>fgfg</td>
                <td><?php echo $info['etat'] == 1 ? "" : "</td>
                <td>
                    <button>
                        <i class="fas fa-eye"></i>
                    </button>
                    <button>
                        <i class="fas fa-trash"></i>
                    </button>
                    <button>
                        <i class="fas fa-lock"></i>
                    </button>
                    <button>
                        <i class="fas fa-pen"></i>
                    </button>
                </td>
            </tr>
            </tbody>
                  
        </table>
    </div>

    <h1>Envoyer une réponse</h1>
    <form method="post">
        <table class="add_ticket">
            <tr>
                <th class="titreat">Sujet:</th>
                <td>
                    <input type="text" name="sujet" value=""/> 
                </td>
            </tr>
            <tr>
                <th class="titreat">Réponse:</th>
                <td><textarea name="message" style="width:400px;height:200px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="ajouter" value="Envoyer" /></td>
            </tr>
        </table>
    </form>


    <h1>Visualisation du ticket</h1>     
        <table class="view_ticket">
            <tr>
                <th class="titre">Ticket ID:</th>
                <td>#info</td>
            </tr>
            <tr>
                <th class="titre">Sujet:</th>
                <td>info</td>
            </tr>
            <tr>
                <th class="titre">Message:</th>
                <td>info</td>
            </tr>
            <tr>
                <th class="titre">Priorité du message:</th>
                <td>info</td>
            </tr>
            <tr>
                <th class="titre">Réponses:</th>
                <td>info</td>
            </tr>
            <tr>
                <th class="titre">Ajoutée le</th>
                <td>info</td>
            </tr>
        </table>	

</body>
</html>