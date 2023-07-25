<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
        <title>SEO | Gérer les étudiants</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Online Examination System" />
        <meta name="keywords" content="Online Examination System" />
        <meta name="author" content="Bwire Charles Mashauri" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https : //fonts.googleapis.com/css2? family= Dosis:wght@300 & display=swap" rel="stylesheet">
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
		<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
		

        <link href="../assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>  
    </head>
    <body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
        <div class="overlay"></div>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile">
				<?php 
				if ($myavatar == NULL) {
				print' <img width="60" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
				}else{
				echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/>';	
				}
						
				?>
				<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
                <div class="profile-menu-list">
                    <a href="profile.php"><i class="fa fa-user"></i><span>Profil</span></a>
                    <a href="logout.php"><i class="fa fa-sign-out"></i><span>Se déconnecter</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Fechar Menu</button>
        </div>
        <form class="search-form" action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control search-input" placeholder="Trouver un étudiant..." required>
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div>
        </form>
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="./" class="logo-text"><span><img src="logo.png" alt="" height="76" width="130"></span></a>
                    </div>
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-right">
                                <li>	
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>

<li class="dropdown">
<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
    <span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><i class="fa fa-angle-down"></i></span>
	<?php 
    if ($myavatar == NULL) {
    print' <img class="img-circle avatar"  width="40" height="40" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
    }else{
    echo '<img width="40" height="40" src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle avatar"  alt="'.$myfname.'"/>';	
    }

    ?>
</a>
<ul class="dropdown-menu dropdown-list" role="menu">
    <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profil</a></li>
    <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Se déconnecter</a></li>
</ul>
</li>
<li>
<a href="logout.php" class="log-out waves-effect waves-button waves-classic">
    <span><i class="fa fa-sign-out m-r-xs"></i>Se déconnecter</span>
</a>
</li>
<li>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
								<?php 
						        if ($myavatar == NULL) {
						        print' <img class="img-circle img-responsive" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
						        }else{
						        echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle img-responsive"  alt="'.$myfname.'"/>';	
						        }
						
						        ?>
                       
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><br><small>SEO Administrateur</small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Tableau de bord</p></a></li>
                        <li><a href="departments.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-folder-open"></span><p>Départements</p></a></li>
                        <li><a href="categories.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-tags"></span><p>Filières </p></a></li>
                        <li><a href="subject.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-file"></span><p>Modules</p></a></li>
                        <li class="active"><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Etudiants</p></a></li>
                        <li><a href="examinations.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examens</p></a></li>
                        <li><a href="questions.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-question-sign"></span><p>Questions</p></a></li>
                        <li><a href="notice.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-th-list"></span><p>Remarques</p></a></li>
                        <li><a href="results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Résultats de tests</p></a></li>


                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3>gérer les étudiants</h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div role="tabpanel">
                                   
                                            <ul class="nav nav-tabs" role="tablist">
			
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">étudiants</a></li>
                                                <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Ajouter des étudiants</a></li>										
												
						

                                            </ul>
                                    
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                           <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM tbl_users WHERE role = 'student'";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
    <tr>
        <th>Nom</th>
		<th>Genre</th>
		<th>Filiére</th>
        <th>Status</th>
        <th>Date de naissance</th>
        <th>Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Nom</th>
        <th>Genre</th>
        <th>Filiére</th>
        <th>Status</th>
        <th>Date de naissance</th>
        <th>Action</th>
    </tr>
</tfoot>
<tbody>';

   while($row = $result->fetch_assoc()) {
	   
	   $status = $row['acc_stat'];
	   if ($status == "1") {
	   $st = '<p class="text-success">Actif</p>';
	   $stl = '<a href="pages/make_sd_in.php?id='.$row['user_id'].'">rendre inactif</a>';
	   }else{
	   $st = '<p class="text-danger">Inactif</p>'; 
       $stl = '<a href="pages/make_sd_ac.php?id='.$row['user_id'].'">rendre actif</a>';											   
											   }
                                          print '
       <tr>
        <td>'.$row['first_name'].' '.$row['last_name'].'</td>
		<td>'.$row['gender'].'</td>
        <td>'.$row['category'].'</td>
        <td>'.$st.'</td>
		<td>'.$row['dob'].'</td>
        <td><div class="btn-group" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Sélectionner une Action
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li>'.$stl.'</li>
			<li><a href="edit-student.php?sid='.$row['user_id'].'">Modifier létudiant</a></li>
			<li><a href="view-student.php?sid='.$row['user_id'].'">Voir étudiant</a></li>
            <li><a'; ?> onclick = "return confirm('Supprimer <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/drop_sd.php?id='.$row['user_id'].'">Supprimer  un étudiant</a></li>
        </ul>
    </div></td>

    </tr>';
   }
   
   print '
</tbody>
</table>  ';
    } else {
	print '
		<div class="alert alert-info" role="alert">
Rien na été trouvé dans la base de données.
</div>';

   }
   $conn->close();
   
   ?>




</div>
               
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab6">
 <form action="pages/add_student.php" method="POST">
<div class="form-group">
    <label for="exampleInputEmail1">Prénom</label>
    <input type="text" class="form-control" placeholder="Prénom" name="fname" required autocomplete="off">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control" placeholder="Nom" name="lname" required autocomplete="off">
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Homme</label>
    <input type="radio" name="gender" value="Male" required>
    <label for="exampleInputEmail1">Femme</label>
    <input type="radio" name="gender" value="Female" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Adresse e-mail</label>
    <input type="email" class="form-control" placeholder="Adresse e-mail" name="email" required autocomplete="off">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Téléphone</label>
    <input type="text" class="form-control" placeholder="Téléphone " name="phone" required autocomplete="off">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Sélectionner le département</label>
    <select class="form-control" name="department" required>
	<option value="" selected disabled>-Sélectionner le département-</option>
	<?php
	include '../database/config.php';
	$sql = "SELECT * FROM tbl_departments WHERE status = 'Active' ORDER BY name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
    }
   } else {

    }
     $conn->close();
	 ?>
	
	</select>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Sélectionner une
Filiére</label>
    <select class="form-control" name="category" required>
	<option value="" selected disabled>-Sélectionner une
Filiére-</option>
	<?php
	include '../database/config.php';
	$sql = "SELECT * FROM tbl_categories WHERE status = 'Active' ORDER BY name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
    }
   } else {

    }
     $conn->close();
	 ?>
	
	</select>
</div>

<div class="form-group">
<label >
Date de naissance</label>
<input type="text" class="form-control date-picker" name="dob" required autocomplete="off" placeholder="Sélectionner une
date de naissance">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Adresse</label>
    <textarea style="resize: none;" rows="4" class="form-control" placeholder="Adresse" name="address" required autocomplete="off"></textarea>
</div>


<button type="submit" class="btn btn-primary">
S'inscrire</button>
</form>
        </div>

    </div>
</div>
</div>
                                </div>  
  
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
                
            </div>
        </main>
		<?php if ($ms == "1") {
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{
	
}
?>

        <div class="cd-overlay"></div>

        <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
		<script src="../assets/plugins/select2/js/select2.min.js"></script>
        <script src="../assets/plugins/summernote-master/summernote.min.js"></script>
        <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="../assets/js/pages/form-elements.js"></script>
		

		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    </body>

</html>