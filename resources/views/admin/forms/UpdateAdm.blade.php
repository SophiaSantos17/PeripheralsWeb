@extends('layouts.admin')
@section('css', 'admin/InsertAdm')
@section('js', 'admin/InsertAdm')
@section('title')@parent Atualizar Administrador @stop


@section('content')

    {{-- Exibição de erros --}}
    <div class="container-error">
        <i class="fa-sharp fa-solid fa-circle-exclamation" style="color: #FFFF;"></i>
        <p id="txt-error">Erro tal</p>
    </div>
    <main class="content-adm">

        @if (!empty($getAdm))
            @foreach ($getAdm as $item)
                <form action="{{ route('update-userAdm', $item['id']) }}" method="POST">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    @method('PATCH')
                    <h2 class="title">Atualizar administrador</h2>

                    <label class="label-field">Nome</label>
                    <input type="text" name="name" data-js="text" value="{{ $item['name'] }}" required
                        class="input-field" placeholder="Nome">

                    <label class="label-field">Email</label>
                    <input type="email" name="email" data-js="email" value="{{ $item['email'] }}" required
                        class="input-field" placeholder="Email">

                    <label class="label-field">Senha</label>
                    <span class="password-container">
                        <input type="password" required data-js="text" name="password" id="inputSenha"
                            placeholder="Digite a Senha">
                        <i id="openEye" onclick="functionEye()" class="fa-solid fa-eye"></i>
                        <i id="closeEye" onclick="functionEye()" class="fa-solid fa-eye-slash"></i>
                    </span>

                    <label class="label-field">Confirme a senha</label>
                    <input type="password" required name="senhaConfirm" data-js="text" class="input-field"
                        placeholder="Senha">

                    <label class="label-field">Poder</label>
                    <select class="select-field" name="poder">
                        @if ($item['poder'] == 9)
                            <option selected value="9">9 - Sysadmin</option>
                            <option value="8">8 - Gerente</option>
                            <option value="7">7 - SAC</option>
                            <option value="6">6 - Repositor</option>
                        @endif
                        @if ($item['poder'] == 8)
                            <option selected value="8">8 - Gerente</option>
                            <option value="9">9 - Sysadmin</option>
                            <option value="7">7 - SAC</option>
                            <option value="6">6 - Repositor</option>
                        @endif
                        @if ($item['poder'] == 7)
                            <option selected value="7">7 - SAC</option>
                            <option value="9">9 - Sysadmin</option>
                            <option value="8">8 - Gerente</option>
                            <option value="6">6 - Repositor</option>
                        @endif
                        @if ($item['poder'] == 6)
                            <option selected value="6">6 - Repositor</option>
                            <option value="9">9 - Sysadmin</option>
                            <option value="8">8 - Gerente</option>
                            <option value="7">7 - SAC</option>
                        @endif
                    </select>

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
                        <button type="button" onclick="window.location.href=`{{ route('page-listAdm') }}`"
                            class="btn-cancel">Cancelar</button>
                    </div>
                </form>
            @endforeach
        @endif
    </main>

@endsection
