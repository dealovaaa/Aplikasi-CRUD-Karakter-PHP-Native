<?php

$varFile = "layla.json";
$dataJson =  file_get_contents($varFile);

$data = json_decode($dataJson,true);



$varFile2 = "hutao.json";
$dataJson2 =  file_get_contents($varFile2);

$data2 = json_decode($dataJson2,true);


$varFile3 = "noelle.json";
$dataJson3 =  file_get_contents($varFile3);

$data3 = json_decode($dataJson3,true);



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Characters</title>
        <link rel="stylesheet" href="characters.css">
    </head>
    <body>

        <div class="banner1"> </div>
     
        <div class="container">
            <div class="container2">
                <div class="containerbaru">
                    <img src="https://genshin.jmp.blue/characters/layla/icon-big">
                    <div class="containerContoh">
                        <p class="name"> <?=$data['name']?> </p> 
                        <p class="description"> <?=$data['description']?> </p>
                    </div>
                </div>
                <div class="weapon">
                <div class="containerContoh2">
                    <p class="description2">
                    Title : <?=$data['title']?>  <br>
                    Vision : <?=$data['vision']?>  <br>
                    Weapon : <?=$data['weapon']?>  <br>
                    Affiliation : <?=$data['affiliation']?>  <br>
                    Release : <?=$data['release']?>  <br>
                    Birthday : <?=$data['birthday']?>  <br>
                    </p>
                </div>
                <div class="laylaweapon">
                
                <img src="layla_weapon.png">
                <img src="layla_weapon2.png">
                <img src="layla_weapon3.png">
                <img src="layla_weapon4.png">
                <img src="layla_weapon5.png">
                </div>

            </div>
            </div>

            <div class="banner2"> </div>
            

            <div class="container3">
            <div class="containerbaru">
                    <img src="https://genshin.jmp.blue/characters/hu-tao/icon-big">
                    <div class="containerContoh">
                        <p class="name"> <?=$data2['name']?> </p> 
                        <p class="description"> <?=$data2['description']?> </p>
                    </div>
                </div>
                <div class="weapon">
                <div class="containerContoh2">
                    <p class="description2">
                    Title : <?=$data2['title']?>  <br>
                    Vision : <?=$data2['vision']?>  <br>
                    Weapon : <?=$data2['weapon']?>  <br>
                    Affiliation : <?=$data2['affiliation']?>  <br>
                    Release : <?=$data2['release']?>  <br>
                    Birthday : <?=$data2['birthday']?>  <br>
                    </p>
                </div>
                <div class="hutaoweapon">
                
                <img src="hutao_weapon.png">
                <img src="hutao_weapon2.png">
                <img src="hutao_weapon3.png">
                <img src="hutao_weapon4.png">
                <img src="hutao_weapon5.png">
                </div>

            </div>
            </div>

            <div class="banner3"> </div>

            <div class="container3">
            <div class="containerbaru">
                    <img src="https://genshin.jmp.blue/characters/noelle/icon-big">
                    <div class="containerContoh">
                        <p class="name"> <?=$data3['name']?> </p> 
                        <p class="description"> <?=$data3['description']?> </p>
                    </div>
                </div>
                <div class="weapon">
                <div class="containerContoh2">
                    <p class="description2">
                    Title : <?=$data3['title']?>  <br>
                    Vision : <?=$data3['vision']?>  <br>
                    Weapon : <?=$data3['weapon']?>  <br>
                    Affiliation : <?=$data3['affiliation']?>  <br>
                    Release : <?=$data3['release']?>  <br>
                    Birthday : <?=$data3['birthday']?>  <br>
                    </p>
                </div>
                <div class="noelleweapon">
                
                <img src="noelle_weapon.png">
                <img src="noelle_weapon2.png">
                <img src="noelle_weapon3.png">
                <img src="noelle_weapon4.png">
                <img src="noelle_weapon5.png">
                </div>

            </div>
            </div>
        </div>
    </body>
</html>
