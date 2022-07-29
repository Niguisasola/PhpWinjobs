<?php
include './services/connection.php';

//consulta SQL
$id = $_GET['id'];
$sql = 'SELECT * FROM WinJobs WHERE id=' . $id;
$resultado = $conn->query($sql);
//Data From POST
$empleo = $_POST['empleo'];
$empresa = $_POST['empresa'];
$descripcion = $_POST['descripcion'];
$isbn = $_POST['isbn'];
$img = $_POST['img'];
//consulta SQL
$sql = "INSERT INTO winjobs (empleo, empresa, descripcion, isbn, img) VALUES('$empleo', '$empresa', '$descripcion', '$isbn', '$img')";
$resultado = $conn->query($sql);
if ($resultado === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <title>Album example · Bootstrap v5.2</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div class="test-background-in collapse p-2 text-dark bg-opacity-50" id="navbarHeader">
      <div class="container bodycont">

        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About us</h4>
            <p class="text-black">WinJobs nace en busca de la necesidad de eliminar la brecha de género en el sector tecnológico y ayudar a las mujeres a encontrar un empleo seguro. Es un proyecto pensado por y para las feminidades; así como también para las empresas que quieran contribuir a este cambio social que ya es inminente. Su nombre es un juego de palabras en inglés, "Win Jobs" o "Woman in Jobs" y si bien en principio nuestro proyecto se enfoca específicamente hacia las mujeres, esperamos a corto plazo poder expandir nuestra propuesta hacia todas las colectividades LGTBQ+. Esperamos que encuentren aquí aquello que están buscando!</p>
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
    <div class="test-background-out navbar navbar-dark text-white bg-opacity-75 shadow-sm">
      <a href="./index.php" class="navbar-brand d-flex align-items-center">
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
  <main>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php //Entrega Resultado
          while ($row = $resultado->fetch_assoc()) {
          ?>
            <!-- -->
            <div class="col">
              <div class="card shadow-sm">
                <img class="bd-placeholder-img card-img-top img-job-cover" src="<?php echo $row['img'] ?>" alt="" preserveAspectRatio="xMidYMid slice" focusable="false" srcset="">
                </a>
                <div class="card-body">
                  <h4 class="card-text"> <?php echo $row['empleo'] ?></h4>
                  <p class="card-text"> <?php echo $row['descripcion'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="job.php?id=<?php echo $row['id'] ?>">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      </a>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <!-- -->
          <?php
          }
          $conn->close();
          ?>
        </div>
      </div>
    </div>
  </main>
  <footer class="fixed-bottom text-muted p-3 mb-2 test-background-out text-dark">
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