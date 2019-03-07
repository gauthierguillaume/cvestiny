
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">CVestiny</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">Qui sommes-nous ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>


                <?php if (is_logged()){ ?>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo base_url('/pages/insertcv');
                    ?>">Insérer votre CV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo base_url('/pages/disconnect'); ?>">Déconnexion</a>
                    </li>
                    <li class="nav-item">
                        <p> <?php echo '<div class="blase" style="text-transform: uppercase; font-weight: bolder">'."bonjour $infos". '</div>'; ?></p>
                    </li>
                <?php  } else { ?>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url('/pages/register'); ?>">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url('/pages/login'); ?>">Connexion</a>
                </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Masthead -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">Optimisez vos recrutements</h1>
                <hr class="divider my-4">
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5">Une meilleure gestion pour votre entreprise</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">En savoir plus</a>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">Avec CVestiny, gagné en efficacité lors de vos recrutements !</h2>
                <hr class="divider light my-4">
                <p class="text-black-50 mb-4"> Notre plate-forme permet de trouver du travail en un clic !</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Commencer !</a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<!-- Services Section -->
<section class="page-section" id="services">
    <div class="container">
        <h2 class="text-center mt-0">Comment ça marche ?</h2>
        <hr class="divider my-4">
        <div class="row">

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Inscription</h3>
                        <p class="text-muted mb-0">Inscrivez-vous, c'est simple et rapide !</p>
                        <?php if (!is_logged()){ ?>
                        <a href="<?php echo base_url('/pages/register'); ?>" > <input class="btn btn-primary" type="button" value="Inscription"> </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Connexion</h3>
                        <p class="text-muted mb-0">Connectez-vous pour partager vos CV !</p>
                        <?php if (!is_logged()){ ?>
                            <a href="<?php echo base_url('/pages/login'); ?>" > <input class="btn btn-primary"
                             type="button" value="Connexion"> </a>
                      <?php } ?>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Insérer</h3>
                        <p class="text-muted mb-0">Renseigné vos compétences, formations puis partagé votre CV !</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">CVestiny</h3>
                        <p class="text-muted mb-0">Prenez votre destin en main !</p>
                    </div>
                </div>



        </div>
    </div>
</section>



<!-- Contact Section -->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Prêt a démarrer une nouvelle vie ?</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-5"></p>
            </div>
        </div>

    </div>
</section>

