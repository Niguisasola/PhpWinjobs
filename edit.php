<?php
include './services/connection.php';

//consulta SQL
$id = $_GET['id'];
$sql = 'SELECT * FROM WinJobs WHERE id=' . $id;
$resultado = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="./css/custom.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<body>

<header>
    <div class="fixed-topcollapse bg-warning p-2 text-dark bg-opacity-50" id="navbarHeader">
      <div class="container bodycont">

        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About us</h4>
            <p class="text-muted">WinJobs nace en busca de la necesidad de eliminar la brecha de género en el sector tecnológico y ayudar a las mujeres a encontrar un empleo seguro. Es un proyecto pensado por y para las feminidades; así como también para las empresas que quieran contribuir a este cambio social que ya es inminente. Su nombre es un juego de palabras en inglés, "Win Jobs" o "Woman in Jobs" y si bien en principio nuestro proyecto se enfoca específicamente hacia las mujeres, esperamos a corto plazo poder expandir nuestra propuesta hacia todas las colectividades LGTBQ+. Esperamos que encuentren aquí aquello que están buscando!</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Contacto</a></li>
              <li><a href="#" class="text-white">Favoritos</a></li>
              <li><a href="#" class="text-white">Search</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-warning text-white bg-opacity-75 shadow-sm">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
          <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
          <circle cx="12" cy="13" r="4" />
        </svg>
        <strong>Woman in Jobs</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    </div>
  </header>


  <div class="container">
    <main>


      <div class="row g-5">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Crear Empleo</h4>
          <?php //Entrega Resultado
          while ($row = $resultado->fetch_assoc()) {
          ?>

            <form action="edit-job.php" method="post" class="needs-validation" novalidate>
              <div class="row g-3">
                <input type="text" class="form-control visually-hidden" id="id" name="id" placeholder="" value="<?php echo $row['id'] ?>" readonly>

                <div class="col-12">
                  <label for="empleo" class="form-label">Empleo</label>
                  <input type="text" class="form-control" id="empleo" name="empleo" placeholder="" value="<?php echo $row['empleo'] ?>" required>
                </div>
                <div class="col-12">
                  <label for="empresa" class="form-label">Empresa</label>
                  <input type="text" class="form-control" id="empresa" name="empresa" placeholder="" value="<?php echo $row['empresa'] ?>" required>
                </div>
                <div class="col-12">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="textarea" class="form-control" id="descripcion" name="descripcion" placeholder="" value="<?php echo $row['descripcion'] ?>" required>
                </div>
                <div class="col-12">
                  <label for="isbn" class="form-label">ISBN</label>
                  <input type="text" class="form-control" id="isbn" name="isbn" placeholder="" value="<?php echo $row['isbn'] ?>" required>
                </div>
                <div class="col-12">
                  <label for="img" class="form-label">Imagen</label>
                  <input type="text" class="form-control" id="img" name="img" placeholder="" value="<?php echo $row['img'] ?>" required>
                </div>


              </div>
              <button class="w-100 btn btn-primary btn-lg" type="submit">Crear Empleo</button>
            <?php
          }
          $conn->close();
            ?>
            </form>
        </div>
      </div>
    </main>

    <footer class="fixed-bottom text-muted p-3 mb-2 bg-warning bottom-0 text-dark bg-opacity-50">
      <div class="container">
        <p class="float-end mb-1">
          <a href="index.php">Back to home</a>
        </p>
        <div className="mb-1 social float-start">
          <a href="https://facebook.com/"><img src="./iconos/facebook.svg" alt="Bootstrap"></a>
          <a href="https://www.instagram.com/"><img src="./iconos/instagram.svg" alt="Bootstrap"></span></a>
          <a href="https://www.linkedin.com/"><img src="./iconos/linkedin.svg" alt="Bootstrap"></span></a>
          <a href="https://google.com/"><img src="./iconos/google.svg" alt="Bootstrap"></a>
        </div>
        <p class="mb-0 text-white">&copy; Winjob tiene todos los derechos reservados</p>
      </div>
    </footer>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>

