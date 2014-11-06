(function() {
    // var app = angular.module('StatList', []);
    var app = angular.module('StatList', [ 'ngMaterial' ]);

    app.controller('StatListController', function(){
        this.groups = groups;
        this.items = items;
        this.floor = Math.floor;
    });

    app.filter('modifier', function() {
        return function(input, all) {
            return (input < 0) ? input : '+' + input;
        }
    });

    var items = [
        { name: 'Strength',        type: 'number',     value: 0 },
        { name: 'Dexterity',       type: 'number',     value: 0 },
        { name: 'Constitution',    type: 'number',     value: 0 },
        { name: 'Intelligence',    type: 'number',     value: 0 },
        { name: 'Wisdom',          type: 'number',     value: 0 },
        { name: 'Charisma',        type: 'number',     value: 0 },
    ];

    var groups = {
        character: {
            heading: 'Character',
            stats: {
                name: { label: 'Character Name', type: 'text', value: null },
                classes: { label: 'Class & Level', type: 'text', value: null },
                background: { label: 'Background', type: 'text', value: null },
                player: { label: 'Player Name', type: 'text', value: null },
                race: { label: 'Race', type: 'text', value: null },
                alignment: { label: 'Alignment', type: 'text', value: null },
                experience: { label: 'Experience Points', type: 'text', value: null },
            },
        },
        abilities: {
            heading: 'Abilities',
            stats: {
                strength:       { label: 'Strength',        type: 'number',     value: 10 },
                dexterity:      { label: 'Dexterity',       type: 'number',     value: 10 },
                constitution:   { label: 'Constitution',    type: 'number',     value: 10 },
                intelligence:   { label: 'Intelligence',    type: 'number',     value: 10 },
                wisdom:         { label: 'Wisdom',          type: 'number',     value: 10 },
                charisma:       { label: 'Charisma',        type: 'number',     value: 10 },
            },
        },
    };

})();
