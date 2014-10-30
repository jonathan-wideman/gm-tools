(function() {
    var app = angular.module('spellbook', ['ngStorage', 'ngSanitize']);

    app.controller('mainController', ['$scope', function($scope, $localStorage) {
        $scope.$storage = $localStorage;
    }]);

    app.controller('detailController', ['$scope', function ($scope) {

    }])

})();
