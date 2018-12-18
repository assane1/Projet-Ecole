<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
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


<div class="main_data">
<br/><br/>
<?php 
    $student_info = $this->crud_model->get_student_info($student_id);
    $exams         = $this->crud_model->get_exams();
    foreach ($student_info as $row1):
    foreach ($exams as $row2):
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title"><font color="white"><?php echo $row2['name'];?></font></div>
            </div>
               <div class="white-box">
               <div class="table-responsive">
                   <table cellspacing="0" border="0" id="table" style="border-collapse: collapse;">
                       <thead>
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
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo $row2['name'];?></font></td>
        </tr>
    <tr>
        <td colspan=3 height="20" align="left" valign=bottom><b><font face="Aharoni" color="#000000">N&deg; Identification :</font></b><?php echo ''. $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->student_id;?></td>
        <td colspan=2 align="center" valign=bottom><font face="Cambria" color="#000000"><br></font><?php echo $class_name; ?></td>
        <td align="left" style="width: 150px;" valign=bottom><b><font face="Aharoni" color="#000000">Niveau d'&eacute;tude :</font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name; ?><br></font></td>
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo $section_name; ?></font></td>
        </tr>
    <tr>
        <td colspan=3 height="20" align="left" valign=bottom><b><font face="Aharoni" color="#000000">Pr&eacute;nom et Nom :</font></b></td>
        <td colspan=8 align="center" valign=middle><font face="Cambria" color="#000000"><br><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->username;?> &nbsp;&nbsp;&nbsp;<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?></font></td>
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
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><b><font face="Cambria" color="#558ED5">ENSEIGNEMENT SUPERIEUR PROFESSIONNEL</font></b></td>
    </tr>
      
    <tr>
                    </thead>
                    <tbody>
                     <tr>
        <?php 
                            $subjects1 = $this->db->get_where('subject' , array('class_id' => $class_id ,'name_ue'=>'U1', 'year' => $running_year
                            ))->result_array();
        foreach ($subjects1 as $row3): ?>
                            <tr>
                                
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="left" valign=middle><?php echo $row3['name'];?></td>
                                
                                <!--
                                <td style="text-align: center;"><?php //echo $this->crud_model->get_type_name_by_id('teacher', $row3['teacher_id']); ?></td>
                            -->
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                    <?php $obtained_mark_query = $this->db->get_where('mark' , array(
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'],
                                    'class_id' => $class_id, 'student_id' => $student_id , 
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?>
                                        
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;">
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                
                                <?php 
                                $n = count($subjects1);
                              
                              
                                 ?>
                                <td class="Total1"  style="text-align: center;color: orange;visibility: hidden;">
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/ $n;?>
                                    
                               
                                </td>
                                
                               
                               

                                <td class="totalcredit" style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                 
                                <td class="totalCR1"  style="text-align: center;color: #fff;visibility: visible;border-right: 1px solid #000000;">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                               
                                <td class="totalMCR"  style="visibility: hidden;" >
                                     <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                   
                                </td>
                               
                                <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 < 5):?>
                                <td style="text-align: center;border-top: 0px solid #000000; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span><?php foreach ($marks as $row4) echo 'Non Validé';?></span>
                                </td>

                                <?php endif;?>
                                 <?php if((($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2 >= 5):?>
                                <td style="text-align: center;border-top: 0px solid #000000; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
                                <span><?php foreach ($marks as $row4) echo ' Validé';?></span>
                                </td>
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
     
     <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
   
    
    <td style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"  class="totalColM" ></td>
    <td></td>
    <td style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"  class="totalCRUE1" ></td>
  <p></p>
    
    <td class="MG" style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"></td>

  

    
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><b><font face="Cambria" color="#558ED5">ENSEIGNEMENT SUPERIEUR PROFESSIONNEL 2eme CYCLE EN MASTER</font></b></td>

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
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'],
                                    'class_id' => $class_id, 'student_id' => $student_id , 
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?>
                                        
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;">
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                <?php 
                                    $n2 = count($subjects2);
                                    
                                 ?>
                                <td class="Total2"  style="text-align: center;color: orange;visibility: hidden;">
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/$n2;?>
                                </td>
      
                            
                                <td class="totalcredit"  style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                 
                                <td class="totalCRUE"  style="text-align: center">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                               
                                <td class="totalMCR"  style="text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: indigo" >
                                    <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                               
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
    </tr> 
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
   
    
    <td class="totalColM2"  style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"></td>
    <tr>
        <td style="border-top: 0.5px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><font face="Cambria" color="#558ED5">PARCOURS DE FORMATIONS ACCREDITES PAR LE CAMES</font></td>
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
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'],
                                    'class_id' => $class_id, 'student_id' => $student_id , 
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?>
                                        
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;">
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                 <?php 
                                $n3 = count($subjects3);
                              
                              
                                 ?>
                                <td class="Total3"  style="text-align: center;color: indigo;visibility: hidden;">
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/$n3;?>
                                </td>
                               
                               

                               
                            
                            
                                <td class="totalcredit" style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                 
                                <td  class="totalCR3"   style="text-align: center;visibility: hidden;">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                               
                                <td class="totalMCR"  style="text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: #fff" >
                                    <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                               
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
        </tr>
        <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
   
    
    <td class="totalColM3"  style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"></td>
      <td></td>
    <td style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"  class="totalCRUE3" ></td>
    <p></p>
    
    <td class="MG3" style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;">0.0</td>


    <tr>

        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=11 height="21" align="left" valign=middle><b><font face="Cambria" color="#558ED5">FILIERE DE FORMATION CONTINUES SPECIALISEES</font></b></td>
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
                                    'subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'],
                                    'class_id' => $class_id, 'student_id' => $student_id , 
                                    'year' => $running_year));
                                    if ( $obtained_mark_query->num_rows() > 0)
                                    {
                                    $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4)
                                    echo $row4['mark_obtained'];        
                                    } ?>
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"> <?php  $marks = $obtained_mark_query->result_array();
                                    foreach ($marks as $row4) echo $row4['labuno'];?>
                                        
                                </td>
                                <td style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;">
                                    <?php foreach ($marks as $row4) echo ($row4['mark_obtained']*0.4)+($row4['labuno']*0.6);?>
                                </td>
                                 <?php 
                                $n4 = count($subjects4);
                              
                              
                                 ?>
                                <td class="Total4"   style="text-align: center;color: indigo;visibility: hidden;">
                                    <?php foreach ($marks as $row4) echo (($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/$n4;?>
                                </td>
                               
                               

                               
                            
                           
                                <td class="totalcredit" style="text-align: center;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: red">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                                 
                                <td class="totalCR4" style="text-align: center;visibility:hidden;">
                                    <?php foreach ($marks as $row4) echo $row4['labdos'];?>
                                </td>
                               
                                <td class="totalMCR"  style="text-align: center;border-top: 0px solid pink; border-bottom: 0px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;color: #fff" >
                                    <?php foreach ($marks as $row4) echo ($row4['labdos'])*(($row4['mark_obtained']*0.4)+($row4['labuno']*0.6))/2;?>
                                </td>
                               
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
    </tr>
     <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
    <td class="totalCo"></td>
   
    
    <td class="totalColM4"  style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"></td>
      <td></td>
    <td style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;"  class="totalCRUE4" ></td>
    <td class="MG4" style="border-top: 0px solid #000000; border-bottom: 0px solid #000000;display: block;">0.0</td>



    <tr class="totalColumn">
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="22" align="left" valign=bottom><b><font face="Cambria" size=3 color="#000000">Total</font></b></td>
        <td class="testt" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><font color="#000000"><br>0.0</font></td>
        <td class="testTT" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">0.00<br></font></td>
        <td class ="totalCol" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="30" sdnum="1033;0;0"><b><font size=3 color="#000000"></font>0.00</b></td>
        <td class="totalCol2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="30" sdnum="1033;0;0"><b><font size=3 color="#000000"></font>0.00</b></td>
        <td class="totalCol3" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="1033;"><b><font size=3 color="#000000"></font>0.00</b></td>
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
        <td  style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="22" align="right" valign=bottom><b><font face="Cambria" color="#000000">Moyenne Semestre :</font></b></td>
        <td id="totalColMoy" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="1033;0;0.00"><b><font size=3 color="#000000">0.00</font></b></td>
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
                    </tbody>
                   </table>    
                </div>
        </div>  
    </div>
</div>
</div>
<?php endforeach;
        endforeach; ?>
</div>
<script>
$(function(){
    function tally (selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.totalcredit:eq(' + column + ')', this).html()) || 0;
            })
            $(this).html(total);

        });
    }
    tally('td.totalCol');
   // tally('td.total');

   
   // tally('td.total');


    function tally1 (selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.totalCRUE:eq(' + column + ')', this).html()) || 0;
            })
            $(this).html(total);
        });
    }
    tally1('td.totalCol2');

    function tally2 (selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.totalMCR:eq(' + column + ')', this).html()) || 0;
            })
            $(this).html(total);
        });
    }
    tally2('td.totalCol3');


    // calcule Moyenne
   
    moyenne('td.totalColMoy');
});

