<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Soal 1</title>
  </head>
  <body>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <h1>Soal 1a</h1>
                            <p>
                                Buatlah sebuah input text dan button(trigger event) yang jika diisi dengan angka maka akan memberikan  output berupa Bilangan Prima sebanyak angka yang  di inputkan secara berurutan dari angka yang paling kecil sampai angka terbesar. memberikan output 2, 3, 5, 7, 11, 13, 17, 19, 23, 29
                            </p>
                            <form method="POST" action="{{ route('soal-satu')}}">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" name="input" class="form-control">
                                </div>
                                
                                <button  type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <h1>Soal 1b</h1>
                            <p>
                                Buatlah sebuah input text dan button(trigger event) yang jika diisi dengan angka maka akan memberikan output berupa karakter * yang membentuk piramid. Contoh jika inputkan angka 5 maka akan memberikan output seperti pada gambar dibawah.<br>
                                    *<br>
                                    **<br>
                                    *** <br>   
                                    **** <br>
                                ***** <br>
                            </p>
                            <form method="POST" action="{{ route('soal-satu-b')}}">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" name="input" class="form-control">
                                </div>
                                
                                <button  type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>