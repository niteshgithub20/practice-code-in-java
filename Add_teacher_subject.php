<?php
if (isset($_GET['id'])) {
    $report = "";
    include_once("school_staff_header.php");
    $results = mysql_query("select * from tbl_school_adminstaff where id=" . $staff_id . "");
    $result = mysql_fetch_array($results);
    $sc_id = $result['school_id'];
    if (isset($_POST['submit'])) {
        $i = 0;
        $count = $_POST['count'];
        $counts = 0;            // Loop to store each class.
        $classes = Array();
        $reports = "You  are succefully added ";
        $j = 0;
        for ($i = 0; $i < $count; $i++) {
            $class = $_POST[$i];
            $results = mysql_query("select * from tbl_school_class where school_id='$sc_id' and class like '$class' ");
            //check already class exist or not
            if (mysql_num_rows($results) == 0 && $class != "") {
                $query = "insert into tbl_school_class(class,school_id,school_staff_id)values('$class','$sc_id','$staff_id')";
                $rs = mysql_query($query);

                $classes2[$counts] = $class;
                $counts++;
            } else {
                $classes[$i] = $class;
                $j++;

            }
        }

        $class1 = "";
        if ($counts == 0) {

            for ($i = 0; $i < count($classes); $i++) {

                if ($j == $i + 1) {
                    $class1 = $class1 . " " . $classes[$i];

                } else {

                    $class1 = $class1 . " " . $classes[$i] . ",";


                }
            }

            if (count($classes) > 1) {
                $report = " classes " . $class1 . " are already present . ";
            } else {
                $report = " class " . $class . " is already present";

            }

        } else if ($counts == 1) {
            $report = "You have successfully added class " . $class . " ";
        } else {
            for ($i = 0; $i < count($classes2); $i++) {

                if ($counts == $i + 1) {
                    $class1 = $class1 . " " . $classes2[$i];
                } else {
                    $class1 = $class1 . " " . $classes2[$i] . ",";
                }
            }
            $report = "You have successfully added classes " . $class1 . "";
        }
    }
    ?>


    <html>
    <head>
        <script>
            var i = 1;

            function create_input() {
                var index = 'E-';
                $("<div class='row formgroup' style='padding:5px;'  ><div class='col-md-3 col-md-offset-4'  ><input type='text'  name=" + i + " id=" + i + " class='form-control' placeholder=':Enter Class'></div><div class='col-md-3 ' style='color:#FF0000;' id=" + index + i + " ></div></div>").appendTo('#add');
                i = i + 1;
                document.getElementById("count").value = i;
            }

            function valid() {
                var count = document.getElementById("count").value;
                for (var i = 0; i < count; i++) {
                    var index = 'E-';
                    var values = document.getElementById(i).value;
                    if (values == null || values == "") {
                        document.getElementById(index + i).innerHTML = 'Please Enter Class';
                        return false;
                    }
                }
            }

        </script>
    </head>
    <body bgcolor="#CCCCCC">
    <div style="bgcolor:#CCCCCC">
        <div>

        </div>
        <div class="container" style="padding:25px;">
            <div style="padding:2px 2px 2px 2px;border:1px solid #CCCCCC; border:1px solid #CCCCCC;box-shadow: 0px 1px 3px 1px #C3C3C4;">
                <form method="post">

                    <div style="background-color:#F8F8F8 ;">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1" style="color:#700000 ;padding:5px;">
                                <!-- <input type="button" class="btn btn-primary" name="add" value="Add more" style="width:100px;font-weight:bold;font-size:14px;" onClick="create_input()"/>-->
                            </div>
                            <div class="col-md-3 " align="center" style="color:#663399;">
                                <h2>Add Class</h2>
                            </div>

                        </div>
                        <div class="row " style="padding:5px;">
                            <div class="col-md-3 col-md-offset-4">
                                <input type="text" name="0" id="0" class="form-control " placeholder="Enter Class">
                            </div>
                            <div class="col-md-3" id="E-0" style="color:#FF0000;">
                            </div>
                        </div>
                        <div id="add">
                        </div>

                        <div class="row" style="padding-top:15px;">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2 col-md-offset-2 ">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add " style="width:80px;font-weight:bold;font-size:14px;" onClick="return valid()"/>
                            </div>
                            <script>
                                function backpage() {
                                    window.history.go(-1);
                                }
                            </script>
                            <div class="col-md-3 " align="left">
                                <a href="list_school_class.php" style="text-decoration:none;"><input type="button" onClick="backpage()" class="btn btn-primary" name="Back" value="Back" style="width:80px;font-weight:bold;font-size:14px;"/></a>
                            </div>
                        </div>
                        <div class="row" style="padding:15px;">
                            <div class="col-md-4"><input type="hidden" name="count" id="count" value="1"></div>
                            <div class="col-md-4" style="color:#006600;" align="center" id="error"><b><?php echo $report; ?></b></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    //Below code updated by Rutuja Jori for adding validations & merging Add & Edit Teacher/Manager Subject/Project on same page & added 'Reporting Manager' field for HR Admin on 22/11/2019 for SMC-4208
    $report = "";
    $report1 = "";
    include('scadmin_header.php');
    if($_SESSION['usertype']=='HR Admin Staff' OR $_SESSION['usertype']=='School Admin Staff')
    {
        $sc_id=$_SESSION['school_id']; 
        $query2 = mysql_query("select id from tbl_school_admin where school_id ='$sc_id'");

    $value2 = mysql_fetch_array($query2);

    $id = $value2['id'];
        
        
    }
    else
    {
        $id = $_SESSION['id'];
    }
    $fields = array("id" => $id);
    $table = "tbl_school_admin";
    
    $smartcookie = new smartcookie();
    $results = $smartcookie->retrive_individual($table, $fields);
    $result = mysql_fetch_array($results);
    $sc_id = $result['school_id'];
    $uploadedBy = $result['name'];
    if (isset($_GET["teacherSub"])=='') {
    if (isset($_POST['submit'])) {
        
         $teacher_id = $_POST['teacher_id'];
        $course = $_POST['course'];
         $branchval = $_POST['branch'];
          $semesterval = $_POST['semester'];
         $YearName = $_POST['academic_year'];
        $division_name = $_POST['division'];
         $subjectval = $_POST['subject_name'];
        $subject_code = $_POST['subject_code'];
        $dept = $_POST['department'];
        $report_id = $_POST['reporting_manager'];
        $report = explode (",", $report_id); 
        $reporting_id = $report[1];
 
 
        
        // $Year_id12 = $_POST['Year_id12'];
        // $subject_id12 = $_POST['subject_id12'];
        // $division_id12 = $_POST['division_id12'];
        // $semester_id12 = $_POST['semester_id12'];
        // $branch_id12 = $_POST['branch_id12'];
       
        // $department_id12 = $_POST['department_id12']; 
        
    $teachername2 = explode (",", $teacher_id); 
 $tname = $teachername2[2];
 $tid = $teachername2[1]    ;
 
 
 $coursename2 = explode (",", $course); 
 $coursename = $coursename2[1];
 $coursenameid = $coursename2[0]    ;
        
        
        
  $academic_year2 = explode (",", $YearName); 
  //$academic_year = $academic_year2[1];
  $academic_year=$academic_year2[2];
  //echo $academic_year;exit;
  $yearid = $academic_year2[0]; 

 $semester2 = explode (",", $semesterval); 
 $semester = $semester2[1];
 $semesterid = $semester2[0];

$division2 = explode (",", $division_name); 
$division = $division2[1];
$diviid = $division2[0];

//$isactiv = $_POST['isactiv'];

//$Is_enable = $_POST['Is_enable'];
$branch2 =  explode (",", $branchval);
$branch = $branch2[1];
$branchids = $branch2[0]; 
//echo $branch;end;
$subject2 =  explode (",", $subjectval);
$subject = $subject2[1];
$subjectids = $subject2[0]; 


$department2 =  explode (",", $dept);
$department = $department2[1];
$departmentids = $department2[0]; 


        $upload_date = date('Y-m-d h:i:s', strtotime('+330 minute'));
    if($reporting_id=='-1')
 { //SMC-5071 by Pranali : solved issue of space getting inserted into $subject_code field
      $query = mysql_query("insert into tbl_teacher_subject_master 
(teacher_id,ExtSemesterId,ExtBranchId,ExtSchoolSubjectId,ExtYearID,ExtDivisionID,ExtDeptId,Department_id,Branches_id,Semester_id,subjectName,Division_id,AcademicYear,CourseLevel,upload_date,uploaded_by,school_id,subjcet_code) 
values('$tid','$semesterid','$branchids','$subjectids','$yearid',
'$diviid','$departmentids','$department','$branch','$semester','$subject','$division','$academic_year','$coursename','$upload_date','$uploadedBy','$sc_id','$subject_code')");
 }

else{ 
       $query = mysql_query("insert into tbl_teacher_subject_master 
(reporting_manager_id,teacher_id,ExtSemesterId,ExtBranchId,ExtSchoolSubjectId,ExtYearID,ExtDivisionID,ExtDeptId,Department_id,Branches_id,Semester_id,subjectName,Division_id,AcademicYear,CourseLevel,upload_date,uploaded_by,school_id,subjcet_code) 
values('$reporting_id','$tid','$semesterid','$branchids','$subjectids','$yearid',
'$diviid','$departmentids','$department','$branch','$semester','$subject','$division','$academic_year','$coursename','$upload_date','$uploadedBy','$sc_id','$subject_code')");

 //$query = mysql_query("insert into tbl_teacher_subject_master (teacher_id,school_id,school_staff_id,subjcet_code,subjectName,Division_id,Semester_id,Branches_id,Department_id,CourseLevel,AcademicYear,upload_date,uploaded_by) values('$teacher_id','$sc_id','','$subject_code','$subject_name','$division','$semester','$branch','$department','$course','$academic_year','$upload_date','$uploadedBy')");
        //$report = "Teacher Subject is successfully Inserted";
}



/*echo "insert into tbl_teacher_subject_master 
(teacher_id,ExtSemesterId,ExtBranchId,ExtSchoolSubjectId,ExtYearID,ExtDivisionID,ExtDeptId,Department_id,Branches_id,Semester_id,subjectName,Division_id,AcademicYear,CourseLevel,upload_date,uploaded_by,school_id) 
values('$tid','$semesterid','$branchids','$subjectids','$yearid',
'$diviid','$departmentids','$department','$branch','$semester','$subject','$division','$academic_year','$coursename','$upload_date',$uploadedBy','$sc_id')" ; exit;*/





//echo $branch;end;



        //$report = "Teacher Subject is successfully Inserted";
        if($query)
        {
        echo ("<script LANGUAGE='JavaScript'>
                    alert('$dynamic_teacher $dynamic_subject is successfully Inserted');
                    window.location.href='list_teacher_subject.php';
                    </script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
                    alert('duplicate $dynamic_teacher $dynamic_subject found ');
                    </script>");
        }
    }
    ?>
    <html>
    <head>
        <script>

    function Myfunction1() { 
         var course1 = document.getElementById("course").value;
         var s= course1.split(",");
         var course = s[0];
         var department1 = document.getElementById("department").value;
        //alert(s[0]);alert(department1);

         var d= department1.split(",");
         var department = d[1];
         $.ajax({
             type:"POST",
             data:{course:course,department:department}, 
             url:'get_teachersubdetails.php',
             success:function(data)
             {
               $('#branch').html(data);
             }
             
             
         });
         
     }
     
       
                

            function Myfunction(value, fn) {
                
                
                
                if (value != '') {
                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    }
                    else {// code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            /*if (fn == 'fun_course') {
                                document.getElementById("department").innerHTML = xmlhttp.responseText;
                            }
                            if (fn == 'fun_dept') {
                                document.getElementById("branch").innerHTML = xmlhttp.responseText;
                            }*/
                            if (fn == 'fun_branch') {
                                document.getElementById("semester").innerHTML = xmlhttp.responseText;
                            }
                            if (fn == 'fun_semester') {
                                document.getElementById("subject_name").innerHTML = xmlhttp.responseText;
                            }
                            
                            if (fn == 'fun_subject') {
                                document.getElementById("subject_code").innerHTML = xmlhttp.responseText;
                            }
                            
                            if (fn == 'fun_teacher') {
                                document.getElementById("reporting_manager").innerHTML = xmlhttp.responseText;
                            }
                        }
                    }
                    xmlhttp.open("GET", "get_teachersubdetails.php?fn=" + fn + "&value=" + value, true);
                    xmlhttp.send();
                }
            }

            function valid() {
                //validaion for compnay name
                var teacher_id = document.getElementById("teacher_id").value;
                

                if (teacher_id == null || teacher_id == "") {
                    document.getElementById('errorteacher').innerHTML = 'Please select <?php echo $dynamic_teacher;?>';
                    return false;
                }
                else {
                    document.getElementById('errorteacher').innerHTML = '';
                }
                
                var course = document.getElementById("course").value;

                if (course == null || course == "") {
                    document.getElementById('errorcourse').innerHTML = 'Please select <?php echo $dynamic_level;?>';
                    return false;
                }
                else {
                    document.getElementById('errorcourse').innerHTML = '';
                }
                var department = document.getElementById("department").value;
                var department1 = document.getElementById("department").text;
                
                // alert(department);
                
                if (department == null || department == "") {
                    document.getElementById('errordepartment').innerHTML = 'Please select Department';
                    return false;
                }
                else {
                    document.getElementById('errordepartment').innerHTML = '';
                }
                var branch = document.getElementById("branch").value;

                if (branch == null || branch == "") {
                    document.getElementById('errorbranch').innerHTML = 'Please select <?php echo $dynamic_branch;?>';
                    return false;
                }
                else {
                    document.getElementById('errorbranch').innerHTML = '';
                }
                
                var semester = document.getElementById("semester").value;

                if (semester == null || semester == "") {
                    document.getElementById('errorsemester').innerHTML = 'Please select <?php echo $dynamic_semester;?>';
                    return false;
                }
                else {
                    document.getElementById('errorsemester').innerHTML = '';
                }
                
                var division = document.getElementById("division").value;

                if (division == null || division == "") {
                    document.getElementById('errordivision').innerHTML = 'Please select <?php echo $designation;?>';
                    return false;
                }
                else {
                    document.getElementById('errordivision').innerHTML = '';
                }
    //          
                var subject_name = document.getElementById("subject_name").value;

                if (subject_name == null || subject_name == "") {
                    document.getElementById('errorsubject_name').innerHTML = 'Please select <?php echo $dynamic_subject;?> Name';
                    return false;
                }
                else {
                    document.getElementById('errorsubject_name').innerHTML = '';
                }
                
                var subject_code = document.getElementById("subject_code").value;
                if (subject_code == null || subject_code == "") {
                    document.getElementById('errorsubject_code').innerHTML = 'Please Enter <?php echo $dynamic_subject;?>  Code';
                    return false;
                }
                else {
                    document.getElementById('errorsubject_code').innerHTML = '';
                }
                
                var academic_year = document.getElementById("academic_year").value;

                if (academic_year == null || academic_year == "") {
                    document.getElementById('erroracademic_year').innerHTML = 'Please select <?php echo $dynamic_year;?>';
                    return false;
                }
                else {
                    document.getElementById('erroracademic_year').innerHTML = '';
                }
            }
        </script>
    </head>
    <body bgcolor="#CCCCCC">
    <div style="bgcolor:#CCCCCC">
        <div>
        </div>
        <div class="container" style="padding:25px;">
            <div style="padding:2px 2px 2px 2px;border:1px solid #CCCCCC; border:1px solid #CCCCCC;box-shadow: 0px 1px 3px 1px #C3C3C4; background-color:#F8F8F8 ;">
                <h2 style="padding-top:30px;">
                    <center>Add <?php echo $dynamic_teacher;?> <?php echo $dynamic_subject;?></center>
                </h2>
                <!--Removed Add excel sheet option for SMC-4443 by Sayali Balkawade on 18/01/2020 -->
                <!--<h5 align="center"><a href="add_teachersubject_excel.php">Add Excel Sheet</a></h5>-->
                <div class="row formgroup" style="padding:5px;">
                    <form method="post">
                        <div class="row" style="padding-top:50px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_teacher;?> Name <span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="teacher_id" id="teacher_id" class="form-control" onChange="Myfunction(this.value,'fun_teacher')">
                                
                                    <option value=""> Select <?php echo $dynamic_teacher;?></option>
                                    <?php
                                    //Changes done by Sayali Balkawade on 4/4/2019- added 135 and 137 in teaching staff
                                    $sql_teacher = mysql_query("select t_id,t_complete_name,t_emp_type_pid from tbl_teacher where school_id='$sc_id' and (t_emp_type_pid='133' or t_emp_type_pid='134' or t_emp_type_pid='135' or t_emp_type_pid='137') order by t_complete_name");
                                    while ($result_teacher = mysql_fetch_array($sql_teacher)) {
                                        ?>
                                        
                                        <option value="<?php echo 
                                        $result_teacher['t_emp_type_pid'].',',
                                        $result_teacher['t_id'].',',$result_teacher['t_complete_name']?>"><?php echo $result_teacher['t_complete_name']?></option>

                                        
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorteacher" style="color:#FF0000"></div>
                        </div>
                        
                        
                        
                        
                        
                        

                        <!------------------------------------Acadmic Year----------------------------------------->
                        <!---------------------------------------------Degree---------------------------------->
                        
                        
                        
                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;"><?php echo $dynamic_level;?><span class="error" style="color:#FF0000"><b> *</b></span>
                            </div>
                            <div class="col-md-3">
                                <select name="course" id="course" class="form-control" onChange="Myfunction1()">
                                <option value=""> Select <?php echo $dynamic_level;?></option>
                                    <?php
                                    $sql_course = mysql_query("select CourseLevel from tbl_CourseLevel where school_id='$sc_id' order by id");
                                    while ($result_course = mysql_fetch_array($sql_course)) {
                                        ?>
                                       
                                        <option value="<?php echo $result_course['CourseLevel'].',',$result_course['CourseLevel']?>"><?php echo $result_course['CourseLevel']?></option>

                                        
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorcourse" style="color:#FF0000"></div>
                        </div>
                    

                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;">Department<span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="department" id="department" class="form-control" onChange="Myfunction1()">
                                <option value=""> Select Department</option>
                                <?php
                                    $sql_dept = mysql_query("select Dept_Name,ExtDeptId from tbl_department_master where school_id='$sc_id' order by id");
                                    while ($result_dept = mysql_fetch_array($sql_dept)) {
                                        ?>
                                        
                                        <option value="<?php echo $result_dept['ExtDeptId'].',',$result_dept['Dept_Name']?>"><?php echo $result_dept['Dept_Name']?></option>
                                        
                                        
                                    <?php }
                                    ?>
                                
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errordepartment" style="color:#FF0000"></div>
                        </div>
                        

                    
                        


                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;"><?php echo $dynamic_branch;?><span class="error" style="color:#FF0000"><b> </b></span></div>
                            <div class="col-md-3">
                                <select name="branch" id="branch" class="form-control" onChange="Myfunction(this.value,'fun_branch')">
                                
                                <option value=""> Select <?php echo $dynamic_branch;?></option>
                                <?php
                                    $sql_branch = mysql_query("select branch_Name,ExtBranchId from tbl_branch_master where school_id='$sc_id' order by id");
                                    while ($result_branch = mysql_fetch_array($sql_branch)) {
                                        ?>
                                       
                                        <option value="<?php echo $result_branch['ExtBranchId'].',',$result_branch['branch_Name']?>"><?php echo $result_branch['branch_Name']?></option>
                                        
                                        
                                        
                                    <?php }
                                    ?>
                                
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorbranch" style="color:#FF0000"></div>
                        </div>
                        

                        <!--------------------------------------Department--------------------------------------->
                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_semester;?><span class="error" style="color:#FF0000"><b> *</b></span></div>
                            
                            <div class="col-md-3">
                                <select name="semester" id="semester" class="form-control" onChange="Myfunction(this.value,'fun_semester')">>
                                
                                <option value=""> Select <?php echo $dynamic_semester;?></option>
                                <?php
                                    $sql_semester = mysql_query("select DISTINCT Semester_Name,ExtSemesterId from tbl_semester_master where school_id='$sc_id' order by Semester_Id");
                                    while ($result_semester = mysql_fetch_array($sql_semester)) {
                                        ?>
                                        
                                        <option value="<?php echo $result_semester['ExtSemesterId'].',',$result_semester['Semester_Name']?>"><?php echo $result_semester['Semester_Name']?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorsemester" style="color:#FF0000"></div>
                        </div>
                        
                        


                        <!------------------------------------Division----------------------------------------->

                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;"><?php echo $designation;?><span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="division" id="division" class="form-control">
                                <option value=""> Select <?php echo $designation;?></option>
                                    <?php $sql_div = mysql_query("select DivisionName,ExtDivisionID from Division where school_id='$sc_id'");
                                    while ($result_div = mysql_fetch_array($sql_div)) {
                                        ?>
                                       
                                        <option value="<?php echo $result_div['ExtDivisionID'].',',$result_div['DivisionName']?>"><?php echo $result_div['DivisionName']?></option>
                                        
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errordivision" style="color:#FF0000"></div>
                        </div>

                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_subject;?> Title<span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="subject_name" id="subject_name" class="form-control" onChange="Myfunction(this.value,'fun_subject')">

                                <option value=""> Select <?php echo $dynamic_subject;?> Title</option>

                                    <?php
                                    $sql_subject = mysql_query("select distinct subject, ExtSchoolSubjectId from  tbl_school_subject where school_id='$sc_id' order by id");
                                    while ($result_subject = mysql_fetch_array($sql_subject)) {
                                        ?>
                                        
                                        <option value="<?php echo $result_subject['ExtSchoolSubjectId'].',',$result_subject['subject']?>"><?php echo $result_subject['subject']?></option>
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorsubject_name" style="color:#FF0000"></div>
                        </div>
                    
                    
                        

                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_subject;?> Code<span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <!--As discussed with Rakesh sir made Subject code readonly for SMC-5155 on 16-02-2021-->
                                <select name="subject_code" id="subject_code" class="form-control" readonly>
                                <option value="">First select <?php echo $dynamic_subject;?></option>
                                    <!--<?php
                                    //$sql_Code = mysql_query("select distinct subjcet_code from  tbl_teachr_subject_row where school_id='$sc_id' order by tch_sub_id");
                                    //while ($result_Code = mysql_fetch_array($sql_Code)) {
                                        ?>

                                        <option value="<?php //echo $result_Code['subjcet_code'] ?>"><?php //echo $result_Code['subjcet_code']?></option>
                                    <?php //}
                                    ?>
                                -->
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorsubject_code" style="color:#FF0000"></div>
                        </div>
                        
                        
                        <?php if ($school_type == 'organization' && $user=='HR Admin'){?>
                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;">Reporting <?php echo $dynamic_teacher;?><span class="error" style="color:#FF0000"></span></div>
                            <div class="col-md-3">
                                <select name="reporting_manager" id="reporting_manager" class="form-control">
                                <option value=""> Select Reporting <?php echo $dynamic_teacher;?></option>
                                
                                                
                            </select>
                            </div>
                            
                        </div>
                        <?php }?>
                                                <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_year;?><span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="academic_year" id="academic_year" class="form-control" onChange="yearNameChnage(this)">
                                <option value=""> Select <?php echo $dynamic_year;?></option>
                                    <?php
                                    $sql_year = mysql_query("select DISTINCT Year ,ExtYearID,Academic_Year from tbl_academic_Year where school_id='$sc_id' and Enable='1' order by id");
                                    while ($result_year = mysql_fetch_array($sql_year)) {
                                        ?>
                                       
                                        <option value="<?php echo $result_year['ExtYearID'].',',$result_year['Year'].',',$result_year['Academic_Year']?>"><?php echo $result_year['Academic_Year']?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="erroracademic_year" style="color:#FF0000"></div>
                        </div>
                        
                        

                        
                        <!---------------------------Course Level----------------------------->
                        <!------------------------------------END------------------------------------------------>
                        <div class="row" style="padding-top:60px;">
                            <div class="col-md-5"></div>
                            <div class="col-md-1"><input type="submit" name="submit" value="Save" class="btn btn-success" onClick="return valid()"></div>
                            <div class="col-md-2"><input type="reset" name="cancel" value="Reset" class="btn btn-danger"></div>
                            <div class="col-md-3"><a href="list_teacher_subject.php"><input type="button" value="Back" class="btn btn-danger"></a></div>
                       </div>
                        <div class="row" style="padding-top:30px;">
                            <center style="color:#006600;">
                                <?php echo $report ?></center>
                        </div>
                    </form>
                </div>
            </div>
    </body>
    </html>
<?php }else{
    if($_SESSION['usertype']=='HR Admin Staff' OR $_SESSION['usertype']=='School Admin Staff')
    {
        $sc_id=$_SESSION['school_id']; 
        $query2 = mysql_query("select id from tbl_school_admin where school_id ='$sc_id'");

    $value2 = mysql_fetch_array($query2);

    $id = $value2['id'];
        
        
    }
    else
    {
        $id = $_SESSION['id'];
    }
    $fields = array("id" => $id);
    $table = "tbl_school_admin";
    
    $smartcookie = new smartcookie();
    $results = $smartcookie->retrive_individual($table, $fields);
    $result = mysql_fetch_array($results);
    $sc_id = $result['school_id'];
    //delete recoard
    //fetch courseLevel data from database
    $teacherSub = $_GET["teacherSub"]; 
    $sql1 = "select * from tbl_teacher_subject_master where tch_sub_id='$teacherSub' and school_id='$sc_id' ";
    
    $row = mysql_query($sql1);
    $arr = mysql_fetch_array($row);
    
          $t_id = $arr['teacher_id'];
           $s = "select * from tbl_teacher where t_id='$t_id' and school_id='$sc_id'";
          
           $r = mysql_query($s);
    $ar = mysql_fetch_array($r);
     $tech_name= $ar['t_complete_name'];
     $t_emp_type_pid= $ar['t_emp_type_pid'];
    
        $report_id = $arr['reporting_manager_id'];
        $ss = "select * from tbl_teacher where t_id='$report_id' and school_id='$sc_id'";
        
            $rs= mysql_query($ss);
        $array = mysql_fetch_array($rs);
        
     $reporting_manager_id= $array['t_complete_name'];
         $CourseLevel = $arr['CourseLevel'];
         $Branches_id = $arr['Branches_id'];
         $Semester_id = $arr['Semester_id'];
         $AcademicYear = $arr['AcademicYear'];
        $Division_id = $arr['Division_id'];
         $subjectName = $arr['subjectName'];
        $subjcet_code = $arr['subjcet_code'];

         $ExtYearID = $arr['ExtYearID'];
         $ExtSchoolSubjectId = $arr['ExtSchoolSubjectId'];
         $ExtDivisionID = $arr['ExtDivisionID'];
         $ExtSemesterId = $arr['ExtSemesterId'];
         $ExtBranchId = $arr['ExtBranchId'];
         $Department_id = $arr['Department_id']; 
         $ExtDeptId = $arr['ExtDeptId']; 
    
    if (isset($_POST['submit'])) {
         $teacher_id = $_POST['teacher_id'];
        $course = $_POST['course'];
         $branchval = $_POST['branch'];
          $semesterval = $_POST['semester'];
         $YearName = $_POST['academic_year'];
        $division_name = $_POST['division'];
         $subjectval = $_POST['subject_name'];
        $subcode = $_POST['subject_code'];
        $dept = $_POST['department'];
        $r_id = $_POST['reporting_manager'];
        $report = explode (",", $r_id); 
        $reporting_id = $report[1];
        
$teachername2 = explode (",", $teacher_id); 
  $tname = $teachername2[2];
 $tid = $teachername2[1]    ;
 $tempid = $teachername2[0]  ;
 
 
 $coursename2 = explode (",", $course); 
 $coursename = $coursename2[1];
 $coursenameid = $coursename2[0]    ;
 
 
 /*$subjectcode2 = explode (",", $subject_code); 
 $subcode = $subjectcode2[1];
 $subcode1 = $subjectcode2[0]   ;*/
        
        
        
  $academic_year2 = explode (",", $YearName); 
  //$academic_year = $academic_year2[1];
  $academic_year = $academic_year2[2];
  $yearid = $academic_year2[0]; 

 $semester2 = explode (",", $semesterval); 
 $semester = $semester2[1];
 $semesterid = $semester2[0];

$division2 = explode (",", $division_name); 
$division = $division2[1];
$diviid = $division2[0];

//$isactiv = $_POST['isactiv'];

//$Is_enable = $_POST['Is_enable'];
$branch2 =  explode (",", $branchval);
$branch = $branch2[1];
$branchids = $branch2[0]; 

$subject2 =  explode (",", $subjectval);
$subject = $subject2[1];
$subjectids = $subject2[0]; 


$department2 =  explode (",", $dept);
$department = $department2[1];
$departmentids = $department2[0]; 

        $upload_date = date('Y-m-d h:i:s', strtotime('+330 minute'));
     if($reporting_id=='-1')
 {
       $query = "update tbl_teacher_subject_master SET 
teacher_id='$tid',ExtSemesterId='$semesterid',ExtBranchId='$branchids',ExtSchoolSubjectId='$subjectids',ExtYearID='$yearid',ExtDivisionID='$diviid',ExtDeptId='$departmentids',Department_id='$department',Branches_id='$branch',Semester_id='$semester',subjectName='$subject',Division_id='$division',AcademicYear='$academic_year',CourseLevel='$coursename',subjcet_code='$subcode' where tch_sub_id='$teacherSub'";//echo $query;exit;
     }else{
         $query = "update tbl_teacher_subject_master SET reporting_manager_id='$reporting_id',
teacher_id='$tid',ExtSemesterId='$semesterid',ExtBranchId='$branchids',ExtSchoolSubjectId='$subjectids',ExtYearID='$yearid',ExtDivisionID='$diviid',ExtDeptId='$departmentids',Department_id='$department',Branches_id='$branch',Semester_id='$semester',subjectName='$subject',Division_id='$division',AcademicYear='$academic_year',CourseLevel='$coursename',subjcet_code='$subcode' where tch_sub_id='$teacherSub'";//echo $query;exit;
     }

/*echo $query = "update tbl_teacher_subject_master SET
teacher_id='$tid',ExtSemesterId='$semesterid',ExtBranchId='$branchids',ExtSchoolSubjectId='$subjectids',ExtYearID='$yearid',ExtDivisionID='$diviid',ExtDeptId='$departmentids',Department_id='$department',Branches_id='$branch',Semester_id='$semester',subjectName='$subject',Division_id='$division',AcademicYear='$academic_year',CourseLevel='$coursename',subjcet_code='$subcode' where tch_sub_id='$teacherSub'"; exit;*/



        //$report = "Teacher Subject is successfully Inserted";
        $resultsd = mysql_query($query);
        if($query)
        {
        echo ("<script LANGUAGE='JavaScript'>
                    alert('$dynamic_teacher $dynamic_subject is successfully Updated');
                    window.location.href='list_teacher_subject.php';
                    </script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
                    alert('$dynamic_teacher $dynamic_subject is not Inserted');
                    </script>");
        }
    }
    ?>
    <html>
    <head>
        <script>
            function Myfunction1() { 
         var course1 = document.getElementById("course").value;
         var s= course1.split(",");
         var course = s[0];
         var department1 = document.getElementById("department").value;
        //alert(s[0]);alert(department1);

         var d= department1.split(",");
         var department = d[1];
         $.ajax({
             type:"POST",
             data:{course:course,department:department}, 
             url:'get_teachersubdetails.php',
             success:function(data)
             { //alert(data);
               $('#branch').html(data);
             }
             
             
         });
         
     }

            function Myfunction(value, fn) {
                
                
                
                if (value != '') {
                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    }
                    else {// code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            /*if (fn == 'fun_course') {
                                document.getElementById("department").innerHTML = xmlhttp.responseText;
                            }
                            if (fn == 'fun_dept') {
                                document.getElementById("branch").innerHTML = xmlhttp.responseText;
                            }*/
                            if (fn == 'fun_branch') {
                                document.getElementById("semester").innerHTML = xmlhttp.responseText;
                            }
                            if (fn == 'fun_semester') {
                                document.getElementById("subject_name").innerHTML = xmlhttp.responseText;
                            }
                            
                            if (fn == 'fun_subject') {
                                document.getElementById("subject_code").innerHTML = xmlhttp.responseText;
                            }
                            if (fn == 'fun_teacher') {
                                document.getElementById("reporting_manager").innerHTML = xmlhttp.responseText;
                            }
                        }
                    }
                    xmlhttp.open("GET", "get_teachersubdetails.php?fn=" + fn + "&value=" + value, true);
                    xmlhttp.send();
                }
            }

            function valid() {
                //validaion for compnay name
                var teacher_id = document.getElementById("teacher_id").value;
                

                if (teacher_id == null || teacher_id == "") {
                    document.getElementById('errorteacher').innerHTML = 'Please select <?php echo $dynamic_teacher;?>';
                    return false;
                }
                else {
                    document.getElementById('errorteacher').innerHTML = '';
                }
                
                var course = document.getElementById("course").value;

                if (course == null || course == "") {
                    document.getElementById('errorcourse').innerHTML = 'Please select <?php echo $dynamic_level;?>';
                    return false;
                }
                else {
                    document.getElementById('errorcourse').innerHTML = '';
                }
                var department = document.getElementById("department").value;
                var department1 = document.getElementById("department").text;
                
                // alert(department);
                
                if (department == null || department == "") {
                    document.getElementById('errordepartment').innerHTML = 'Please select Department';
                    return false;
                }
                else {
                    document.getElementById('errordepartment').innerHTML = '';
                }
                var branch = document.getElementById("branch").value;

                if (branch == null || branch == "") {
                    document.getElementById('errorbranch').innerHTML = 'Please select <?php echo $dynamic_branch;?>';
                    return false;
                }
                else {
                    document.getElementById('errorbranch').innerHTML = '';
                }
                
                var semester = document.getElementById("semester").value;

                if (semester == null || semester == "") {
                    document.getElementById('errorsemester').innerHTML = 'Please select <?php echo $dynamic_semester;?>';
                    return false;
                }
                else {
                    document.getElementById('errorsemester').innerHTML = '';
                }
                
                var academic_year = document.getElementById("academic_year").value;

                if (academic_year == null || academic_year == "") {
                    document.getElementById('erroracademic_year').innerHTML = 'Please select <?php echo $dynamic_year;?>';
                    return false;
                }
                else {
                    document.getElementById('erroracademic_year').innerHTML = '';
                }
            
                var division = document.getElementById("division").value;

                if (division == null || division == "") {
                    document.getElementById('errordivision').innerHTML = 'Please select <?php echo $designation;?>';
                    return false;
                }
                else {
                    document.getElementById('errordivision').innerHTML = '';
                }
    //          
                var subject_name = document.getElementById("subject_name").value;

                if (subject_name == null || subject_name == "") {
                    document.getElementById('errorsubject_name').innerHTML = 'Please select <?php echo $dynamic_subject;?> Name';
                    return false;
                }
                else {
                    document.getElementById('errorsubject_name').innerHTML = '';
                }
                
                var subject_code = document.getElementById("subject_code").value;
                if (subject_code == null || subject_code == "") {
                    document.getElementById('errorsubject_code').innerHTML = 'Please Enter <?php echo $dynamic_subject;?> Code';
                    return false;
                }
                else {
                    document.getElementById('errorsubject_code').innerHTML = '';
                }
            }
        </script>
    </head>
    <body bgcolor="#CCCCCC">
    <div style="bgcolor:#CCCCCC">
        <div>
        </div>
        <div class="container" style="padding:25px;">
            <div style="padding:2px 2px 2px 2px;border:1px solid #CCCCCC; border:1px solid #CCCCCC;box-shadow: 0px 1px 3px 1px #C3C3C4; background-color:#F8F8F8 ;">
                <h2 style="padding-top:30px;">
                    <center>Edit <?php echo $dynamic_teacher;?> <?php echo $dynamic_subject;?></center>
                </h2>
                <!--Removed Add excel sheet option for SMC-4443 by Sayali Balkawade on 18/01/2020 -->
                <!--<h5 align="center"><a href="add_teachersubject_excel.php">Add Excel Sheet</a></h5>-->
                <div class="row formgroup" style="padding:5px;">
                    <form method="post">
                        <div class="row" style="padding-top:50px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_teacher;?> Name <span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="teacher_id" id="teacher_id" class="form-control" onChange="Myfunction(this.value,'fun_teacher')">
                                
                                    <option value="<?php echo $t_emp_type_pid .','.$t_id .','.$tech_name; ?>"><?php echo $tech_name; ?></option>
                                    <?php
                                    //Changes done by Sayali Balkawade on 4/4/2019- added 135 and 137 in teaching staff
                                    $sql_teacher = mysql_query("select t_id,t_complete_name,t_emp_type_pid from tbl_teacher where school_id='$sc_id' and (t_emp_type_pid='133' or t_emp_type_pid='134' or t_emp_type_pid='135') order by t_complete_name");
                                    while ($result_teacher = mysql_fetch_array($sql_teacher)) {
                                        ?>
                                        
                                        <option value="<?php echo 
                                        $result_teacher['t_emp_type_pid'].',',
                                        $result_teacher['t_id'].',',$result_teacher['t_complete_name']?>"><?php echo $result_teacher['t_complete_name']?></option>

                                        
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorteacher" style="color:#FF0000"></div>
                        </div>
                        
                        
                        
                        
                        

                        <!------------------------------------Acadmic Year----------------------------------------->
                        <!---------------------------------------------Degree---------------------------------->
                        
                        
                        
                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;"><?php echo $dynamic_level;?><span class="error" style="color:#FF0000"><b> *</b></span>
                            </div>
                            <div class="col-md-3">
                                <select name="course" id="course" class="form-control" onChange="Myfunction1()"
                                option value="<?php echo $CourseLevel .','.$CourseLevel; ?>"><?php echo $CourseLevel; ?></option>
                                
                                    <?php
                                    $sql_course = mysql_query("select CourseLevel from tbl_CourseLevel where school_id='$sc_id' order by id");
                                    while ($result_course = mysql_fetch_array($sql_course)) {
                                        ?>
                                       
                                        <option value="<?php echo $result_course['CourseLevel'].',',$result_course['CourseLevel']?>"><?php echo $result_course['CourseLevel']?></option>

                                        
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorcourse" style="color:#FF0000"></div>
                        </div>
                        

                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;">Department<span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="department" id="department" class="form-control" onChange="Myfunction1()">
                                <option value="<?php echo $ExtDeptId.','.$Department_id; ?>"><?php echo $Department_id; ?></option>
                                
                                
                                <?php
                                    $sql_dept = mysql_query("select Dept_Name,ExtDeptId from tbl_department_master where school_id='$sc_id' order by id");
                                    while ($result_dept = mysql_fetch_array($sql_dept)) {
                                        ?>
                                        
                                        <option value="<?php echo $result_dept['ExtDeptId'].',',$result_dept['Dept_Name']?>"><?php echo $result_dept['Dept_Name']?></option>
                                        
                                        
                                    <?php }
                                    ?>
                                
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errordepartment" style="color:#FF0000"></div>
                        </div>
                        
                    
                        


                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;"><?php echo $dynamic_branch;?><span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="branch" id="branch" class="form-control" onChange="Myfunction(this.value,'fun_branch')">
                                
                                <option value="<?php echo $ExtBranchId.','.$Branches_id; ?>"><?php echo $Branches_id; ?></option>
                                <?php
                                    $sql_branch = mysql_query("select branch_Name,ExtBranchId from tbl_branch_master where school_id='$sc_id' order by id");
                                    while ($result_branch = mysql_fetch_array($sql_branch)) {
                                        ?>
                                       
                                        <option value="<?php echo $result_branch['ExtBranchId'].',',$result_branch['branch_Name']?>"><?php echo $result_branch['branch_Name']?></option>
                                        
                                        
                                        
                                    <?php }
                                    ?>
                                
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorbranch" style="color:#FF0000"></div>
                        </div>
                        

                        <!--------------------------------------Department--------------------------------------->
                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_semester;?><span class="error" style="color:#FF0000"><b> *</b></span></div>
                            
                            <div class="col-md-3">
                                <select name="semester" id="semester" class="form-control" onChange="Myfunction(this.value,'fun_semester')">
                                
                                <option value="<?php echo $ExtSemesterId.','.$Semester_id; ?>"><?php echo $Semester_id; ?></option>
                                <?php
                                    $sql_semester = mysql_query("select DISTINCT Semester_Name,ExtSemesterId from tbl_semester_master where school_id='$sc_id' order by Semester_Id");
                                    while ($result_semester = mysql_fetch_array($sql_semester)) {
                                        ?>
                                        
                                        <option value="<?php echo $result_semester['ExtSemesterId'].',',$result_semester['Semester_Name']?>"><?php echo $result_semester['Semester_Name']?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorsemester" style="color:#FF0000"></div>
                        </div>
                        
                        


                        <!------------------------------------Division----------------------------------------->

                        <div class="row " style="padding-top:30px;">
                            <div class="col-md-2 col-md-offset-4" style="color:#808080; font-size:18px;"><?php echo $designation;?><span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="division" id="division" class="form-control" onChange="DivisionNameChnage(this)">
                                <option value="<?php echo $ExtDivisionID.','.$Division_id; ?>"><?php echo $Division_id; ?></option>
                                    <?php $sql_div = mysql_query("select DivisionName,ExtDivisionID from Division where school_id='$sc_id'");
                                    while ($result_div = mysql_fetch_array($sql_div)) {
                                        ?>
                                       
                                        <option value="<?php echo $result_div['ExtDivisionID'].',',$result_div['DivisionName']?>"><?php echo $result_div['DivisionName']?></option>
                                        
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errordivision" style="color:#FF0000"></div>
                        </div>

                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_subject;?> Title<span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="subject_name" id="subject_name" class="form-control" onChange="Myfunction(this.value,'fun_subject')">
                                <option value="<?php echo $ExtSchoolSubjectId.','.$subjectName; ?>"><?php echo $subjectName; ?></option>
                                    <?php
                                    $sql_subject = mysql_query("select distinct subject,ExtSchoolSubjectId from  tbl_school_subject where school_id='$sc_id' order by id");
                                    while ($result_subject = mysql_fetch_array($sql_subject)) {
                                        ?>
                                        
                                        <option value="<?php echo $result_subject['ExtSchoolSubjectId'].',',$result_subject['subject']?>"><?php echo $result_subject['subject']?></option>
                                        
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorsubject_name" style="color:#FF0000"></div>
                        </div>
                    
                    
                        

                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_subject;?> Code<span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="subject_code" id="subject_code" class="form-control" readonly>
                                <option value="<?php echo $subjcet_code; ?>"><?php echo $subjcet_code; ?></option>

                                    <!-- <?php
                                    //Below code commented by Rutuja for SMC-5131 on 05-02-2021
                                    /*
                                    $sql_Code = mysql_query("select distinct subjcet_code from  tbl_teachr_subject_row where school_id='$sc_id' order by tch_sub_id");
                                    while ($result_Code = mysql_fetch_array($sql_Code)) {*/
                                        ?>
                                        
                                        <option value="<?php //echo $result_Code['subjcet_code'].',',$result_Code['subjcet_code']?>"><?php //echo $result_Code['subjcet_code']?></option>
                                    <?php //}

                                    ?>-->

                                
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="errorsubject_code" style="color:#FF0000"></div>
                        </div>

                        <?php if ($school_type == 'organization' && $user=='HR Admin'){?>
                        <div class="row" style="padding-top:30px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;">Reporting <?php echo $dynamic_teacher;?><span class="error" style="color:#FF0000"></span></div>
                            <div class="col-md-3">
                                <select name="reporting_manager" id="reporting_manager" class="form-control">
                                 <option value=""><?php echo $reporting_manager_id; ?></option>
                                                
                            </select>
                            </div>
                            
                        </div>
                        <?php }?>


                                                <div class="row" style="padding-top:30px;">

                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="color:#808080; font-size:18px;"><?php echo $dynamic_year;?><span class="error" style="color:#FF0000"><b> *</b></span></div>
                            <div class="col-md-3">
                                <select name="academic_year" id="academic_year" class="form-control" onChange="yearNameChnage(this)">
                                <option value="<?php echo $ExtYearID.','.$AcademicYear; ?>"><?php echo $AcademicYear; ?></option>
                                    <?php
                                    $sql_year = mysql_query("select DISTINCT Year ,ExtYearID,Academic_Year from tbl_academic_Year where school_id='$sc_id' and Enable='1' order by id");
                                    while ($result_year = mysql_fetch_array($sql_year)) {
                                        if($AcademicYear!=$result_year['Academic_Year']){
                                        ?>
                                       
                                        <option value="<?php echo $result_year['ExtYearID'].',',$result_year['Year'].',',$result_year['Academic_Year']?>"><?php echo $result_year['Academic_Year']?></option>

                                        <?php
                                    } }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-3 indent-small' id="erroracademic_year" style="color:#FF0000"></div>
                        </div>
                        
                        

                        
                        <!---------------------------Course Level----------------------------->
                        <!------------------------------------END------------------------------------------------>
                        <div class="row" style="padding-top:60px;">
                            <div class="col-md-5"></div>
                            <div class="col-md-1"><input type="submit" name="submit" value="Save" class="btn btn-success" onClick="return valid()"></div>
                            <div class="col-md-2"><input type="reset" name="cancel" value="Reset" class="btn btn-danger"></div>
                            <div class="col-md-3"><a href="list_teacher_subject.php"><input type="button" value="Back" class="btn btn-danger"></a></div>
                       </div>
                        <div class="row" style="padding-top:30px;">
                            <center style="color:#006600;">
                                <?php echo $report ?></center>
                        </div>
                    </form>
                </div>
            </div>
    </body>
    </html>
    
    
<?php } }?>