<!DOCTYPE html>
<html ng-app="charSheet">

    <head>
        <title>Character Sheet</title>
        <link rel="stylesheet" type="text/css" href="<?= asset('css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?= asset('css/charsheet.css'); ?>" />
        <script type="text/javascript" src="<?= asset('js/angular.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= asset('js/ngStorage.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= asset('js/select.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= asset('js/angular-sanitize.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= asset('js/charsheet.js'); ?>"></script>
    </head>

    <body class="container-fluid" ng-controller="SheetController as sheet">

        <div class="row">
            <!-- left column -->
            <div ng-class="{'jw-debug-area': sheet.debugArea}" class="col-md-4">

                <!-- upper section -->
                <div class="row">

                    <!-- left sub-column -->
                    <div class="col-md-4">

                        <div class="row" ng-repeat="ability in sheet.abilities">
                            <div class="col-md-12">
                                <div class="center-block jw-stat-box-tall">
                                    <span class="center-block text-center jw-stat-box-tall-label jw-text-label-small">{{ability.name}}</span>
                                    <span class="center-block text-center jw-stat-box-tall-value jw-text-stat-lg">{{ability.modifier}}</span>
                                    <div class="jw-stat-box-tall-gem">
                                        <span class="center-block text-center jw-stat-box-tall-gem-value jw-text-stat">{{ability.value}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /sub-column -->

                    <!-- right sub-column -->
                    <div class="col-md-8">

                        <div class="row" ng-repeat="stat in sheet.stats">
                            <div class="col-md-12">
                                <div class="jw-stat-key-bulb">
                                    <span class="center-block text-center jw-stat-key-bulb-value jw-text-stat">{{stat.value}}</span>
                                </div>
                                <div class="jw-stat-key-trunk">
                                    <span class="center-block text-center jw-stat-key-trunk-label jw-text-label">{{stat.name}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="jw-panel">
                            <div class="row" ng-repeat="save in sheet.saves">
                                <input class="col-md-2" type="checkbox" value="">
                                <span class="col-md-1 jw-text-stat">{{save.value}}</span>
                                <span class="col-md-8 jw-text-label">{{save.name | capitalize}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'saving throws' | uppercase}}</div>
                        </div>

                        <div class="jw-panel">
                            <div class="row" ng-repeat="skill in sheet.skills">
                                <input class="col-md-2" type="checkbox" value="">
                                <span class="col-md-1 jw-text-stat">{{skill.value}}</span>
                                <span class="col-md-2 jw-text-label-grey">({{skill.ability | capitalize}})</span>
                                <span class="col-md-6 jw-text-label">{{skill.name | capitalize}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'skills' | uppercase}}</div>
                        </div>

                    </div>
                    <!-- /sub-column -->

                </div>
                <!-- /section -->

                <!-- lower section -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row" ng-repeat="prof in sheet.proficiencies">
                                <span class="col-md-11 jw-row-underline">{{prof}}</span>
                            </div>
                            <div class="row" ng-repeat="lang in sheet.languages">
                                <span class="col-md-11 jw-row-underline">{{lang}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'other proficiencies & languanges' | uppercase}}</div>
                        </div>
                    </div>

                </div>
                <!-- /section -->

            </div>
            <!-- /column -->


            <!-- middle column -->
            <div ng-class="{'jw-debug-area': sheet.debugArea}" class="col-md-4">

                <div class="row">
                    <div class="col-md-4" ng-repeat="stat in sheet.boxStats">
                        <div class="center-block jw-stat-box-plain">
                            <span class="center-block text-center jw-stat-box-plain-value jw-text-stat">{{stat.value}}</span>
                            <span class="center-block text-center jw-stat-box-plain-label jw-text-label-small">{{stat.name}}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row" ng-repeat="line in sheet.equipment">
                                <span class="col-md-11 jw-row-underline">{{line}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'equipment' | uppercase}}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row">
                                <span class="col-md-11 jw-row-underline"><span ng-repeat="item in sheet.coins">{{item.amount}} {{item.abbreviation}} </span></span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'coinage' | uppercase}}</div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /column -->


            <!-- right column -->
            <div ng-class="{'jw-debug-area': sheet.debugArea}" class="col-md-4">

                <div class="row">
                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row" ng-repeat="line in sheet.traits">
                                <span class="col-md-11 jw-row-underline">{{line}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'personality traits' | uppercase}}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row" ng-repeat="line in sheet.ideals">
                                <span class="col-md-11 jw-row-underline">{{line}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'ideals' | uppercase}}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row" ng-repeat="line in sheet.bonds">
                                <span class="col-md-11 jw-row-underline">{{line}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'bonds' | uppercase}}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row" ng-repeat="line in sheet.flaws">
                                <span class="col-md-11 jw-row-underline">{{line}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'flaws' | uppercase}}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jw-panel">
                            <div class="row" ng-repeat="line in sheet.features">
                                <span class="col-md-11 jw-row-underline">{{line}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'features & traits' | uppercase}}</div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /column -->


        </div>

    </body>

</html>
