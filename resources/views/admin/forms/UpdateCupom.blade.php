@extends('layouts.admin')
@section('css', 'admin/InsertCupom')
@section('js', 'admin/InsertAdm')
@section('title')@parent Inserir Cupom @stop


@section('content')

    {{-- Exibição de erros --}}
    @if ($errors->any())
        <div class="container-error">
            <i class="fa-sharp fa-solid fa-circle-exclamation" style="color: #FFFF;"></i>
            @foreach ($errors->all() as $error)
                <p id="txt-error">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif

    <main class="content-cupom">
        @if (isset($getCupom))
            @foreach ($getCupom as $item)
                <form action="{{ route('update-cupom', $item['id']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <h2 class="title">Atualizar Cupom</h2>

                    <label class="label-field">Nome</label>
                    <input type="text" name="nome" data-js="text" value="{{$item['nome']}}" required class="input-field" placeholder="Nome">

                    <label class="label-field">Código</label>
                    <input type="text" name="codigo" data-js="text" value="{{$item['codigo']}}" required class="input-field" placeholder="Código">

                    <div class="row-input">
                        <label class="label-field">Data de Expiração
                            <input type="date" name="data_expiracao" 
                            value="{{$item['data_expiracao']}}" data-js="text" required class="input-field"
                            placeholder="Expiração">
                        </label>

                        <label class="label-field">Porcentagem
                            <input type="text" name="porcentagem" 
                            value="{{$item['porcentagem']}}" data-js="money" required class="input-field"
                            placeholder="Porcentagem de Desconto">
                        </label>
                    </div>

                    <label class="label-field">Status</label>
                    <select class="select-field" name="status">
                        @if ($item['status'] == 1)
                            <option selected value="1">1 - Ativo</option>
                            <option value="0">0 - Inativo</option>
                        @endif

                        @if ($item['status'] == 0)
                            <option value="1">1 - Ativo</option>
                            <option selected value="0">0 - Inativo</option>
                        @endif
                    </select>

                    <div class="box-buttons">
                        <button type="submit" class="btn-submit">Atualizar</button>
                        <button type="button" onclick="window.location.href=`{{ route('page-listCupons') }}`"
                            class="btn-cancel">Cancelar</button>
                    </div>
                </form>
            @endforeach

        @endif

    </main>

@endsection
