<?php

if($_SERVER['REQUEST_METHOD']==="POST")
{
	if(empty($_POST['username']))
	{
		echo "<h1> style='color:red'>Field empty</h1>";
	}
	else
	{
		echo "<h1> Welcome,".$_POST['username']."</h1>";
	}
}
?> 