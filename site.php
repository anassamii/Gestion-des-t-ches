<!DOCTYPE html>
<html>
    <head>
	
	    <title>Gestion Des tâches</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/botticelli-web.jpg" />
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="css/consulter.css">
		<link rel="stylesheet" type="text/css" href="css/ajouter.css">
		
		<script src="js/consulter.js"></script>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		
    </head>

<body>

        <div class="sidebar-navigation hidde-sm hidden-xs">
            <div class="logo">
                <a href="#">My <em>tasks</em></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#featured">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Tâches
                        </a>
                    </li>
                    <li>
                        <a href="#projects">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Ajouter
                        </a>
                    </li>
                    <li>
                        <form action="index.html">
						    <input class="seDeconnecter" href="php/logout.php" type="submit" value="Se Déconnecter">
						</form>
                    </li>
                    
                </ul>
            </nav>
        </div>

        <div class="page-content">
            <section id="featured" class="content-section">
                <div class="section-heading">			
                    <h1>Consulter <em>tâches</em></h1>
				</div>
                <div id='list' class="section-content">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher par:  Numéro / Titre / Description..." title="Type in a name">
					<select onchange="sortTable()" name="tri_liste" class="form-control" id="tri_liste">
						<option>Tâches</option>
						<option>Accomplies</option>
						<option>Valides</option>
					</select>				
					<table id="myTable">
					 <thead>	
					  <tr class="header">
						<th style="width:12%;">Numéro</th>
						<th style="width:28%;">Titre</th>
						<th style="width:60%;">Description</th>
						<th></th>
						<th></th>
						<th></th>
					  </tr>
					  </thead>
					<tbody>
					
					    <?php
						include("php/database.php");
											
						$sql1 = ' SELECT * FROM `tache` ';

						$result1 = mysqli_query($conn, $sql1);
						
						while($row1 = mysqli_fetch_assoc($result1)) {
							?>     
							<tr>
							<td><h4><?php echo $row1['id']; ?></h4></td>
							<td><h4><?php echo substr($row1['titre'], 0, 20); ?></h4></td>
							<td><h4><?php echo substr($row1['description'], 0, 50); ?></h4></td>
							<?php
							if($row1['accomplie']){
							?>  	
								<td><input type="checkbox" onclick="checkbox(<?php echo $row1['id'];?>, 0);" checked></td>								
							<?php
							}else{
							?>  
								<td><input type="checkbox" onclick="checkbox(<?php echo $row1['id'];?>, 1);"></td>
							<?php
							}
							?> 
							<td><a onclick="chercher(<?php echo $row1['id'];?>)" href="#projects" class="btnsupprimer" name="search" id="search"><i class="fa fa-pencil"></i></a></td>
							<td><a href="php/delete.php?id=<?php echo $row1['id'];?>" class="btnsupprimer" value="Supprimer"><i class="fa fa-trash"></i></a></td>
							</tr>
							<?php
						}
						
						mysqli_close($conn);
						
						?>
					</tbody>
					</table>
                </div>
            </section>
						
					  
					  
			
            <section id="projects" class="content-section">
				<br><br>
                <div class="section-heading">					
                    <h1>Ajouter <em>tâche</em></h1>
                </div>
				<div class="section-content">
                        <form id="projects" action="php/ajouter.php" method="post">
                            <div class="row">					
								<fieldset id="fs">
								  <legend style="color:#fff">Détails</legend>
									<div class="col-md-4">
									  <fieldset>
										<input name="titre" id="titre" type="text" class="form-control" placeholder="Titre..."  required>
										<input type="hidden" id="id_tache" name="id_tache">
									  </fieldset>
									</div>
									<div class="col-md-8">
									  <fieldset>
										<textarea name="description" id="description" rows="6" class="form-control" placeholder="Description..." required></textarea>
									  </fieldset>
									</div>									
								</fieldset>	
								
								<div class="col-md-6">
								  <fieldset>
									<button type="button" onclick="update();" class="btn">Modifier</button>
								  </fieldset>
								</div>
								<div class="col-md-6">
								  <fieldset>
									<button type="submit" id="form-submit" class="btn">Ajouter</button>
								  </fieldset>
								</div>
                            </div>
                        </form>
                </div>
            </section>
			
            <section class="footer">
                <p>@2023 Botticelli web</p>
            </section>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script>
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }
            
            lastScrollTop = st;
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

</body>
</html>
<script>
function chercher(id){
	
	if(id != ''){
		$.ajax({
			url:"php/afficher.php",
			method:"POST",
			data:{id:id},
			dataType:"JSON",
			success:function(data){
				$('#id_tache').val(data.id);
				$('#titre').val(data.titre);
				$('#description').val(data.description);
			}
		})
	}else{
		alert("Id has no value");
	}
	
} 

function update(){
	
	if($('#id_tache').val() != ''){
	
		var id= $('#id_tache').val();               
		var titre= $('#titre').val();               
		var description= $('#description').val();
		 
        $.ajax({
			type:"POST",
			url:"php/update.php",
			data:{
				id:id,
				titre:titre,
				description:description,
			},
			success: function(data){
			// $('body, html').animate({
			  // scrollTop: $("#featured").offset().top
			// }, 600);
				window.location.href = "site.php";  
			}
		});
	
	}else{
		alert("Veuillez selectionner une tâche");
	}
 
}

function checkbox(id, msg){
	
	if(id != ''){
		
		$.ajax({
			type:"POST",
			url:"php/checkbox.php",
			data:{
				id:id,
				msg:msg,
			},
			success: function(data){
				window.location.href = "site.php";  
			}
		});
	}
 
}

</script>
