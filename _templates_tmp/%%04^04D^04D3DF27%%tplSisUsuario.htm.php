<?php /* Smarty version 2.6.14, created on 2013-10-23 17:56:12
         compiled from tplSisUsuario.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tplSisUsuario.htm', 83, false),array('modifier', 'date_format', 'tplSisUsuario.htm', 92, false),)), $this); ?>
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
			<input type="hidden" id="cod_sis_departamento" name="cod_sis_departamento" value="1" />	
			<input type="hidden" id="cod_usuario" name="cod_usuario" value="<?php echo $this->_tpl_vars['dados']['cod_usuario']; ?>
" />	

				<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>                            
				</div>
				<div class="alert alert-success hide">
				    <button class="close" data-dismiss="alert"></button>                            
				</div>
			
				<div class="control-group">                          
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_usuario']; ?>
<span class="required">*</span> </label>
				    <div class="controls">
					<input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_usuario" name="nom_usuario" value="<?php echo $this->_tpl_vars['dados']['nom_usuario']; ?>
" maxlength="225" data-required="1" class="span6 m-wrap popovers required" >
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_usuario']; ?>
 </span>
				    </div>	
				</div>
			
				<div class="control-group">                          
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_login']; ?>
<span class="required">*</span> </label>
				    <div class="controls">
					<input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_login" name="nom_login" value="<?php echo $this->_tpl_vars['dados']['nom_login']; ?>
" maxlength="225" data-required="1" class="span6 m-wrap popovers required" onblur="verificaLogin(this.value);" >
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_login']; ?>
 </span>
				    </div>	
				</div>
			
				<div class="control-group">                          
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_senha'];  if (! $this->_tpl_vars['dados']['nom_senha']): ?><span class="required">*</span><?php endif; ?> </label>
				    <div class="controls">
					<input type="password"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_senha" name="nom_senha" maxlength="225" data-required="1" class="span6 m-wrap popovers <?php if (! $this->_tpl_vars['dados']['nom_senha']): ?>required<?php endif; ?>" >
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_senha']; ?>
 </span>
				    </div>	
				</div>
			
				 <div class="control-group">                          
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_email']; ?>
<span class="required">*</span> </label>
				    <div class="controls">
					<input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_email" name="nom_email" value="<?php echo $this->_tpl_vars['dados']['nom_email']; ?>
" maxlength="225" data-required="1" class="span6 m-wrap popovers required" >
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_email']; ?>
 </span>
				    </div>	
				</div>
				
				<div class="control-group">
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_perfil']; ?>
<span class="required">*</span></label>
				    <div class="controls">
				       <select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="cod_perfil" name="cod_perfil"  maxlength="11" data-required="1" class="span6 m-wrap popovers required"><option value=''>Selecione</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_perfil'],'selected' => $this->_tpl_vars['dados']['cod_perfil']), $this);?>

				       </select>
				    </div>
				</div>	
			
					
				<div class="control-group">
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_cadastro']; ?>
<span class="required">*</span> </label>
				    <div class="controls">
					<span class="text"><?php if ($this->_tpl_vars['dados']['dat_cadastro'] == ''):  echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  else:  echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  endif; ?></span>
				    </div>
				</div>    

				<div class="control-group">
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_cancelamento']; ?>
</label>
				    <div class="controls">
					<?php if ($this->_tpl_vars['dados']['dat_termino'] == ''): ?>
					<div class="input-prepend date date-picker" data-date="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>
					    <span class="add-on" ><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_termino" name="dat_termino" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" />
					</div>
					<?php else: ?>					
					    <span class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T")); ?>
 </span>
					<?php endif; ?>                             
				    </div>
				 </div>	
			
				 <?php if ($this->_tpl_vars['Revenda'] == 0): ?>
				 <div class="control-group">				    
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_cod_equipe']; ?>
<span class="required">*</span> </label>
				    <div class="controls">
					<select <?php echo $this->_tpl_vars['display_form']; ?>
 id="cod_equipe" name="cod_equipe"  maxlength="11" data-required="1" class="span6 m-wrap popovers required" <?php if ($this->_tpl_vars['TipAjuda'][158]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][158]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" data-trigger="hover" data-placement="top" <?php endif; ?>>
					    <option value=''>Selecione</option>
					    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_equipe'],'selected' => $this->_tpl_vars['dados']['cod_equipe']), $this);?>

					</select>
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
 </span>					
				    </div>
				</div>				
				 <?php else: ?>
				<input type="hidden" id="cod_equipe" name="cod_equipe" value="<?php echo $_SESSION['usr']['cod_equipe']; ?>
">
				<?php endif; ?>
 	 
                </form> 
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>       
    </div>
    <!-- END PAGE CONTENT-->         
</div>
<?php echo '
<script language="javascript" type="text/javascript">
    $(function() {

	$("#frm_';  echo $this->_tpl_vars['modulo'];  echo '").validate({
	    rules: {
		nom_email: {
		    required: true,
		    email: true
		}
	    },

	    messages: {
		nom_email: "Email invalido!"
	    }
	});
	
    });   

    function verificaLogin(login){

        if(login != \'\'){

            var params = {
                modulo: '; ?>
'<?php echo $this->_tpl_vars['modulo']; ?>
'<?php echo '
                ,method: \'dmVyaWZpY2FVc3Vhcmlv\'//verificaUsuario
                ,args: { nom_login: login,cod_usuario:$(\'#cod_usuario\').val() }
            };

            $.ajax({
                type:\'POST\',
                url: \'../_ax/axRequest.php\',
                data:params,
                dataType:\'json\',
                success: function(r){
                    if(r.response){
                        alert(\'Este usuario ja foi cadastrado!\');
                        $(\'#nom_login\').val(\'\');
                    }
                }
            });
    }
}
</script>
'; ?>