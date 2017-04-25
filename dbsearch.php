<head> 
<a href="http://jasmine.cs.vcu.edu:20038/~leachbr/index.php" style="text-decoration:none"><center>Home</center></a>
</head>
<br>

<?php
$allTables = [];
$allAttributes = array('bug_id', 'found', 'resolved', 'story_id', 'priority', 'difficulty', 
		'parent_id', 'child_id', 'comm_log', 'e_id', 'first_name', 'last_name', 'email', 'job_position', 
		'github', 'project_id', 'pro_id', 'proj_id', 'p_id', 'project_name', 'bug_begin_line', 'bug_end_line', 
		'hours' );

$searchField = '';
$searchField = (isset($_POST['bugS']) ? $searchField = $searchField . $_POST['bugS'] : $searchField = '');
$whereClause = $searchField;
$bugCol = '';
isset($_POST['bug_idC']) ? $bugCol = $bugCol . $_POST['bug_idC'] : $bugCol = $bugCol;
isset($_POST['foundC']) ? $bugCol = $bugCol . ',' . $_POST['foundC'] : $bugCol = $bugCol;
isset($_POST['resolvC']) ? $bugCol = $bugCol . ',' . $_POST['resolvC'] : $bugCol = $bugCol;
isset($_POST['priorityC']) ? $bugCol = $bugCol . ',' . $_POST['priorityC'] : $bugCol = $bugCol;
isset($_POST['difficultyC']) ? $bugCol = $bugCol . ',' . $_POST['difficultyC'] : $bugCol = $bugCol;


$bugCol = trim($bugCol, ',');
if (ctype_space($bugCol) || $bugCol == '' ) { } else { $allTables[] = 'bug'; }


$bugSpawnCol = '';
$bugSpawnCol = (isset($_POST['b_parent_idC']) ? $bugSpawnCol . $_POST['b_parent_idC'] : $bugSpawnCol);
$bugSpawnCol = (isset($_POST['b_child_idC']) ? $bugSpawnCol . ',' . $_POST['b_child_idC'] : $bugSpawnCol);
$bugSpawnCol = trim($bugSpawnCol, ',');
if (ctype_space($bugSpawnCol) || $bugSpawnCol == '' ) { } else { $allTables[] = 'bug_spawn'; }


$commCol = '';
$commCol = (isset($_POST['cstory_idC']) ? $commCol . $_POST['cstory_idC'] : $commCol);
$commCol = (isset($_POST['comm_logC']) ? $commCol . ',' . $_POST['comm_logC'] : $commCol);
$commCol = trim($commCol, ',');
if (ctype_space($commCol) || $commCol == '' ) { } else { $allTables[] = 'communications'; }


$empCol = '';
$empCol = (isset($_POST['e_idC']) ? $empCol . $_POST['e_idC'] : $empCol);
$empCol = (isset($_POST['firstC']) ? $empCol . ',' . $_POST['firstC'] : $empCol);
$empCol = (isset($_POST['lastC']) ? $empCol . ',' . $_POST['lastC'] : $empCol);
$empCol = (isset($_POST['emailC']) ? $empCol . ',' . $_POST['emailC'] : $empCol);
$empCol = (isset($_POST['jobC']) ? $empCol . ',' . $_POST['jobC'] : $empCol);
$empCol = (isset($_POST['gitC']) ? $empCol . ',' .  $_POST['gitC'] : $empCol);
$empCol = trim($empCol, ',');
if (ctype_space($empCol) || $empCol == '' ) { } else { $allTables[] = 'employee'; }


$handleCol = '';
$handleCol = (isset($_POST['hproj_idC']) ? $_POST['hproj_idC'] : $handleCol);
$handleCol = (isset($_POST['hbugC']) ? $handleCol . ',' . $_POST['hbugC'] : $handleCol);
$handleCol = trim($handleCol, ',');
if (ctype_space($handleCol) || $handleCol == '' ) { } else { $allTables[] = 'handles'; }


$projCol = '';
$projCol = (isset($_POST['p_idC']) ? $projCol . $_POST['p_idC'] : $projCol);
$projCol = (isset($_POST['proj_nameC']) ? $projCol . ',' . $_POST['proj_nameC'] : $projCol);
$projCol = trim($projCol, ',');
if (ctype_space($projCol) || $projCol == '' ) { } else { $allTables[] = 'project'; }


