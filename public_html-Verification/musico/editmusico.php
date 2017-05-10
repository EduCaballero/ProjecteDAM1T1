 <?php
require_once '../bbdd.php';
session_start();
if (isset($_SESSION["id"])) {
    if ($_SESSION["tipo"] == "M") {
        if (isset($_POST["update"])) {
            require_once '../upload-profile-img.php';
            updateMusicProfile($_SESSION["id"], $_POST["name"], $_POST["members"], $_POST["gender"], $_POST["city"], $_POST["tlf"], $_POST["web"]);

            if ($_POST["email"] !== '') {
                updateUserEmail($_SESSION["id"], $_POST["email"]);
            }
            if ($_POST["newPass"] !== '') {
                updateUserPass($_SESSION["id"], $_POST["newPass"]);
            }
        }
        $userData = mysqli_fetch_array(getUserDataById($_SESSION["id"]));
        $musicData = mysqli_fetch_array(getMusicDataById($_SESSION["id"]));
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>ConcertPush - Editar perfil</title>
                <link rel="stylesheet" href="../css/font-awesome.css">
                <link rel="stylesheet" href="../css/editprofile.css">
                <link rel="stylesheet" href="../css/intranet.css">
                <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
                <script src="../js/src/jquery-3.1.1.min.js"></script>
                <script src="../js/src/jquery.validate.min.js"></script>
                <script src="../js/src/mobile.js"></script>
                <script src="../js/src/musico-profile.js"></script>
                <script src="../js/src/modal.js"></script>
                <script src="../js/src/profile.js"></script>
            </head>
            <body>
                <header>
                    <?php require_once '../includes/header-intranet.php'; ?>
                </header>
                <div id="container">
                    <div id="profile">
                        <?php require_once '../includes/music-profile.php'; ?>
                    </div>
                    <div id="main">
                        <?php
                        require_once '../includes/img-error-modal.php';
                        if (isset($error_msg)) {
                            echo "<script>enableModal('#img-error-modal')</script>";
                        }
                        ?>
                        <div id="form-container" class="content">
                            <div class="content-container">
                                <h2><span class="fa fa-pencil"></span>Información personal</h2>
                                <form id="musico-profile" class="form-profile" action="" method="POST" enctype="multipart/form-data">
                                    <!-- Input hidden con la ID para la comprobacion de la contraseña -->
                                    <input type="hidden" id="userid" value="<?php echo $_SESSION["id"] ?>">
                                    <div class="form-row">
                                        <label>Nombre Artistico</label><div class="input-wrap">
                                            <input type="text" name="name" value="<?php echo $userData["nombre"] ?>" /></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Numero de Miembros</label><div class="input-wrap">
                                            <input type="text" name="members" value="<?php echo $musicData["n_componentes"] ?>"></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Genero</label><div class="input-wrap">
                                        <select class="genero" name="gender">
                                            <?php
                                            $generos = AllGeneros();
                                            while ($row = mysqli_fetch_array($generos)) {
                                                if ($row["id_genero"] == $musicData["genero"]) {
                                                        echo "<option value='" . $row["id_genero"] . "' selected>" . $row["nombre"] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $row["id_genero"] . "'>" . $row["nombre"] . "</option>";
                                                    }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <label>Provincia</label><div class="input-wrap">
                                            <select class="provincia" name="province">
                                                <?php
                                                $provincias = selectProvincias();
                                                $provMusico = getProvIdByMunicipioId($userData["ciudad"]);
                                                while ($row = mysqli_fetch_array($provincias)) {
                                                    if ($row["id"] == $provMusico) {
                                                        echo "<option value='" . $row["id"] . "' selected>" . $row["provincia"] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $row["id"] . "'>" . $row["provincia"] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Municipio</label><div class="input-wrap">
                                            <select class="ciudad" name="city">
                                                <?php
                                                $municipios = getMunicipiosByProvId($provMusico);
                                                while ($row = mysqli_fetch_array($municipios)) {
                                                    if ($row["id"] == $userData["ciudad"]) {
                                                        echo "<option value='" . $row["id"] . "' selected>" . $row["municipio"] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $row["id"] . "'>" . $row["municipio"] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Teléfono</label><div class="input-wrap">
                                            <input type="text" name="tlf" value="<?php echo $userData["telefono"] ?>"></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Página web</label><div class="input-wrap">
                                            <input type="url" name="web" value="<?php echo $userData["web"] ?>"></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Nuevo email</label><div class="input-wrap">
                                            <input type="email" id="email" name="email"/></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Confirma email</label><div class="input-wrap">
                                            <input type="email" name="confirmEmail"/></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Contraseña actual</label><div class="input-wrap">
                                            <input type="password" id="currentPass" name="currentPass"></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Nueva contraseña</label><div class="input-wrap">
                                            <input type="password" id="newPass" name="newPass"></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Confirma contraseña</label><div class="input-wrap">
                                            <input type="password" name="confirmNewPass"></div>
                                    </div>
                                    <div class="form-row">
                                        <label>Imagen de perfil </label><div class="input-file-wrap">
                                            <div class="btn btn-file">
                                                <i class="fa fa-file-image-o"></i>
                                                <span>Examinar …</span> 
                                                <input type="file" accept="image/*" name="profileImg">
                                            </div>
                                            <div class="img-caption">
                                                <div class="img-caption-name"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label></label><div class="input-wrap">
                                            <input type="submit" name="update" value="Modificar" class="btn btn-submit"/><input type="reset" value="Limpiar" class="btn btn-reset"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <footer class="footer">
                            <?php require_once '../includes/footer.php'; ?>
                        </footer>
                    </div>
                </div>
            </body>
        </html>
        <?php
    } else {
        if ($_SESSION["tipo"] == "M") {
            header("Location: ../musico/editmusico.php");
        } else if ($_SESSION["tipo"] == "F") {
            header("Location: ../fan/editfan.php");
        }
    }
} else {
    header("Location: ../index.php");
}
?>