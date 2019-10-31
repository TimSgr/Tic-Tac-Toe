<?php

function sieg($k, $spiel){
    if ($spiel[1]['a']=="$k" && $spiel[1]['b']=="$k" && $spiel[1]['c']=="$k" || $spiel[2]['a']=="$k" && $spiel[2]['b']=="$k" && $spiel[2]['c']=="$k" || 
        $spiel[3]['a']=="$k" && $spiel[3]['b']=="$k" && $spiel[3]['c']=="$k" || $spiel[1]['a']=="$k" && $spiel[2]['b']=="$k" && $spiel[3]['c']=="$k" ||
        $spiel[1]['a']=="$k" && $spiel[2]['a']=="$k" && $spiel[3]['a']=="$k" || $spiel[1]['b']=="$k" && $spiel[2]['b']=="$k" && $spiel[3]['b']=="$k" || 
        $spiel[1]['c']=="$k" && $spiel[2]['c']=="$k" && $spiel[3]['c']=="$k" || $spiel[1]['c']=="$k" && $spiel[2]['b']=="$k" && $spiel[3]['a']="X")
        {
            echo "Player $k wins"; $game=1;
        }
};

function eingabe($k,$j,$symbol,$eingaben,$spiel){
    while(0<=$j){
        if(in_array("$symbol", $eingaben)){
           if($symbol=="1A") { $spiel[1]['a']="$k"; $eingaben[0]=null;}
           if($symbol=="2A") { $spiel[2]['a']="$k"; $eingaben[1]=null;}
           if($symbol=="3A") { $spiel[3]['a']="$k"; $eingaben[2]=null;}   
           if($symbol=="1B") { $spiel[1]['b']="$k"; $eingaben[3]=null;}   
           if($symbol=="2B") { $spiel[2]['b']="$k"; $eingaben[4]=null;}   
           if($symbol=="3B") { $spiel[3]['b']="$k"; $eingaben[5]=null;}   
           if($symbol=="1C") { $spiel[1]['c']="$k"; $eingaben[6]=null;}   
           if($symbol=="2C") { $spiel[2]['c']="$k"; $eingaben[7]=null;}   
           if($symbol=="3C") { $spiel[3]['c']="$k"; $eingaben[8]=null;}   
            break;
        }
        else {
           echo "Falsche Eingabe! Sie haben noch $j Versuche. \n";
           $symbol1=readline("Player $k: What is your next move? ");
           $j--;
        }
       }
}

function display($spiel){
    echo "  A | B | C ";
    
    foreach ($spiel as $key => $reihe){ 
        echo "\n";
        echo "  ----------";
        echo "\n";
        echo $key. ' ' . ($reihe['a'] ?? ' '). " | ". ($reihe['b']  ?? ' '). " | ". ($reihe['c']  ?? ' ');
       }
    echo "\n";
};

// Refactoring - Funktion die Einlesefunktion überprüft eingabe

function main () {
    $eingaben=["1A","2A","3A","1B", "2B", "3B", "1C","2C", "3C"];
    $spiel = [
        1 => ['a' => null,'b'=> null,'c'=> null], 
        2 => ['a' => null,'b'=> null,'c'=> null],
        3 => ['a' => null,'b'=> null,'c'=> null]
    ];
    for( $i=0; $i<=8; $i++) {
        
        display($spiel);
        
       $symbol=readline("Player X: What is your next move? ");
        
        eingabe("X",3,$ymbol,$eingaben,$spiel);
        
        sieg("X",$spiel);
        
        display($spiel);
        
        $symbol2=readline("Player 2: What is your next move? ");
        
        
        eingabe("O",3,$symbol,$eingaben,$spiel);
        
        sieg("O",$spiel);
        $i++;
    }
    if ($game!=1) echo "Nobody wins!";
}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
    // ...
    main();
}


?>