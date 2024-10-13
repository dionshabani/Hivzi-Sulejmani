<?php
session_start();
include "connect.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hivzi-Sulejmani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="gjimnazi.css">
</head>
<body>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="oraret.php">Oraret</a>
                </li>
                <!-- Other nav items can go here -->
            </ul>

            <!-- Right side of the navbar -->
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['name']) && isset($_SESSION['surname'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"> <?php echo $_SESSION['name'] . ' ' . $_SESSION['surname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>


    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center mt-lg-5 mb-4">
                                <img class="img-fluid rounded-circle" src="logo.png" alt="..." />
                                <div class="ms-3">
                                    <div class="fw-bold">Hivzi Sulejmani</div>
                                    <div class="text-muted">Gjimnaz</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1">Gjimnazi Hivzi Sulejmani</h1>
                                    <!-- Post meta content-->

                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Natyror</a>
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Shoqëror</a>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="GIMNAZI.jpg" alt="..." /></figure>
                                <!-- Post content-->
                                <section class="mb-5">
                                    <p class="fs-5 mb-4">Të nderuar mysafirë, të dashur prindër, dhe të dashur nxënës,<br>

Sot, ne jemi mbledhur këtu në Gjimnazin Hivzi Sulejmani, një simbol i edukatës dhe shkëlqimit në komunitetin tonë. Shkolla jonë është e përkushtuar për të promovuar jo vetëm arritjet akademike, por gjithashtu rritjen dhe zhvillimin personal të çdo nxënësi.</p>
                                        </p>
                                    <p class="fs-5 mb-4">Mënyra se si ne e shohim edukatën është e lidhur ngushtë me krijimin e një ambienti ku nxënësit inkurajohen të eksplorojnë interesat e tyre, të angazhohen në mendimin kritik dhe të zhvillojnë pasionin për të mësuar gjatë gjithë jetës. Këtu, ne nuk jemi vetëm nxënës dhe mësues; ne jemi një familje, e cila punon së bashku për të arritur qëllimet tona të përbashkëta.</p>
                                    <p class="fs-5 mb-4">Kur shikojmë rreth nesh, shohim klasa dhe korridore që janë plot me kreativitet, kureshtje dhe bashkëpunim. Nxënësit tanë vijnë nga sfondet të ndryshme, duke sjellë secili perspektivat dhe talentet e veta që e pasurojnë komunitetin tonë shkollor. Ne e festojmë këtë diversitet, sepse ai na bën më të fortë dhe më të bashkuar.</p>
                                    <p class="fs-5 mb-4">Ne jemi të përkushtuar për të ofruar një edukatë cilësore, për t'i ndihmuar nxënësit tanë të zhvillohen si individë dhe si qytetarë të përgjegjshëm. Ne inkurajojmë vlerat e respektit, tolerancës dhe punës në ekip, duke i përgatitur ata për sfidat e së ardhmes.</p>
                                    <p class="fs-5 mb-4">Gjimnazi Hivzi Sulejmani është më shumë se një shkollë; është një vend ku ndodhin ëndrrat, ku formohen liderë dhe ku çdo nxënës ka mundësinë të shkëlqejë. Le të vazhdojmë së bashku këtë udhëtim të mrekullueshëm, duke mbështetur njëri-tjetrin dhe duke krijuar një të ardhme më të ndritur për të gjithë.</p>
                                    <p class="fs-5 mb-4">Faleminderit!</p>
                                </section>
                            </article>
                            <!-- Comments section-->
                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Gjimnazi Hivzi Sulejmani 2024</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>


</body>
</html>
