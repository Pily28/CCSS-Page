<?php
include("ConexionBD.php");
$ObtenerBD = new ConectarBD();
$ObtenerConexion = $ObtenerBD->conex();

if (isset($_POST["CrearUsuario"])) {
  $Nombre = $_POST["nombre"];
  $PrimerApellido = $_POST["PrimerApellido"];
  $SegundoApellido = $_POST["SegundoApellido"];
  $Identificacion = $_POST["Cargo"];
  $Sexo = $_POST["EstadoCivil"];
  $Nacimiento = $_POST["Direccion"];
  $Alergias = $_POST["Correo"];
  $Tratamiento = $_POST["Usuario"];
  $EstadoCivil = $_POST["AnoContrato"];

  $query = "INSERT INTO usuarios (Nombre, `Primer Apellido`, `Segundo apellido`, Identificacion, Sexo, `Fecha de nacimiento`, Alergias, Tratamiento, `Estado civil`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $Sentencia = mysqli_prepare($ObtenerConexion, $query);
  mysqli_stmt_bind_param($Sentencia, "ssssssssi", $Nombre, $PrimerApellido, $SegundoApellido, $Identificacion, $Sexo, $Nacimiento, $Alergias, $Tratamiento, $EstadoCivil);
  mysqli_stmt_execute($Sentencia);
  $Afectado = mysqli_stmt_affected_rows($Sentencia);
  if ($Afectado == 1) {
      echo "<script> alert ('El usuario $Nombre se creó correctamente'); location.href='/Proyecto%20Progra%20III/CrearUsuario.php?CrearUsuario=Crear+Usuario'; </script>";
  } else {
      echo "<script> alert ('ERROR: El usuario $Nombre no se creó correctamente'); location.href='/CrearUsuario.php'; </script>";
  }
  mysqli_stmt_close($Sentencia);
  mysqli_close($ObtenerConexion);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de usuario</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/Registro.css" />
  </head>
  <body>
    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card mt-3">
              <div class="card-body">
                <img
                  class="img-div img-fluid"
                  src="/assets/profile-picture.png"
                  alt="Profile Picture"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Card 1 -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input
                    type="text"
                    id="nombre"
                    class="form-control"
                    placeholder="Ingrese su nombre"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="primer-apellido">Primer Apellido</label>
                  <input
                    type="text"
                    id="primer-apellido"
                    class="form-control"
                    placeholder="Ingrese su primer apellido"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="segundo-apellido">Segundo Apellido</label>
                  <input
                    type="text"
                    id="segundo-apellido"
                    class="form-control"
                    placeholder="Ingrese su segundo apellido"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="identificacion">Identificación</label>
                  <input
                    type="text"
                    id="identificacion"
                    class="form-control"
                    placeholder="Ingrese su ID"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="sexo">Sexo</label>
                  <select
                    id="sexo"
                    class="form-control"
                    onchange="seleccionarSexo()"
                  >
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="birth-date">Fecha de nacimiento</label>
                  <input type="date" id="birth-date" class="form-control" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="alergias">Alergias</label>
                  <div>
                    <input type="radio" id="si" name="alergias" value="Si" />
                    <label for="si">Sí</label>
                    <input type="radio" id="no" name="alergias" value="No" />
                    <label for="no">No</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="tratamiento">Tratamiento</label>
                  <input
                    type="text"
                    id="tratamiento"
                    class="form-control"
                    placeholder="Ingrese el tratamiento"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="estado-civil">Estado Civil</label>
                  <select
                    id="estado-civil"
                    class="form-control"
                    onchange="seleccionarEstadoCivil()"
                  >
                    <option value="1">Casado</option>
                    <option value="2">Soltero</option>
                    <option value="3">Unión Libre</option>
                    <option value="4">Divorciado</option>
                    <option value="5">Separado</option>
                    <option value="6">Viudo</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="buttons d-flex justify-content-center">
            <div class="login-btn me-3 mb-3">
              <button
                type="submit"
                class="btn btn-primary btn-lg"
                id="btn-cancelar"
                onclick="redirigir()"
              >
                Iniciar sesión
              </button>
            </div>
            <div class="cancelar-btn">
              <button
                type="button"
                class="btn btn-primary btn-lg"
                id="btn-cancelar"
                onclick="limpiar()"
              >
                Cancelar
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="/js/Registro.js"></script>
  </body>
</html>