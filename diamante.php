<?php

	/*
		$letra = Letra Informada pelo Usuário Transformada em Maiúscula.
		$arrayAlfabeto = Array de Letras de A a Z.
		$posicaoReal = Armazena o índice da letra no ArrayAlfabeto.
		$letraAnterior = Variável auxiliar para subtrair as letras anteriores a informada.
		$indiceLetra = Obtém o índice da letra informada adicionando +1.
		$numRows e $numCols = Obtém o número de linhas e colunas dinamicamente para o diamante,
		$centro = Obtém a coluna central - Resultado da divisao do numero de colunas por 2 arredondado para o próximo número inteiro - para impressão do primeiro caracteere do alfabeto.
	*/

	function diamond($letra){
		$letra = strtoupper($letra);
		$arrayAlfabeto = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		$posicaoReal = $indiceLetra = $linhaCol1 = $linhaCol2 = $numCols = $numRows = '';
		$letraAnterior = 1;
		$indiceLetra = array_search($letra, $arrayAlfabeto);
		$numRows = $numCols = ( ( $indiceLetra ) * 2 ) + 1;
		$centro = ceil( $numCols / 2 );
	
		echo "Numero de Colunas: ".$numCols."<br>";
		echo "Numero de Linhas: ".$numRows."<br>";
		echo "Centro: ".$centro."<br>";
		echo "Indice Letra $indiceLetra <br>";
		echo " - - - - - - - -  - - - - - - - - - <br><br><br><br><br><br>";
		
		if( $letra == 'A' ) {
			echo "Linha 1 - Col 2 <br>";
			echo "Linha 2 - Col 1 <br>";
			echo "Linha 2 - Col 3 <br>";
			echo "Linha 3 - Col 2 <br>";
			return;
		}
	
		for( $i = 1; $i <= $numRows; $i++ ){			
				if( $i === 1 ){
					echo "Linha: $i, Coluna: $centro, Letra: A<br>";
					$linhaCol1 = $linhaCol2 = $centro;
				}				
				if( ( $i > 1) && ( $i < ($indiceLetra +1) ) ){
					echo "Linha: $i, Coluna: ".( $linhaCol1 - 1)." , Letra: ".$arrayAlfabeto[$i-1]."<br>";
					echo "Linha: $i, Coluna: ".( $linhaCol2 + 1)." , Letra: ".$arrayAlfabeto[$i-1]."<br>";
					$linhaCol1 -= 1;
					$linhaCol2 += 1;					
				}
				
				if( $i == ( $indiceLetra + 1 ) ){
					echo "Linha: $i, Coluna: ". ( $linhaCol1 - 1 ) ." Letra: $letra <br>";
					echo "Linha: $i, Coluna: ". ( $linhaCol2 + 1 ) ." Letra: $letra <br>";
					$linhaCol1 -= 1;
					$linhaCol2 += 1;
				}
				
				
				if( ( $i > 1 ) && ( $i > ( $indiceLetra + 1 ) ) && ( $i < $numRows ) ){
					echo "Linha: $i, Coluna: ".( $linhaCol1 + 1)." , Letra: ".$arrayAlfabeto[ $indiceLetra - $letraAnterior ]."<br>";
					echo "Linha: $i, Coluna: ".( $linhaCol2 - 1)." , Letra: ".$arrayAlfabeto[ $indiceLetra - $letraAnterior ]."<br>";
					$letraAnterior += 1;
					$linhaCol1 += 1;
					$linhaCol2 -= 1;
				}

				
				if( $i == $numRows ){
					echo "Linha: $i, Coluna: $centro, Letra: A<br>";
				}			
		}
	}
	
	diamond('G');
?>