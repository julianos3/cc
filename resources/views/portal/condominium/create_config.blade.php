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
                                        <div class="wizard-pane active" id="info" role="tabpanel">
                                            <form id="formCondominium" method="post" action="{{ route('portal.condominium.update.info', ['id' => $dados['id']]) }}">
                                                {!! csrf_field() !!}
                                                @include('errors._check')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="name">Nome do Condomínio</label>
                                                            <input type="text" class="form-control" id="name" name="name" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="finality_id">Finalidade</label>
                                                            <select class="form-control" name="finality_id" id="finality_id" required="required">
                                                                <option value="">Selecione</option>
                                                                @foreach($finality  as $row)
                                                                <option value="{{ $row->id }}" @if($row['id'] === $dados['finality_id']) selected @endif>{{ $row->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="cnpj">CNPJ</label>
                                                            <input type="text" class="form-control" id="cnpj" name="cnpj" data-plugin="formatter" data-pattern="[[99]].[[999]].[[999]]/[[9999]]-[[99]]" placeholder="99.999.999/9999-99" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn">Voltar</button>
                                                <button type="submit" class="btn">Avançar</button>
                                            </form>
                                        </div>
                                        <div class="wizard-pane active" id="config" role="tabpanel">
                                            <form id="formUnit" method="post" action="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="id_unit_type">Tipo de Unidade</label>
                                                            <select class="form-control" name="id_unit_type" id="id_unit_type" required="required">
                                                                <option value="">Selecione</option>
                                                                <option value="1">Apartamento</option>
                                                                <option value="2">Casa</option>
                                                                <option value="2">Garagem</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="cnpj">Número de unidades por andar:</label>
                                                            <input type="text" class="form-control" id="cnpj" name="cnpj" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="cnpj">Número de andares com unidades:</label>
                                                            <input type="text" class="form-control" id="cnpj" name="cnpj" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="cnpj">Númeração inicial:</label>
                                                            <input type="text" class="form-control" id="cnpj" name="cnpj" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="cnpj">Quantidad de Blocos</label>
                                                            <input type="text" class="form-control" id="cnpj" name="cnpj" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="id_unit_type">Nomemclatura dos Blocos</label>
                                                            <select class="form-control" name="id_unit_type" id="id_unit_type" required="required">
                                                                <option value="">Selecione</option>
                                                                <option value="1">Apartamento</option>
                                                                <option value="2">Casa</option>
                                                                <option value="2">Garagem</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--
                                        <div class="wizard-pane" id="conclusao" role="tabpanel">
                                            <form id="userRole" method="post" action="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="id_unit_type">Minha relação com este condomínio</label>
                                                            <select class="form-control" name="id_unit_type" id="id_unit_type" required="required">
                                                                <option value="">Selecione</option>
                                                                <option value="1">Proprietário morador</option>
                                                                <option value="2">Inquilino</option>
                                                                <option value="2">Administradora de Condomínios</option>
                                                                <option value="2">Síndico</option>
                                                                <option value="2">Subsindico</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="id_unit_type">Bloco</label>
                                                            <select class="form-control" name="id_unit_type" id="id_unit_type" required="required">
                                                                <option value="">Selecione</option>
                                                                <option value="1">Bloco A</option>
                                                                <option value="2">Bloco B</option>
                                                                <option value="3">Bloco C</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="id_unit_type">Unidade</label>
                                                            <select class="form-control" name="id_unit_type" id="id_unit_type" required="required">
                                                                <option value="">Selecione</option>
                                                                <option value="1">APTO 01</option>
                                                                <option value="2">APTO 02</option>
                                                                <option value="3">APTO 03</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        -->
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