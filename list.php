<?php
$variable = [
["ServerName","Server name. Has a soft limit of 255 characters due to Steam server limitations.","My Server","/Script/DeadMatter.DMGameSession"],
["Password","Server password. Has a soft limit of 255 characters due to Steam server limitations.","Secret Password","/Script/DeadMatter.DMGameSession"],
["MOTD","Server's MOTD, displayed in character creation.","Welcome to the server.","/Script/DeadMatter.DMGameSession"],
["ServerTags","List of server tags for Steam - eg. 'Roleplay,' 'Hardcore,' 'PvP,' etc.","Abc:test","/Script/DeadMatter.DMGameSession"],
["MaxPlayerClaims","Maximum claims per group or player.","3","/Script/DeadMatter.DMGameSession"],
["Seed","Server random seed. Not used much.","0","/Script/DeadMatter.DMGameSession"],
["bFirstPersonOnly","If the server forces first person only. For gameplay reasons, this has no effect.","false","/Script/DeadMatter.DMGameSession"],
["bVACSecure","Whether or not to turn on VAC and EAC.","false","/Script/DeadMatter.DMGameSession"],
["bIsHardcore","Whether or not to turn on hardcore mode.","false","/Script/DeadMatter.DMGameSession"],
["MaxZombieCount","The absolute hard-cap for zombie NPCs. If this many zombies are on the server, no more will be allowed to spawn.","2048","/Script/DeadMatter.DMGameSession"],
["MaxAnimalCount","Above, for animal NPCs.","100","/Script/DeadMatter.DMGameSession"],
["MaxBanditCount","Above, for non-safezone human NPCs.","256","/Script/DeadMatter.DMGameSession"],
["PVP","Toggles whether or not PVP is enabled. If this is false, no damage can be inflicted by one player on another.", "true","/Script/DeadMatter.DMGameSession"],
["FallDamageMultiplier","Change how much damage falling does here. 1.0 is full damage, 0 is no damage at all.","1.0","/Script/DeadMatter.DMGameSession"]
];
$Engine_GameSession = ["MaxPlayers","Maximum player count for the server."];

$Steam = [
    ["Port","Change the Steam advertised gameserver port. If this is absent it'll just use the server's port."],
    ["SteamPort","Change the Steam communications port."],
    ["SteamQueryPort","The port used to query A2S_INFO requests. This is what tells players who's on the server from the server browser."],
    ["Host","Host to advertise to Steam."],
];

$DeadMatter_FlockSpawner =["AnimalSpawnMultiplier","How many more animals to spawn than usual."];
$DeadMatter_GlobalAISpawner =["ZombieSpawnMultiplier","How many more zombies to spawn than usual."];
$DeadMatter_Agenda =["Timescale","The timescale, relative to real time. The default value of 5.5 indicates that one real-life second is 5.5 seconds ingame."];

$DeadMatter_ZombiePawn = [
    ["AttackMultiplier","How strongly the zombies do damage. Set to zero to disable."],
    ["DefenseMultiplier","How much the zombies soak up hits. Set to zero to make them made of paper."],
    ["SteamQueryPort","The port used to query A2S_INFO requests. This is what tells players who's on the server from the server browser."]
];
?>