<?php
session_start();
include("../include/connexion.inc.php");
include("../class/class.reservation.php");

$reservation = new Reservation($con);

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = session_id();
}

$datetime_string = date('c', time());

?>

<!doctype html>
<html lang="fr">
    
<head>
  
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>

  </head>





  <body>
  
    <style type="text/css">
        .block a:hover{
            color: silver;
        }
        .block a{
            color: #fff;
        }
        .block {
            position: fixed;
            background: #2184cd;
            padding: 20px;
            z-index: 1;
            top: 240px;
        }
    </style>

    <h1 class="titre">Calendrier des réservations</h1>
  
<div>
    <div style="margin-top:8px">

</div>
    <div style="float:left;width:90px">
</div>

<div style="float:left;width:120px;margin-left:20px;margin-top:2px"></div>

      
<div style="text-align: center;"></div>

<br><br>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="../../js/fullc/script.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >

<link href="../../css/style.fullc/fullcalendar.css" rel="stylesheet" />
<link href="../../css/style.fullc/fullcalendar.print.css" rel="stylesheet" media="print" />
<script src="../../js/fullc/moment.min.js"></script>
<script src="../../js/fullc/fullcalendar.js"></script>

<div class="container">
  <div class="row">
<div id="calendar"></div>

</div>
</div>


<!-- Modal -->
<div id="createEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une réservation</h4>
      </div>
      <div class="modal-body">

            <div class="control-group">
                <label class="control-label" for="inputPatient">Nom client :</label>
                <div class="field desc">
                    <input class="form-control" id="titre" name="titre" placeholder="Nom du client" type="text" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputPatient">Commentaire :</label>
                <div class="field desc">
                    <input class="form-control" id="commentaire" name="commentaire" placeholder="commentaire" type="text" value="">
                </div>
            </div>


            <input type="hidden" name="date_rese" id="date_rese"/>
            <input type="hidden"  id="startTime"/>
            <input type="hidden"  id="endTime"/><br>
                    <p>
                      <select id="id_bien" name="id_bien">
                          <?php
                          $all_biens = $reservation->selectbien();
                          foreach ($all_biens as $bien) {
                          ?>
                              <option value="<?php echo $bien["id_bien"]; ?>">
                                  <?php echo $bien["id_bien"] . " " . $bien["nom_bien"]; ?>
                              </option>
                          <?php
                          }
                          ?>
                      </select>
                      <select id="id_client" name="id_client">
                          <?php
                          $all_clients = $reservation->selectClient();
                          foreach ($all_clients as $client) {
                          ?>
                              <option value="<?php echo $client["id_client"]; ?>">
                                  <?php echo $client["id_client"] . " " . $client["nom_client"]; ?>
                              </option>
                          <?php
                          }
                          ?>
                      </select>

                        </p>   
       
        <div class="control-group">
            <label class="control-label" for="when">Quand :</label>
            <div class="controls controls-row" id="when" style="margin-top:5px;"> </div>
        </div>
        
      </div>
      
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Enregistrer</button>
    
    </div>

  </div>
</div>


<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Details de la réservation</h4>
        </div>
        <div id="modalBody" class="modal-body">
        <h4 id="modalTitle" class="modal-title"></h4>
        <div id="modalWhen" style="margin-top:5px;"></div>
        </div>
        <input type="hidden" id="eventID"/>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
            <button type="submit" class="btn btn-danger" id="deleteButton" name="deleteRes">Supprimer</button>
        </div>
    </div>
</div>
</div>
<!--Modal-->


<div style='margin-left: auto;margin-right: auto;text-align: center;'>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21769945-4', 'auto');
  ga('send', 'pageview');

</script>

  </body>
</html>