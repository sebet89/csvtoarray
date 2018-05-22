<?php

public function csvToArray($file){
    $keys = array();
    $newArray = array();

    //Transforma o arquivo em array
    $array = array_map("str_getcsv", file($file));

    // Define o número de elementos (menos 1 porque mudei para linha 0)
    $count = count($array) - 1;

    //Usa a primeira linhas para as index
    $labels = array_shift($array);

    //salva num array os nomes da index
    foreach ($labels as $label) {
        $keys[] = $label;
    }

    // Colocar o numero da linha pro futuro
    $keys[] = 'id';
    for ($i = 0; $i < $count; $i++) {
        $array[$i][] = $i;
    }

    // Criando tudo em uma array nova
    for ($j = 0; $j < $count; $j++) {
        $d = array_combine($keys, $array[$j]);
        $newArray[$j] = $d;
    }

    return $newArray;
}