// copy the sum of column to another column




     function totalL2(selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.Total2:eq(' + column + ')', this).html()) || 0;
            totalf2 = total.toFixed(2);
            })
            $(this).html(totalf2);
        });
        
    }
   // var 
   
    totalL2('td.totalColM2');
     $('.totalColM2').css('color','red');
     $('.totalColM2').css('text-align','center');
     $('.totalColM2').css('margin-top','-20px');
    //tally3('td.totalcolM');


    function totalL4(selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.Total3:eq(' + column + ')', this).html()) || 0;
                    totalf4=total.toFixed(2);
            })
            $(this).html(totalf4);
        });
        
    }
   // var 
   
    totalL4('td.totalColM3');
     $('.totalColM3').css('color','red');
     $('.totalColM3').css('text-align','center');
     $('.totalColM3').css('margin-top','-20px');


     // pour le 4eme element
      function totalL5(selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.Total4:eq(' + column + ')', this).html()) || 0;
                    totalf5=total.toFixed(2);
            })
            $(this).html(totalf5);
        });
        
    }
   // var 
   
    totalL5('td.totalColM4');
     $('.totalColM4').css('color','red');
     $('.totalColM4').css('text-align','center');
     $('.totalColM4').css('margin-top','-20px');



     // pour le total des credit de U1
        // pour le 4eme element
      function totalC1(selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.totalCR1:eq(' + column + ')', this).html()) || 0;
                   
            })
            $(this).html(total);

        });
        
    }

   // var 
   // pour le premier element
  function tally3(selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.Total1:eq(' + column + ')', this).html()) || 0;
            totalf= total.toFixed(2);  
            })
            $(this).html(totalf);

        });
        
    }
   // var 
    tally3('td.testTT');
    tally3('td.testt');
    tally3('td.totalColM');
     $('.totalColM').css('color','blue');
     $('.totalColM').css('text-align','center');
     $('.totalColM').css('margin-top','-20px');
    //fin
       

        

    totalC1('td.totalCRUE1');
     $('.totalCRUE1').css('color','blue');
     $('.totalCRUE1').css('text-align','center');
     $('.totalCRUE1').css('margin-top','-20px');





    
    function calMoy1(selector) {
        $(selector).each(function () {
            var totalu1 = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            var totalu2 = 0,
                column = $(this).siblings(selector).andSelf().index(this);

              // var  column2 = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                totalu1 += parseFloat($('td.Total1:eq(' + column + ')', this).html()) || 0;
                  totalu2 += parseFloat($('td.totalCR1:eq(' + column + ')', this).html()) || 0;
             //totalu1= total1.toFixed(2); 
             //totalu2= total2.toFixed(2); 
           // var t=total+8;
            })
            $(this).html(totalu1*totalu2);
             
        });
        
    }

