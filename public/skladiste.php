<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Skladište</title>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navigacija</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Kupac</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="skladiste.php">Skladište</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="proizvod.php">Proizvod</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ponuda.php">Ponude</a>
      </li>
    </ul>
  </div>
</nav>

  </head>
  <body>
  

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Novi unos
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Podaci o skladištu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="unesi_skladiste.php" method="POST">
  <div class="mb-3">
    <label for="adresa" class="form-label">Adresa</label>
    <input type="text" class="form-control" id="adresa" name ="adresa">
  </div>
  <div class="mb-3">
    <label for="kucnibroj" class="form-label">Kučni broj</label>
    <input type="text" class="form-control" id="kucnibroj" name="kucnibroj">
  </div>
  <div class="mb-3">
  <label for="brojtelefona" class="form-label">Broj telefona</label>
  <input type="text" class="form-control" id="brojtelefona" name="brojtelefona">
  </div>
  <div class="mb-3">
  <label for="ponudaid" class="form-label">Ponuda ID</label>
  <input type="text" class="form-control" id="ponudaid" name="ponudaid">
  </div>
  <div class="mb-3">
  <label for="raspolozivostproizvoda" class="form-label">Raspoloživost proizvoda</label>
  <input type="text" class="form-control" id="raspolozivostproizvoda" name="raspolozivostproizvoda">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="submit" class="btn btn-primary">Spremi</button>
      </div>
      </form>
    </div>
  </div>
</div>


  <table class="table">
  
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Adresa</th>
        <th scope="col">Kučni broj</th>
        <th scope="col">Broj telefona</th>
        <th scope="col">Ponuda ID</th>
        <th scope="col">Raspoloživost proizvoda</th>
        </tr>
  </thead>
  <tbody>
   




    <?php
    include("../includes/db__connection.php");
    
    $query = "SELECT IDSkladiste, Adresa, KucniBroj, BrojTelefona, PonudaID, RaspolozivostProizvoda FROM skladiste";
    
    $result = mysqli_query($db, $query) or die ("Greska u SQLu");
    while($row = mysqli_fetch_array($result))
    {
        echo'
        <tr>
            <td>' . $row["IDSkladiste"]. '</td>
            <td>' . $row["Adresa"]. '</td>
            <td>' . $row["KucniBroj"]. '</td>
            <td>' . $row["BrojTelefona"]. '</td>
            <td>' . $row["PonudaID"]. '</td>
            <td>' . $row["RaspolozivostProizvoda"]. '</td>
        </tr>';
    }
    ?>
  </tbody>
  </table>


 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>


  <div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
    <p class="text-center text-muted">© 2021 Company, Inc</p>
  </footer>
</div>
</html>