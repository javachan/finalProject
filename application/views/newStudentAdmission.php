<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Student Admission Form | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize1.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
	@media screen and (min-width: 991px) {
		.container {
			margin-right: 12%;
		}
	}
	.picker__date-display {
		background: -webkit-linear-gradient(left top, #0277bd, #26a69a);
	}
	.picker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected {
		background-color: #7986cb;
	}
	.spanRed {
		color: #ef5350;
	}
	.collapsible-body {
		padding: 1rem;
		padding-left: 2rem;
		background-color: white;
	}
	.row {
		margin-bottom: 0px;
	}
	.select2-container--default .select2-selection--single {
		border-radius: 0;
		border: 0;
		border-bottom: 1px solid #ccc;
	}
	.select2-container--default.select2-container--focus .select2-selection--single {
		border: 0;
		border-bottom: 1px solid #333;
	}

	img {
		user-drag: none; 
		user-select: none;
		-moz-user-select: none;
		-webkit-user-drag: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}

	.icon{ 
		background-repeat: no-repeat; 
		background-position: 2px 3px;
	}

	input::placeholder {
		color: #9e9e9e;
	}
	td {
		padding: 0 5px;
	}
	.file-path-wrapper {
		padding-left: 0 !important;
	}
	.determinate {
		position: fixed;
		background: linear-gradient(to top, #039be5 0%, #00e5ff 100%);
		width: 0%;
		height: 4px;
		z-index: 999;
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.10), 0 2px 10px 0 rgba(0, 0, 0, 0.10);
		border-top-right-radius: 50px;
		border-bottom-right-radius: 50px;		
		transition: all 1s cubic-bezier(0, 0, 0, 1) !important;
	}
	#photo-label {
		margin-bottom: 1px;
	}
	.l-scr-photo {
		position: relative;
	}
	.pr-img-div {
		display: none;
		background-color: white;
		position: absolute;
		width: 91.5%;
	}
	.preview-img {
		width: 50%;	
		max-width: 100%;
		max-height: 100%;
	}