calMoy1('td.MG');
 $('.MG').css('color','blue');
     $('.MG').css('text-align','right');
     $('.MG').css('margin-top','-20px');
     $('.MG').css('margin-right','-35px');

     // moyenne 1
    
    // calcul Moy 3
  function calMoy3(selector) {
        $(selector).each(function () {
            var totalu31 = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            var totalu32 = 0,
                column = $(this).siblings(selector).andSelf().index(this);

              // var  column2 = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                totalu31 += parseFloat($('td.Total3:eq(' + column + ')', this).html()) || 0;
                  totalu32 += parseFloat($('td.totalCR3:eq(' + column + ')', this).html()) || 0;
             //totalu1= total1.toFixed(2); 
             //totalu2= total2.toFixed(2); 
           // var t=total+8;
            })
            $(this).html(totalu31*totalu32);
             
        });
        
    }

calMoy3('td.MG3');
 $('.MG3').css('color','blue');
     $('.MG3').css('text-align','right');
     $('.MG3').css('margin-top','-20px');
     $('.MG3').css('margin-right','-35px');

     // fin moyenne 3


       // calcul Moy 4
  function calMoy4(selector) {
        $(selector).each(function () {
            var totalu41 = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            var totalu42 = 0,
                column = $(this).siblings(selector).andSelf().index(this);

              // var  column2 = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                totalu41 += parseFloat($('td.Total4:eq(' + column + ')', this).html()) || 0;
                  totalu42 += parseFloat($('td.totalCR4:eq(' + column + ')', this).html()) || 0;
             //totalu1= total1.toFixed(2); 
             //totalu2= total2.toFixed(2); 
           // var t=total+8;
            })
            $(this).html(totalu41*totalu42);
             
        });
        
    }

calMoy4('td.MG4');
 $('.MG4').css('color','blue');
     $('.MG4').css('text-align','right');
     $('.MG4').css('margin-top','-20px');
     $('.MG4').css('margin-right','-35px');

     // fin moyenne 4

     // pour le total des credit de U3
        // pour le 4eme element
      function totalC3(selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.totalCR3:eq(' + column + ')', this).html()) || 0;
                   
            })
            $(this).html(total);

        });
        
    }

   // var 
   
    totalC3('td.totalCRUE3');
     $('.totalCRUE3').css('color','orange');
     $('.totalCRUE3').css('text-align','center');
     $('.totalCRUE3').css('margin-top','-20px');


      // pour le total des credit de U4
        // pour le 4eme element
      function totalC4(selector) {
        $(selector).each(function () {
            var total = 0,
                column = $(this).siblings(selector).andSelf().index(this);
            $(this).parents().prevUntil(':has(' + selector + ')').each(function () {
                total += parseFloat($('td.totalCR4:eq(' + column + ')', this).html()) || 0;
                   
            })
            $(this).html(total);

        });
        
    }

   // var 
   
    totalC4('td.totalCRUE4');
     $('.totalCRUE4').css('color','orange');
     $('.totalCRUE4').css('text-align','center');
     $('.totalCRUE4').css('margin-top','-20px');



   




</script>


