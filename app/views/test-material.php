<!DOCTYPE html>
<html>

<head>
    <title>test material</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?= asset('bower_components/angular-material/angular-material.css'); ?>">
    <link rel="stylesheet" href="<?= asset('bower_components/angular-material/themes/default-theme.css'); ?>">
    <link rel="stylesheet" href="<?= asset('bower_components/angular-material/themes/light-blue-dark-theme.css'); ?>">

    <style type="text/css">
        .debug-fill {
            /*box-shadow: inset 0 0 5px black;*/
            /*background-color: #eef;*/
        }
        form > .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -moz-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            -moz-align-items: center;
            align-items: center;
            -webkit-box-direction: normal;
            -webkit-box-orient: horizontal;
            -webkit-flex-direction: row;
            -moz-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            margin-left: -8px;
        }
         .row > * {
            font-size: inherit;
            margin-left: 8px;
            margin-right: 8px; }
          md-input-group.long > input {
            width: 264px;
        }
    </style>
</head>

<body ng-app="YourApp">

    <div ng-controller="YourController">
        <md-content>
            <md-toolbar>
                <h2 class="md-toolbar-tools">
                    <span>Toolbar: light-theme (default)</span>
                </h2>
            </md-toolbar>
            <div layout="vertical">
                <div layout="horizontal" layout-fill>
                    <div flex="40" class="debug-fill">
                        <div layout="vertical" layout-align="center" style="height: 200px;">
                            <md-content>
                                <form style="padding: 20px;">
                                    <md-text-float label="Name" ng-model="char.name"></md-text-float>
                                </form>
                            </md-content>
                        </div>
                    </div>
                    <div flex class="debug-fill">
                        <div layout="vertical" layout-align="center" style="height: 200px;">
                            <md-content>
                                <form style="padding: 20px;">
                                    <div class="row">
                                        <md-text-float label="Class & Level" ng-model="char.classAndLevel"></md-text-float>
                                        <md-text-float label="Background" ng-model="char.background"></md-text-float>
                                        <md-text-float label="Player Name" ng-model="char.playerName"></md-text-float>
                                    </div>
                                    <div class="row">
                                        <md-text-float label="Race" ng-model="char.race"></md-text-float>
                                        <md-text-float label="Alignment" ng-model="char.alignment"></md-text-float>
                                        <md-text-float label="Experience Points" ng-model="char.experiencePoints"></md-text-float>
                                    </div>
                                </form>
                            </md-content>
                        </div>
                    </div>
                </div>

                <div layout="horizontal" layout-fill>
                    <div flex class="debug-fill">
                        <span>left</span>
                        <div layout="vertical" layout-fill>
                            <div layout="horizontal" layout-fill>
                                <div flex="30" class="debug-fill">
                                    <span>attrs</span>
                                </div>
                                <div flex class="debug-fill">
                                    <span>skills</span>
                                </div>
                            </div>
                            <div flex class="debug-fill">
                                <span>prof</span>
                            </div>
                        </div>
                    </div>

                    <div flex class="debug-fill">
                        <span>mid</span>
                        <div layout="vertical" layout-fill>
                            <div flex class="debug-fill">
                                <span>hit</span>
                            </div>
                            <div flex class="debug-fill">
                                <span>att</span>
                            </div>
                            <div flex class="debug-fill">
                                <span>equip</span>
                            </div>
                        </div>
                    </div>

                    <div flex class="debug-fill">
                        <span>right</span>
                        <div layout="vertical" layout-fill>
                            <div flex class="debug-fill">
                                <span>rp</span>
                            </div>
                            <div flex class="debug-fill">
                                <span>feat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </md-content>
    </div>

    <script src="<?= asset('bower_components/angular/angular.js'); ?>"></script>
    <script src="<?= asset('bower_components/angular-aria/angular-aria.js'); ?>"></script>
    <script src="<?= asset('bower_components/angular-animate/angular-animate.js'); ?>"></script>
    <script src="<?= asset('bower_components/hammerjs/hammer.js'); ?>"></script>
    <script src="<?= asset('bower_components/angular-material/angular-material.js'); ?>"></script>
    <script>

        // Include app dependency on ngMaterial

        angular.module( 'YourApp', [ 'ngMaterial' ] )
            .controller("YourController", function () {

            });

    </script>

</body>
</html>
