<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-utilities.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-grid.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-reboot.css') }}">
        <title>Paginação</title>


    </head>
    <body class="">
        <div class="container p-3 mt-4 shadow rounded">
            <div class="card text-center">
                <div class="card-header">
                    Tabela de Clientes
                </div>
                <div class="card-body">
                    <h5>Exibindo {{ $clientes->count() }} Clientes de {{ $clientes->total() }} ({{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})</h5>
                  <table class="table table-hover table-light">
                      <thead>
                          <th>#</th>
                          <th>Nome</th>
                          <th>Sobrenome</th>
                          <th>E-mail</th>
                      </thead>
                      <tbody>
                          @foreach($clientes as $cliente)
                          <tr>
                              <td>{{ $cliente->id }}</td>
                              <td>{{ $cliente->nome }}</td>
                              <td>{{ $cliente->sobrenome }}</td>
                              <td>{{ $cliente->email }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
                <div class="card-footer">
                    {{ $clientes->links() }}

                    {{-- <nav aria-label="Page navigation example">
                      <ul class="pagination pagination-sm">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">Previous</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>

                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav> --}}
                </div>
            </div>
        </div>


        <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.esm.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    </body>
</html>