$storyCol = '';
$storyCol = (isset($_POST['bblineC']) ? $storyCol . $_POST['bblineC'] : $storyCol);
$storyCol = (isset($_POST['belineC']) ? $storyCol . ',' . $_POST['belineC'] : $storyCol);
$storyCol = (isset($_POST['sstory_idC']) ? $storyCol . ',' . $_POST['sstory_idC'] : $storyCol);
$storyCol = trim($storyCol, ',');
if (ctype_space($storyCol) || $storyCol == '' ) { } else { $allTables[] = 'story'; }


$workCol = '';
$workCol = (isset($_POST['work_e_idC']) ? $workCol . $_POST['work_e_idC'] : $workCol);
$workCol = (isset($_POST['wproj_idC']) ? $workCol . ',' . $_POST['wproj_idC'] : $workCol);
$workCol = (isset($_POST['hoursC']) ? $workCol . ',' . $_POST['hoursC'] : $workCol);
$workCol = trim($workCol, ',');
if (ctype_space($workCol) || $workCol == '' ) { } else { $allTables[] = 'works'; }
	

$writeCol = '';
$writeCol = (isset($_POST['wstory_idC']) ? $writeCol . ',' . $_POST['wstory_idC'] : $writeCol);
$writeCol = trim($writeCol, ',');
if (ctype_space($writeCol) || $writeCol == '' ) { } else { $allTables[] = 'writes'; }


$allCol = array($bugCol, $bugSpawnCol, $commCol, $empCol, $handleCol, $projCol, $storyCol, 
	  $workCol, $writeCol);

$newAllCol = '';
for ($i = 0; $i < count($allCol); $i++) {
	if ($allCol[$i] == '') {continue;}
	$newAllCol = $newAllCol . ',' . $allCol[$i];
	$newAllCol = trim($newAllCol, ',');
} 


?>









<html>
   <body>
   
<form action = "<?php $_PHP_SELF ?>" method = "POST">
Search: <input type="text" name="bugS" placeholder="<column> <=|like> <number|string> 
&hellip; <or|and> <column> <=|like> <number|string>" onFocus="this.value=''" size="63" /> 

<select name="OrderBy">
<option value="">Order By</option>
<option value="bug_begin_line">BUG_BEGIN_LINE</option>
<option value="bug_end_line">BUG_END_LINE</option>
<option value="bug_id">BUG_ID</option>
<option value="comm_log">COMM_LOG</option>
<option value="child_id">CHILD_ID</option>
<option value="difficulty">DIFFICULTY</option>
<option value="e_id">EMPLOYEE_ID</option>
<option value="email">EMAIL</option>
<option value="first_name">FIRST_NAME</option>
<option value="found">FOUND</option>
<option value="github">GITHUB</option>
<option value="hours">HOURS</option>
<option value="job_position">JOB_POSITION</option>
<option value="last_name">LAST_NAME</option>
<option value="parent_id">PARENT_ID</option>
<option value="priority">PRIORITY</option>
<option value="project_id">PROJECT_ID</option>
<option value="project_name">PROJECT_NAME</option>
<option value="resolved">RESOLVED</option>
<option value="story_id">STORY_ID</option>
</select>

<select name="sort by" style="width:70px;">
<option value="">Sort By</option>
<option value="asc">Ascending</option>
<option value="desc">Decending</option>
<option value="asc">alphabetical</option>
</select>

<select name="GroupBy">
<option value="">Group By</option>
<option value="bug_begin_line">BUG_BEGIN_LINE</option>
<option value="bug_end_line">BUG_END_LINE</option>
<option value="bug_id">BUG_ID</option>
<option value="comm_log">COMM_LOG</option>
<option value="child_id">CHILD_ID</option>
<option value="difficulty">DIFFICULTY</option>
<option value="e_id">EMPLOYEE_ID</option>
<option value="email">EMAIL</option>
<option value="first_name">FIRST_NAME</option>
<option value="found">FOUND</option>
<option value="github">GITHUB</option>
<option value="hours">HOURS</option>
<option value="job_position">JOB_POSITION</option>
<option value="last_name">LAST_NAME</option>
<option value="parent_id">PARENT_ID</option>
<option value="priority">PRIORITY</option>
<option value="project_id">PROJECT_ID</option>
<option value="project_name">PROJECT_NAME</option>
<option value="resolved">RESOLVED</option>
<option value="story_id">STORY_ID</option>
</select> 

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;

