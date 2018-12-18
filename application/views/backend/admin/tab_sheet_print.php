<?php 
	$class_name		 	= 	$this->db->get_where('class' , array('class_id' => $class_id))->row()->name;
	$exam_name  		= 	$this->db->get_where('exam' , array('exam_id' => $exam_id))->row()->name;
	$system_name        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$running_year       =	$this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
?>
<div id="print">
	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<style type="text/css">
		td {
			padding: 5px;
		}
	</style>

	

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
        <td align="left" style="width: 150px;" valign=bottom><b><font face="Aharoni" color="#000000">Niveau d'étude :</font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td align="left" valign=bottom><b><font face="Aharoni" color="#000000"><br></font></b></td>
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name; ?><br></font></b></td>
        <td colspan=3 align="center" valign=bottom><font face="Cambria" color="#000000"><?php echo $section_name; ?></font></td>
        </tr>
    <tr>
        <td  colspan=3 height="20" align="left" valign=bottom><b><font face="Aharoni" color="#000000">Prénom et Nom :</font></b></td>
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
        <td class="totalCol" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="0" sdnum="1033;0;0.00"><b><font size=3 color="#000000">0.00</font></b></td>
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

        var total = 4;
        $("#Moyy").val(total);

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