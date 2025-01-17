@extends('layouts.admin')
@section('css', 'admin/listComentarios')
@section('title')@parent Lista de Comentários @stop

@section('content')
    <main class="container-comentarios">

        <h1>Feedback</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Barra_de_busca -->
        <div id="divBusca">
            <input type="text" id="txtBusca" placeholder="Buscar..." />
            <a id="searchIcon" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>

        <section class="container-filters">
            <button id="btnNewProduto">
                <div class="icon-container">
                    <i class="fa-regular fa-plus"></i>
                </div>
                Novo Produto
            </button>

            <section class="box-input-date">
                <div class="box-ordem box-filter">
                    <label for="inputDateFrom">De:</label>
                    <input type="date" name="date" id="inputDateFrom">
                </div>

                <div class="box-ordem box-filter">
                    <label for="inputDateTo">Até:</label>
                    <input type="date" name="date" id="inputDateTo">
                </div>
            </section>

            <div class="box-ordem box-filter">
                <label for="selectOrdem">Ordenar Por</label>
                <select id="selectOrdem" name="select-ordem">
                    <option>Todos</option>
                    <option value="1">Maior Preço</option>
                    <option value="2">Menor Preço</option>
                    <option value="3">Mais Relevante</option>
                </select>
            </div>

            {{-- TODO: TENTAR TIRAR O LIMPAR FILTROS DE TODAS AS PÁGINAS --}}

            {{-- <div class="container-clean-filters box-filter">
                <button id="btnCleanFilters">
                    Limpar Filtros
                </button>
            </div> --}}
        </section>

        <!--Começo_da_tabela_de_pedidos-->
        <table class="table">
            <!-- Header_da_tabela -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Avaliação</th>
                    <th>Nome</th>
                    <th>Produto</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <!-- Corpo_da_tabela -->
            <tbody>
                <tr>
                    <!-- Conteúdo_da_tabela -->
                    <td>1</td>
                    <td>5 Estrelas</td>
                    <td>Stich</td>
                    <td>Mouse</td>
                    <td>23/02/2023</td>
                    <td>1</td>
                    <td><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                </tr>

            <tbody>
                <!-- Final_do_corpo_da_tabela -->
        </table>
    </main>
@endsection
