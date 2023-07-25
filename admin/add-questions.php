<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';

if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);	

$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name =$row['exam_name'];
    }
} else {
header("location:./");	
}

}else{
header("location:./");	
}
?>
<!DOCTYPE html>
<html>
   
<head>
        
        <title>SEO | Ajouter des questions</title>
        
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
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

        
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
<li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Tableau de Bord</p></a></li>
<li><a href="departments.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-folder-open"></span><p>Départements</p></a></li>
<li><a href="categories.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-tags"></span><p>Filières </p></a></li>
<li><a href="subject.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-file"></span><p>Modules</p></a></li>
<li><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Etudiants</p></a></li>
<li><a href="examinations.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examens</p></a></li>
<li><a href="questions.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-question-sign"></span><p>Questions</p></a></li>
<li><a href="notice.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-th-list"></span><p>Les remarques</p></a></li>
<li><a href="results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Résultats de tests</p></a></li>

</ul>
</div>
</div>
<div class="page-inner">
<div class="page-title">
<h3>Ajouter une question - <?php echo "$exam_name"; ?></h3>



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
        <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Choix multiple</a></li>
        <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Remplir les blancs</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="tab5">
        <form action="pages/add_question.php?type=mc" method="POST">
		<div class="form-group">
        <label for="exampleInputEmail1">Question</label>
        <input type="text" class="form-control" placeholder="Entrer question" name="question" required autocomplete="off">
        </div>
		
<table class="table table-bordered">
<thead>
    <tr>
        <th width="100">Numéro d'option</th>
        <th>Option</th>
        <th  width="100" >Réponse</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th scope="row" >1</th>
        <td>
		<div class="form-group">
        <label for="exampleInputEmail1">Option 1</label>
        <input type="text" class="form-control" placeholder="définir l'option
 1" name="opt1" required autocomplete="off">
        </div>
		</td>
        <td><input type="radio" name="answer" value="option1" required></td>

    </tr>
    <tr>
        <th scope="row">2</th>
        <td>
		<div class="form-group">
        <label for="exampleInputEmail1">Option 2</label>
        <input type="text" class="form-control" placeholder="définir l'option
 2" name="opt2" required autocomplete="off">
        </div>
		</td>
        <td><input type="radio" name="answer" value="option2" required></td>

    </tr>
    <tr>
        <th scope="row">3</th>
        <td>
		<div class="form-group">
        <label for="exampleInputEmail1">Option 3</label>
        <input type="text" class="form-control" placeholder="définir l'option 3" name="opt3" required autocomplete="off">
        </div>
		</td>
        <td><input type="radio" name="answer" value="option3" required></td>

    </tr>
	
	<tr>
        <th scope="row">4</th>
        <td>
		<div class="form-group">
        <label for="exampleInputEmail1">Option 4</label>
        <input type="text" class="form-control" placeholder="définir l'option
 4" name="opt4" required autocomplete="off">
        </div>
		</td>
        <td><input type="radio" name="answer" value="option4" required style="margin: auto;" ></td>

    </tr>
</tbody>
</table>
<input type="hidden" name="exam_id" value="<?php echo "$exam_id"; ?>">
<button type="submit" class="btn btn-primary">Ajouter</button>
		

		
		</form>
               
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab6">
 <form action="pages/add_question.php?type=fib" method="POST">
		<div class="form-group">
        <label for="exampleInputEmail1">Question</label>
        <input type="text" class="form-control" placeholder="
définir la Question" name="question" required autocomplete="off">
        </div>
		<div class="form-group">
        <label for="exampleInputEmail1">Réponse
</label>
        <input type="text" class="form-control" placeholder="
définir la Réponse" name="answer" required autocomplete="off">
        </div>
 <input type="hidden" name="exam_id" value="<?php echo "$exam_id"; ?>">
<button type="submit" class="btn btn-primary">Ajouter</button>
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
        
		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    </body>

</html>