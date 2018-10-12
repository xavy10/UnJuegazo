
<?php
	class Othello{
		public $tablero = array();
		public $m;
		public $nextPlayer;
		public $countScore = 0;
		public $score_1 = 0;
		public $score_2 = 0;
		public $canContinue;
		function __construct(){
			for ($i = 0; $i < 8; $i++) {
				for ($j = 0; $j < 8; $j++) {
					$this->tablero[$i][$j] = 0;
				}
			}
			$this->tablero[3][3] = 1;
			$this->tablero[3][4] = 2;
			$this->tablero[4][3] = 2;
			$this->tablero[4][4] = 1;
		}

		public function getEightLine($x, $y){
			for ($i = $y, $n = 0; $i >= 0; $i--, $n++) { 
				$this->eightLine[0][$n] = $this->tablero[$x][$i];
			}
			for ($i = $x, $j = $y, $n = 0; $i <= 7 && $j >= 0; $i++, $j--, $n++) {
				$this->eightLine[1][$n] = $this->tablero[$i][$j];
			}
			for ($i = $x, $n = 0; $i <= 7; $i++, $n++) { 
				$this->eightLine[2][$n] = $this->tablero[$i][$y];
			}
			for ($i = $x, $j = $y, $n = 0; $i <= 7 && $j <= 7; $i++, $j++, $n++) {
				$this->eightLine[3][$n] = $this->tablero[$i][$j];
			}
			for ($i = $y, $n = 0; $i <= 7; $i++, $n++) { 
				$this->eightLine[4][$n] = $this->tablero[$x][$i];
			}
			for ($i = $x, $j = $y, $n = 0; $i >= 0 && $j <= 7; $i--, $j++, $n++) {
				$this->eightLine[5][$n] = $this->tablero[$i][$j];
			}
			for ($i = $x, $n = 0; $i >= 0; $i--, $n++) { 
				$this->eightLine[6][$n] = $this->tablero[$i][$y];
			}
			for ($i = $x, $j = $y, $n = 0; $i >= 0 && $j >= 0; $i--, $j--, $n++) {
				$this->eightLine[7][$n] = $this->tablero[$i][$j];
			}
		}
		public function moveOthello($x, $y, $m){
			if($m==1 || $m==2){
				$this->getEightLine($x, $y);
				for ($i=0; $i < 8; $i++) {
					if(count($this->eightLine[$i]) > 2 && $this->eightLine[$i][0] == 0 && $m != $this->eightLine[$i][1] && $this->eightLine[$i][1] != 0){

						if ($m == $this->eightLine[$i][2] && $this->eightLine[$i][2] != 0) {
							return $this->changeOthello(2, $i, $x, $y, $m);
						}elseif (count($this->eightLine[$i]) > 3 && $this->eightLine[$i][3] != 0) {
							if ($m == $this->eightLine[$i][3]) {
								return $this->changeOthello(3, $i, $x, $y, $m);
							}elseif (count($this->eightLine[$i]) > 4 && $this->eightLine[$i][4] != 0) {
								if ($m == $this->eightLine[$i][4]) {
									return $this->changeOthello(4, $i, $x, $y, $m);
								}elseif (count($this->eightLine[$i]) > 5 && $this->eightLine[$i][5] != 0) {
									if ($m == $this->eightLine[$i][5]) {
										return $this->changeOthello(5, $i, $x, $y, $m);
									}elseif (count($this->eightLine[$i]) > 6 && $this->eightLine[$i][6] != 0) {
										if ($m == $this->eightLine[$i][6]) {
											return $this->changeOthello(6, $i, $x, $y, $m);
										}elseif (count($this->eightLine[$i]) > 7 && $this->eightLine[$i][7] != 0) {
											if($m == $this->eightLine[$i][7]){
												return $this->changeOthello(7, $i, $x, $y, $m);
											}else{
											}
										}else{
										}
									}else{
									}
								}else{
								}
							}else{
							}
						}else{
						}
					}else{
					}
				}
			}else{
			}
			unset($this->eightLine);
		}

		public function changeOthello($n, $i, $x, $y, $m){
			if ($i == 0) {
				for ($j=0; $j <= $n; $j++) { 
					$this->tablero[$x][($y-$j)] = $m;
					print "<script>(function(){document.getElementsByName('ot_".$x.($y-$j)."').item(0).value='".$m."';})();</script>";
					return true;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}elseif ($i == 1) {
				for ($j=0; $j <= $n; $j++) { 
					$this->tablero[($x+$j)][($y-$j)] = $m;
					print "<script>(function(){document.getElementsByName('ot_".($x+$j).($y-$j)."').item(0).value='".$m."';})();</script>";
					return true;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}elseif ($i == 2) {
				for ($j=0; $j <= $n; $j++) { 
					$this->tablero[($x+$j)][$y] = $m;
					print "<script>(function(){document.getElementsByName('ot_".($x+$j).$y."').item(0).value='".$m."';})();</script>";
					return true;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}elseif ($i == 3) {
				for ($j=0; $j <= $n; $j++) { 
					$this->tablero[($x+$j)][($y+$j)] = $m;
					print "<script>(function(){document.getElementsByName('ot_".($x+$j).($y+$j)."').item(0).value='".$m."';})();</script>";
					return true;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}elseif ($i == 4) {
				for ($j=0; $j <= $n; $j++) { 
					$this->tablero[$x][($y+$j)] = $m;
					print "<script>(function(){document.getElementsByName('ot_".$x.($y+$j)."').item(0).value='".$m."';})();</script>";
					return true;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}elseif ($i == 5) {
				for ($j=0; $j <= $n; $j++) { 
					$this->tablero[($x-$j)][($y+$j)] = $m;
					print "<script>(function(){document.getElementsByName('ot_".($x-$j).($y+$j)."').item(0).value='".$m."';})();</script>";
					return true;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}elseif ($i == 6) {
				for ($j=0; $j <= $n; $j++) { 
					print "<script>(function(){document.getElementsByName('ot_".($x-$j).$y."').item(0).value='".$m."';})();</script>";
					return true;
					$this->tablero[($x-$j)][$y] = $m;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}elseif ($i == 7) {
				for ($j=0; $j <= $n; $j++) { 
					$this->tablero[($x-$j)][($y-$j)] = $m;
					print "<script>(function(){document.getElementsByName('ot_".($x-$j).($y-$j)."').item(0).value='".$m."';})();</script>";
					return true;
				}
				if($_POST['m'] == 2){
					$this->m =1;
				}elseif ($_POST['m'] == 1) {
					$this->m =2;
				}
			}
			return false;
		}

		public function validarJugada($x, $y, $m){
			if ($this->moveOthello($y, $x, $m) == '') {
				return 'NO';
			} else {
				return 'Si';
			}
		}
	}
	$o = new Othello();
	#echo '<br><br>Reurn = '.$o->validarJugada(3,2,2);
	#echo '<br><br>Reurn = '.$o->validarJugada(4,2,2);
	echo '<br><br>Reurn = '.$o->validarJugada(3,2,2);
	echo '<br>';
	echo '<br>';
	echo '<br>';
	for ($i = 0; $i < 8; $i++) {
		for ($j = 0; $j < 8; $j++) {
			echo ' [ '.$o->tablero[$i][$j].' ] ';
		}
		echo '<br>';
	}
?>
