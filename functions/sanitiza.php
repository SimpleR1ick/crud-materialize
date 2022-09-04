<?php
/**
 * Em um array de strings, verifica se a original e igual a copia sanitizada 
 * 
 * @param array $array
 * 
 * @return bool True se encontrar algum inject - False se a validação ocorrer com sucesso
 * 
 * @author Henrique Dalmagro
 */
function sanitizaPost($array): bool {
    foreach ($array as $strOriginal) {
        // Armazena e uma variavel auxiliar a versão sanitizada
        $stringCopia = htmlspecialchars($strOriginal);

        // Verifica se elas são diferentes
        if ($stringCopia != $strOriginal) {
            return true;
            break;
        }
    return false;
    }
}
?>