<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=No">
        <title>Sorting Project</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div align="center" class="container">
            <div class="header">
                <h2><u>Sorting Visualizer</u></h2>
            </div>
            <div class="part1">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="form-group">
                        <label>Array : </label>
                        <input type="text" class="form-control" name="ARRAY" placeholder="Enter Your Array Here...." required/>
                    </div>
                    <div class="btn-group">
                        <input type="submit" class="sort-btn" name="BUBBLESORT" value="Bubble Sort"/>
                        <input type="submit" class="sort-btn" name="SELECTIONSORT" value="Selection Sort"/>
                        <input type="submit" class="sort-btn" name="INSERTIONSORT" value="Insertion Sort"/>
                        <input type="submit" class="sort-btn" name="MERGESORT" value="Merge Sort"/>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html> 
<?php
//Bubble sort
if(isset($_POST['BUBBLESORT'])){
    $ary = array();
    $element = $_POST['ARRAY'];
    $ele = explode(" ",$element);
    $n = count($ele);
    if($n == 0){
        echo "<script type='text/javascript'>alert('Error: Please Enter Array');
            window.location='index.php'</script>";
    }else{
        echo '<p align="center" style="color: white;">Entered Array is : [';
        for($i=0; $i<$n; $i++){
            array_push($ary,$ele[$i]);
            echo $ele[$i];
            if($i != $n-1){
                echo ", ";
            }
        }
        echo "]<br>";
        $startTime = microtime(true);
        for($i=0; $i<$n-1; $i++){
            echo "<br>";
            $swaps = 0;
            echo "Iteration : ";
            echo $i+1;
            echo "<br>";
            for($j=0; $j<$n-$i-1; $j++){
                echo "    ";
                echo $i+1;
                echo ".";
                echo $j+1;
                echo " ->  ";
                if($ary[$j] > $ary[$j+1]){
                    $temp = $ary[$j];
                    $ary[$j] = $ary[$j+1];
                    $ary[$j+1] = $temp;
                    $swaps = 1;
                }
                //Printing each iteration
                echo "[";
                for($k=0; $k<$n; $k++){
                    echo $ary[$k];
                    if($k != $n-1){
                        echo ", ";
                    }
                }
                echo "]";
                echo "<br>";
            }
            if($swaps == 0){
                break;
            }
        }
        echo "</p>";
        $endTime = microtime(true);
        echo '<p align="center" style="color: white">Sorted Array is : [';
        for($i=0; $i<$n; $i++){
            echo $ary[$i];
            if($i != $n-1){
                echo ", ";
            }
        }
        echo "]"."</p>";
        $finalTime = ($endTime - $startTime);
        echo "<br>"."<p align='center' style='color: white;'>Execution Time of Bubble Sort = ".$finalTime.'</p>';
    }
}elseif(isset($_POST['SELECTIONSORT'])){
    $ary = array();
    $element = $_POST['ARRAY'];
    $ele = explode(" ",$element);
    $n = count($ele);
    if($n == 0){
        echo "<script type='text/javascript'>alert('Error: Please Enter Array');
            window.location='index.php'</script>";
    }else{
        echo '<p align="center" style="color: white;">Entered Array is : [';
        for($i=0; $i<$n; $i++){
            array_push($ary,$ele[$i]);
            echo $ele[$i];
            if($i != $n-1){
                echo ", ";
            }
        }
        echo "]";
        $startTime = microtime(true);
        for($i=0; $i<$n-1; $i++){
            $ci = $i;
            echo "<br><br>";
            $swaps = 0;
            echo "Iteration : ";
            echo $i+1;
            echo "<br>";
            for($j=$i+1; $j<$n; $j++){
                if($ary[$ci] > $ary[$j]){
                    $ci = $j;
                }
            }
            $temp = $ary[$ci];
            $ary[$ci] = $ary[$i];
            $ary[$i] = $temp;
            //Printing each iteration
            echo "[";
            for($k=0; $k<$n; $k++){
                echo $ary[$k];
                if($k != $n-1){
                    echo ", ";
                }
            }
            echo "]";
            echo "<br>";
        }
        echo "</p>";
        $endTime = microtime(true);
        echo '<p align="center" style="color: white">Sorted Array is : [';
        for($i=0; $i<$n; $i++){
            echo $ary[$i];
            if($i != $n-1){
                echo ", ";
            }
        }
        echo "]"."</p>";
        $finalTime = ($endTime - $startTime);
        echo "<br>"."<p align='center' style='color: white;'>Execution Time of Selection Sort = ".$finalTime.'</p>';
    }
}else if(isset($_POST['INSERTIONSORT'])){
	$ary = array();
	$element = $_POST['ARRAY'];
	$ele = explode(" ", $element);
	$n = count($ele);
	if($n == 0){
		echo '<script> alert("Error: Please Enter Array")
				window.location="index.php"</script>';
	}else{
		echo '<p align="center" style="color: white;"> Enter Array is:';
		echo "[";
		for($i=0; $i<$n; $i++){
			array_push($ary,$ele[$i]);
			echo $ele[$i];
			if($i+1 != $n)
				echo ", ";
		}
		echo "]<br><br>";
		
		$starttime = microtime(true);
		//Insertion Sort
		for($i=1; $i<$n; $i++){
			echo "Iteration = ".$i."<br>";
			for($j=$i-1; $j>=0; $j--){
				if($ary[$j] > $ary[$j+1]){
					$temp = $ary[$j];
					$ary[$j] = $ary[$j+1];
					$ary[$j+1] = $temp;
				}else{
					break;
				}
				//Printing iteration
				echo $i.".".$j." -> ";
				echo "[";
				for($k=0; $k<$n; $k++){
					echo $ary[$k]." ";
					if($k+1 != $n)
						echo ", ";
				}
				echo "]<br>";
			}
		}
		$endtime = microtime(true);
		$finaltime = ($endtime - $starttime);
		//Printing
		echo "<br>Sorted Array is = [";
		for($i=0; $i<$n; $i++){
			echo $ary[$i]." ";
			if($i+1!=$n)
				echo ", ";
		}
		echo "]<br><br>";
		
		echo "Running Time of Insertion Sort = ".$finaltime."</p>";
	}
}
?> 