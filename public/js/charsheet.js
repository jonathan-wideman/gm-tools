(function() {
    var app = angular.module('charSheet', []);

    app.controller('SheetController', function(){
        this.abilities = abilities;
        this.stats = stats;
        this.skills = skills;
        this.saves = saves;
        this.proficiencies = proficiencies;
        this.languages = languages;
        this.traits = traits;
        this.ideals = ideals;
        this.bonds = bonds;
        this.flaws = flaws;
        this.features = features;
        this.attacks = attacks;
        this.equipment = equipment;
        this.coins = coins;
        this.levels = levels;
        this.p_classes = p_classes;
        this.races = races;
        this.alignments = alignments;
        this.boxStats = boxStats;
        this.editButtonText = "Edit Sheet";
        this.debugArea = false;
        this.editing = false;

        this.charName = null;
        this.charLevel = null;
        this.charClass = null;
        this.charRace = null;
        this.charBackground = null;
        this.charAlignment = null;
        this.charPlayer = null;
        this.charExpPoints = null;



        // Function Declarations
        this.toggleEditMode = toggleEditMode;
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
    ];

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
    ];

    var proficiencies = [
        'armor A',
        'weapon 1',
        'weapon 2',
        'weapon 3',
        'weapon 4',
        'tool I',
        'tool II',
    ];

    var languages = [
        'language A',
        'language B',
        'language C',
    ];

    var traits = [
        'blah',
        'blah blah',
        'halb!',
    ];

    var ideals = [
        'blah',
        'blah blah',
        'halb!',
    ];

    var bonds = [
        'blah',
        'blah blah',
        'halb!',
    ];

    var flaws = [
        'blah',
        'blah blah',
        'halb!',
    ];

    var features = [
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
    ];

    var attacks = [
        'A',
        'B',
        'C',
        'D',
        'E',
    ]

    var equipment = [
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
    ]

    var coins = [
        { name: 'Copper Pieces',        abbreviation: 'CP',  amount: '10' },
        { name: 'Silver Pieces',        abbreviation: 'SP',  amount: '10' },
        { name: 'Electrum Pieces',      abbreviation: 'EP',  amount: '10' },
        { name: 'Gold Pieces',          abbreviation: 'GP',  amount: '10' },
        { name: 'Platinum Pieces',      abbreviation: 'PP',  amount: '10' },
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

    var levels = [
        0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,
        11, 12, 13, 14, 15, 16, 17, 18, 19, 20
    ];

    var p_classes = [
        {name: 'Barbarian'},
        {name: 'Bard'},
        {name: 'Cleric'},
        {name: 'Druid'},
        {name: 'Fighter'},
        {name: 'Monk'},
        {name: 'Paladin'},
        {name: 'Ranger'},
        {name: 'Rogue'},
        {name: 'Sorcerer'},
        {name: 'Warlock'},
        {name: 'Wizard'}

    ];

    var races = [
        {name: 'Dragonborn', subrace:''},
        {name: 'Dwarf', subrace:''},
        {name: 'Dwarf', subrace:'Hill'},
        {name: 'Dwarf', subrace:'Mountain'},
        {name: 'Elf', subrace:''},
        {name: 'Elf', subrace:'High'},
        {name: 'Elf', subrace:'Wood'},
        {name: 'Elf', subrace:'Dark (Drow)'},
        {name: 'Gnome', subrace:''},
        {name: 'Gnome', subrace:'Forest'},
        {name: 'Gnome', subrace:'Rock'},
        {name: 'Halfling', subrace:''},
        {name: 'Halfling', subrace:'Lightfoot'},
        {name: 'Halfling', subrace:'Stout'},
        {name: 'Half-Elf', subrace:''},
        {name: 'Half-Orc', subrace:''},
        {name: 'Human', subrace:''},
        {name: 'Tiefling', subrace:''}
    ];

    var alignments = [
        {name: 'Lawful Good'},
        {name: 'Neutral Good'},
        {name: 'Chaotic Good'},
        {name: 'Lawful Neutral'},
        {name: 'Neutral'},
        {name: 'Chaotic Neutral'},
        {name: 'Lawful Evil'},
        {name: 'Neutral Evil'},
        {name: 'Chaotic Evil'}
    ];

    toggleEditMode = function() {
        if (this.editing == false) {
            this.editButtonText = "Save Changes";
            this.editing = true;
        } else {
            this.editButtonText = "Edit Sheet";
            this.editing = false;
        }
    };

})();
