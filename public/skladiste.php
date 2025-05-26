<!doctype html>
<html lang="hr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Namještaj - Skladišta</title>
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
              <a class="nav-link active" href="skladiste.php">Skladište</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="proizvod.php">Proizvod</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ponuda.php">Ponude</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Skladišta</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Novi unos
        </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Novo skladište</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="unesi_skladiste.php" method="POST">
                <div class="mb-3">
                  <label for="adresa" class="form-label">Adresa</label>
                  <input type="text" class="form-control" id="adresa" name="adresa" required>
                </div>
                <div class="mb-3">
                  <label for="kucnibroj" class="form-label">Kućni broj</label>
                  <input type="text" class="form-control" id="kucnibroj" name="kucnibroj" required>
                </div>
                <div class="mb-3">
                  <label for="brojtelefona" class="form-label">Broj telefona</label>
                  <input type="tel" class="form-control" id="brojtelefona" name="brojtelefona" required>
                </div>
                <div class="mb-3">
                  <label for="ponudaid" class="form-label">Ponuda ID</label>
                  <input type="number" class="form-control" id="ponudaid" name="ponudaid">
                </div>
                <div class="mb-3">
                  <label for="raspolozivostproizvoda" class="form-label">Raspoloživost proizvoda</label>
                  <select class="form-select" id="raspolozivostproizvoda" name="raspolozivostproizvoda" required>
                    <option value="Dostupno">Dostupno</option>
                    <option value="Nedostupno">Nedostupno</option>
                    <option value="Ograničeno">Ograničeno</option>
                  </select>
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
              <th scope="col">ID</th>
              <th scope="col">Adresa</th>
              <th scope="col">Kućni broj</th>
              <th scope="col">Broj telefona</th>
              <th scope="col">Ponuda ID</th>
              <th scope="col">Raspoloživost</th>
              <th scope="col">Akcije</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../includes/db__connection.php");
            
            $query = "SELECT IDSkladiste, Adresa, KucniBroj, BrojTelefona, PonudaID, RaspolozivostProizvoda FROM skladiste";
            
            $result = mysqli_query($db, $query) or die("Greška u SQL upitu");
            while($row = mysqli_fetch_array($result)) {
              echo '
              <tr>
                <td>' . ($row["IDSkladiste"]) . '</td>
                <td>' . ($row["Adresa"]) . '</td>
                <td>' . ($row["KucniBroj"]) . '</td>
                <td>' . ($row["BrojTelefona"]) . '</td>
                <td>' . ($row["PonudaID"]) . '</td>
                <td>' . ($row["RaspolozivostProizvoda"]) . '</td>
                <td>
                  <a href="../utils/obrisi_skladiste.php?id=' . $row["IDSkladiste"] . '" class="btn btn-danger btn-sm">Obriši</a>
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