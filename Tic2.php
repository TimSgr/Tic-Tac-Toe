<?php
function zwischen(){
    
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
}



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
        
        $symbol1=readline("Player 1: What is your next move? ");
        
    $i=3;
    while(0<$i){
        if(in_array("$symbol1", $eingaben)){
            if($symbol1=="1A") { $spiel[1]['a']="X"; $eingaben[0]=null;}
            if($symbol1=="2A") { $spiel[2]['a']="X"; $eingaben[1]=null;}
            if($symbol1=="3A") { $spiel[3]['a']="X"; $eingaben[2]=null;}   
            if($symbol1=="1B") { $spiel[1]['b']="X"; $eingaben[3]=null;}   
            if($symbol1=="2B") { $spiel[2]['b']="X"; $eingaben[4]=null;}   
            if($symbol1=="3B") { $spiel[3]['b']="X"; $eingaben[5]=null;}   
            if($symbol1=="1C") { $spiel[1]['c']="X"; $eingaben[6]=null;}   
            if($symbol1=="2C") { $spiel[2]['c']="X"; $eingaben[7]=null;}   
            if($symbol1=="3C") { $spiel[3]['c']="X"; $eingaben[8]=null;}   
            break;
            }
        else {
            echo "Falsche Eingabe! Sie haben noch $i Versuche. \n";
            $symbol1=readline("Player 1: What is your next move? ");  
            $i--;
        }
    }    
    
    //Siegbedingungen
    if ($spiel[1]['a']=="X" && $spiel[1]['b']=="X" && $spiel[1]['c']=="X" || $spiel[2]['a']=="X" && $spiel[2]['b']=="X" && $spiel[2]['c']=="X" || $spiel[3]['a']=="X" && $spiel[3]['b']=="X" && $spiel[3]['c']=="X" || $spiel[1]['a']=="X" && $spiel[2]['b']=="X" && $spiel[3]['c']=="X" ||
        $spiel[1]['a']=="X" && $spiel[2]['a']=="X" && $spiel[3]['a']=="X" || $spiel[1]['b']=="X" && $spiel[2]['b']=="X" && $spiel[3]['b']=="X" || $spiel[1]['c']=="X" && $spiel[2]['c']=="X" && $spiel[3]['c']=="X" || $spiel[1]['c']=="X" && $spiel[2]['b']=="X" && $spiel[3]['a']="X")
    {   
        echo "Player 1 wins \n"; $game1=1; break;
    }
        display($spiel);
        $symbol2=readline("Player 2: What is your next move? ");
    
        $j=3;
        while(0<=$j){
         if(in_array("$symbol2", $eingaben)){
            if($symbol2=="1A") { $spiel[1]['a']="O"; $eingaben[0]=null;}
            if($symbol2=="2A") { $spiel[2]['a']="O"; $eingaben[1]=null;}
            if($symbol2=="3A") { $spiel[3]['a']="O"; $eingaben[2]=null;}   
            if($symbol2=="1B") { $spiel[1]['b']="O"; $eingaben[3]=null;}   
            if($symbol2=="2B") { $spiel[2]['b']="O"; $eingaben[4]=null;}   
            if($symbol2=="3B") { $spiel[3]['b']="O"; $eingaben[5]=null;}   
            if($symbol2=="1C") { $spiel[1]['c']="O"; $eingaben[6]=null;}   
            if($symbol2=="2C") { $spiel[2]['c']="O"; $eingaben[7]=null;}   
            if($symbol2=="3C") { $spiel[3]['c']="O"; $eingaben[8]=null;}   
             break;
         }
         else {
            echo "Falsche Eingabe! Sie haben noch $j Versuche. \n";
            $symbol1=readline("Player 2: What is your next move? ");
            var_dump($eingaben);
            $j--;
         }
        }
    if ($spiel[1]['a']=="O" && $spiel[1]['b']=="O" && $spiel[1]['c']=="O" || $spiel[2]['a']=="O" && $spiel[2]['b']=="O" && $spiel[2]['c']=="O" || $spiel[3]['a']=="O" && $spiel[3]['b']=="O" && $spiel[3]['c']=="O" || $spiel[1]['a']=="O" && $spiel[2]['b']=="O" && $spiel[3]['c']=="O" ||
        $spiel[1]['a']=="O" && $spiel[2]['a']=="O" && $spiel[3]['a']=="O" || $spiel[1]['b']=="O" && $spiel[2]['b']=="O" && $spiel[3]['b']=="O" || $spiel[1]['c']=="O" && $spiel[2]['c']=="O" && $spiel[3]['c']=="O" || $spiel[1]['c']=="O" && $spiel[2]['b']=="O" && $spiel[3]['a']="O")
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