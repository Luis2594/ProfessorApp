<?php
include './reusable/Session.php';
include_once '../resource/Constants.php';

if (isset($_SESSION['type']) && (int) isset($_SESSION['type']) != Constants::USER_PROFESSOR) {
    session_start(); //to ensure you are using same session
    session_unset(); // remove all session variables
    session_destroy(); //destroy the session
    header("location: ../view/Login.php"); //to redirect back to "login.php" after logout
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administración</title>
        <link rel="icon" type="image/png" href="./../resource/images/cindeaTurrialba.ico" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="./../resource/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="./../resource/css/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="./../resource/css/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="./../resource/css/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="./../resource/css/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="./../resource/css/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="./../resource/css/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="./../resource/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="./../resource/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="./../resource/css/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="./../resource/css/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="./../resource/css/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- daterange picker -->
        <link href="./../resource/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="./../resource/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="./../resource/css/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

        <!--ALERTIFY-->
        <link href="./../resource/css/alertify/themes/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="./../resource/css/alertify/alertify.css" rel="stylesheet" type="text/css" />
        <link href="./../resource/css/alertify/alertify.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="skin-blue">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="./Home.php" class="logo"><b>
                        <?php
                        include '../business/InstitutionBusiness.php';
                        $institutionBusiness = new InstitutionBusiness();
                        $institutions = $institutionBusiness->getInstitution();
                        $found = false;

                        foreach ($institutions as $institution) {
                            echo $institution->getInstitutionName();
                            $found = true;
                            break;
                        }
                        if (!$found) {
                            echo 'Institución';
                        }
                        ?>

                    </b></a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        include '../business/PersonBusiness.php';
                                        include_once '../domain/Person.php';
                                        $personBusiness = new PersonBusiness();
                                        $person = $personBusiness->getPersonId((int) $_SESSION['id'])[0];
                                        ?>
                                        <img id="imageProfile3" src="./../resource/images/<?php echo $person->getPersonimage(); ?>" class="user-image" alt="User Image" />
                                        <span class="hidden-xs"><?php echo $person->getPersonFirstName() . " " . $person->getPersonFirstlastname(); ?></span>
                                        <?php
                                    } else {
                                        ?>
                                        <img id="imageProfile3" src="./../resource/images/profile_default.png" width="24" height="24" class="user-image" alt="User Image" />
                                        <span class="hidden-xs">Usuario</span>
                                        <?php
                                    }
                                    ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php
                                        if (isset($_SESSION['type']) && $person != NULL) {
                                            ?>
                                            <img id="imageProfile1"src="./../resource/images/<?php echo $person->getPersonimage(); ?>" class="img-circle" alt="User Image" />
                                            <?php
                                        } else {
                                            ?>
                                            <img id="imageProfile1"src="./../resource/images/profile_default.png" class="img-circle" alt="User Image" />
                                            <?php
                                        }
                                        ?>

                                        <p>                                            
                                            <?php
                                            if (isset($_SESSION['type'])) {
                                                echo $person->getPersonFirstName();
                                                switch ((int) $_SESSION['type']) {
                                                    case Constants::USER_PROFESSOR:
                                                        echo '<small>Profesor</small>';
                                                        break;
                                                    default:
                                                        session_start(); //to ensure you are using same session
                                                        session_unset(); // remove all session variables
                                                        session_destroy(); //destroy the session
                                                        header("location: ./Login.php");
                                                        break;
                                                }
                                            } else {
                                                echo 'Usuario';
                                            }
                                            ?>

                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="./ShowProfile.php" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <form role="form" id="form" action="../business/LogoutAction.php" method="POST" enctype="multipart/form-data">
                                                <input type="submit" class="btn btn-default btn-flat" value="Cerrar Sessión" />
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php
                            if (isset($_SESSION['id'])) {
                                ?>
                                <img id="imageProfile2" src="./../resource/images/<?php echo $person->getPersonimage(); ?>" class="img-circle" alt="User Image" />
                                <?php
                                //echo $person->getPersonFirstName() . " " . $person->getPersonFirstlastname();
                            } else {
                                ?>
                                <img id="imageProfile2" src="./../resource/images/profile_default.png" class="img-circle" alt="User Image" />
                                <?php
                            }
                            ?>
                        </div>
                        <div class="pull-left info">
                            <p>
                                <?php
                                if (isset($_SESSION['id'])) {
                                    echo "<br/>" . $person->getPersonFirstName() . " " . $person->getPersonFirstlastname();
                                } else {
                                    ?>
                                    Usuario
                                    <?php
                                }
                                ?>
                            </p>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENÚ</li>

                        <!--ENROLLMENT-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Perfil</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./ShowProfile.php"><i class="fa"></i>Mi Perfil</a></li>
                                <li><a href="./UpdatePassword.php"><i class="fa"></i>Cambiar Contraseña</a></li>
                            </ul>
                        </li>

                        <!--NOTIFY-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Notificaciones</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./ShowNotifications.php"><i class="fa"></i>Ver Notificaciones</a></li>
                                <li><a href="./CreateNotification.php"><i class="fa"></i>Crear Notificaciones</a></li>
                            </ul>
                        </li>

                        <!--TEACHER-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Profesores</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./ShowProfessors.php"><i class="fa"></i>Ver Profesores</a></li>
                                <li><a href="./CreateProfessor.php"><i class="fa"></i>Crear Profesor</a></li>
                                <li><a href="./ShowProfessors.php?assign=assign"><i class="fa"></i>Asignar módulos</a></li>
                                <li><a href="./ShowProfessorUpdate.php"><i class="fa"></i>Actualizar Profesor</a></li>
                                <li><a href="./ShowProfessorDelete.php"><i class="fa"></i>Eliminar Profesor</a></li>
                            </ul>
                        </li>

                        <!--STUDENTS-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Estudiante</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./ShowStudents.php"><i class="fa"></i>Ver Estudiantes</a></li>
                                <li><a href="./CreateStudent.php"><i class="fa"></i>Crear Estudiante</a></li>
                                <li><a href="./ShowStudentUpdate.php"><i class="fa"></i>Actualizar Estudiante</a></li>
                                <li><a href="./ShowStudentDelete.php"><i class="fa"></i>Eliminar Estudiante</a></li>
                            </ul>
                        </li>

                        <!--SPECIALITIES-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Atinencia</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./ShowSpecialities.php"><i class="fa"></i>Ver Atinencia</a></li>
                                <li><a href="./CreateSpeciality.php"><i class="fa"></i>Crear Atinencia</a></li>
                                <li><a href="./ShowSpecialityUpdate.php"><i class="fa"></i>Actualizar Atinencia</a></li>
                                <li><a href="./ShowSpecialityDelete.php"><i class="fa"></i>Eliminar Atinencia</a></li>
                            </ul>
                        </li>

                        <!--COURSES-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Módulos</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./ShowCourses.php"><i class="fa"></i>Ver Módulos</a></li>
                                <li><a href="./CreateCourse.php"><i class="fa"></i>Crear Módulo</a></li>
                                <li><a href="./ShowCourseUpdate.php"><i class="fa"></i>Actualizar Módulo</a></li>
                                <li><a href="./ShowCourseDelete.php"><i class="fa"></i>Eliminar Módulo</a></li>
                            </ul>
                        </li>

                        <!--CURRICULUM-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Malla curricular</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./ShowCurriculum.php"><i class="fa"></i>Ver Malla Curricular</a></li>
                                <li><a href="./CreateCurriculum.php"><i class="fa"></i>Crear Malla Curricular</a></li>
                                <li><a href="./ShowCurriculum.php?assign=assign"><i class="fa"></i>Asignar Módulos a Malla</a></li>
                                <li><a href="./ShowCurriculumUpdate.php"><i class="fa"></i>Actualizar Malla Curricular</a></li>
                                <li><a href="./ShowCurriculumDelete.php"><i class="fa"></i>Eliminar Malla Curricular</a></li>
                            </ul>
                        </li>

                        <!--SCHEDULE-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href=""><i class="fa"></i>Ver Horarios</a></li>
                                <li class="active"><a href="./CreateSchedule.php"><i class="fa"></i>Crear Horarios</a></li>
                                <li><a href=""><i class="fa"></i>Actualizar Horario</a></li>
                                <li><a href=""><i class="fa"></i>Eliminar Horario</a></li>
                            </ul>
                        </li>

                        <!--INFO-->
                        <li class="treeview">
                            <a>
                                <i class="fa"></i> <span>Información CINDEA</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./InformationInstitution.php"><i class="fa"></i>Ver Información</a></li>
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <br>
                <br>
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px;display: none;" ></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px; display: none;" ></div>
                <div class="chart" id="line-chart" style="display: none;"></div>