</style>
</head>
<body class="blue-grey lighten-5">
	<div id="cover"></div>

	<div class="determinate"></div>

	<?= $top ?>
	<?= $sideLarge ?>
	<?= $sideSmall ?>
	
	<!--main-->
	<div class="container main" ng-app="baseModule" ng-controller="formController">
		<center>
			<div id="dbMessage" class="col s12 z-depth-2 center card-panel" style="color: #4F4F4F;
			word-wrap: break-word; display: none;"></div>
		</center>

		<form id="studentRegistrationForm" class="col s12" method="post" action="<?php echo base_url('studentRegistration/addStudentDB')?>" name="studentRegistrationForm" enctype="multipat/form-data" autocomplete>
			<ul class="collapsible z-depth-2" style="margin-top: 30px; letter-spacing: 0.1px;" data-collapsible="expandable">
				<li>
					<div class="firstCollapsible collapsible-header indigo lighten-2 active"><!--active class-->
						<span class="collHead">Applicant’s Personal Information</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col center m4 s12">
								<input id="studentName" name="studentName" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" required autofocus>
								<label for="studentName">Name <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m4 s12">
								<input id="auid" name="auid" type="text" pattern="[A-Za-z]+([0-9][1-9]|[1-9][0-9])[A-Za-z]+([0-9][0-9][1-9]|[0-9][1-9][0-9]|[1-9][0-9][0-9])" title="Enter proper AUID" class="validate" required autocomplete>
								<label for="auid">AUID <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col" style="margin-left: -53px;">
								<center>
									<div class="tickAUID" style="display: none;">
										<img src="<?php echo base_url()?>assets/images/tick.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
									</div>
									<div class="crossAUID" style="display: none;">
										<img src="<?php echo base_url()?>assets/images/cross.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
									</div>
								</center>
							</div>
							<div class="input-field col m4 s12">
								<input id="usn" name="usn" type="text" pattern="1[Aa][Yy]([0-9][1-9]|[1-9])[0-9][A-Za-z]{2}([0-9][0-9][1-9]|[0-9][1-9][0-9]|[1-9][0-9][0-9])" title="Enter proper USN" class="validate" value="1AY" required>
								<label for="usn">USN <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col" style="margin-left: -53px;">
								<center>
									<div class="tickUSN" style="display: none;">
										<img src="<?php echo base_url()?>assets/images/tick.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
									</div>
									<div class="crossUSN" style="display: none;">
										<img src="<?php echo base_url()?>assets/images/cross.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
									</div>
								</center>
							</div>
						</div>
						<div class="row">
							<div class="input-field col m4 s12" style="padding-top: 20px; margin-bottom: 20px;">
								<label for="institution" class="active">Institution <span class="spanRed">*</span></label>
								<select id="institution" name="institution" style="width: 100%;">
								</select>
							</div>
							<div class="input-field col m4 s12" style="padding-top: 20px; margin-bottom: 20px;">
								<label for="department" class="active">Department <span class="spanRed">*</span></label>
								<select id="department" class="select2Box" name="department" style="width: 100%;" disabled>
									<option value="select" disabled selected>select</option>        
								</select>
							</div>
							<div class="input-field col m4 s12">
								<label id="doaLabel" for="doa">Date of Admission <span class="spanRed">*</span></label>
								<input id="doa" name="doa" type="date" class="datepicker">
							</div>
						</div>
						<div class="row">
							<div class="input-field col m4 s12" style="margin-bottom: 20px;">
								<input id="male" type="radio" name="gender" value="male" checked>
								<label for="male">Male</label>

								<input id="female" type="radio" name="gender" value="female">
								<label for="female">Female</label>

								<input id="others" type="radio" name="gender" value="others">
								<label for="others">Others</label>
							</div>
							<div class="input-field col m4 s12">
								<input id="nationality" name="nationality" type="text" required>
								<label for="nationality">Nationality <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m4 s12">
								<label id="dobLabel" for="dob">Date of Birth <span class="spanRed">*</span></label>
								<input id="dob" name="dob" type="date" class="datepicker">
							</div>
						</div>
						<div class="row">
							<div class="sm-scr-photo file-field input-field col s12 hide-on-med-and-up">
								<input type="file" id="photo" name="photo">
								<div class="file-path-wrapper">
									<input placeholder="Upload Pic *" class="file-path validate" type="text">
								</div>
							</div>
							<div class="input-field col m8 s12">
								<input type="text" id="permanentAddress" name="permanentAddress" ng-model="permanentAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
								<label for="permanentAddress">Permanent Address <span class="spanRed">*</span></label>
							</div>
							<div class="l-scr-photo file-field input-field col m4 hide-on-small-only">
								<input type="file" id="photoL" name="photo">
								<div class="file-path-wrapper">
									<input id="photo-label" placeholder="Upload Pic *" class="file-path validate" type="text">
								</div>
								<div class="pr-img-div center z-depth-2">
									<img id="pr-imgL" class="preview-img" src="#">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="checkbox" id="copy" ng-model="copy" ng-change="copyAddress()" ng-disabled="!permanentAddress">
								<label for="copy">If correspondance address is same as permanent address</label>
							</div>
						</div>
						<div class="row" style="margin-top: 15px;">
							<div class="input-field col s12">
								<input type="text" name="correspondanceAddress" id="correspondanceAddress" name="correspondanceAddress" ng-model="correspondanceAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
								<label for="correspondanceAddress" ng-class="{'active':activateLabel}">Correspondance Address <span class="spanRed">*</span></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col m5 s6">
								<input id="studentEmail" name="studentEmail" type="text" class="validate" pattern="^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])$" title="Enter valid Acharya email id" required>
								<label for="studentEmail">Student Email ID <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m3 s6" style="margin-left: -23px; margin-right: 22px;">
								<input type="text" id="acharyaEmail" name="acharyaEmail" value="@acharya.ac.in" style="text-align: center; padding-right: 22px; border-bottom-color: " readonly>
								<label for="acharyaEmail" class="active"></label>
							</div>
							<div class="input-field col" style="margin-left: -60px;">
								<center>
									<div class="preloader-wrapper small active" style="display: none;">
										<div class="spinner-layer spinner-blue-only">
											<div class="circle-clipper left">
												<div class="circle"></div>
											</div>
											<div class="gap-patch">
												<div class="circle"></div>
											</div>
											<div class="circle-clipper right">
												<div class="circle"></div>
											</div>
										</div>
									</div>
									<div class="tick" style="display: none;">
										<img src="<?php echo base_url()?>assets/images/tick.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
									</div>
									<div class="cross" style="display: none;">
										<img src="<?php echo base_url()?>assets/images/cross.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
									</div>
								</center>
							</div>
							<div class="input-field col center m4 s12">
								<input id="studentMobile" name="studentMobile" type="number" required>
								<label for="studentMobile">Student Mobile <span class="spanRed">*</span></label>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header indigo lighten-2">
						<span class="collHead">Category</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col s8">
								<label>Whether the candidate belongs to SC/ST or BC/BT </label> 
							</div>
							<div class="input-field col s4">
								<input id="cYes" type="radio" name="category" value="1" checked>
								<label for="cYes">Yes</label>
								<input id="cNo" type="radio" name="category" value="0">
								<label for="cNo">No</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s8">
								<label>Whether the candidate is NRI/Foreign National </label> 
							</div>
							<div class="input-field col s4">
								<input id="nYes" type="radio" name="nriForeign" value="1" checked>
								<label for="nYes">Yes</label>
								<input id="nNo" type="radio" name="nriForeign" value="0">
								<label for="nNo">No</label>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header indigo lighten-2">
						<span class="collHead">Parent / Guardian Information</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col s4">
								<select name="parentType" id="parentType">
									<option disabled selected>Select</option>
									<option value="Father">Father</option>
									<option value="Mother">Mother</option>
									<option value="Guardian">Guardian</option>
								</select>
								<label for="parentType">Parent <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col center s8">
								<input id="parentName" name="parentName" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" ng-model="parentName" required>
								<label id="parentNameLabel" for="parentName">Parent/Guardian Name <span class="spanRed">*</span></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col center s6">
								<input id="parentOccupation" name="parentOccupation" type="text" required>
								<label for="parentOccupation">Occupation <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col center s6">
								<input id="parentDesignation" name="parentDesignation" type="text" required>
								<label for="parentDesignation">Designation <span class="spanRed">*</span></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" id="officeAddress" name="officeAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
								<label for="officeAddress">Office Address <span class="spanRed">*</span></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="parentEmail" name="parentEmail" type="email" class="validate">
								<label for="parentEmail">Parent Email ID</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col center s6">
								<input id="parentMobile" name="parentMobile" type="number" required>
								<label for="parentMobile">Parent Mobile <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col center s6">
								<input id="pan" name="pan" type="text">
								<label for="pan">PAN No</label>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header indigo lighten-2">
						<span class="collHead">Additional Info</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col m8 s12">
								<input type="text" name="localAddress" id="localAddress" name="localAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
								<label for="localAddress">Local Address of Applicant (if any) <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col center m4 s12">
								<input id="studentLocalMobile" name="studentLocalMobile" type="number" required>
								<label for="studentLocalMobile">Student Local Mobile <span class="spanRed">*</span></label>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header indigo lighten-2">
						<span class="collHead">Academic Information</span>
					</div>
					<div class="collapsible-body">
						<table class="bordered highlight striped">
							<tr>
								<th>Educational Qualification</th>
								<th class="center">10th</th>
								<th></th>
								<th class="center">12th</th>
							</tr>
							<tr>
								<th>Name of Board or University</th>
								<td><input id="tenthBoard" type="text" name="tenthBoard"></td><td></td>
								<td><input id="twelveBoard" type="text" name="twelveBoard"></td>
							</tr>
							<tr>
								<th>Name of the College last Studied</th>
								<td><input id="tenthSchool" type="text" name="tenthSchool"></td><td></td>
								<td><input id="twelveSchool" type="text" name="twelveSchool"></td>
							</tr>
							<tr>
								<th>Maximum Marks</th>
								<td><input id="tenthMaxMarks" type="number" name="tenthMaxMarks"></td><td></td>
								<td><input id="twelveMaxMarks" type="number" name="twelveMaxMarks"></td>
							</tr>
							<tr>
								<th>Total Marks Scored</th>
								<td><input id="tenthMarks" type="number" name="tenthMarks"></td><td></td>
								<td><input id="twelveMarks" type="number" name="twelveMarks"></td>
							</tr>
							<tr>
								<th>Percentage</th>
								<td><input id="tenthPercentage" type="text" name="tenthPercentage"></td><td></td>
								<td><input id="twelvePercentage" type="text" name="twelvePercentage"></td>
							</tr>
						</table>
						<div class="row">
							<div class="input-field col m4 s12">
								<input id="entranceExam" type="text" name="entranceExam">
								<label for="entranceExam">Entrance/Qualifying Exam <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m4 s12">
								<input id="entranceState" type="text" name="entranceState">
								<label for="entranceState">State <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m2 s6">
								<input id="entranceYear" type="text" name="entranceYear">
								<label for="entranceYear">Year <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m2 s6">
								<input id="entranceScore" type="number" name="entranceScore">
								<label for="entranceScore">Score <span class="spanRed">*</span></label>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header indigo lighten-2">
						<span class="collHead">Applicable only for P G Students</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col m4 s12">
								<input id="pgExam" type="text" name="pgExam">
								<label for="pgExam">Name of the exam passed</label>
							</div>
							<div class="input-field col m4 s12">
								<input id="pgUniversity" type="text" name="pgUniversity">
								<label for="pgUniversity">University</label>
							</div>
							<div class="input-field col m4 s12">
								<input id="pgPassingYear" type="number" name="pgPassingYear">
								<label for="pgPassingYear">Year of Passing</label>
							</div>
						</div>
						<div class="row hide-on-small-only">
							<table>
								<tr>
									<td>Subjects Studied</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject1L" type="text" name="pgSubject1">
											<label for="pgSubject1L">Subject 1</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject2L" type="text" name="pgSubject2">
											<label for="pgSubject2L">Subject 2</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject3L" type="text" name="pgSubject3">
											<label for="pgSubject3L">Subject 3</label>
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject4L" type="text" name="pgSubject4">
											<label for="pgSubject4L">Subject 4</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject5L" type="text" name="pgSubject5">
											<label for="pgSubject5L">Subject 5</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject6L" type="text" name="pgSubject6">
											<label for="pgSubject6L">Subject 6</label>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div class="row hide-on-med-and-up">
							<table>
								<tr>
									<td>Subjects Studied</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject1S" type="text" name="pgSubject1">
											<label for="pgSubject1S">Subject 1</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject2S" type="text" name="pgSubject2">
											<label for="pgSubject2S">Subject 2</label>
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject3S" type="text" name="pgSubject3">
											<label for="pgSubject3S">Subject 3</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject4S" type="text" name="pgSubject4">
											<label for="pgSubject4S">Subject 4</label>
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject5S" type="text" name="pgSubject5">
											<label for="pgSubject5S">Subject 5</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgSubject6S" type="text" name="pgSubject6">
											<label for="pgSubject6S">Subject 6</label>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div class="row hide-on-small-only">
							<table>
								<tr>
									<td>Marks / Percentage</td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear1L" type="number" name="pgMarksYear1">
											<label for="pgMarksYear1L">1st Year</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear2L" type="number" name="pgMarksYear2">
											<label for="pgMarksYear2L">2nd Year</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear3L" type="number" name="pgMarksYear3">
											<label for="pgMarksYear3L">3rd Year</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear4L" type="number" name="pgMarksYear4">
											<label for="pgMarksYear4L">4th Year</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgTotalPercentageL" type="text" name="pgTotalPercentage">
											<label id="pgTotalPercentageLabel" for="pgTotalPercentageL">Total %</label>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div class="row hide-on-med-and-up">
							<table>
								<tr>
									<td>Marks / Percentage</td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear1S" type="number" name="pgMarksYear1">
											<label for="pgMarksYear1S">1st Year</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear2S" type="number" name="pgMarksYear2">
											<label for="pgMarksYear2S">2nd Year</label>
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear3S" type="number" name="pgMarksYear3">
											<label for="pgMarksYear3S">3rd Year</label>
										</div>
									</td>
									<td>
										<div class="input-field col s12">
											<input id="pgMarksYear4S" type="number" name="pgMarksYear4">
											<label for="pgMarksYear4S">4th Year</label>
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td colspan="2">
										<div class="input-field col s12">
											<input id="pgTotalPercentageS" type="text" name="pgTotalPercentage">
											<label id="pgTotalPercentageLabel" for="pgTotalPercentageS">Total %</label>
										</div>
									</td>
								</tr>
							</table>
						</div>							
					</div>
				</li>
				<li>
					<div class="collapsible-header indigo lighten-2">
						<span class="collHead">Enclosures</span>
					</div>
					<div class="collapsible-body" style="padding-bottom: 35px;">
						<div class="row">
							<div class="input-field col s12">
								<span>Details of copies of documents enclosed: Tick the relevant boxes</span>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="checkAll" class="checkAll" type="checkbox" name="checkAll" value="1">
								<label for="checkAll">Select All </label> 
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="pucCertificate" class="chkbox" type="checkbox" name="pucCertificate" value="1">
								<label for="pucCertificate">Marks Cards of 10+2 / equivalent exam </label> 
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="sslcCertificate" class="chkbox" type="checkbox" name="sslcCertificate" value="1">
								<label for="sslcCertificate">10th Std. Certificate </label> 
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="tc" type="checkbox" class="chkbox" name="tc" value="1">
								<label for="tc">Transfer Certificate </label> 
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="conductCertificate" class="chkbox" type="checkbox" name="conductCertificate" value="1">
								<label for="conductCertificate">Conduct Certificate </label> 
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="migrationCertificate" class="chkbox" type="checkbox" name="migrationCertificate" value="1">
								<label for="migrationCertificate">Migration Certificate </label> 
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">				
								<input id="entranceScorecard" class="chkbox" type="checkbox" name="entranceScorecard" value="1">
								<label for="entranceScorecard">Entrance Exam Score Card </label> 
							</div>
						</div>
						<div class="row" id="categoryCertificateDiv">
							<div class="input-field col s12">
								<input id="categoryCertificate" class="chkbox" type="checkbox" name="categoryCertificate" value="1">
								<label for="categoryCertificate">Category Certificate (SC/ST or BC/BT) </label> 
							</div>
						</div>
						<div class="row" id="nriForeignCertificateDiv">
							<div class="input-field col s12">
								<input id="nriForeignCertificate" class="chkbox" type="checkbox" name="nriForeignCertificate" value="1">
								<label for="nriForeignCertificate">Copy of Passport </label> 
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header indigo lighten-2">
						<span class="collHead">Fee Details</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col m4 s12">
								<input id="totalAmount" type="number" name="totalAmount">
								<label for="totalAmount">Amount Paid <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m4 s6">
								<input id="receiptNo" type="text" name="receiptNo">
								<label for="receiptNo">Receipt No <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col m4 s6">
								<label id="feePaidDateLabel" for="feePaidDate">Fee Paid Date <span class="spanRed">*</span></label>
								<input id="feePaidDate" name="feePaidDate" type="date" class="datepicker">
							</div>
						</div>
					</div>
				</li>
			</ul>
			<div class="row">
				<button id="submitButton" class="btn waves-effect waves-light" style="margin-left: 10px; margin-bottom: 30px;" type="submit" name="action">Submit
					<i class="material-icons right">send</i>
				</button>
			</div>
		</form>
	</div>
	<div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 10px;">
		<img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="160px;" style="opacity: 0.4" draggable="false">
	</div>
	<!--main end-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			$('.navbar-fixed').show();
			$('aside').show();
			$('#slide-out').show();
			fileReq();
			$('#cover').hide();

		});

		$(window).resize(fileReq);

		function fileReq() {
			if (window.matchMedia('(max-width: 600px)').matches) {
				$(".l-scr-photo > input").removeAttr("required");
				$(".sm-scr-photo > input").attr("required", "required");
			}
			else {
				$(".sm-scr-photo > input").removeAttr("required");
				$(".l-scr-photo > input").attr("required", "required");
			}
		};

		function readURL(input) {

			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.preview-img').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
			else {
				$('.preview-img').attr('src', '#');
			}
		}

		$("#photoL").change(function(){
			readURL(this);
		});

		$("#photoL").hover(function() {
			if($('.preview-img').attr('src') != '#') {
				$(".pr-img-div").css("z-index", "999");
				$(".pr-img-div").show("blind");
			}
		}, 
		function() {
			$(".pr-img-div").hide("blind");
		}
		);

		$(".button-collapse").sideNav();

		$(document).ready(function() {
			$('#parentType').material_select();
			$("#department").select2();
			$("#institution").select2();
			$("<li><a class='waves-effect <?= $color3?>-text text-darken-3' href='<?php echo base_url($link3)?>'>Recent Registrations</a></li>").insertAfter("#facReg");
			loadInstitution();
		});

		function loadInstitution() {
			$.ajax({
				url:'<?php echo base_url("adminController/getInstitution")?>',
				success: function(data) {
					$("#institution").html(data);
				}
			});
		}

		$("#institution").change(function() {
			$.ajax({
				url: '<?php echo base_url("adminController/getDepartments")?>',
				type: 'POST',
				data: {
					institution: $(this).val()
				},
				success: function(data) {
					$("#department").html(data);
					$("#department").removeAttr("disabled");
				}
			});				
		});

		$("#studentEmail").focusin(function() {
			if(!$("#studentEmail").val()) {
				if($("#studentEmail").css('box-shadow') == 'none') {
					$("#acharyaEmail").css("border-bottom", "1px solid #26a69a");
					$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #26a69a");
				}
				else {
					$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
					$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
				}
			}
			else if(/^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])$/.test($("#studentEmail").val())){
				$("#acharyaEmail").css("border-bottom", "1px solid #4caf50");
				$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #4caf50");
			}
			else if(/^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])$/.test($("#studentEmail").val())){
				$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
				$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
			}
		});

		$("#studentEmail").focusout(function() {
			if(!$("#studentEmail").val()) {
				$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
				$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
			}
			else if(/^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])$/.test($("#studentEmail").val())){
				$("#acharyaEmail").css("border-bottom", "1px solid #4caf50");
				$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #4caf50");
			}
			else if(!/^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])$/.test($("#studentEmail").val())){
				$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
				$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
			}
		});

		$("#usn, #auid, #pan").change(function() {
			this.value = this.value.toUpperCase();
		});

		$("#auid").keyup(function() {

			$(".tickAUID").hide();
			$(".crossAUID").hide();
			if(!/^[A-Za-z]+([0-9][1-9]|[1-9][0-9])[A-Za-z]+([0-9][0-9][1-9]|[0-9][1-9][0-9]|[1-9][0-9][0-9])$/.test($("#auid").val())){
				$(".tickAUID").hide();
				$(".crossAUID").hide();
				return false;
			}

			$.ajax({
				url:'<?php echo base_url("adminController/AUIDexists")?>',
				type: 'POST',
				data: {
					auid: $("#auid").val()
				},
				success: function(data) {
					if(data == "no") {
						$(".crossAUID").hide();
						$(".tickAUID").show();
						$(".tickAUID").delay(5000).hide(0);
					}
					else {
						$(".tickAUID").hide();
						$(".crossAUID").show();
						$(".crossAUID").delay(5000).hide(0);
					}
				}
			});
		});

		$("#usn").keyup(function() {

			$(".tickUSN").hide();
			$(".crossUSN").hide();
			if(!/^1[Aa][Yy]([0-9][1-9]|[1-9])[0-9][A-Za-z]{2}([0-9][0-9][1-9]|[0-9][1-9][0-9]|[1-9][0-9][0-9])$/.test($("#usn").val())){
				$(".tickUSN").hide();
				$(".crossUSN").hide();
				return false;
			}

			$.ajax({
				url:'<?php echo base_url("adminController/USNexists")?>',
				type: 'POST',
				data: {
					usn: $("#usn").val()
				},
				success: function(data) {
					if(data == "no") {
						$(".crossUSN").hide();
						$(".tickUSN").show();
						$(".tickUSN").delay(5000).hide(0);
					}
					else {
						$(".tickUSN").hide();
						$(".crossUSN").show();
						$(".crossUSN").delay(5000).hide(0);
					}
				}
			});
		});

		$("#studentEmail").keyup(function() {

			$(".tick").hide();
			$(".cross").hide();
			if($("#studentEmail").val()){
				$(".preloader-wrapper").show();
			}
			else {
				$(".preloader-wrapper").hide();	
			}

			if(!/^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])$/.test($("#studentEmail").val())){
				return false;
			}

			email = $("#studentEmail").val() + "@acharya.ac.in";

			$.ajax({
				url:'<?php echo base_url("adminController/Emailexists")?>',
				type: 'POST',
				data: {
					email: email,
					user: "student"
				},
				success: function(data) {
					if(data == "no") {
						$(".preloader-wrapper").hide();
						$(".cross").hide();
						$(".tick").show();
						$(".tick").delay(5000).hide(0);
					}
					else {
						$(".preloader-wrapper").hide();
						$(".tick").hide();
						$(".cross").show();
						$(".cross").delay(5000).hide(0);
					}
				}
			});
		});

		$(document).ready(function(){
			$(".firstCollapsible").off('click.collapse').css('pointer-events', 'none');
		});

		$(".collapsible-header").click(function() {
			$(this).off('click.collapse').css('pointer-events', 'none');
		});

		$(function () {
			if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
				$("#dob_table").click(function() {
					$("#dobLabel").addClass('active');
				});
			}
		});

		$(function () {
			if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
				$("#feePaidDate_table").click(function() {
					$("#feePaidDateLabel").addClass('active');
				});
			}
		});

		$(document).ready(function () {

			$("#checkAll").click(function () {
				$(".chkbox").prop('checked', $(this).prop('checked'));
			});

			$(".chkbox").change(function(){
				if (!$(this).prop("checked")){
					$("#checkAll").prop("checked",false);
				}
			});


			$("input[name='category'], input[name='nriForeign']").change(function() {
				divName = "#" + $(this).attr("name") + "CertificateDiv";
				if ($(this).val() == '0'){
					$(divName).hide();
				}
				else{
					$(divName).show();
				}
			});
		});

    	//Calculating the date upto yesterday
    	var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);

    	//Disable future dates
    	$('.datepicker').pickadate({
    		min: [1977,1,1],
    		max: yesterday+1,
    		selectMonths: true,
    		selectYears: 40,
    		format: 'yyyy-mm-dd',
    	});

    	//set current date for date of admission
    	var $input = $('#doa').pickadate();
    	var d = new Date();
    	$(document).ready(function() {
    		if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
    			$("#doaLabel").addClass("active");
    		}
    	});

		//Use the picker object directly.
		var picker = $input.pickadate('picker');
		picker.set('select',d.getFullYear().toString() + "-" + (d.getMonth()+1).toString() + "-" + d.getDate().toString());

		$('#tenthMarks, #tenthMaxMarks').on('input', function() {
			if($('#tenthMaxMarks').val() != "" && $('#tenthMarks').val() != "")
			{
				$('#tenthPercentage').addClass('active');
				$('#tenthPercentage').val(((parseInt($('#tenthMarks').val())/parseInt($('#tenthMaxMarks').val()))*100).toFixed(2));
			}
			else {
				$('#tenthPercentage').val("");
				$('#tenthPercentage').removeClass('active');	
			}
		});

		$("#twelveMarks, #twelveMaxMarks").on('input', function() {

			if($('#twelveMaxMarks').val() != "" && $('#twelveMarks').val() != "")
			{
				$('#twelvePercentage').addClass('active');
				$('#twelvePercentage').val(((parseInt($('#twelveMarks').val())/parseInt($('#twelveMaxMarks').val()))*100).toFixed(2));
			}
			else {
				$('#twelvePercentage').val("");
				$('#twelvePercentage').removeClass('active');	
			}

		});

		$('#pgMarksYear1, #pgMarksYear2, #pgMarksYear3, #pgMarksYear4').on('input', function() {
			if($('#pgMarksYear1').val() != "" && $('#pgMarksYear2').val() != "" && $('#pgMarksYear3').val() != "" && $('#pgMarksYear4').val() != "")
			{
				$total = parseInt($('#pgMarksYear1').val()) + parseInt($('#pgMarksYear2').val()) + parseInt($('#pgMarksYear3').val()) + parseInt($('#pgMarksYear4').val());
				$('#pgTotalPercentageLabel').addClass('active');
				$('#pgTotalPercentage').val((($total/400)*100).toFixed(2));
			}
			else {
				$('#pgTotalPercentage').val("");
				$('#pgTotalPercentageLabel').removeClass('active');	
			}
		});

		$('#parentType').on('change', function() {
			$val = this.value
			$('#parentNameLabel').html($val + " Name" + " <span class='spanRed'>*</span>");
		});

		var app = angular.module('baseModule',[]);
		app.controller('formController', function($scope) {
			$scope.copyAddress = function() {
				$scope.setVal = $scope.permanentAddress;
				if($scope.copy) {
					$scope.activateLabel = true;
					$scope.correspondanceAddress = $scope.permanentAddress;
				}
				else if($scope.correspondanceAddress == $scope.permanentAddress){
					$scope.activateLabel = false;
					$scope.correspondanceAddress = "";
				}
				else {
					$scope.activateLabel = true;
				}
			};
		});

		$('#studentRegistrationForm').on('submit', function(value) {

			value.preventDefault();

			if(!$("#institution").val()) {
				alert("Please select the Institution");
				return false;
			}

			if(!$("#department").val()) {
				alert("Please select the Department");
				return false;
			}

			if ($("input[name='gender']:checked").length > 0){
				gender = $('input:radio[name=gender]:checked').val();
			}

			if ($("input[name='category']:checked").length > 0){
				category = $('input:radio[name=category]:checked').val();
			}

			if ($("input[name='nriForeign']:checked").length > 0){
				nriForeign = $('input:radio[name=nriForeign]:checked').val();
			}

			if($("#pucCertificate").prop("checked") == false) {
				pucCertificate = "0";
			}
			else {
				pucCertificate = "1";	
			}

			if($("#sslcCertificate").prop("checked") == false) {
				sslcCertificate = "0";
			}
			else {
				sslcCertificate = "1";	
			}

			if($("#tc").prop("checked") == false) {
				tc = "0";
			}
			else {
				tc = "1";	
			}

			if($("#conductCertificate").prop("checked") == false) {
				conductCertificate = "0";
			}
			else {
				conductCertificate = "1";	
			}

			if($("#migrationCertificate").prop("checked") == false) {
				migrationCertificate = "0";
			}
			else {
				migrationCertificate = "1";	
			}

			if($("#entranceScorecard").prop("checked") == false) {
				entranceScorecard = "0";
			}
			else {
				entranceScorecard = "1";	
			}

			if($("#categoryCertificate").prop("checked") == false) {
				categoryCertificate = "0";
			}
			else {
				categoryCertificate = "1";
			}

			if($("#nriForeignCertificate").prop("checked") == false) {
				nriForeignCertificate = "0";
			}
			else {
				nriForeignCertificate = "1";
			}

			$("#submitButton").attr("disabled", "disabled");

			var formData = new FormData($("#studentRegistrationForm")[0]);

			formData.append("gender", gender);
			formData.append("category", category);
			formData.append("nriForeign", nriForeign);
			formData.append("pucCertificate", pucCertificate);
			formData.append("sslcCertificate", sslcCertificate);
			formData.append("tc", tc);
			formData.append("conductCertificate", conductCertificate);
			formData.append("migrationCertificate", migrationCertificate);
			formData.append("entranceScorecard", entranceScorecard);
			formData.append("categoryCertificate", categoryCertificate);
			formData.append("nriForeignCertificate", nriForeignCertificate);

			$.ajax({
				url: '<?php echo base_url("adminController/addStudentDB");?>',
				type: 'POST',
				data: formData,
				xhr: function() {
					var xhr = $.ajaxSettings.xhr();
					var count = 0;
					xhr.upload.onprogress = function(e) {
						if($("#photo").val()) {

						}
						complete = Math.floor(e.loaded / e.total *100);
						console.log(complete + '%');
						if(complete == 100) {
							complete -= 10;
						}
						$(".determinate").css("width", complete + "%");
					};
					return xhr;
				},
				contentType: false,
				cache: false,
				processData: false,
				success:function(data) {
					if(data == "Added to database") {
						$(".determinate").css("width", "100%");
						$("#submitButton").removeAttr("disabled");
						$('#dbMessage').html(data);
						$('html, body').animate({scrollTop : 0},800);
						$('#studentRegistrationForm')[0].reset();
						$("label").removeClass("active");
						$("label[for='institution'], label[for='department'], label[for='usn']").addClass("active");
						var $input = $('#doa').pickadate();
						var d = new Date();
						var picker = $input.pickadate('picker');
						picker.set('select',d.getFullYear().toString() + "-" + (d.getMonth()+1).toString() + "-" + d.getDate().toString());
						$('#dbMessage').show('blind');
						$('#dbMessage').delay(3000).hide('blind');
						loadInstitution();
						$('#department').find('option').remove().end().append('<option value="select" selected>select</option>');
						$('#department').attr("disabled", "disabled");
						$("#acharyaEmail").css("border-bottom", "1px solid #9e9e9e");
						$("#acharyaEmail").css("box-shadow", "none");
						$('.determinate').delay(3000).hide('blind');
					}
					else {
						$(".determinate").css("width", "100%");
						$("#submitButton").removeAttr("disabled");
						$('#dbMessage').html(data);
						$('html, body').animate({scrollTop : 0},800);
						$('#dbMessage').show('blind');
						$('#dbMessage').delay(3000).hide('blind');
						$('.determinate').delay(3000).hide('blind');
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#submitButton").removeAttr("disabled");
					$('html, body').animate({scrollTop : 0},800);
					$('#dbMessage').html(errorThrown);
					$('#dbMessage').show('blind');
					$('#dbMessage').delay(3000).hide('blind');
					$('.determinate').delay(3000).hide('blind');
				}
			});
		});
	</script>
</body>
</html>