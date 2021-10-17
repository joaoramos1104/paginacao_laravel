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
                    <h4>Tabela de Clientes</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title" id="cardTitle"></h5>
                  <table class="table table-hover table-light" id="tabelaClientes">
                      <thead>
                          <th>#</th>
                          <th>Nome</th>
                          <th>Sobrenome</th>
                          <th>E-mail</th>
                      </thead>
                      <tbody>

                      </tbody>
                  </table>
                </div>
                <div class="card-footer">

                    <nav id="paginator">
                      <ul class="pagination pagination-sm">
                      </ul>
                    </nav>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>


        <script type="text/javascript">

            function getItemProximo(data){
                i = data.current_page + 1;
                if (data.last_page == data.current_page)
                    s = '<li class="page-item disabled">';
                else
                    s = '<li class="page-item">';
                    s += '<a class="page-link rounded-pill shadow m-1" ' + ' pagina="' + i + '" href="javascript:void(0)">Próximo</a></li>';
                    return s;
            }

            function getItemAnterior(data){
                i = data.current_page - 1;
                if (1 == data.current_page)
                    s = '<li class="page-item disabled">';
                else
                    s = '<li class="page-item">';
                    s += '<a class="page-link rounded-pill shadow m-1" ' + ' pagina="' + i + '" href="javascript:void(0)">Anterior</a></li>';
                    return s;
            }


            function getItem(data, i){
                if (i == data.current_page)
                    s = '<li class="page-item active">';
                else
                    s = '<li class="page-item">';
                    s += '<a class="page-link rounded-pill shadow m-1" ' + ' pagina="' + i + '" href="javascript:void(0)">' + i + '</a></li>';
                    return s;
            }

            function montarPaginator(data){
                $("#paginator>ul>li").remove();
                $("#paginator>ul").append(getItemAnterior(data));

                n = 10;

                if (data.current_page - n/2 <= 1)
                    inicio = 1;
                else if(data.last_page - data.current_page < n)
                    inicio = data.current_page - n +1;
                else
                    inicio = data.current_page - n/2;



                fim = inicio + n - 1;

                for (let i = inicio; i <= fim; i++) {
                    s = getItem(data, i);
                    $("#paginator>ul").append(s);
                }
                $("#paginator>ul").append(getItemProximo(data));
            }


            function montarLinhas(cliente){
               return '<tr>' +
                    '<td>'+cliente.id+'</td>'+
                    '<td>'+cliente.nome+'</td>'+
                    '<td>'+cliente.sobrenome+'</td>'+
                    '<td>'+cliente.email+'</td>'+
                '</tr>';
            }

            function montarTabela(data){
                $("#tabelaClientes>tbody>tr").remove();
                for (i = 0; i < data.data.length; i++) {
                    s = montarLinhas(data.data[i]);
                    $("#tabelaClientes>tbody").append(s);

                }
            }

            function carregarClientes(pagina){
                $.get( '/json', {page: pagina}, function(resp){
                    // console.log(resp);
                    montarTabela(resp);
                    montarPaginator(resp);

                    $("#paginator>ul>li>a").click(function(){
                        carregarClientes($(this).attr('pagina'));
                    });
                    $("#cardTitle").html("Exibindo "+ resp.per_page + " Clientes de " + resp.total + "(" + resp.from + " a " + resp.to + ")");
                });
            }

            $(function(){
                carregarClientes(1);
            });
        </script>
    </body>
</html>
