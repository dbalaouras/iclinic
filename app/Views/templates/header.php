    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ψηφιακή Κλινική</title>
        <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Ψηφιακή Κλινική</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Ρυθμίσεις</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Έξοδος</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Κεντρικό</div>
                            <a class="nav-link" href="/">
                                <div class="sb-nav-link-icon"><i class="fas fa-hospital-user"></i></div>
                                Αρχική
                            </a>
                            <div class="sb-sidenav-menu-heading"><i class="fas fa-hospital-user"></i> Ασθενείς</div>

                            <a class="nav-link" href="/patients">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Προβολή
                            </a>
                            <a class="nav-link" href="/patients/create">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Προσθήκη
                            </a>

                            <div class="sb-sidenav-menu-heading"><i class="fas fa-user-nurse"></i> Ιατροί</div>
                            <a class="nav-link" href="/doctors">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Προβολή
                            </a>
                            <a class="nav-link" href="/doctors/create">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Προσθήκη
                            </a>

                            <div class="sb-sidenav-menu-heading"><i class="fas fa-notes-medical"></i> Εξετάσεις</div>
                            <a class="nav-link" href="/exams">
                                <div class="sb-nav-link-icon"><i class="fas fa-notes-medical"></i></div>
                                Προβολή
                            </a>
                            <a class="nav-link" href="/exams/create">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Προσθήκη
                            </a>

                            <div class="sb-sidenav-menu-heading"><i class="fas fa-procedures"></i> Χειρουργεία</div>
                            <a class="nav-link" href="/operations">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Προβολή
                            </a>
                            <a class="nav-link" href="/operations/create">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Προσθήκη
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        administrator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?= esc($title); ?></h1>
                        <?php
                        if (isset($messages)) {
                        ?>
                            <div class="alert alert-primary" role="alert">
                                <?php echo  $messages; ?>
                            </div>
                        <?php
                        }
                        ?>