<!DOCTYPE html> 
<html> 
<body> 
<?php for ($i = 0; $i < 100; $i++) {
	if ($i % 2 === 0) 
		{ continue; } 
	echo "$i\n"; 
}
 ?> 

</body> 
</html>