<?php /* Smarty version 2.6.14, created on 2013-10-23 12:46:17
         compiled from tplTabSms.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'tplTabSms.htm', 56, false),)), $this); ?>
<?php echo $this->_tpl_vars['xxajax']; ?>

<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">                
            <h3 class="page-title">
                Modulo <?php echo $this->_tpl_vars['NomeModulo']; ?>
                
            </h3>
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a> 
                    <span class="icon-angle-right"></span>
                </li>
                <li>
                    <a href="#"><?php echo $this->_tpl_vars['NomeModulo']; ?>
</a>               
                </li>
               
            </ul>
        </div>
    </div>
    <!-- END PAGE HEADER-->
   
    <!-- BEGIN PAGE CONTENT-->   
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>Dados</h4>                    
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->                     
			<form id="frm_<?php echo $this->_tpl_vars['modulo']; ?>
" name="frm_<?php echo $this->_tpl_vars['modulo']; ?>
" action="#" method="post" class="form-horizontal">
                            <input type="hidden" name="f_action" id="f_action" value="<?php echo $this->_tpl_vars['acao']; ?>
" />
			    <input type="hidden" name="f_mod" id="f_mod" value="<?php echo $this->_tpl_vars['modulo']; ?>
" />                            	
			    
			    <div class="alert alert-error hide">
			    <button class="close" data-dismiss="alert"></button>                            
			    </div>
			    <div class="alert alert-success hide">
				<button class="close" data-dismiss="alert"></button>                            
			    </div>
			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_des_sms']; ?>
</label>
				<div class="controls">
				     <textarea class="span6 m-wrap required" <?php echo $this->_tpl_vars['display_form']; ?>
 rows="5" id="des_sms" name="des_sms" value="<?php echo $this->_tpl_vars['dados']['des_sms']; ?>
" ><?php if ($this->_tpl_vars['dados']['des_sms']):  echo $this->_tpl_vars['dados']['des_sms'];  endif; ?></textarea>  				     
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['des_sms']; ?>
 </span>
				</div>
			    </div>
			    
			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_inicio_envio']; ?>
</label>
				<div class="controls">				    
					<div class="input-prepend date date-picker" data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_inicio_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_inicio_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>
					    <span class="add-on" ><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_inicio_envio" name="dat_inicio_envio" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_inicio_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" />
					</div>
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_inicio_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </span>
				</div>
			    </div>
			    
			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_fim_envio']; ?>
</label>
				<div class="controls">				    
					<div class="input-prepend date date-picker" data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_fim_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_fim_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>
					    <span class="add-on" ><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_fim_envio" name="dat_fim_envio" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_fim_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" />
					</div>
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_fim_envio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </span>
				</div>
			    </div>
		
			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_cadastro']; ?>
<span class="required">*</span> </label>
				<div class="controls">
				    <span class="text"><?php if ($this->_tpl_vars['dados']['dat_cadastro'] == ''):  echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  else:  echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  endif; ?></span>
				</div>
			    </div>	
 	 
                </form> 
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>       
    </div>
    <!-- END PAGE CONTENT-->         
</div>