(function() {
    var app = angular.module('charSheet', []);

    app.controller('SheetController', function(){
        this.abilities = abilities;
        this.stats = stats;
        this.skills = skills;
        this.saves = saves;
        this.boxStats = boxStats;
        this.debugArea = false;
    });

    app.filter('capitalize', function() {
        return function(input, all) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        }
    });

    var abilities = [
        { name: 'Strength',         abbreviation: 'STR',    value: 14,  modifier: '+2' },
        { name: 'Dexterity',        abbreviation: 'DEX',    value: 14,  modifier: '+2' },
        { name: 'Constitution',     abbreviation: 'CON',    value: 14,  modifier: '+2' },
        { name: 'Intelligence',     abbreviation: 'INT',    value: 14,  modifier: '+2' },
        { name: 'Wisdom',           abbreviation: 'WIS',    value: 14,  modifier: '+2' },
        { name: 'Charisma',         abbreviation: 'CHA',    value: 14,  modifier: '+2' },
    ];

    var saves = [
        { name: 'Strength',         value: 2 },
        { name: 'Dexterity',        value: 2 },
        { name: 'Constitution',     value: 2 },
        { name: 'Intelligence',     value: 2 },
        { name: 'Wisdom',           value: 2 },
        { name: 'Charisma',         value: 2 },
    ]

    var skills = [
        { name: 'acrobatics',       ability: 'dex',     value: 2 },
        { name: 'animal handling',  ability: 'wis',     value: 2 },
        { name: 'arcana',           ability: 'int',     value: 2 },
        { name: 'athletics',        ability: 'str',     value: 2 },
        { name: 'deception',        ability: 'cha',     value: 2 },
        { name: 'history',          ability: 'int',     value: 2 },
        { name: 'insight',          ability: 'wis',     value: 2 },
        { name: 'intimidation',     ability: 'cha',     value: 2 },
        { name: 'investigation',    ability: 'int',     value: 2 },
        { name: 'medicine',         ability: 'wis',     value: 2 },
        { name: 'nature',           ability: 'int',     value: 2 },
        { name: 'percetion',        ability: 'wis',     value: 2 },
        { name: 'performance',      ability: 'cha',     value: 2 },
        { name: 'persuasion',       ability: 'cha',     value: 2 },
        { name: 'religion',         ability: 'int',     value: 2 },
        { name: 'sleight of hand',  ability: 'dex',     value: 2 },
        { name: 'stealth',          ability: 'dex',     value: 2 },
        { name: 'survival',         ability: 'wis',     value: 2 },
    ]

    var stats = [
        { name: 'Inspiration', abbreviation: '?', value: '1'},
        { name: 'Proficiency Bonus', abbreviation: '?', value: '+2'},
        { name: 'Passive Wisdom (Perception)', abbreviation: '?', value: '14'},
    ];

    var boxStats = [
        { name: 'Armor Class', abbreviation: 'AC', value: '14'},
        { name: 'Initiative', abbreviation: 'Init', value: '+2'},
        { name: 'Speed', abbreviation: 'Spd', value: '30ft'},
    ];


})();
