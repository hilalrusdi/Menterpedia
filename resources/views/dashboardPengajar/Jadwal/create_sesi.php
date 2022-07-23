<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="create_sesi.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container position-absolute top-50 start-50 translate-middle ">
      <div class="card p-4 bg-card">
        <div class="card-title">
          <h3>Tambah Sesi Pembelajaran</h3>   
        </div>

        <form action="">
          <div class="row">
            <div class="col-6 card-body">
              <div style="height: 23.5vh;"">
                <img src="img_not_found.png" id="frame" class="h-100 img-fluid mb-4"  alt="">
              </div>
              <div class="">
                <label for="formFile" class="form-label mt-5 fs-4">Tambahkan Tumbnail</label>
                  <input class="form-control" type="file" id="formFile" onchange="preview()">
              </div>
            </div>
            <div class="col-6 card-body">
              <div class="input-group mb-3 search-form">
                <input type="text" class="form-control form-input" placeholder="Kategori" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="left-pan" id="basic-addon2"><i class="bi bi-plus-circle-fill"></i></span>
              </div>
              <div class="input-group mb-3 search-form">
                <input type="text" class="form-control form-input" placeholder="Harga" aria-label="Recipient's username" aria-describedby="basic-addon2">
              </div>
              <div class="input-group mb-3 search-form">
                <input type="text" class="form-control form-input bg-input" placeholder="Jadwal" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="left-pan" id="basic-addon2"><i class="bi bi-calendar3"></i></span>
              </div>
              <div class="text-center mb-3">
                <div class="btn-group ">
                  <input type="radio" class="btn-check rounded rounded-1" name="options" id="option1" autocomplete="off" checked />
                  <label class="btn btn-secondary" for="option1">Senin<br>17/08/22</label>
                
                  <input type="radio" class="btn-check rounded rounded-1 " name="options" id="option2" autocomplete="off" />
                  <label class="btn btn-secondary" for="option2">Senin<br>17/08/22</label>
                
                  <input type="radio" class="btn-check rounded rounded-1 " name="options" id="option3" autocomplete="off" />
                  <label class="btn btn-secondary" for="option3">Senin<br>17/08/22</label>
                </div>
              </div>
              <div class="input-group search-form">
                <input type="text" class="form-control form-input" placeholder="Media Belajar" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="left-pan" id="basic-addon2"><i class="bi bi-plus-circle-fill"></i></span>
              </div>
              
              
            </div>
          </div>
          
        <div class="form-floating">
          <textarea class="w-100 mb-3 border form-control" name="" placeholder="Deskripsi" id="deskripsi" cols="10" rows="7" style="height: 15vh;"></textarea>
          <label for="deskripsi">Deskripsi</label>
        </div>
        

        <button type="submit" class="btn btn-primary w-50 rounded mx-auto d-block">Simpan</button>
        </form>



        
      </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="review_image.js"></script>

  </body>
</html>