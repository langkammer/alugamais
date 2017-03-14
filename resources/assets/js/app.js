'use strict';
require('bootstrap-sass');

angular.module('alugamais',
    ['ui.bootstrap']
)
.controller('ClienteController', ['$scope',function($scope) {

    console.log("testado ");
    $scope.fiador = 'NAO';

    $scope.excluir = function ($id) {
        console.log("id : ",$id);
        $scope.id = $id;
        $('#modalDeleta').modal('show');
    };


}])
.controller('AluguelController', [function() {


    //
    // setTimeout(function(){
    // }, 3000);
    console.log("testado")

}])
.controller('FaturaController', ['$scope','$http', function($scope,$http) {

    // window.$ = window.jQuery = require('jquery');

    $scope.contasRels = [];

    $scope.abrirModalItem = function () {
        $('#modalAddFatura').modal('show');
    };

    $scope.fecharModal = function () {

        console.log("teste");
        $('#modalAddFatura').modal('hide');

    };

    $scope.calcular = function () {

        $scope.valorCobradoPorUnidade = $scope.valor / $scope.qtdContaLeitura;

        $scope.valorTotal = Math.round($scope.valorCobradoPorUnidade * $scope.quantidadeLeitura);
    };

    $scope.buscarConta = function () {

        console.log("buscando conta",$scope.coId);

        $http.get('/contas/getJson/'+$scope.coId).then(function (data) {
            if(data.data.mensagem == "ok"){
                $scope.valor = data.data.data.data.valor;
                $scope.qtdContaLeitura = data.data.data.data.quantidadeMedicao;
            }

        }, function (err) {
            console.log(err);
        });
    };

    $scope.selecionaContrato = function () {

        console.log("contrato ", $scope.contrato)


    };





    function dateDiferencaEmDias(dataIni, dataFim) {
        // Descartando timezone e horário de verão
        var utc1 = Date.UTC(dataIni.getFullYear(), dataIni.getMonth(), dataIni.getDate());
        var utc2 = Date.UTC(dataFim.getFullYear(), dataFim.getMonth(), dataFim.getDate());

        $scope.dias = Math.floor((utc2 - utc1) / ( 1000 * 60 * 60 * 24) );
    }
    $scope.dataRefAtual = new Date();






    $scope.dateOptions = {
        formatYear: 'yy',
        maxDate: new Date(2020, 5, 22),
        minDate: new Date(),
        startingDay: 1
    };



    $scope.dateRef = function() {
        $scope.dataRef.opened = true;
    };

    $scope.format = 'MM/yyyy';

    $scope.dataRef = {
        opened: false
    };



}])
.config(function($interpolateProvider) {
    // To prevent the conflict of `{{` and `}}` symbols
    // between Blade template engine and AngularJS templating we need
    // to use different symbols for AngularJS.

    $interpolateProvider.startSymbol('@{');
    $interpolateProvider.endSymbol('}');
});
// .config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
//     $locationProvider.hashPrefix('!');
//
//     $routeProvider.otherwise({redirectTo: '/view1'});
// }]);