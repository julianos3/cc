@extends('portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li class="active">Cadastrar</li>
            </ol>
            <div class="page-header-actions">
                <a href="{{ route('portal.condominium.user.index') }}"
                   class="btn btn-sm btn-icon btn-dark waves-effect waves-light waves-round" data-toggle="tooltip"
                   data-original-title="Voltar">
                    <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    Voltar
                </a>
            </div>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <div role="alert" class="alert dark alert-info alert-icon alert-dismissible">
                        <i class="icon md-notifications" aria-hidden="true"></i>
                        <h4>Atenção</h4>
                        <p>
                            Informe o endereço do seu condomínio para se comunicar.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <!-- Steps -->
                                    <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
                                        <div class="step col-md-3 done" data-target="#addressCondominium" role="tab">
                                            <span class="step-number">1</span>
                                            <div class="step-desc">
                                                <span class="step-title">Localizar</span>
                                                <p>Endereço do seu condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3 done" data-target="#info" role="tab">
                                            <span class="step-number">2</span>
                                            <div class="step-desc">
                                                <span class="step-title">Informações</span>
                                                <p>Informações do meu condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3 current" data-target="#config" role="tab">
                                            <span class="step-number">3</span>
                                            <div class="step-desc">
                                                <span class="step-title">Configurar</span>
                                                <p>Configuração de unidades do condomínio</p>
                                            </div>
                                        </div>
                                        <div class="step col-md-3" data-target="#conclusao" role="tab">
                                            <span class="step-number">4</span>
                                            <div class="step-desc">
                                                <span class="step-title">Conclusão</span>
                                                <p>Verificação dos dados cadastrados</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-content">
                                        <div class="wizard-pane active" id="config" role="tabpanel">
                                            <form id="formUnit" method="post" action="{{ route('portal.condominium.create.unit', ['id' => $dados['id']]) }}">
                                                {!! csrf_field() !!}
                                                @include('errors._check')
                                                @include('success._check')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="unit_type_id">Tipo de Unidade</label>
                                                            <select class="form-control" name="unit_type_id" id="unit_type_id" required="required">
                                                                <option value="">Selecione</option>
                                                                @foreach($unitType as $row)
                                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- GARAGEM -->
                                                <div class="row garagem none">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="number_garagem">Número de vagas de Garagem:</label>
                                                            <input type="text" class="form-control" id="number_garagem" name="number_garagem" required="required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- CASA -->
                                                <div class="row casa none">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="casa_ini">Casa inicial:</label>
                                                            <input type="text" class="form-control" id="casa_ini" name="casa_ini" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="casa_fim">Casa Final:</label>
                                                            <input type="text" class="form-control" id="casa_fim" name="casa_fim" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- APARTAMENTO -->
                                                <div class="row apartamento none">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="unidade_andar">Número de unidades por andar:</label>
                                                            <input type="text" class="form-control" id="unidade_andar" name="unidade_andar" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="numero_andar">Número de andares com unidades:</label>
                                                            <input type="text" class="form-control" id="numero_andar" name="number_andar" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row apartamento none">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="number_init">Númeração inicial:</label>
                                                            <input type="text" class="form-control" id="number_init" name="number_init" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row apartamento casa none">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="qtde_block">Quantidade de Blocos</label>
                                                            <input type="text" class="form-control" id="qtde_block" name="qtde_block" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="block_nomemclature_id">Nomemclatura dos Blocos</label>
                                                            <select class="form-control" name="block_nomemclature_id" id="block_nomemclature_id" required="required">
                                                                <option value="">Selecione</option>
                                                                @foreach($blockNomemclature as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn">Adicionar</button>
                                            </form>
                                            @if(!$unit->isEmpty())
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="tablesaw table-striped table-bordered table-hover" data-tablesaw-mode="swipe"
                                                           data-tablesaw-sortable data-tablesaw-minimap >
                                                        <thead>
                                                            <tr>
                                                                <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="persist">Tipo</th>
                                                                <th data-tablesaw-sortable-col data-tablesaw-priority="3">Bloco</th>
                                                                <th data-tablesaw-sortable-col data-tablesaw-priority="2">Unidade</th>
                                                                <th data-tablesaw-sortable-col data-tablesaw-priority="1">
                                                                    <abbr title="Rotten Tomato Rating">Andar</abbr>
                                                                </th>
                                                                <th data-tablesaw-sortable-col data-tablesaw-priority="4">Ação</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($unit  as $row)
                                                            <tr>
                                                                <td>{{ $row->unitType->name }}</td>
                                                                <td>{{ $row->block->name }}</td>
                                                                <td>{{ $row->name }}</td>
                                                                <td>{{ $row->floor }}</td>
                                                                <td><a href="{{route('portal.condominium.unit.destroy',['id'=>$row->id])}}" title="" class="">Excluir</a></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <br />
                                                    <a href="{{ route('portal.condominium.unit.clear', ['condominium_id' => $dados['id']]) }}" class="btn btn-danger">Limpar</a>
                                                    <br /><br />
                                                </div>
                                            </div>
                                            @endif
                                            <button type="button" class="btn">Voltar</button>
                                            <a href="{{ route('portal.condominium.create.finish') }}" class="btn btn-dark">Avançar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection