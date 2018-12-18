<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title"><?php echo get_phrase('Tabulation');?></h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>index.php?admin/admin_dashboard"><?php echo get_phrase('Class');?></a></li>
	        <li class="active"><?php echo get_phrase('Tabulation');?></li>
	    </ol>                
    </div>
</div>



<hr />
<div class="row">
	<div class="col-md-12">
		<?php echo form_open(base_url() . 'index.php?admin/tab_sheet');?>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label"><?php echo get_phrase('Class');?></label>
					<select name="class_id" class="form-control selectboxit">
                        <option value=""><?php echo get_phrase('Select');?></option>
                        <?php 
                        $classes = $this->db->get('class')->result_array();
                        foreach($classes as $row):
                        ?>
                            <option value="<?php echo $row['class_id'];?>"
                            	<?php if ($class_id == $row['class_id']) echo 'selected';?>>
                            		<?php echo $row['name'];?>
                            </option>
                        <?php
                        endforeach;
                        ?>
                    </select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				<label class="control-label"><?php echo get_phrase('Semester');?></label>
					<select name="exam_id" class="form-control selectboxit">
                        <option value=""><?php echo get_phrase('Select');?></option>
                        <?php 
                        $exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
                        foreach($exams as $row):
                        ?>
                            <option value="<?php echo $row['exam_id'];?>"
                            	<?php if ($exam_id == $row['exam_id']) echo 'selected';?>>
                            		<?php echo $row['name'];?>
                            </option>
                        <?php
                        endforeach;
                        ?>
                    </select>
				</div>
			</div>
			<input type="hidden" name="operation" value="selection">
			<div class="col-md-4" style="margin-top: 20px;">
				<button type="submit" class="btn btn-info"><?php echo get_phrase('Generate');?></button>
			</div>
		<?php echo form_close();?>
	</div>
</div>

<?php if ($class_id != '' && $exam_id != ''):?>
<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4" style="text-align: center;">
		<div class="tile-stats tile-gray">
		<div class="icon"><i class="entypo-docs"></i></div>
			<h3 style="color: #696969;">
				<?php
					$exam_name  = $this->db->get_where('exam' , array('exam_id' => $exam_id))->row()->name; 
					$class_name = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name; 
					echo get_phrase('Tabulation');
				?>
			</h3>
			<h4 style="color: #696969;">
				<?php echo get_phrase('Class') . ' ' . $class_name;?> : <?php echo $exam_name;?>
			</h4>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>


<hr />
<?php $min = $this->db->get_where('academic_settings' , array('type' =>'minium_mark'))->row()->description;?>
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo get_phrase('Student-Portal'); ?></h4> 
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php?admin/admin_dashboard"><?php echo get_phrase('Dashboard'); ?></a></li>
            <li class="active"><?php echo get_phrase('Student-Portal'); ?></li>
        </ol>
    </div>
</div>

<div class="row">
<?php $student_info =   $this->db->get_where('enroll' , array('student_id' => $student_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description))->result_array(); 
    foreach($student_info as $row): ?>
    <div class="col-md-4">
                        <center><?php if(file_exists('uploads/student_image/'.$student_id.'.jpg')):?>
                <img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-responsive"/>
            <?php endif;?>
            <?php if(!file_exists('uploads/student_image/'.$student_id.'.jpg')):?>
                <img src="assets/user.png" class="img-rounded img-responsive"/>
            <?php endif;?></center>
                        <div class="white-box">
                            <center><h4><?php echo $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->name;?></h4></center>
        <?php $destacado = $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->board;
                if ($destacado == 1):?>
                  <center><h5><i class="fa fa-circle m-r-5" style="color: #00a651;"></i><?php echo get_phrase('Excellent'); ?></h5> </li></center>
                  <?php endif;?>
                  <br>
                                 <?php $student_birthday = $this->db->get_where('student' , array(
            'student_id' => $row['student_id']))->row()->birthday;
                list ($day, $month, $year) = split("-", $student_birthday);
                $now = date("m");
                if ($now == $month):?>
                    <center><div class="badge badge-warnig">
                        <i class="icon-present"></i> <?php echo get_phrase('This-Month');?>
                    </div></center>
                <?php endif;?><br><br>

                            <p><span><?php echo get_phrase('Registered'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo (date('m/d/Y', $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->date)); ?></span></p>

        <p><span><?php echo get_phrase('Username'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->username; ?></span></p>

        <p><span><?php echo get_phrase('Phone'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->phone; ?></span></p>

        <p><span><?php echo get_phrase('Sex'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php if($this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->sex == 'male') echo get_phrase('Male'); if($this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->sex == 'female') echo get_phrase('Female'); ?></span></p>

        <p><span><?php echo get_phrase('Email'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->email; ?></span></p>

        <p><span><?php echo get_phrase('Class'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->crud_model->get_class_name($row['class_id']); ?></span></p>

        <p><span><?php echo get_phrase('Section'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name; ?></span></p>

         <p><span><?php echo get_phrase('School-Bus'); ?>:</span><span class="pull-right label label-info label-rounded"><?php $trans_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->transport_id; echo $this->db->get_where('transport' , array('transport_id' => $trans_id))->row()->route_name; ?></span></p>

        <p><span><?php echo get_phrase('Parent'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->crud_model->get_type_name_by_id('parent', $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->parent_id); ?></span></p>

        <p><span><?php echo get_phrase('Account-Status'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php 
                $ses = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->student_session; 
                if ($ses == '1'):?>
                    <?php echo get_phrase('Active');?>
                <?php endif;?>
                <?php if ($ses == "2"):?>
                        <?php echo get_phrase('Inactive');?>
                <?php endif;?></span></p>

        <p><span><?php echo get_phrase('Birthday'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->birthday; ?></span></p>

        <p><span><?php echo get_phrase('Address'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->address; ?></span></p>

        <p><span><?php echo get_phrase('Class-Assigned'); ?>:</span>    <span class="pull-right label label-info label-rounded"><?php echo $this->crud_model->get_type_name_by_id('dormitory', $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->dormitory_id); ?></span></p>
                        </div>
                    </div>
    <?php endforeach;?>

<?php 
$edit_data      =   $this->db->get_where('enroll' , array('student_id' => $row['student_id'] , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
))->result_array();
foreach ($edit_data as $row3):
?>
    <div class="col-sm-8">
                            <div class="white-box">
                                <h3 class="box-title"><?php echo get_phrase('Update-Information'); ?></h3>
                                <?php echo form_open(base_url() . 'index.php?admin/student/do_update/'.$row3['student_id'].'/'.$row3['class_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

                                
                                    <div class="form-group">
                                        <label class="col-md-12"><?php echo get_phrase('Name');?></span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="<?php echo $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->name; ?>" class="form-control" placeholder="<?php echo get_phrase('Name');?>">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-12"><?php echo get_phrase('Username');?></span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="username" value="<?php echo $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->username; ?>" class="form-control" placeholder="<?php echo get_phrase('Username');?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><?php echo get_phrase('Phone');?></span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" value="<?php echo $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->phone; ?>" class="form-control" placeholder="<?php echo get_phrase('Phone');?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><?php echo get_phrase('Address');?></span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="address" value="<?php echo $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->address; ?>" class="form-control" placeholder="<?php echo get_phrase('Address');?>">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-12"><?php echo get_phrase('Email');?></span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="email" value="<?php echo $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->email; ?>" class="form-control" placeholder="<?php echo get_phrase('Email');?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12"><?php echo get_phrase('Parent'); ?></label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="parent_id">
                                                <option><?php echo get_phrase('Select'); ?></option>
                                                <?php 
                                    $parents = $this->db->get('parent')->result_array();
                                    $parent_id = $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->parent_id;
                                        foreach($parents as $row4):
                                        ?>
                                                <option value="<?php echo $row4['parent_id'];?>" <?php if($row4['parent_id'] == $parent_id)echo 'selected';?>><?php echo $row4['name'];?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-12"><?php echo get_phrase('Birthday'); ?></span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="birthday" class="form-control mydatepicker" placeholder="<?php echo get_phrase('Birthday'); ?>" value="<?php echo $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->birthday; ?>" >
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-sm-12"><?php echo get_phrase('Salon');?></label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="dormitory_id">
                                                <option><?php echo get_phrase('Select'); ?></option>
                                               <?php
                                    $classroom_id = $this->db->get_where('student' , array('student_id' => $row3['student_id']))->row()->dormitory_id;
                                    $classrooms = $this->db->get('dormitory')->result_array();
                                    foreach($classrooms as $row2):
                                  ?>
                                                <option value="<?php echo $row2['dormitory_id'];?>" <?php if($classroom_id == $row2['dormitory_id']) echo 'selected';?>><?php echo $row2['name'];?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12"><?php echo get_phrase('School-Bus');?></label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="transport_id">
                                                <option><?php echo get_phrase('Select'); ?></option>
                                                 <?php
                                    $trans_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->transport_id; 
                                    $transports = $this->db->get('transport')->result_array();
                                    foreach($transports as $row2):
                                  ?>
                                                <option value="<?php echo $row2['transport_id'];?>" <?php if($trans_id == $row2['transport_id']) echo 'selected';?>><?php echo $row2['route_name'];?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <label class="col-sm-12"><?php echo get_phrase('Account-Status'); ?></label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="student_session">
                                                <option><?php echo get_phrase('Select'); ?></option>
                                                <?php
                                $sess = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->student_session;
                            ?>
                                                <option value="1" <?php if($sess == '1') echo 'selected';?>><?php echo get_phrase('Active');?>
                                                </option>
                                                 <option value="2" <?php if($sess == '2') echo 'selected';?>><?php echo get_phrase('Inactive');?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10"><?php echo get_phrase('Update'); ?></button>  
                                 <?php echo form_close();?>
                            </div>
                        </div> 
</div>
<?php endforeach; ?>

<div class="row">
	<div class="col-md-12">
	<div class="white-box">
		<?php
				
				$students = $this->db->get_where('enroll' , array('class_id' => $class_id , 'year' => $running_year))->result_array();

				foreach($students as $row):
			?>
		<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info" data-collapsed="0">
          
               <div class="white-box" >
               <div class="table-responsive" id="doc">
                 <!-- Bulletin trest -->
              
                <!-- Fin test-->
                 <table cellspacing="0" border="0" id="sum_table">
    <colgroup span="2" width="79"></colgroup>
    <colgroup width="41"></colgroup>
    <colgroup width="67"></colgroup>
    <colgroup width="61"></colgroup>
    <colgroup width="70"></colgroup>
    <colgroup width="59"></colgroup>
    <colgroup width="65"></colgroup>
    <colgroup width="44"></colgroup>
    <colgroup width="37"></colgroup>
    <colgroup width="92"></colgroup>
    <tr>
        <td colspan=3 height="20" align="left" valign=bottom><b><font face="Aharoni" color="#000000">Ann&eacute;e Universitaire :</font></b></td>
        <td colspan=2 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo  $running_year; ?></font></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000">Semestre :</font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"> <?php echo $exam_name;?></font></td>
        </tr>
    <tr>
        <td colspan=3 height="20" align="left" valign=bottom><b><font face="Aharoni" color="#000000">N&deg; Identification :</font></b><?php echo ''. $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->student_id;?></td>
        <td colspan=2 align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="left" style="width: 150px;" valign=bottom><b><font face="Aharoni" color="#000000">Niveau d'&eacute;tude :</font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name; ?><br></font></b></td>
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo $section_name; ?></font></td>
        </tr>
    <tr>
        <td colspan=3 height="20" align="left" valign=bottom><b><font face="Aharoni" color="#000000">Pr&eacute;nom et Nom :</font></b></td>
        <td colspan=8 align="center" valign=middle><font face="Cambria" color="#000000"><br><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->username;?> &nbsp;&nbsp;&nbsp;<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>   &nbsp;</font></td>
        </tr>
    <tr>
        <td colspan=3 height="20" align="left" valign=bottom><b><font face="Aharoni" color="#000000">Date et lieu de naissance :</font></b></td>
        <td colspan=8 align="center" valign=middle><font face="Cambria" color="#000000"><br><?php echo $this->db->get_where('student' , array(
        'student_id' => $row['student_id']))->row()->birthday; ?></font></td>
        </tr>
    <tr>
        <td height="21" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="center" valign=bottom><b><font face="Cambria" color="#000000">FILIERES</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" valign=bottom><b><font face="Cambria" color="#000000">SPECIALITE</font></b></td>
        </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="center" valign=bottom><font color="#000000"><?php echo $this->crud_model->get_class_name($row['class_id']); ?></font></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" valign=middle><font color="#000000">Tronc commun</font></td>
        </tr>
    <tr>
        <td height="21" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=11 height="21" align="center" valign=bottom><b><font face="Cambria" color="#000000">BULLETIN DE NOTES</font></b></td>
        </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" height="21" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" height="21" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=bottom><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=bottom><b><font face="Cambria" color="#000000">Cr&eacute;dits</font></b></td>
        </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="42" align="center" valign=middle><b><font face="Cambria" color="#4F81BD">Unit&eacute;s d'enseignement</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font face="Cambria" color="#4F81BD">Moy. Cont.</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font face="Cambria" color="#4F81BD">Examen</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font face="Cambria" color="#4F81BD">Moy.</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b><font face="Cambria" color="#4F81BD">Moy UE</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b><font face="Cambria" color="#4F81BD"> CR</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b><font face="Cambria" color="#4F81BD">CR UE</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b><font face="Cambria" color="#4F81BD">MCR</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b><font face="Cambria" color="#4F81BD">App&eacute;ciations</font></b></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font face="Cambria" color="#4F81BD">/20*40%</font></b></td>
        <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font face="Cambria" color="#4F81BD">/20*60%</font></b></td>
        <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font face="Cambria" color="#4F81BD">/20</font></b></td>
        </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><b><font face="Cambria" color="#558ED5">UE 1 ENVIRONNEMENT GESTION ET STRATEGIE</font></b></td>
        </tr>
    <tr>

        <?php 
                            $subjects1 = $this->db->get_where('subject' , array('class_id' => $class_id ,'name_ue'=>'U1', 'year' => $running_year,
                            ))->result_array();

        foreach ($subjects1 as $row3): ?>
                            <tr>
                                
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="left" valign=middle><?php echo $row3['name'];?></td>
                                
                                <!--
                                <td style="text-align: center;"><?php //echo $this->crud_model->get_type_name_by_id('teacher', $row3['teacher_id']); ?></td>
                            -->
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                    <?php $obtained_mark_query = $this->db->get_where('mark' , array(
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $exam_id,
                                    'class_id' => $class_id,
                                    'student_id' => $row['student_id'],
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?></td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;">
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                
                                <td class="rowDataSd1"  style="text-align: center;color: indigo; visibility: hidden;display: none">
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>


                                  
                                </td>
                                 <td id="sumt1" class="totalCols1"> </td>
                               

                               
                            
                            <?php if (count($subjects1)<1) :?>
                                <td class="rowDataSd" style="text-align: center;color: indigo; ">
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>


                                   
                                </td>
                               
                            <?php endif; ?>
                                <td class="rowDataSd" style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                 
                                <td class="rowDataSdc1" id="j6" style="text-align: center;visibility: hidden;display: none">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                <td id="sumtc1" class="totalColsc1"> </td>
                                <td class="rowDataSdue1" id="j7" style="text-align: center;visibility: hidden;display: none;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: indigo" >
                                    <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                                <td style="text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"  id="sumtue1" class="totalColsue1"> </td>
                                <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 < 5):?>
                                <td style="text-align: center;border-top: 0px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span><?php foreach ($marks as $row4) echo 'Non Validé';?></span>
                                </td>

                                <?php endif;?>
                                 <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 >= 5):?>
                                <td style="text-align: center;border-top: 0px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span><?php foreach ($marks as $row4) echo ' Validé';?></span>
                            <?php endif; ?>
                                <!--
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labocho'];?>
                                </td>
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labnueve'];?>
                                </td>
                                <?php //if($row4['labtotal'] < $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-danger pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <?php //if($row4['labtotal'] >= $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-info pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <td style="text-align: center;">
                                <?php //foreach ($marks as $row4) echo $row4['comment'];?>
                                </td>

                                <td style="text-align: center;">
                                <?php// $average = ($row4['labtotal']/10); echo number_format($average, 2, '.', '');?>%
                                </td>
                            -->
                            </tr>
                            


                        <?php endforeach;?>
    
    
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><b><font face="Cambria" color="#558ED5">UE 2</font></b></td>

        </tr>
    <tr>
      <?php 
                            $subjects2 = $this->db->get_where('subject' , array('class_id' => $class_id ,'name_ue'=>'U2', 'year' => $running_year
                            ))->result_array();
        foreach ($subjects2 as $row3): ?>
                            <tr>
                                
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="left" valign=middle><?php echo $row3['name'];?></td>
                                
                                <!--
                                <td style="text-align: center;"><?php //echo $this->crud_model->get_type_name_by_id('teacher', $row3['teacher_id']); ?></td>
                            -->
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                   <?php $obtained_mark_query = $this->db->get_where('mark' , array(
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $exam_id,
                                    'class_id' => $class_id,
                                    'student_id' => $row['student_id'],
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?></td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;" >
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                <td class="rowDataSd2"  style="text-align: center;color: indigo; visibility: hidden;display: none">
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>


                                  
                                </td>
                                 <td id="sumt2" class="totalCols2"> </td>
                                <td class="rowDataSd" style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                <td class="rowDataSdu2" id="j6" style="text-align: center;visibility: visible;display: none">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                 <td id="sumtu2" class="totalColsu2"> </td>
                                <td class="rowDataSdMCR2" id="j7" style="display: none;visibility: hidden; text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" >
                                    <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                                 <td style="text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"  id="sumtMcr2" class="totalColsMcr2"> </td>
                                <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 < 5):?>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span ><?php foreach ($marks as $row4) echo 'Non Validé';?></span>
                                </td>


                                <?php endif;?>
                                 <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 >= 5):?>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span><?php foreach ($marks as $row4) echo ' Validé';?></span>
                            <?php endif; ?>
                                <!--
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labocho'];?>
                                </td>
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labnueve'];?>
                                </td>
                                <?php //if($row4['labtotal'] < $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-danger pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <?php //if($row4['labtotal'] >= $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-info pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <td style="text-align: center;">
                                <?php //foreach ($marks as $row4) echo $row4['comment'];?>
                                </td>

                                <td style="text-align: center;">
                                <?php// $average = ($row4['labtotal']/10); echo number_format($average, 2, '.', '');?>%
                                </td>
                            -->
                            </tr>
                            


                        <?php endforeach;?> 
    </tr> 
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><font face="Cambria" color="#558ED5">UE 3 INFORMATIQUE -ENVIRONNEMENT JURIDIQUE COMMERCIAL ET ECONOMIQUE</font></td>
        </tr>
    <tr>
        <?php 
                            $subjects3 = $this->db->get_where('subject' , array('class_id' => $class_id ,'name_ue'=>'U3' ,'year' => $running_year
                            ))->result_array();
        foreach ($subjects3 as $row3): ?>
                            <tr>
                                
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="left" valign=middle><?php echo $row3['name'];?></td>
                                
                                <!--
                                <td style="text-align: center;"><?php //echo $this->crud_model->get_type_name_by_id('teacher', $row3['teacher_id']); ?></td>
                            -->
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                   <?php $obtained_mark_query = $this->db->get_where('mark' , array(
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $exam_id,
                                    'class_id' => $class_id,
                                    'student_id' => $row['student_id'],
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?></td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;" >
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                <td class="rowDataSdMoyUE3" style="text-align: center;visibility: hidden;display: none"  >
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                                 <td id="sumtMoyUE3" class="totalColsMoyUE3"> </td>
                                <td class="rowDataSd" style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                <td class="rowDataSdCRUE3" id="j6" style="text-align: center;visibility: hidden;display: none
                                ">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                <td id="sumtCRUE3" class="totalColsCRUE3"> </td>
                                <td class="rowDataSdMCR3" id="j7" style="visibility: hidden;display: none; text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" >
                                    <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                                <td style="text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"  id="sumtMCRUE3" class="totalColsMCRUE3"></td>
                                <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 < 5):?>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span ><?php foreach ($marks as $row4) echo 'Non Validé';?></span>
                                </td>

                                <?php endif;?>
                                 <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 >= 5):?>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span><?php foreach ($marks as $row4) echo ' Validé';?></span>
                            <?php endif; ?>
                                <!--
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labocho'];?>
                                </td>
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labnueve'];?>
                                </td>
                                <?php //if($row4['labtotal'] < $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-danger pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <?php //if($row4['labtotal'] >= $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-info pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <td style="text-align: center;">
                                <?php //foreach ($marks as $row4) echo $row4['comment'];?>
                                </td>

                                <td style="text-align: center;">
                                <?php// $average = ($row4['labtotal']/10); echo number_format($average, 2, '.', '');?>%
                                </td>
                            -->
                            </tr>
                            


                        <?php endforeach;?>
        </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><b><font face="Cambria" color="#558ED5">UE 4 TRAVAUX DE L'ETUDIANT</font></b></td>
        </tr>
    <tr>
       <?php 
                            $subjects4 = $this->db->get_where('subject' , array('class_id' => $class_id ,'name_ue'=>'U4' ,'year' => $running_year
                            ))->result_array();
        foreach ($subjects4 as $row3): ?>
                            <tr>
                                
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="left" valign=middle><?php echo $row3['name'];?></td>
                                
                                <!--
                                <td style="text-align: center;"><?php //echo $this->crud_model->get_type_name_by_id('teacher', $row3['teacher_id']); ?></td>
                            -->
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                   <?php $obtained_mark_query = $this->db->get_where('mark' , array(
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $exam_id,
                                    'class_id' => $class_id,
                                    'student_id' => $row['student_id'],
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?></td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;" >
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                <td class="rowDataSdMoyUE4" style="text-align: center;visibility: hidden;display: none"  >
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                                 <td id="sumtMoyUE4" class="totalColsMoyUE4"> </td>
                                <td class="rowDataSd" style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                <td class="rowDataSdCRUE4" id="j6" style="text-align: center;visibility: hidden;display: none
                                ">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                <td id="sumtCRUE4" class="totalColsCRUE4"> </td>
                                <td class="rowDataSdMCR4" id="j7" style="visibility: hidden;display: none; text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" >
                                    <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                                <td style="text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"  id="sumtMCRUE4" class="totalColsMCRUE4"></td>
                                <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 < 5):?>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span ><?php foreach ($marks as $row4) echo 'Non Validé';?></span>
                                </td>

                                <?php endif;?>
                                 <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 >= 5):?>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span><?php foreach ($marks as $row4) echo ' Validé';?></span>
                            <?php endif; ?>
                                <!--
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labocho'];?>
                                </td>
                                <td style="text-align: center;">
                                    <?php //foreach ($marks as $row4) echo $row4['labnueve'];?>
                                </td>
                                <?php //if($row4['labtotal'] < $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-danger pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <?php //if($row4['labtotal'] >= $min):?>
                                <td style="text-align: center;">
                                <span class="label label-rouded label-info pull-right"><?php //foreach ($marks as $row4) echo $row4['labtotal'];?></span>
                                </td>
                                <?php //endif;?>
                                <td style="text-align: center;">
                                <?php //foreach ($marks as $row4) echo $row4['comment'];?>
                                </td>

                                <td style="text-align: center;">
                                <?php// $average = ($row4['labtotal']/10); echo number_format($average, 2, '.', '');?>%
                                </td>
                            -->   
    </tr>
                            


                        <?php endforeach;?>
    
    <tr class="totalColumn">
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="22" align="left" valign=bottom><b><font face="Cambria" size=3 color="#000000">Total</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><font color="#000000"><br></font></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000"><br></font></td>
        <td class="totalCol" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="30" sdnum="1033;0;0"><b><font size=3 color="#000000"></font></b></td>
        <td class="totalCol" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="30" sdnum="1033;0;0"><b><font size=3 color="#000000"></font></b></td>
        <td class="totalCol" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="1033;"><b><font size=3 color="#000000"></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=bottom><font face="Cambria" color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="center" valign=middle><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="21" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="22" align="right" valign=bottom><b><font face="Cambria" color="#000000">Moyenne Semestre :</font></b></td>
        <td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="1033;0;0.00"><b><font size=3 color="#000000">8.5</font></b></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=5 height="22" align="right" valign=middle><b><font face="Cambria" color="#000000">Appr&eacute;ciation du conseil de classe : </font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=middle><b><font face="Cambria" size=3 color="#FF0000">Insuffisant</font></b></td>
        </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="21" align="left" valign=middle><b><font face="Cambria" color="#000000">Absences :</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="1033;0;0"><b><font face="Cambria" color="#FF0000">0</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=5 align="left" valign=middle><b><font face="Cambria" color="#FF0000"><br></font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=2 align="center" valign=middle><b><font face="Cambria" color="#000000">Retards  :</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="1033;"><b><font face="Cambria" color="#FF0000">0</font></b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
    </tr>
    <tr>
        <td height="21" align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" color="#000000"><br></font></b></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=11 height="21" align="center" valign=bottom><b><font face="Cambria" size=1 color="#000000">Moy UE=Moyenne unit&eacute; d'enseignement; CR=Cr&eacute;dit; MCR=Moyenne Cr&eacute;dit&eacute;e; CR UE=Cr&eacute;dit Unit&eacute; d'enseignement</font></b></td>
        </tr>
    <tr>
        <td height="20" align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
        <td align="center" valign=middle><b><font face="Cambria" size=1 color="#000000"><br></font></b></td>
    </tr>
    <tr>
        <td colspan=11 height="20" align="center" valign=middle><b><font face="Cambria" color="#000000">NB : cette pi&egrave;ce administrative n'est d&eacute;livr&eacute;e qu'une seule fois, il appartient &agrave; l'&eacute;tudiant d'en faire des copies l&eacute;galis&eacute;es</font></b></td>
        </tr>
    <tr>
        <td height="20" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
    </tr>
    <tr>
        <td height="20" align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td align="left" valign=bottom><font color="#000000"><br></font></td>
        <td colspan=5 align="center" valign=middle><b><u><font face="Cambria" color="#000000">Le Directeur des Etudes</font></u></b></td>
        </tr>
</table>
                </div>
        </div>  
    </div>
</div>
</div>
<?php endforeach;
        ?>

		<center>
			<a href="<?php echo base_url();?>index.php?admin/tab_sheet_print/<?php echo $class_id;?>/<?php echo $exam_id;?>" class="btn btn-info" target="_blank">
				<?php echo get_phrase('Print');?>
			</a>
		</center>
		</div>
	</div>
</div>
<?php endif;?>
<script>
       var totals=[0,0,0];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumn, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSd').each(function(i){        
                    totals[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalCol").each(function(i){  
                $(this).html(" "+totals[i]);
            });

            $("#sum_table td.totalColsMoyUE3").each(function(i){  
                $(this).html(" "+totals[i]);
            });

        });

     

</script>

<script>
       var totals=[0,0,0];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSd').each(function(i){        
                    totals[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalCols").each(function(i){  
                $(this).html(" "+totals[i]);
            });

        });

       

</script>
<script type="text/javascript">
   

    
   var totalss=[0,' ',' ',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSd1').each(function(i){        
                    totalss[i]+=parseInt( $(this).html());
                });

            });
            $("#sum_table td.totalCols1").each(function(i){  
                $(this).html(" "+totalss[i]);
            });

        });

    $('#sumt1').css('color','#000000');
    $('#sumt1').css('text-align','center');
    $('#sumt1').css('margin-top','30px');
</script>
<script type="text/javascript">
   

    
   var totalssMoyUE3=[0,' ',' ',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdMoyUE3').each(function(i){        
                    totalssMoyUE3[i]+=parseFloat( $(this).html());
                });

            });
            $("#sum_table td.totalColsMoyUE3").each(function(i){  
                $(this).html(" "+totalssMoyUE3[i]);
            });

        });

    $('#sumtMoyUE3').css('color','#000000');
    $('#sumtMoyUE3').css('text-align','center');
    $('#sumtMoyUE3').css('margin-top','30px');
</script>

<script type="text/javascript">
   

    
   var totalssMoyUE4=[0,' ',' ',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdMoyUE4').each(function(i){        
                    totalssMoyUE4[i]+=parseFloat( $(this).html());
                });

            });
            $("#sum_table td.totalColsMoyUE4").each(function(i){  
                $(this).html(" "+totalssMoyUE4[i]);
            });

        });

    $('#sumtMoyUE4').css('color','#000000');
    $('#sumtMoyUE4').css('text-align','center');
    $('#sumtMoyUE4').css('margin-top','30px');
</script>

<script type="text/javascript">
   

    
   var totalss2=[0,'','',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSd2').each(function(i){        
                    totalss2[i]+=parseFloat( $(this).html());
                });
            });
            $("#sum_table td.totalCols2").each(function(i){  
                $(this).html(" "+totalss2[i]);
            });

        });

    $('#sumt2').css('color','#000000');
    $('#sumt2').css('text-align','center');
    $('#sumt2').css('margin-top','30px');
</script>
<script type="text/javascript">
   

    
   var totalssc1=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdc1').each(function(i){        
                    totalssc1[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalColsc1").each(function(i){  
                $(this).html(" "+totalssc1[i]);
            });

        });

    $('#sumtc1').css('color','red');
    $('#sumtc1').css('text-align','center');
    $('#sumtc1').css('margin-top','30px');
</script>
<script type="text/javascript">
   

    
   var totalssue1=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdue1').each(function(i){        
                    totalssue1[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalColsue1").each(function(i){  
                $(this).html(" "+totalssue1[i]);
            });

        });

    $('#sumtue1').css('color','#000000');
    $('#sumtue1').css('text-align','center');
    $('#sumtue1').css('margin-top','30px');
</script>
<script type="text/javascript">
   

    
   var totalssu2=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdu2').each(function(i){        
                    totalssu2[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalColsu2").each(function(i){  
                $(this).html(" "+totalssu2[i]);
            });

        });

    $('#sumtu2').css('color','#000000');
    $('#sumtu2').css('text-align','center');
    $('#sumtu2').css('margin-top','30px');
</script>

<script type="text/javascript">
   

    
   var totalssCrUE3=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdCRUE3').each(function(i){        
                    totalssCrUE3[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalColsCRUE3").each(function(i){  
                $(this).html(" "+totalssCrUE3[i]);
            });

        });

    $('#sumtCRUE3').css('color','#000000');
    $('#sumtCRUE3').css('text-align','center');
    $('#sumtCRUE3').css('margin-top','30px');
</script>

<script type="text/javascript">
   

    
   var totalssCrUE4=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdCRUE4').each(function(i){        
                    totalssCrUE4[i]+=parseInt( $(this).html());
                });
            });
            $("#sum_table td.totalColsCRUE4").each(function(i){  
                $(this).html(" "+totalssCrUE4[i]);
            });

        });

    $('#sumtCRUE4').css('color','#000000');
    $('#sumtCRUE4').css('text-align','center');
    $('#sumtCRUE4').css('margin-top','30px');
