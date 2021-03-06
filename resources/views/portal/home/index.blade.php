@extends('portal')

@section('content')

    <div class="page animsition">
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <form class="page-search-form" role="search">
                        <div class="input-search input-search-dark">
                            <i class="input-search-icon md-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="inputSearch" name="search" placeholder="Buscar Usuários">
                            <button type="button" class="input-search-close icon md-close" aria-label="Close"></button>
                        </div>
                    </form>
                    <div class="nav-tabs-horizontal">
                        <div class="dropdown page-user-sortlist">
                            Ordenar Por:
                            <a class="dropdown-toggle inline-block" data-toggle="dropdown" href="#" aria-expanded="false">
                                Nome
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animation-scale-up animation-top-right animation-duration-250" role="menu">
                                <li class="active" role="presentation"><a href="javascript:void(0)">Nome</a></li>
                                <li role="presentation"><a href="javascript:void(0)">Data de Cadastro</a></li>
                            </ul>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                                <a data-toggle="tab" href="#all_contacts" aria-controls="all_contacts" role="tab">
                                    Todos
                                </a>
                            </li>
                            <li role="presentation">
                                <a data-toggle="tab" href="#my_contacts" aria-controls="my_contacts" role="tab">
                                    Síndico / Subsindico
                                </a>
                            </li>
                            <li role="presentation">
                                <a data-toggle="tab" href="#google_contacts" aria-controls="google_contacts" role="tab">
                                    Funcionários
                                </a>
                            </li>
                            <li class="dropdown" role="presentation">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <span class="caret"></span>Contacts </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a data-toggle="tab" href="#all_contacts"
                                                               aria-controls="all_contacts"
                                                               role="tab">All Contacts</a></li>
                                    <li class="active" role="presentation"><a data-toggle="tab" href="#my_contacts"
                                                                              aria-controls="my_contacts"
                                                                              role="tab">My Contacts</a></li>
                                    <li role="presentation"><a data-toggle="tab" href="#google_contacts"
                                                               aria-controls="google_contacts"
                                                               role="tab">Google Contacts</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane animation-fade active" id="all_contacts" role="tabpanel">
                                <ul class="list-group">
                                    @foreach($dados as $row)
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar">
                                                    <img src="{{ asset('portal/global/portraits/1.jpg') }}" alt="...">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    {{ $row->user->name }}
                                                    <small>{{ $row->userRoleCondominium->name }}</small>
                                                </h4>
                                                <p>
                                                    <i class="icon icon-color md-pin" aria-hidden="true"></i> Street
                                                    4425 Golf Course Rd
                                                </p>
                                                <div>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-email" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-smartphone" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-twitter" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-facebook" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-dribbble" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <button type="button" class="btn btn-primary btn-sm">Visualizar</button>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li class="list-group-item hidden">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-away">
                                                    <img src="{{ asset('portal/global/portraits/2.jpg') }}" alt="...">
                                                    <i class="avatar avatar-busy"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    Mary Adams
                                                    <small>Last Access: 2 hours ago</small>
                                                </h4>
                                                <p>
                                                    <i class="icon icon-color md-pin" aria-hidden="true"></i> Street
                                                    1391 Depaul Dr
                                                </p>
                                                <div>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-email" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-smartphone" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-twitter" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-facebook" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-dribbble" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <button type="button" class="btn btn-primary btn-sm">Follow</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item hidden">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-busy">
                                                    <img src="{{ asset('portal/global/portraits/3.jpg') }}" alt="...">
                                                    <i class="avatar avatar-busy"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    Caleb Richards
                                                    <small>Last Access: 3 hours ago</small>
                                                </h4>
                                                <p>
                                                    <i class="icon icon-color md-pin" aria-hidden="true"></i> Street
                                                    5067 E Center St
                                                </p>
                                                <div>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-email" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-smartphone" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-twitter" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-facebook" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-dribbble" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="icon md-check" aria-hidden="true"></i>Following
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <nav>
                                    <ul data-plugin="paginator" data-total="50" data-skin="pagination-no-border">
                                    </ul>
                                </nav>
                            </div>
                            <div class="tab-pane animation-fade" id="my_contacts" role="tabpanel">
                                <ul class="list-group">
                                    <li class="list-group-item hidden">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('portal/global/portraits/13.jpg') }}" alt="...">
                                                    <i></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    Sarah Graves
                                                    <small>Last Access: 1 hour ago</small>
                                                </h4>
                                                <p>
                                                    <i class="icon icon-color md-pin" aria-hidden="true"></i> Street
                                                    4190 W Lone Mountain Rd
                                                </p>
                                                <div>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-email" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-smartphone" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-twitter" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-facebook" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-dribbble" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <button type="button" class="btn btn-primary btn-sm">Follow</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <nav>
                                    <ul data-plugin="paginator" data-total="50" data-skin="pagination-no-border">
                                    </ul>
                                </nav>
                            </div>
                            <div class="tab-pane animation-fade" id="google_contacts" role="tabpanel">
                                <ul class="list-group">
                                    <li class="list-group-item hidden">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('portal/global/portraits/8.jpg') }}" alt="...">
                                                    <i></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    Heather Harper
                                                    <small>Last Access: 1 hour ago</small>
                                                </h4>
                                                <p>
                                                    <i class="icon icon-color md-pin" aria-hidden="true"></i> Street
                                                    4393 Kelly Dr
                                                </p>
                                                <div>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-email" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color md-smartphone" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-twitter" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-facebook" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="text-action" href="javascript:void(0)">
                                                        <i class="icon icon-color bd-dribbble" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="icon md-check" aria-hidden="true"></i>Following
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <nav>
                                    <ul data-plugin="paginator" data-total="50" data-skin="pagination-no-border">
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panel -->
        </div>
    </div>
    <a href="{{ route('portal.condominium.user.create') }}" title="Cadastrar" class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>



    <!--
    <h2>Usuário do Condominio</h2>
    <a href="{{ route('portal.condominium.user.create') }}" class="btn btn-default">Cadastrar</a>
    <br/>
    <br/>
    @include('errors._check')

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>ID Usuário</th>
            <th>ID Nível Usuário</th>
            <th>ID Condominio</th>
            <th class="col-sm-2">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dados as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->user->name }}</td>
                <td>{{ $row->userRoleCondominium->name }}</td>
                <td>{{ $row->condominium->name }}</td>
                <td>
                    <a href="{{route('portal.condominium.user.edit',['id'=>$row->id])}}" title=""
                       class="btn btn-default btn-sm">Editar</a>
                    <a href="{{route('portal.condominium.user.destroy',['id'=>$row->id])}}" title=""
                       class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
    -->

@endsection