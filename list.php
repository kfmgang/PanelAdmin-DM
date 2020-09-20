<?php
$variable = [
["ServerName","Server name. Has a soft limit of 255 characters due to Steam server limitations.","My Server","/Script/DeadMatter.DMGameSession","text"],
["Password","Server password. Has a soft limit of 255 characters due to Steam server limitations.","Secret Password","/Script/DeadMatter.DMGameSession","text"],
["MaxPlayers","Maximum player count for the server.","36","/Script/Engine.GameSession","number"],
["MOTD","Server's MOTD, displayed in character creation.","Welcome to the server.","/Script/DeadMatter.DMGameSession","text"],
["ServerTags","List of server tags for Steam - eg. 'Roleplay,' 'Hardcore,' 'PvP,' etc.","Abc:test","/Script/DeadMatter.DMGameSession","text"],
["MaxPlayerClaims","Maximum claims per group or player.","3","/Script/DeadMatter.DMGameSession","number"],
["Seed","Server random seed. Not used much.","0","/Script/DeadMatter.DMGameSession","number"],
["bFirstPersonOnly","If the server forces first person only. For gameplay reasons, this has no effect.","false","/Script/DeadMatter.DMGameSession","text"],
["bVACSecure","Whether or not to turn on VAC and EAC.","false","/Script/DeadMatter.DMGameSession","text"],
["bIsHardcore","Whether or not to turn on hardcore mode.","false","/Script/DeadMatter.DMGameSession","text"],
["MaxZombieCount","The absolute hard-cap for zombie NPCs. If this many zombies are on the server, no more will be allowed to spawn.","2048","/Script/DeadMatter.DMGameSession","number"],
["MaxAnimalCount","Above, for animal NPCs.","100","/Script/DeadMatter.DMGameSession","number"],
["MaxBanditCount","Above, for non-safezone human NPCs.","256","/Script/DeadMatter.DMGameSession","number"],
["PVP","Toggles whether or not PVP is enabled. If this is false, no damage can be inflicted by one player on another.", "true","/Script/DeadMatter.DMGameSession","text"],
["FallDamageMultiplier","Change how much damage falling does here. 1.0 is full damage, 0 is no damage at all.","1.0","/Script/DeadMatter.DMGameSession","number"],
["Port","Change the Steam advertised gameserver port. If this is absent it'll just use the server's port.","7777","Steam","number"],
["SteamPort","Change the Steam communications port.","7778","Steam","number"],
["SteamQueryPort","The port used to query A2S_INFO requests. This is what tells players who's on the server from the server browser.","27016","Steam","number"],
["Host","Host to advertise to Steam.","0.0.0.0","Steam","number"],
["AnimalSpawnMultiplier","How many more animals to spawn than usual.","1.0","/Script/DeadMatter.FlockSpawner","number"],
["ZombieSpawnMultiplier","How many more zombies to spawn than usual.","1.0","/Script/DeadMatter.GlobalAISpawner","number"],
["Timescale","The timescale, relative to real time. The default value of 5.5 indicates that one real-life second is 5.5 seconds ingame.","5.5","/Script/DeadMatter.Agenda","number"],
["AttackMultiplier","How strongly the zombies do damage. Set to zero to disable.","1.0","/Script/DeadMatter.ZombiePawn","number"],
["DefenseMultiplier","How much the zombies soak up hits. Set to zero to make them made of paper.","1.0","/Script/DeadMatter.ZombiePawn","number"]
];

?>