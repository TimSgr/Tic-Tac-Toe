<?php
// Refactoring - Display-Funktion 
// $a = [
//     1 => ['a' => null, null,], 
//     2 => []
// ];

// Refactoring - Funktion die Einlesefunktion überprüft eingabe
// am anfang überprüfen ob Eingabe gültig ist (nur so was wie 1A, 2A ist gültig) nach erfolgreichem Zug 
// wird gültige eingabe aus möglichkeiten entfernt,sodass nichts doppelt dasteht

function main () {
    $eingaben=["1A","2A","3A","1B", "2B", "3B", "1C","2C", "3C"];
    $spiel=[[null, null, null], [null, null, null], [null, null, null]];
    for( $i=0; $i<=8; $i++) {
            echo "  A | B | C ";
            echo "\n";
            echo "  ------------";
            echo "\n";
            echo "1  ".   $spiel[0][0] ."  |  ".  $spiel[1][0] ."  |  ". $spiel[2][0];
            echo "\n";
            echo "  ------------";
            echo "\n";
            echo "2  ".   $spiel[0][1] ."  |  ".  $spiel[1][1] ."  |  ". $spiel[2][1];
            echo "\n";
            echo "  ------------";
            echo "\n";
            echo "3  ".   $spiel[0][2] ."  |  ".  $spiel[1][2] ."  |  ". $spiel[2][2];
            echo "\n";
            $symbol1=readline("Player 1: What is your next move? ");
        
        $i=3;
        while(0<$i){
            if(in_array("$symbol1", $eingaben)){
                if($symbol1=="1A") { $spiel[0][0]="X"; $eingaben[0]=null;}
                if($symbol1=="2A") { $spiel[0][1]="X"; $eingaben[1]=null;}
                if($symbol1=="3A") { $spiel[0][2]="X"; $eingaben[2]=null;}   
                if($symbol1=="1B") { $spiel[1][0]="X"; $eingaben[3]=null;}   
                if($symbol1=="2B") { $spiel[1][1]="X"; $eingaben[4]=null;}   
                if($symbol1=="3B") { $spiel[1][2]="X"; $eingaben[5]=null;}   
                if($symbol1=="1C") { $spiel[2][0]="X"; $eingaben[6]=null;}   
                if($symbol1=="2C") { $spiel[2][1]="X"; $eingaben[7]=null;}   
                if($symbol1=="3C") { $spiel[2][2]="X"; $eingaben[8]=null;}   
                break;
            }
            else {
            echo "Falsche Eingabe! Sie haben noch $i Versuche. \n";
            $symbol1=readline("Player 1: What is your next move? ");  
            $i--;
            }
        }    
    
        //Siegbedingungen
       if ($spiel[0][0]=="X" && $spiel[0][1]=="X" && $spiel[0][2]=="X" || $spiel[1][0]=="X" && $spiel[1][1]=="X" && $spiel[1][2]=="X" || $spiel[2][0]=="X" && $spiel[2][1]=="X" && $spiel[2][2]=="X" || $spiel[0][0]=="X" && $spiel[1][1]=="X" && $spiel[2][2]=="X" ||
           $spiel[0][2]=="X" && $spiel[1][1]=="X" && $spiel[2][0]=="X" || $spiel[0][0]=="X" && $spiel[1][0]=="X" && $spiel[2][0]=="X" || $spiel[0][2]=="X" && $spiel[1][2]=="X" && $spiel[2][2]=="X" || $spiel[0][1]=="X" && $spiel[1][1]=="X" && $spiel[2][1]="X")
        {   
        echo "Player 1 wins \n"; $game1=1; break;
        }
        
    
         echo "  A | B | C ";
         echo "\n";
         echo "  ------------";
         echo "\n";
         echo "1  ".   $spiel[0][0] ."  |  ".  $spiel[1][0] ."  |  ". $spiel[2][0];
         echo "\n";
         echo "  ------------";
         echo "\n";
         echo "2  ".   $spiel[0][1] ."  |  ".  $spiel[1][1] ."  |  ". $spiel[2][1];
         echo "\n";
         echo "  ------------";
         echo "\n";
         echo "3  ".   $spiel[0][2] ."  |  ".  $spiel[1][2] ."  |  ". $spiel[2][2];
         echo "\n";
        $symbol2=readline("Player 2: What is your next move? ");
    
        $j=3;
        while(0<=$j){
         if(in_array("$symbol2", $eingaben)){
            if($symbol2=="1A") { $spiel[0][0]="O"; $eingaben[0]=null;}
            if($symbol2=="2A") { $spiel[0][1]="O"; $eingaben[1]=null;}
            if($symbol2=="3A") { $spiel[0][2]="O"; $eingaben[2]=null;}   
            if($symbol2=="1B") { $spiel[1][0]="O"; $eingaben[3]=null;}   
            if($symbol2=="2B") { $spiel[1][1]="O"; $eingaben[4]=null;}   
            if($symbol2=="3B") { $spiel[1][2]="O"; $eingaben[5]=null;}   
            if($symbol2=="1C") { $spiel[2][0]="O"; $eingaben[6]=null;}   
            if($symbol2=="2C") { $spiel[2][1]="O"; $eingaben[7]=null;}   
            if($symbol2=="3C") { $spiel[2][2]="O"; $eingaben[8]=null;}   
             break;
         }
         else {
            echo "Falsche Eingabe! Sie haben noch $j Versuche. \n";
            $symbol1=readline("Player 2: What is your next move? ");
            var_dump($eingaben);
            $j--;
         }
        }
    
    
       if ($spiel[0][0]=="O" && $spiel[0][1]=="O" && $spiel[0][2]=="O" || $spiel[1][0]=="O" && $spiel[1][1]=="O" && $spiel[1][2]=="O" || $spiel[2][0]=="O" && $spiel[2][1]=="O" && $spiel[2][2]=="O" || $spiel[0][0]=="O" && $spiel[1][1]=="O" && $spiel[2][2]=="O" ||
       $spiel[0][2]=="O" && $spiel[1][1]=="O" && $spiel[2][0]=="O" || $spiel[0][0]=="O" && $spiel[1][0]=="O" && $spiel[2][0]=="O" || $spiel[0][2]=="O" && $spiel[1][2]=="O" && $spiel[2][2]=="O" || $spiel[0][1]=="O" && $spiel[1][1]=="O" && $spiel[2][1]="O")
       {
           echo "Player 2 wins \n"; $game2=1; break;
       }
    }
    if ($game1!=1 && $game2!=1) echo "Nobody wins!";
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
    // ...
    main();
}


?>