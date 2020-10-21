<?php


namespace app\Http\Utilits;

class Utilits {

    
    public static function convertValor($val) {
        $value = trim(str_replace('R$', '', $val));
        $value  = str_replace(',', '.', str_replace('.', '', $value));   
        return $value;
    }

    public static function mask($mask, $string) {
        $string = str_replace(' ', '', $string);

        for ($i=0; $i<strlen($string); $i++) {
            $mask[strpos($mask, '#')] = $string[$i];
        }
        return $mask;
    } 


    public static function moedaBrasil($valor, $decimal = 2) {
        return number_format($valor, $decimal, ',', '.');    
    }

    public static function cpfValido($cpf) 
    {
        // Extrai somente os números
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf);
		 
		// Verifica se foi informado todos os digitos corretamente
		if (strlen($cpf) != 11) {
			return false;
		}
		// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return false;
		}
		// Faz o calculo para validar o CPF
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
			}
		}
		return true;
    }
   
	
}