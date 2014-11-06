<!DOCTYPE html>
<html>

<head>
    <title>stat list</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?= asset('bower_components/angular-material/angular-material.css'); ?>">
    <link rel="stylesheet" href="<?= asset('bower_components/angular-material/themes/default-theme.css'); ?>">
    <link rel="stylesheet" href="<?= asset('bower_components/angular-material/themes/light-blue-dark-theme.css'); ?>">
    <!-- <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css'); ?>"> -->

</head>

<body ng-app="StatList">

    <div ng-controller="StatListController as statList">

        <div ng-init="
            char = {};
            char.classes = [];
            char.alignment = {};
            char.attributes = {};
            char.saves = {};
            char.skills = {};
            char.auxProficiencies = {};
            char.auxProficiencies.weapons = [];
            char.auxProficiencies.armor = [];
            char.auxProficiencies.tools = [];
            char.auxProficiencies.other = [];
            char.languages = [];
            char.hitPoints = {};
            char.hitDice = [];
            char.deathSaves = {};
            char.attacks = [];
            char.quickSpells = [];
            char.equipment = [];
            char.inventory = [];
            char.coinage = {};
            char.personality = {};
            char.personality.traits = [];
            char.personality.ideals = [];
            char.personality.bonds = [];
            char.personality.flaws = [];
            char.features = {};
            char.features.racial = [];
            char.features.class = [];
            char.features.additional = [];
            char.allies = [];
            char.treasure = [];
        "></div>

        <h1>Stat List</h1>

        <h2>Charsheet pg. 1</h2>
        <ul>
            <li>name <input type="text" ng-model="char.name"></li>
            <li>classes:</li>
            <ul>
                <li ng-repeat="class in char.classes">
                    class <input type="text" ng-model="class.name">
                    level <input type="number" ng-model="class.level">
                    [<a href ng-click="char.classes.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.classes.push({ name: null, level: null });
                    ">add</a>]
                </li>
            </ul>
            <li>race <input type="text" ng-model="char.race"></li>
            <li>background <input type="text" ng-model="char.background"></li>
            <li>alignment
                <select ng-model="char.alignment.social">
                    <option value="lawful">lawful</option>
                    <option value="neutral">neutral</option>
                    <option value="chaotic">chaotic</option>
                </select>
                <select ng-model="char.alignment.moral">
                    <option value="good">good</option>
                    <option value="neutral">neutral</option>
                    <option value="evil">evil</option>
                </select>
            </li>
            <li>experience <input type="number" ng-model="char.experience"></li>
            <li>player name <input type="text" ng-model="char.playerName"></li>
            <li>attributes:</li>
            <ul>
                <li>STR: <input type="number" ng-model="char.attributes.str.val"> ( {{char.attributes.str.mod = statList.floor((char.attributes.str.val - 10) / 2) | modifier}} )</li>
                <li>DEX: <input type="number" ng-model="char.attributes.dex.val"> ( {{char.attributes.dex.mod = statList.floor((char.attributes.dex.val - 10) / 2) | modifier}} )</li>
                <li>CON: <input type="number" ng-model="char.attributes.con.val"> ( {{char.attributes.con.mod = statList.floor((char.attributes.con.val - 10) / 2) | modifier}} )</li>
                <li>INT: <input type="number" ng-model="char.attributes.int.val"> ( {{char.attributes.int.mod = statList.floor((char.attributes.int.val - 10) / 2) | modifier}} )</li>
                <li>WIS: <input type="number" ng-model="char.attributes.wis.val"> ( {{char.attributes.wis.mod = statList.floor((char.attributes.wis.val - 10) / 2) | modifier}} )</li>
                <li>CHA: <input type="number" ng-model="char.attributes.cha.val"> ( {{char.attributes.cha.mod = statList.floor((char.attributes.cha.val - 10) / 2) | modifier}} )</li>
            </ul>
            <li>inspiration <input type="checkbox" ng-model="char.inspiration"> ( {{char.inspiration}} )</li>
            <li>proficiency <input type="number" ng-model="char.proficiency"> ( {{char.proficiency | modifier}} )</li>
            <li>passive perception ( {{ char.skills.perception + 10 }} )</li>
            <li>passive investigation ( {{ char.skills.investigation + 10 }} )</li>
            <li>saving throws</li>
            <ul>
                <li>STR: <small>prf?</small> <input type="checkbox" ng-model="char.saves.str.prof"> ( {{char.saves.str.val = (char.attributes.str.mod + (char.saves.str.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>DEX: <small>prf?</small> <input type="checkbox" ng-model="char.saves.dex.prof"> ( {{char.saves.dex.val = (char.attributes.dex.mod + (char.saves.dex.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>CON: <small>prf?</small> <input type="checkbox" ng-model="char.saves.con.prof"> ( {{char.saves.con.val = (char.attributes.con.mod + (char.saves.con.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>INT: <small>prf?</small> <input type="checkbox" ng-model="char.saves.int.prof"> ( {{char.saves.int.val = (char.attributes.int.mod + (char.saves.int.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>WIS: <small>prf?</small> <input type="checkbox" ng-model="char.saves.wis.prof"> ( {{char.saves.wis.val = (char.attributes.wis.mod + (char.saves.wis.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>CHA: <small>prf?</small> <input type="checkbox" ng-model="char.saves.cha.prof"> ( {{char.saves.cha.val = (char.attributes.cha.mod + (char.saves.cha.prof ? char.proficiency : 0)) | modifier}} ) </li>
            </ul>
            <li>skills</li>
            <ul>
                <li>acrobatics <small>[DEX]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.acrobatics.prof"> ( {{char.skills.acrobatics.val = (char.attributes.dex.mod + (char.skills.acrobatics.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>animalHandling <small>[WIS]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.animalHandling.prof"> ( {{char.skills.animalHandling.val = (char.attributes.wis.mod + (char.skills.animalHandling.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>arcana <small>[STR]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.arcana.prof"> ( {{char.skills.arcana.val = (char.attributes.str.mod + (char.skills.arcana.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>athletics <small>[STR]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.athletics.prof"> ( {{char.skills.athletics.val = (char.attributes.str.mod + (char.skills.athletics.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>deception <small>[CHA]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.deception.prof"> ( {{char.skills.deception.val = (char.attributes.cha.mod + (char.skills.deception.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>history <small>[INT]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.history.prof"> ( {{char.skills.history.val = (char.attributes.int.mod + (char.skills.history.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>insight <small>[WIS]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.insight.prof"> ( {{char.skills.insight.val = (char.attributes.wis.mod + (char.skills.insight.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>intimidation <small>[CHA]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.intimidation.prof"> ( {{char.skills.intimidation.val = (char.attributes.cha.mod + (char.skills.intimidation.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>investigation <small>[INT]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.investigation.prof"> ( {{char.skills.investigation.val = (char.attributes.int.mod + (char.skills.investigation.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>medicine <small>[WIS]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.medicine.prof"> ( {{char.skills.medicine.val = (char.attributes.wis.mod + (char.skills.medicine.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>nature <small>[INT]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.nature.prof"> ( {{char.skills.nature.val = (char.attributes.int.mod + (char.skills.nature.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>perception <small>[WIS]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.perception.prof"> ( {{char.skills.perception.val = (char.attributes.wis.mod + (char.skills.perception.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>performance <small>[CHA]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.performance.prof"> ( {{char.skills.performance.val = (char.attributes.cha.mod + (char.skills.performance.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>persuasion <small>[CHA]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.persuasion.prof"> ( {{char.skills.persuasion.val = (char.attributes.cha.mod + (char.skills.persuasion.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>religion <small>[INT]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.religion.prof"> ( {{char.skills.religion.val = (char.attributes.int.mod + (char.skills.religion.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>sleightOfHand <small>[DEX]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.sleightOfHand.prof"> ( {{char.skills.sleightOfHand.val = (char.attributes.dex.mod + (char.skills.sleightOfHand.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>stealth <small>[DEX]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.stealth.prof"> ( {{char.skills.stealth.val = (char.attributes.dex.mod + (char.skills.stealth.prof ? char.proficiency : 0)) | modifier}} ) </li>
                <li>survival <small>[WIS]</small>: <small>prf?</small> <input type="checkbox" ng-model="char.skills.survival.prof"> ( {{char.skills.survival.val = (char.attributes.wis.mod + (char.skills.survival.prof ? char.proficiency : 0)) | modifier}} ) </li>
            </ul>
            <li>weapon proficiences:</li>
            <ul>
                <li ng-repeat="prof in char.auxProficiencies.weapons">
                    name <input type="text" ng-model="prof.name">
                    notes <textarea type="text" ng-model="prof.notes"></textarea>
                    [<a href ng-click="char.auxProficiencies.weapons.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.auxProficiencies.weapons.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>armor proficiences:</li>
            <ul>
                <li ng-repeat="prof in char.auxProficiencies.armor">
                    name <input type="text" ng-model="prof.name">
                    notes <textarea type="text" ng-model="prof.notes"></textarea>
                    [<a href ng-click="char.auxProficiencies.armor.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.auxProficiencies.armor.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>tool proficiencies:</li>
            <ul>
                <li ng-repeat="prof in char.auxProficiencies.tools">
                    name <input type="text" ng-model="prof.name">
                    notes <textarea type="text" ng-model="prof.notes"></textarea>
                    [<a href ng-click="char.auxProficiencies.tools.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.auxProficiencies.tools.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>other proficiencies:</li>
            <ul>
                <li ng-repeat="prof in char.auxProficiencies.other">
                    name <input type="text" ng-model="prof.name">
                    notes <textarea type="text" ng-model="prof.notes"></textarea>
                    [<a href ng-click="char.auxProficiencies.other.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.auxProficiencies.other.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>languages:</li>
            <ul>
                <li ng-repeat="lang in char.languages">
                    name <input type="text" ng-model="lang.name">
                    notes <textarea type="text" ng-model="lang.notes"></textarea>
                    [<a href ng-click="char.languages.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.languages.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>armor class <input type="number" ng-model="char.armorClass"></li>
            <li>initiative <input type="number" ng-model="char.initiative"> ( {{char.initiative | modifier}} )</li>
            <li>speed <input type="number" ng-model="char.speed"> <small>ft</small></li>
            <li>hit points:</li>
            <ul>
                <li>maximum <input type="number" ng-model="char.hitPoints.max"></li>
                <li>current <input type="number" ng-model="char.hitPoints.current"></li>
                <li>temporary <input type="number" ng-model="char.hitPoints.temp"></li>
            </ul>
            <li>hit dice:</li>
            <ul>
                <li ng-repeat="diceSet in char.hitDice">
                    available <input type="number" ng-model="diceSet.available"
                        ng-change="diceSet.total = (diceSet.available > diceSet.total) ? diceSet.available : diceSet.total">
                    total <input type="number" ng-model="diceSet.total"
                        ng-change="diceSet.available = (diceSet.total < diceSet.available) ? diceSet.total : diceSet.available">
                    sides <input type="number" ng-model="diceSet.sides">
                    ( {{diceSet.available}}/{{diceSet.total}}d{{diceSet.sides}} )
                    [<a href ng-click="char.hitDice.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.hitDice.push({ available: null, total: null, sides: null });
                    ">add</a>]
                </li>
            </ul>
            <li>death saves</li>
            <ul>
                <li>successes <input type="number" ng-model="char.deathSaves.successes"></li>
                <li>failures <input type="number" ng-model="char.deathSaves.failures"></li>
            </ul>
            <li>attacks:</li>
            <ul>
                <li ng-repeat="attack in char.attacks">
                    name <input type="text" ng-model="attack.name">
                    attack mod <input type="number" ng-model="attack.modifier">
                    <!-- damage field includes all of damage dice, modifier, type as text for now;
                            these should be split out into separate fields -->
                    damage <input type="text" ng-model="attack.damage">
                    notes <textarea type="text" ng-model="attack.notes"></textarea>
                    [<a href ng-click="char.attacks.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.attacks.push({ name: null, modifier: null, damage: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>spellcasting (quick reference):</li>
            <ul>
                <li ng-repeat="spell in char.quickSpells">
                    name <input type="text" ng-model="spell.name">
                    notes <textarea type="text" ng-model="spell.notes"></textarea>
                    [<a href ng-click="char.quickSpells.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.quickSpells.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>equipment:</li>
            <ul>
                <li ng-repeat="item in char.equipment">
                    name <input type="text" ng-model="item.name">
                    notes <textarea type="text" ng-model="item.notes"></textarea>
                    [<a href ng-click="char.equipment.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.equipment.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>inventory:</li>
            <ul>
                <li ng-repeat="item in char.inventory">
                    name <input type="text" ng-model="item.name">
                    notes <textarea type="text" ng-model="item.notes"></textarea>
                    [<a href ng-click="char.inventory.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.inventory.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>coinage:</li>
            <ul>
                <li>copper <input type="number" ng-model="char.coinage.cp"></li>
                <li>silver <input type="number" ng-model="char.coinage.sp"></li>
                <li>electrum <input type="number" ng-model="char.coinage.ep"></li>
                <li>gold <input type="number" ng-model="char.coinage.gp"></li>
                <li>platinum <input type="number" ng-model="char.coinage.pp"></li>
            </ul>
            <li>personality:</li>
            <ul>
                <li>traits:</li>
                <ul>
                    <li ng-repeat="trait in char.personality.traits">
                        name <input type="text" ng-model="trait.name">
                        notes <textarea type="text" ng-model="trait.notes"></textarea>
                        [<a href ng-click="char.personality.traits.splice($index, 1)">X</a>]
                    </li>
                    <li>
                        [<a href ng-click="
                            char.personality.traits.push({ name: null, notes: null });
                        ">add</a>]
                    </li>
                </ul>
                <li>ideals:</li>
                <ul>
                    <li ng-repeat="ideal in char.personality.ideals">
                        name <input type="text" ng-model="ideal.name">
                        notes <textarea type="text" ng-model="ideal.notes"></textarea>
                        [<a href ng-click="char.personality.ideals.splice($index, 1)">X</a>]
                    </li>
                    <li>
                        [<a href ng-click="
                            char.personality.ideals.push({ name: null, notes: null });
                        ">add</a>]
                    </li>
                </ul>
                <li>bonds:</li>
                <ul>
                    <li ng-repeat="bond in char.personality.bonds">
                        name <input type="text" ng-model="bond.name">
                        notes <textarea type="text" ng-model="bond.notes"></textarea>
                        [<a href ng-click="char.personality.bonds.splice($index, 1)">X</a>]
                    </li>
                    <li>
                        [<a href ng-click="
                            char.personality.bonds.push({ name: null, notes: null });
                        ">add</a>]
                    </li>
                </ul>
                <li>flaws:</li>
                <ul>
                    <li ng-repeat="flaw in char.personality.flaws">
                        name <input type="text" ng-model="flaw.name">
                        notes <textarea type="text" ng-model="flaw.notes"></textarea>
                        [<a href ng-click="char.personality.flaws.splice($index, 1)">X</a>]
                    </li>
                    <li>
                        [<a href ng-click="
                            char.personality.flaws.push({ name: null, notes: null });
                        ">add</a>]
                    </li>
                </ul>
            </ul>
            <li>racial features:</li>
            <ul>
                <li ng-repeat="feature in char.features.racial">
                    name <input type="text" ng-model="feature.name">
                    notes <textarea type="text" ng-model="feature.notes"></textarea>
                    [<a href ng-click="char.features.racial.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.features.racial.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>class features:</li>
            <ul>
                <li ng-repeat="feature in char.features.class">
                    name <input type="text" ng-model="feature.name">
                    notes <textarea type="text" ng-model="feature.notes"></textarea>
                    [<a href ng-click="char.features.class.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.features.class.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
        </ul>

        <h2>Charsheet pg. 2</h2>
        <ul>
            <li>age <input type="number" ng-model="char.age"></li>
            <li>height <input type="number" ng-model="char.height"></li>
            <li>weight <input type="number" ng-model="char.weight"></li>
            <li>eyes <textarea type="text" ng-model="char.eyes"></textarea></li>
            <li>skin <textarea type="text" ng-model="char.skin"></textarea></li>
            <li>hair <textarea type="text" ng-model="char.hair"></textarea></li>
            <li>appearance <textarea type="text" ng-model="char.appearance"></textarea></li>
            <li>backstory <textarea type="text" ng-model="char.backstory"></textarea></li>
            <li>allies & organizations:</li>
            <ul>
                <li ng-repeat="ally in char.allies">
                    name <input type="text" ng-model="ally.name">
                    notes <textarea type="text" ng-model="ally.notes"></textarea>
                    [<a href ng-click="char.allies.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.allies.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>additional features & traits:</li>
            <ul>
                <li ng-repeat="feature in char.features.additional">
                    name <input type="text" ng-model="feature.name">
                    notes <textarea type="text" ng-model="feature.notes"></textarea>
                    [<a href ng-click="char.features.additional.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.features.additional.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
            <li>treasure:</li>
            <ul>
                <li ng-repeat="item in char.treasure">
                    name <input type="text" ng-model="item.name">
                    notes <textarea type="text" ng-model="item.notes"></textarea>
                    [<a href ng-click="char.treasure.splice($index, 1)">X</a>]
                </li>
                <li>
                    [<a href ng-click="
                        char.treasure.push({ name: null, notes: null });
                    ">add</a>]
                </li>
            </ul>
        </ul>


    </div>

    <script src="<?= asset('bower_components/angular/angular.js'); ?>"></script>
    <script src="<?= asset('bower_components/angular-aria/angular-aria.js'); ?>"></script>
    <script src="<?= asset('bower_components/angular-animate/angular-animate.js'); ?>"></script>
    <script src="<?= asset('bower_components/hammerjs/hammer.js'); ?>"></script>
    <script src="<?= asset('bower_components/angular-material/angular-material.js'); ?>"></script>
    <script src="<?= asset('js/statList.js'); ?>"></script>

</body>
</html>
