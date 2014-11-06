(function() {
    // var app = angular.module('StatList', []);
    var app = angular.module('StatList', [ 'ngMaterial' ]);

    app.controller('StatListController', function(){
        this.floor = Math.floor;
    });

    app.filter('modifier', function() {
        return function(input, all) {
            return (input < 0) ? input : '+' + input;
        }
    });

})();
