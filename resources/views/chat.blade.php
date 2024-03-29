<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Chatbot GPT</title>
  </head>
  <body>
    <div class="container mt5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="card">
                <div class="card-body">
                    @forelse ($context as $index => $item)
                        @if($index > 0)
                            <p>
                                <strong>{{ $item['role'] }}</strong>
                                <span>{{ $item['content'] }}</span>
                            </p>
                        @endif
                    @empty

                    @endforelse

                </div>
                <div class="card-footer">
                    <form action="{{ route('user.prosesChat') }}" method="POST">
                       @csrf
                        <div class="input-group">
                        <textarea name="content" id="" class="form-control"></textarea>
                        <div class="input-group-append">
                          <button class="btn btn-primary form-control" type="submit">Send</button>
                        </div>
                      </div>
                    </form>
                    <a href="/hapus">hapus</a>
                </div>
              </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