<select name="applyFunction">
<option value="">Apply Function</option>
<option value="avg">Average</option>
<option value="min">Min</option>
<option value="max">Max</option>
<option value="sum">Sum</option>
<option value="count">Count</option>
</select> 

<select name="functionCol">
<option value="">To Column</option>
<option value="bug_begin_line">BUG_BEGIN_LINE</option>
<option value="bug_end_line">BUG_END_LINE</option>
<option value="bug_id">BUG_ID</option>
<option value="comm_log">COMM_LOG</option>
<option value="child_id">CHILD_ID</option>
<option value="difficulty">DIFFICULTY</option>
<option value="e_id">EMPLOYEE_ID</option>
<option value="email">EMAIL</option>
<option value="first_name">FIRST_NAME</option>
<option value="found">FOUND</option>
<option value="github">GITHUB</option>
<option value="hours">HOURS</option>
<option value="job_position">JOB_POSITION</option>
<option value="last_name">LAST_NAME</option>
<option value="parent_id">PARENT_ID</option>
<option value="priority">PRIORITY</option>
<option value="project_id">PROJECT_ID</option>
<option value="project_name">PROJECT_NAME</option>
<option value="resolved">RESOLVED</option>
<option value="story_id">STORY_ID</option>
</select> 

<select name="functionGroup">
<option value="">To Group</option>
<option value="bug_begin_line">BUG_BEGIN_LINE</option>
<option value="bug_end_line">BUG_END_LINE</option>
<option value="bug_id">BUG_ID</option>
<option value="comm_log">COMM_LOG</option>
<option value="child_id">CHILD_ID</option>
<option value="difficulty">DIFFICULTY</option>
<option value="e_id">EMPLOYEE_ID</option>
<option value="email">EMAIL</option>
<option value="first_name">FIRST_NAME</option>
<option value="found">FOUND</option>
<option value="github">GITHUB</option>
<option value="hours">HOURS</option>
<option value="job_position">JOB_POSITION</option>
<option value="last_name">LAST_NAME</option>
<option value="parent_id">PARENT_ID</option>
<option value="priority">PRIORITY</option>
<option value="project_id">PROJECT_ID</option>
<option value="project_name">PROJECT_NAME</option>
<option value="resolved">RESOLVED</option>
<option value="story_id">STORY_ID</option>
</select> 

&nbsp;

<select name="fromMonth">
<option value="">From Month</option>
<option value="Jan">Jan</option>
<option value="Feb">Feb</option>
<option value="Mar">Mar</option>
<option value="Apr">Apr</option>
<option value="May">May</option>
<option value="Jun">Jun</option>
<option value="Jul">Jul</option>
<option value="Aug">Aug</option>
<option value="Sept">Sep</option>
<option value="Oct">Oct</option>
<option value="Nov">Nov</option>
<option value="Dec">Dec</option>
</select>

<select name="fromYear">
<option value="">From Year</option>
<option value="80">1980</option>
<option value="81">1981</option>
<option value="82">1982</option>
<option value="83">1983</option>
<option value="84">1984</option>
<option value="85">1985</option>
<option value="86">1986</option>
<option value="87">1987</option>
<option value="88">1988</option>
<option value="89">1989</option>
<option value="90">1990</option>
<option value="91">1991</option>
<option value="92">1992</option>
<option value="93">1993</option>
<option value="94">1994</option>
<option value="95">1995</option>
<option value="96">1996</option>
<option value="97">1997</option>
<option value="98">1998</option>
<option value="99">1999</option>
<option value="00">2000</option>
<option value="01">2001</option>
<option value="02">2002</option>
<option value="03">2003</option>
<option value="04">2004</option>
<option value="05">2005</option>
<option value="06">2006</option>
<option value="07">2007</option>
<option value="08">2008</option>
<option value="09">2009</option>
<option value="10">2010</option>
<option value="11">2011</option>
<option value="12">2012</option>
<option value="13">2013</option>
<option value="14">2014</option>
<option value="15">2015</option>
<option value="16">2016</option>
<option value="17">2017</option>
</select>

