@include('shared.alert')
<div class="container" ng-controller="FaturaController">
    <div class="form-group col-md-12">
        <hr />
        <p>Dados da Fatura</p>
        <hr />
    </div>
    <div class="form-group col-md-2">
        <p>Mes Referencia</p>
        {!! $fatura->mesRef !!}
    </div>
    <div class="form-group col-md-3">
        <p>Data Ini Fatura</p>
        {!! $fatura->periodoFaturaIni !!}
    </div>
    <div class="form-group col-md-3">
        <p>Data Fim Fatura</p>
        {!! $fatura->periodoFaturaFinal !!}
    </div>
    <div class="form-group col-md-2">
        <p>Data Emissao</p>
        {!! $fatura->dataEmissao !!}
    </div>
    <div class="form-group col-md-2">
        <p>Data Vencimento</p>
        {!! $fatura->dataVencimento !!}
    </div>
    <div class="form-group col-md-12">
        <hr />
        <p>Dados Contrato</p>
        <hr />
    </div>
    <div class="form-group col-md-6">
        <p>Nome Cliente</p>
        {!! $fatura->contratos->clientes->nome !!}
    </div>
    <div class="form-group col-md-2">
        <p>Val Ini Contrato</p>
        {!! $fatura->contratos->dataInicioContrato !!}
    </div>
    <div class="form-group col-md-2">
        <p>Val Fim Contrato</p>
        {!! $fatura->contratos->dataFimContrato !!}
    </div>
    <div class="form-group col-md-2">
        <p>Tipo Contrato</p>
        @if($fatura->contratos->tipoContrato == 'mensal')
            Mensal
        @else
            Diario
        @endif
    </div>
    <p></p>
    <div class="form-group col-md-12">
        <hr />
        <p>Itens Fatura</p>
    </div>
    <div class="col-md-12">
        <table class="table" >
            <tr>
                <th>Lancamento</th>
                <th>Quantidade</th>
                <th>Valor R$</th>
                <th></th>

            </tr>
            @foreach ($itensFatura as $item)
                <tr>
                    <td>{!! $item->tipoConta !!}</td>
                    <td>{!! $item->quantidadeLeitura !!}</td>
                    <td>{!! $item->valor !!}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
        <button id="btModal" name="btModal" type="button" ng-click="abrirModalItem()" class="btn btn-primary">Incluir Item</button>
    </div>

    <div class="col-md-12">
        <hr/>
        <p>Totais</p>
    </div>
        <div class="form-group col-md-2">
            <p> Valor Total : R$ {!! $fatura->valorTotal !!}</p>
        </div>
    <hr/>


    <div class="form-group col-md-12">
        {!! Form::open(['route' => 'fatura.store', 'data-remote' => $remote, 'id' => 'aluguel-form']) !!}
        {!! Form::submit($fecharFatura, ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}

        <a href="{{ route('fatura.index') }}" class="btn btn-info" role="button">Voltar</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAddFatura" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
        {!! Form::open(['route' => 'fatura.inserirItemFatura']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Item Faturamento</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('tipoConta', 'Tipo Conta : ') !!}
                                {!! Form::select('tipoConta',  $tiposContas, $item->tipoConta,['class' => 'form-control'] ) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {{--{!! Form::label('conta_id', 'Conta : ') !!}--}}
                                {{--{!! Form::select('conta_id',  $contas, $item->conta_id,  ['class' => 'form-control','ng-model' > 'coId'] ) !!}--}}
                                <div class="form-group">
                                    <label for="conta_id">Conta :</label>
                                    <select class="form-control" id="conta_id" name="conta_id" ng-model="coId" ng-change="buscarConta()">
                                        <option>----</option>
                                        @foreach($contas as $conta)
                                            @if($conta->id == $item->conta_id)
                                            <option value="{!! $conta->id !!}" selected>{!! $conta->nomeConta !!}</option>
                                            @else
                                                <option value="{!! $conta->id !!}">{!! $conta->nomeConta !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('quantidadeLeitura', 'Leitura : ') !!}
                                {!! Form::text('quantidadeLeitura',  $item->quantidadeLeitura, ['class' => 'form-control','ng-model' => 'quantidadeLeitura','ng-change' => 'calcular()'] ) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('valorTotal', 'Valor : ') !!}
                                {!! Form::text('valorTotal',  $item->valor, ['class' => 'form-control','ng-model' => 'valorTotal','disabled'] ) !!}
                                {{ Form::hidden('valor', $fatura->id ,['ng-model' => 'valorTotal']) }}

                            </div>
                            {{ Form::hidden('idFatura', $fatura->id) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" >Incluir Item</button>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
