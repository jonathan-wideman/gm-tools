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
        <div>
            <div id="char-info-header" >

                <br/>
                <input ng-model="charName" ng-disabled="!sheet.editing" type="text" class="form-control" style="width: 300px; height: 30px">
                Character Name

                <div id='section1'>
                    <br/>
                    Level
                        <select
                            ng-disabled="!sheet.editing"
                            ng-init="charLevel = sheet.levels[0]"
                            ng-model="charLevel"
                            ng-options="level for level in sheet.levels">
                        </select>
                    Class
                        <select
                            ng-disabled="!sheet.editing"
                            ng-model="charClass"
                            ng-options="class.name for class in sheet.p_classes">
                            <option value="" ng-if="!charClass">Select Class</option>
                        </select>
                    <br/>
                    <br/>
                    Race
                    <select
                        ng-disabled="!sheet.editing"
                        ng-model="charRace"
                        ng-options=" race.subrace + ' ' + race.name for race in sheet.races">
                        <option value="" ng-if="!charRace">Select Race</option>
                    </select>
                    <br/>
                    <br/>
                 </div>

                 <div id='section2' >
                    <input ng-disabled="!sheet.editing" ng-model="charBackground" class="form-control" style="width: 100px; height: 30px">
                    Background
                    <br/>
                        <select
                            ng-disabled="!sheet.editing"
                            ng-model="charAlignment"
                            ng-options="alignment.name for alignment in sheet.alignments"
                            style="margin-top: 15px">
                            <option value="" ng-if="!charAlignment">Select Alignment</option>
                        </select>
                        <br/>
                        Alignment
                    <br/>
                    <br/>
                </div>

                <div id='section3' >
                    <input ng-disabled="!sheet.editing" ng-model="charPlayer"type="text" class="form-control" style="width: 100px; height: 30px">
                    Player Name
                    <br/>
                    <br/>
                    <input ng-disabled="!sheet.editing" ng-model="charExpPoints"type="text" class="form-control" style="width: 100px; height: 30px; margin-top: 5px;">
                    Experience Points
                    <br/>
                </div>

            </div>

        </div>

        <div id="sheet-controls" >
            <br/>
            <button class="pull-right" ng-click="sheet.toggleEditMode()">{{sheet.editButtonText}}</button>
            <br/>
            <hr/>
        </div>

        <div class="row" stlye="position:absolute; top: 500px">
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
                                        <span ng-if="!sheet.editing" class="center-block text-center jw-stat-box-tall-gem-value jw-text-stat">{{ability.value}}</span>

                                    </div>

                                    <div ng-if="sheet.editing" class="input-group input-group-sm kc-stat-box-tall-gem-editing ">
                                          <input type="text" class="form-control" placeholder="{{ability.value}}">
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
                                    <span class="center-block text-center
                                        jw-stat-key-bulb-value jw-text-stat">{{stat.value}}</span>
                                </div>
                                <div class="jw-stat-key-trunk">
                                    <span class="center-block text-center jw-stat-key-trunk-label jw-text-label">{{stat.name}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="jw-panel">
                            <div class="row" ng-repeat="save in sheet.saves">
                                <input ng-disabled="!sheet.editing" class="col-md-2" type="checkbox" value="">
                                <span class="col-md-1 jw-text-stat">{{save.value}}</span>
                                <span class="col-md-8 jw-text-label">{{save.name | capitalize}}</span>
                            </div>
                            <div class="jw-panel-label-bottom jw-text-label text-center">{{ 'saving throws' | uppercase}}</div>
                        </div>

                        <div class="jw-panel">
                            <div class="row" ng-repeat="skill in sheet.skills">
                                <input ng-disabled="!sheet.editing" class="col-md-2" type="checkbox" value="">
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

            </div>
            <!-- /column -->


            <!-- right column -->
            <div ng-class="{'jw-debug-area': sheet.debugArea}" class="col-md-4">

            </div>
            <!-- /column -->


        </div>

    </body>

</html>
