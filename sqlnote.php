<link href="http://alexgorbatchev.com/pub/sh/current/styles/shThemeDefault.css" rel="stylesheet" type="text/css" />
<script src="http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js" type="text/javascript"></script>
<script src="http://agorbatchev.typepad.com/pub/sh/3_0_83/scripts/shBrushSql.js" type="text/javascript"></script>
<script src="http://alexgorbatchev.com/pub/sh/current/scripts/shAutoloader.js" type="text/javascript"></script>
<script type="text/javascript">
     SyntaxHighlighter.all()
</script>
<form method="post">
<input type="text" name="string_table" placeholder="Pladoo SQL String">
<button type="submit">Generate SQL</button>
</form>
<?php
if(isset($_POST["string_table"]))
{
	$string_table = $_POST["string_table"];

	$table_name = explode("::",$string_table);
	$table_name = $table_name[0];

	$fields = explode("::",$string_table);
	$fields = $fields[1];

	$needle = array("[","]","|",",");
	$replace = array("&nbsp;","&nbsp;","&nbsp;",",\n");

	$fields_name = str_replace($needle,$replace,$fields);

	echo "<script type='syntaxhighlighter' class='brush: sql'>CREATE TABLE ".$table_name."\n(\n".$fields_name."\n);</script>";
}
?>