<select name="toMonth">
<option value="">To Month</option>
<option value="Jan">Jan</option>
<option value="Feb">Feb</option>
<option value="Mar">Mar</option>
<option value="Apr">Apr</option>
<option value="May">May</option>
<option value="Jun">Jun</option>
<option value="Jul">Jul</option>
<option value="Aug">Aug</option>
<option value="Sept">Sep</option>
<option value="Oct">Oct</option>
<option value="Nov">Nov</option>
<option value="Dec">Dec</option>
</select>

<select name="toYear">
<option value="">To Year</option>
<option value="80">1980</option>
<option value="81">1981</option>
<option value="82">1982</option>
<option value="83">1983</option>
<option value="84">1984</option>
<option value="85">1985</option>
<option value="86">1986</option>
<option value="87">1987</option>
<option value="88">1988</option>
<option value="89">1989</option>
<option value="90">1990</option>
<option value="91">1991</option>
<option value="92">1992</option>
<option value="93">1993</option>
<option value="94">1994</option>
<option value="95">1995</option>
<option value="96">1996</option>
<option value="97">1997</option>
<option value="98">1998</option>
<option value="99">1999</option>
<option value="00">2000</option>
<option value="01">2001</option>
<option value="02">2002</option>
<option value="03">2003</option>
<option value="04">2004</option>
<option value="05">2005</option>
<option value="06">2006</option>
<option value="07">2007</option>
<option value="08">2008</option>
<option value="09">2009</option>
<option value="10">2010</option>
<option value="11">2011</option>
<option value="12">2012</option>
<option value="13">2013</option>
<option value="14">2014</option>
<option value="15">2015</option>
<option value="16">2016</option>
<option value="17">2017</option>
</select><br>

&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<br>

Bug characteristics: <br>
BUG_ID <input type="checkbox" name="bug_idC" value="bug_id"> 
FOUND <input type="checkbox" name="foundC" value="found"> 
RESOLVED <input type="checkbox" name="resolvC" value="resolved"> 
CHILD_ID <input type="checkbox" name="b_child_idC" value="child_id"> 
PARENT_ID <input type="checkbox" name="b_parent_idC" value="parent_id"> 
DIFFICULTY <input type="checkbox" name="difficultyC" value="difficulty"> &nbsp;
PRIORITY <input type="checkbox" name="priorityC" value="priority"> <br><br>

Documents and source code for bugs: <br>
STORY_ID <input type="checkbox" name="sstory_idC" value="story_id"> &nbsp;
BUG_BEGIN_LINE <input type="checkbox" name="bblineC" value="bug_begin_line"> &nbsp;
BUG_END_LINE <input type="checkbox" name="belineC" value="bug_end_line"> &nbsp;
COMMUNICATIONS_LOG <input type="checkbox" name="comm_logC" value="comm_log"> &nbsp; <br><br>

Employees: <br>
EMPLOYEE_ID <input type="checkbox" name="e_idC" value="e_id"> &nbsp;
EMAIL <input type="checkbox" name="emailC" value="email"> &nbsp;
FIRST_NAME <input type="checkbox" name="firstC" value="first_name"> &nbsp;
LAST_NAME <input type="checkbox" name="lastC" value="last_name"> &nbsp;
GITHUB <input type="checkbox" name="gitC" value="github">
HOURS <input type="checkbox" name="hoursC" value="hours"> &nbsp;
JOB_POSITION <input type="checkbox" name="jobC" value="job_position"> &nbsp;<br><br>

Projects: <br>
PROJECT_ID <input type="checkbox" name="hproj_idC" value="project_id"> &nbsp;
PROJECT_NAME <input type="checkbox" name="proj_nameC" value="project_name"> &nbsp;

&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <input type = "submit" 
style="width:100px;height:40px; font-size:20px;"/>
<br><br><br>


text entered: <?php echo $searchField; ?> &nbsp; &nbsp; &nbsp; &nbsp; 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <br>
<?php echo 'columns selected: ' . $newAllCol; ?> <br>
    
      </form>
   </body>
</html>








<?php

$newAllTables = '';
foreach ($allTables as $value) { 
	$newAllTables = $value . ', ' . $newAllTables;
}