</script>
<script type="text/javascript">
   

    
   var totalssmcr2=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdMCR2').each(function(i){        
                    totalssmcr2[i]+=parseFloat( $(this).html());
                });
            });
            $("#sum_table td.totalColsMcr2").each(function(i){  
                $(this).html(" "+totalssmcr2[i]);
            });

        });

    $('#sumtMcr2').css('color','#000000');
    $('#sumtMcr2').css('text-align','center');
    $('#sumtMcr2').css('margin-top','30px');
</script>

<script type="text/javascript">
   

    
   var totalssmcr3=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdMCR3').each(function(i){        
                    totalssmcr3[i]+=parseFloat( $(this).html());
                });
            });
            $("#sum_table td.totalColsMCRUE3").each(function(i){  
                $(this).html(" "+totalssmcr3[i]);
            });

        });

    $('#sumtMCRUE3').css('color','#000000');
    $('#sumtMCRUE3').css('text-align','center');
    $('#sumtMCRUE3').css('margin-top','30px');
</script>

<script type="text/javascript">
   

    
   var totalssmcr4=[0,'',''];
        $(document).ready(function(){

            var $dataRows=$("#sum_table tr:not('.totalColumns, .titlerow')");

            $dataRows.each(function() {
                $(this).find('.rowDataSdMCR4').each(function(i){        
                    totalssmcr4[i]+=parseFloat( $(this).html());
                });
            });
            $("#sum_table td.totalColsMCRUE4").each(function(i){  
                $(this).html(" "+totalssmcr4[i]);
            });

        });

    $('#sumtMCRUE4').css('color','#000000');
    $('#sumtMCRUE4').css('text-align','center');
    $('#sumtMCRUE4').css('margin-top','30px');
</script>