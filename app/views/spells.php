<html ng-app="spellbook">

<head>
    <title>Spellbook</title>
    <link rel="stylesheet" type="text/css" href="<?= asset('css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= asset('css/main.css'); ?>" />
    <script type="text/javascript" src="<?= asset('js/angular.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= asset('js/ngStorage.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= asset('js/select.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= asset('js/angular-sanitize.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= asset('js/app.js'); ?>"></script>
</head>

<body ng-controller="detailController" class="background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="spell-section">
                        <h1>{{name}}</h1>
                        <em><span ng-show="level >= 1">Level {{level}}</span> {{school}}<span ng-show="level == 0"> Cantrip</span><span ng-show="ritual_allowed"> (Ritual)</span></em>
                    </div>

                    <div class="spell-section">
                        <div>
                            <strong>Casting Time:</strong>
                            {{casting_time}} {{casting_time_units}}
                        </div>
                        <div>
                            <strong>Range:</strong>
                            {{range}} {{range_units}}
                            <span ng-show="range_description"> ({{range_description}})</span>
                        </div>
                        <div>
                            <strong>Components:</strong>
                            <span ng-show="needs_verbal">V</span><span ng-show="needs_verbal&&(needs_somatic||needs_material)">, </span>
                            <span ng-show="needs_somatic">S</span><span ng-show="needs_somatic&&needs_material">, </span>
                            <span ng-show="needs_material">M</span>
                            <span ng-show="material_description"> ({{material_description}})</span>
                        </div>
                        <div>
                            <strong>Duration:</strong>
                            {{duration_prefix}} {{duration}} {{duration_units}}
                            <span ng-show="needs_concentration"> (Concentration)</span>
                        </div>
                    </div>

                    <div class="spell-section" ng-bind-html="description">
                        <!-- inner html defined by santized description -->
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">

                    <div class="row">
                        <div class="col-md-10">
                            <label>name</label>
                            <input type="text" class="form-control input-sm" ng-model="name">
                        </div>
                        <div class="value-static col-md-2">
                            <label>id:</label>
                            <span>001{{id}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>level</label>
                            <input type="number" class="form-control input-sm" ng-model="level">
                        </div>
                        <div class="col-md-8">
                            <label>school</label>
                            <input type="text" class="form-control input-sm" ng-model="school">
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="" ng-model="ritual_allowed">
                                    ritual
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>casting time</label>
                            <input type="number" class="form-control input-sm" ng-model="casting_time">
                        </div>
                        <div class="col-md-6">
                            <label>units</label>
                            <input type="text" class="form-control input-sm" ng-model="casting_time_units">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>range</label>
                            <input type="number" class="form-control input-sm" ng-model="range">
                        </div>
                        <div class="col-md-2">
                            <label>units</label>
                            <input type="text" class="form-control input-sm" ng-model="range_units">
                        </div>
                        <div class="col-md-8">
                            <label>description</label>
                            <input type="text" class="form-control input-sm" ng-model="range_description">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="" ng-model="needs_verbal">
                                    verbal
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="" ng-model="needs_somatic">
                                    somatic
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="" ng-model="needs_material">
                                    material
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>material description</label>
                            <input type="text" class="form-control input-sm" ng-model="material_description">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>prefix</label>
                            <input type="text" class="form-control input-sm" ng-model="duration_prefix">
                        </div>
                        <div class="col-md-2">
                            <label>duration</label>
                            <input type="number" class="form-control input-sm" ng-model="duration">
                        </div>
                        <div class="col-md-2">
                            <label>units</label>
                            <input type="text" class="form-control input-sm" ng-model="duration_units">
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="" ng-model="needs_concentration">
                                    concentration
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>spell description</label>
                            <!-- <input type="text" class="form-control input-sm" ng-model="description"> -->
                            <textarea class="form-control" rows="12" ng-model="description"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
