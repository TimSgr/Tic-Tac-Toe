<?php

function sieg($k, $spiel){
    if ($spiel[1]['a']=="$k" && $spiel[1]['b']=="$k" && $spiel[1]['c']=="$k" || $spiel[2]['a']=="$k" && $spiel[2]['b']=="$k" && $spiel[2]['c']=="$k" ||
        $spiel[3]['a']=="$k" && $spiel[3]['b']=="$k" && $spiel[3]['c']=="$k" || $spiel[1]['a']=="$k" && $spiel[2]['b']=="$k" && $spiel[3]['c']=="$k" ||
        $spiel[1]['a']=="$k" && $spiel[2]['a']=="$k" && $spiel[3]['a']=="$k" || $spiel[1]['b']=="$k" && $spiel[2]['b']=="$k" && $spiel[3]['b']=="$k" ||
        $spiel[1]['c']=="$k" && $spiel[2]['c']=="$k" && $spiel[3]['c']=="$k" || $spiel[1]['c']=="$k" && $spiel[2]['b']=="$k" && $spiel[3]['a']=="$k")
        {
            echo "Player $k wins \n"; $game=1;
            exit (0);

        }
};

function eingabe($k,$j,&$spiel){

    while(0<=$j){
        $symbol=readline("Player $k: What is your next move? ");
        $zahl=null;
        $buchstabe=null;
        if (strlen($symbol)==2) {
            $a = str_split($symbol);
            foreach ($a as $e) {
                $e=strtolower($e);
                if(strpos('abc',$e)!==false){
                    $buchstabe=$e;
                } elseif(strpos('123',"$e")!==false){
                    $zahl=$e;
                } else {
                    echo "Die Eingabe ist nicht gültig \n";
                    $j--;
                }

            }
            // var_dump($a);
            // echo "z ".$zahl;
            // echo "b ".$buchstabe;

            if($zahl == null || $buchstabe == null) {
                break;
            }
            $zahl = intval($zahl);
            if (($spiel[$zahl][$buchstabe]) == null){
                $spiel[$zahl][$buchstabe]=$k;
                // var_dump($spiel);
                return;
            }else{
                echo "Falsche Eingabe! Sie haben noch $j Versuche. \n";
                $j--;
            }

        }else{
            echo "Zu lange bzw zu kurze Eingabe \n";
            $j--;
        }

    }

    die('Das Spiel ist vorbei \n');

}
function display($spiel){
    echo "  A | B | C ";

    foreach ($spiel as $key => $reihe) {
        echo "\n";
        echo "  ----------";
        echo "\n";
        echo $key. ' ';
        foreach ($reihe as $schlüssel => $spalte) {
            echo $spalte ?? ' ';
            if ($schlüssel!='c') {
                echo " | ";
            }
        }
    }
    echo "\n";
};

// Refactoring - Funktion die Einlesefunktion überprüft eingabe

function main () {
    $spiel = [
        1 => ['a' => null,'b'=> null,'c'=> null],
        2 => ['a' => null,'b'=> null,'c'=> null],
        3 => ['a' => null,'b'=> null,'c'=> null]
    ];

    $marker="X";

    for( $i=0; $i<=8; $i++) {

        display($spiel);

        eingabe($marker,3,$spiel);

        sieg($marker,$spiel);


        $marker = ($marker == 'X') ? 'O' : 'X';
    }

}

if ($argv && $argv[0] && realpath($argv[0]) === __FILE__) {
    // ...
    main();
}


?>
