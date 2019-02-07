
@extends('layouts.app')
@section('title', 'Página Inicial')

@section('content')

        <div class="pusher">
           <div ng-controller="usersController" ng-init="" ng-cloak></div>
            <div id="users-modal" class="ui fullscreen modal">
            <!-- angularjs content -->
            </div>

            <div id="notes-modal" class="ui fullscreen modal"></div>
            <!-- angularjs content -->
        </div>

        <!-- <h1 class="center">
            Tabela de Usuários (<span id="users-count"></span>)
        </h1> -->

        <div class="ui grid">
            <div class="three wide computer six wide tablet sixteen wide mobile column">
                <div class="one column stackable">
                    <div class="column">
                        <button class="ui fluid button" ng-click="">
                            <i class="erase icon"></i>
                            Limpar Filtros
                        </button>
                    </div>
                </div>

                <div class="filters-container">
                    <div class="ui attached message">
                        <div class="header">
                            Filtros
                        </div>
                    </div>
                    <form class="ui form attached fluid segment">
                        <div class="ui one column doubling stackable grid">
                            <div class="column">
                                <label>ID</label>
                                <input placeholder="Buscar por ID" type="text" ng-model="filter_id" name="filter_id" ng-model-options="{ updateOn: 'change blur' }" ng-change="loadUsers(true, false)">
                            </div>

                            <div class="column">
                                <p>Busque por qualquer coisa</p>
                                <input  type="text" autofocus="true" ng-model="filter_all" ng-model-options="{ updateOn: 'change blur' }" ng-change="loadUsers(true, false)">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="thirteen wide computer ten wide tablet sixteen wide mobile column">
                <div class="one column stackable">
                    <button class="ui blue fluid button" ng-click="exportData($event)">
                        <i class="download icon"></i>
                        Exportar Filtrados para Excel
                    </button>
                </div>

                <div class="overflow-table">
                    <table id="users-table" border="1" class="ui selectable celled table">
                        <thead class="center aligned">
                            <th ng-click="sortBy('id')">
                                ID
                                <span class="sortorder" ng-show="propertyName === 'id'" ng-class="{desc: direction}"></span>
                            </th>
                            <th ng-click="sortBy('name')">
                                Dados da Empresa
                                <span class="sortorder" ng-show="propertyName === 'name'" ng-class="{desc: direction}"></span>
                            </th>
                            <th>
                                Situação
                            </th>
                            <th ng-click="sortBy('username')">
                                Usuário
                                <span class="sortorder" ng-show="propertyName === 'username'" ng-class="{desc: direction}"></span>
                            </th>
                            <th>Ações</th>
                        </thead>

                        <tbody infinite-scroll="loadUsers()" infinite-scroll-disabled="busy">
                            <tr ng-repeat="user in users" class="aligned">
                                <td>user.id</td>
                                <td>
                                    <p class="text-left"><b>Razão Social</b>: user.razao_social<br/>
                                    <b>Nome Fantasia:</b> user.company_name<br/>
                                    <b>CNPJ:</b> user.cnpj</p>
                                </td>
                                <td class="text-left">
                                    <p><b>Situação:</b> user.status<br>
                                    <b>Categoria:</b> user.stage<br/>
                                    <b>Gerente de Conta:</b> user.account_manager</p>
                                    <div class="ui large label">
                                        user.pricing_description
                                    </div>
                                </td>
                                <td class="text-left">
                                    <p><b>Nome:</b> user.name<br/>
                                    <b>Email:</b> user.username<br/>
                                    <b>Tel.:</b> (user.phone_area) user.phone</p>
                                </td>
                                <td width="300">
                                    <div class="ui equal width padded grid user-buttons-table">
                                        <div class="row">
                                            <div class="column">
                                                <button class="ui tiny labeled icon fluid button" title="Ver Detalhes" data-content="Ver Detalhes" data="@{{user.id}}" ng-click="viewDetails($event, user.id)">
                                                    <i class="zoom icon"></i>
                                                    Ver Detalhes
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="column">
                                                <a href="{{URL::to('/user_payments')}}/@{{user.id}}" target="_blank" class="ui tiny labeled icon fluid button" title="Ver Faturas" data-content="Ver Faturas">
                                                    <i class="dollar icon"></i>
                                                    Faturas
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="column">
                                                <button class="ui tiny labeled icon fluid button blue" title="Acessar conta do usuário no Plugg.to" data-content="Acessar conta do usuário no Plugg.to" data="@{{user.id}}" ng-click="loginAsClientBeta($event, user.id)">
                                                    <i class="sign in icon"></i>
                                                    Login Beta
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table> 
                </div>
                
                <div ng-show="busy" class="ui segment">
                    <div class="ui active inverted dimmer">
                        <div class="ui large text loader">Carregando Usuários ...</div>
                    </div>
                    <p style="height:100px;"></p>
                </div>
            </div>
        </div>
    </div>
        
        <!-- JavaScript -->        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ URL::asset('semantic/semantic.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-mask.js') }}"></script>
        <script src="{{ URL::asset('js/alasql.min.js') }}"></script>
        <script src="{{ URL::asset('js/xlsx.core.min.js') }}"></script>
        
        <!-- Default -->
        <script src="{{ URL::asset('js/pluggtoadmin.js?v=7.0') }}"></script>

        <!-- Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
        <script src="{{ URL::asset('js/infinite-scroll.min.js') }}"></script>
        <script src="{{ URL::asset('js/angular/app.js?v=2.0') }}"></script>
    
        <!-- Controllers -->
        <script src="{{ URL::asset('js/angular/messageService.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/modalService.js?v=7.0') }}"></script>
        <script src="{{ URL::asset('js/angular/usersController.js?v=7.0') }}"></script>

    <script>
        $(document).ready(function(){
            $('.semantic-message').insertBefore('.content-div');
        });
    </script>
@endsection