if (in_array("employee", $allTables) && in_array("project", $allTables) && in_array("bug", $allTables) && in_array("story", $allTables)) {
	displayTable($newAllCol, 'allTables2', $whereClause); 
}
elseif((in_array("employee", $allTables) && in_array("project", $allTables) && in_array("bug", $allTables))
	|| (in_array("employee", $allTables) && in_array("project", $allTables) && in_array("handles", $allTables))
 	|| (in_array("works", $allTables) && in_array("project", $allTables) && in_array("bug", $allTables))
	|| (in_array("works", $allTables) && in_array("project", $allTables) && in_array("handles", $allTables)) ) {

	displayTable($newAllCol, 'empWprojHbug', $whereClause); 
}
elseif (in_array("employee", $allTables) && in_array("story", $allTables) && in_array("bug", $allTables)) {
	displayTable($newAllCol, 'empWstoryBug', $whereClause); 
}
elseif (in_array("project", $allTables) && in_array("bug", $allTables) && in_array("story", $allTables)) {
	
	displayTable($newAllCol, 'projHbugStory', $whereClause); 
}
elseif ((in_array("story", $allTables) && in_array("employee", $allTables) && in_array("project", $allTables)) 
	|| (in_array("story", $allTables) && in_array("employee", $allTables) && in_array("employee", $allTables)) 
	|| (in_array("employee", $allTables) && in_array("employee", $allTables) && in_array("story", $allTables))) {
	
	displayTable($newAllCol, 'storyWempWproj', $whereClause); 
}
elseif(in_array("bug", $allTables) && in_array("story", $allTables)) {
	displayTable($newAllCol, 'bugStory', $whereClause);  
}
elseif(in_array("bug", $allTables) && in_array("project", $allTables) ) {
	if(ctype_space($handleCol) || $handleCol == '') { 
		displayTable($projCol . ',' . $bugCol, 'projHandlesBugs', $whereClause);  
	} else { displayTable($newAllCol, 'projHandlesBugs', $whereClause); }
}
elseif(in_array("employee", $allTables) && in_array("story", $allTables) ) {
	if(ctype_space($writeCol) || $writeCol == '') { 
		displayTable($newAllCol, 'empWriteStory', $whereClause);  
	} else {
		if ( (substr_count(($temp = $empCol . ',' . $storyCol), 'e_id') > 1) || 
			(substr_count($temp, 'story_id') > 1)) {
			$arr = explode( " ", $temp );
			$arr = array_unique( $arr );
			$temp = implode(", ", $arr);	
		} 
		displayTable($newAllCol, 'empWriteStory', $whereClauase); }
}
elseif(in_array("employee", $allTables) && in_array("project", $allTables) ) {
	if(ctype_space($workCol) || $workCol == '') { 
		displayTable($newAllCol, 'empWorkProject', $whereClause);  
	} else {
		if (substr_count(($temp = $empCol . ',' . $projCol), 'e_id') > 1) {
			$arr = explode( " ", $temp );
			$arr = array_unique( $arr );
			$temp = implode(", ", $arr);	
		} 
		displayTable($newAllCol, 'empWorkProject', $whereClause); 
	}
}
elseif (count($allTables) == 1){
	$newAllTables = trim($newAllTables, ', ');
	displayTable($newAllCol, $newAllTables, $whereClause); 
}
elseif (count($allTables) > 1) {
	displayTable($newAllCol, 'allTables2', $whereClause);
}
else {
	displayTable('*', 'allTables2', $whereClause);
}












function displayTable($columns, $tables, $whereClause) {

// Create connection to Oracle
$conn = oci_connect('leachbr', 'V70467662', 'localhost:20037/xe'); // this is localhost, i.e., jasmine.cs.vcu.edu
if (!$conn) {
 $m = oci_error();
 echo $m['message'], "\n";
 exit;
}

$where = '';
if(!$whereClause == '' && !ctype_space($whereClause) ) {
	$where = ' where ';
} 


echo 'SQL query to database: select ' . $columns . ' from ' . $tables . $where . $whereClause;
$stid = oci_parse($conn, 'select ' . $columns . ' from ' . $tables . $where . $whereClause);
oci_execute($stid);

$ncols = oci_num_fields($stid);

echo "<style type='text/css'>";
echo "table {display: block; overflow-x: auto; overflow:scroll}";
echo "</style>";
echo "<table border='1'>\n";

echo "<td>Rows</td>";

 for ($i = 1; $i <= $ncols; $i++) {
    $column_name  = oci_field_name($stid, $i);
    echo "<td>$column_name</td>";
}
$count = 1;

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    echo "<td>$count</td>";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
    $count++;
}

echo "</table>\n";
echo "</style>\n";

// Close the Oracle connection
oci_close($conn);

}


?>