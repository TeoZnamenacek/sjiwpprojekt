<!doctype html>
<html lang="hr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Namještaj - Ponude</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
        <a class="navbar-brand" href="#">Namještaj</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Kupac</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="skladiste.php">Skladište</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="proizvod.php">Proizvod</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="ponuda.php">Ponude</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Ponude</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Novi unos
        </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nova ponuda</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="unesi_ponudu.php" method="POST">
                <div class="mb-3">
                  <label for="cijena" class="form-label">Cijena (€)</label>
                  <input type="number" step="0.01" class="form-control" id="cijena" name="cijena" required>
                </div>
                <div class="mb-3">
                  <label for="kolicinaproizvoda" class="form-label">Količina proizvoda</label>
                  <input type="number" class="form-control" id="kolicinaproizvoda" name="kolicinaproizvoda" required>
                </div>
                <div class="mb-3">
                  <label for="popust" class="form-label">Popust (%)</label>
                  <input type="number" step="0.01" class="form-control" id="popust" name="popust" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                  <button type="submit" class="btn btn-primary">Spremi</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="table-light">
            <tr>
              <th scope="col">ID ponude</th>
              <th scope="col">Cijena (€)</th>
              <th scope="col">Količina proizvoda</th>
              <th scope="col">Popust (%)</th>
              <th scope="col">Akcije</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../includes/db__connection.php");
            
            $query = "SELECT IDPonuda, Cijena, KolicinaProizvoda, Popust FROM ponuda";
            
            $result = mysqli_query($db, $query) or die("Greška u SQL upitu");
            while($row = mysqli_fetch_array($result)) {
              echo '
              <tr>
                <td>' . ($row["IDPonuda"]) . '</td>
                <td>' . ($row["Cijena"]) . ' €</td>
                <td>' . ($row["KolicinaProizvoda"]) . '</td>
                <td>' . ($row["Popust"]) . ' </td>
                <td>
                  <a href="obrisi_ponudu.php?IDPonuda=' . $row["IDPonuda"] . '" class="btn btn-danger btn-sm">Obriši</a>
                </td>
              </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>

      <footer class="py-3 my-4">
        <p class="text-center text-muted">© 2025 Namještaj, d.o.o.</p>
      </footer>
    </div>

  </body>
</html>