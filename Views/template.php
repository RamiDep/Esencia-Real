<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo COMPANY_NAME ?></title>

    <?php include("partials/Links.php") ?>

</head>

<body id="page-top" class="sidebar-toggled">
    <?php 
        $action = false;
        require_once("./Controllers/ViewController.php");

        $object_view = new ViewController();
        $view = $object_view -> get_view_controller();
        
        if ($view == "login" || $view == "404"){
            require_once("./Views/templates/".$view."-view.php");
    ?>

   <?php } else { ?>
        <div id="wrapper"> <!-- Page Wrapper -->
        <?php include("partials/Menu.php") ?>
        
            <div id="content-wrapper" class="d-flex flex-column"> <!-- Content Wrapper -->
                
                <div id="content"><!-- Main Content -->
                    <?php include("partials/Header.php") ?>
                
                    <div class="container-fluid"> <!-- Begin Page Content -->
                    
                    </div> <!--container-fluid -->
                
                </div><!-- End of Main Content -->
                <?php include("partials/Footer.php") ?>
            </div> <!-- End of Content Wrapper -->
        </div> <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    <?php 
    }
    include("partials/Scripts.php"); ?>
</body>

</html>