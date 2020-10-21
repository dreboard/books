<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css?v=205') }}" rel="stylesheet">

    </head>
    <body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Dev-PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ext-link" href="https://github.com/dreboard/books">Code</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div id="app" class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">Books</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a class="ext-link" href="https://github.com/dreboard/books">Search Google Books</a>
                </p>

                <hr>

                @if(isset($books))
                    <table id="booksTbl" class="table">
                        <thead>
                        <tr>
                            <th>title</th>
                            <th>previewLink</th>
                            <th>contentVersion</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse  ($books as $item)
                            <tr>
                                <td>
                                    @foreach ($item['volumeInfo']['industryIdentifiers'] as $book)
                                        <a href="{{route('book', ['id' => $book->identifier, 'search' => $search])}}">
                                            {{ $book->identifier}}
                                        </a>
                                        <p>This is book {{ $book->identifier }}</p>
                                    @endforeach
                                    <a href="{{route('book', ['id' => $book->identifier, 'search' => $search])}}">
                                        {{ $item['volumeInfo']['title'] }}
                                    </a>
                                </td>
                                <td><a class="ext-link" href="{{$item['volumeInfo']['previewLink']}}">Preview</a></td>
                                <td>{{ $item['volumeInfo']['contentVersion'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Items</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>title</th>
                            <th>previewLink</th>
                            <th>contentVersion</th>
                        </tr>
                        </tfoot>
                    </table>
                @else
                    <p>Please use search form</p>
                @endif

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">

                        <form class="form-inline" action="{{url('/search')}}" method="POST">
                            <label class="sr-only" for="inlineFormInputName2">Name</label>
                            @csrf
                            <input type="text" name="search" class="form-control" id="inlineFormInputName2" placeholder="Search for...">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>

            </div>



        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <book></book>
    <div class="modal fade" id="bookModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your DEV-PHP <?php echo date('Y'); ?> | Build v{{ Illuminate\Foundation\Application::VERSION }}</p>

        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

    </body>
</html>
