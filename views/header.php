<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Cámara de Comercio</title>
    <!--<link rel="stylesheet" href="http://localhost/cursoscamara/content/styles/style.css">-->
    <link rel="stylesheet" href="<?= Config::PATH_CSS ?>">
    <link rel="icon" href="<?= Config::PATH_IMG . "icon.jpg" ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav class="head">
        <a href="<?= Config::URL_BASE?>">
            <img src="<?= Config::PATH_IMG . "logo.jpg" ?>" alt="" class="image100">
        </a>
        <?php if (isset($_SESSION["verified"])) { ?>
            <div class="admin_nav">
                <div>Bienvenido, <?= $_SESSION["name"] ?? '' ?></div>
                <div>
                    <a href="<?= Config::URL_BASE.'courses/editCourses'?>" class="admin_link_edit">Editar cursos</a>
                    <a href="<?= Config::URL_BASE.'login/new'?>" class="admin_link_new">Nuevo usuario</a>
                    <a href="<?= Config::URL_BASE.'login/cerrar'?>"class="admin_link_close">Cerrar sesión</a>
                </div>
            </div>
        <?php } else { ?>
            <a href="<?= Config::PATH_LOGIN ?>" class="login">
                <p>Login</p>
            </a>
        <?php } ?>
    </nav>