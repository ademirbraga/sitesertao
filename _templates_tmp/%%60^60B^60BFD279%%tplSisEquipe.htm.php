<?php /* Smarty version 2.6.14, created on 2013-11-22 16:50:42
         compiled from tplSisEquipe.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tplSisEquipe.htm', 1, false),array('modifier', 'date_format', 'tplSisEquipe.htm', 1, false),)), $this); ?>
<?php echo $this->_tpl_vars['xxajax']; ?>
<!-- BEGIN PAGE CONTAINER--><div class="container-fluid">    <!-- BEGIN PAGE HEADER-->       <div class="row-fluid">        <div class="span12">                            <h3 class="page-title">                Modulo <?php echo $this->_tpl_vars['NomeModulo']; ?>
                            </h3>            <ul class="breadcrumb">                <li>                    <i class="icon-home"></i>                    <a href="index.html">Home</a>                     <span class="icon-angle-right"></span>                </li>                <li>                    <a href="#"><?php echo $this->_tpl_vars['NomeModulo']; ?>
</a>                               </li>                           </ul>        </div>    </div>    <!-- END PAGE HEADER-->       <!-- BEGIN PAGE CONTENT-->       <div class="row-fluid">        <div class="span12">            <!-- BEGIN VALIDATION STATES-->            <div class="portlet box green">                <div class="portlet-title">                    <h4><i class="icon-reorder"></i>Dados</h4>                                    </div>                <div class="portlet-body form">                    <!-- BEGIN FORM-->                     			<form id="frm_<?php echo $this->_tpl_vars['modulo']; ?>
" name="frm_<?php echo $this->_tpl_vars['modulo']; ?>
" action="#" method="post" class="form-horizontal">                            <input type="hidden" name="f_action" id="f_action" value="<?php echo $this->_tpl_vars['acao']; ?>
" />			    <input type="hidden" name="f_mod" id="f_mod" value="<?php echo $this->_tpl_vars['modulo']; ?>
" />                            			    <input type="hidden" id="cod_equipe" name="cod_equipe" value="<?php echo $this->_tpl_vars['dados']['cod_equipe']; ?>
" />			    <input type="hidden" id="bol_ambiente" name="bol_ambiente" value="<?php echo $this->_tpl_vars['dados']['bol_ambiente']; ?>
" />			    <div class="alert alert-error hide">			    <button class="close" data-dismiss="alert"></button>                            			    </div>			    <div class="alert alert-success hide">				<button class="close" data-dismiss="alert"></button>                            			    </div>			    			    <div class="control-group">				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_tipo_empresa']; ?>
</label>				<div class="controls">                                				    <select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="tip_empresa" name="tip_empresa"  maxlength="11" class="span6 m-wrap popovers" ><option value=''>Selecione</option><option value='1'>Grupo</option><option value='2'>Lojista</option><option value='3'>Loja</option></select>				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['tip_empresa']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group" id="tip3">        				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_equipe']; ?>
</label>				<div class="controls">                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_equipe" name="nom_equipe" value="<?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
" maxlength="45" class="span6 m-wrap popovers">				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group" id="tip2">        				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_equipe_filial']; ?>
</label>				<div class="controls">                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_equipe" name="nom_equipe" value="<?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
" maxlength="45" class="span6 m-wrap popovers">				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group" id="tip1">        				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_equipe_grupo']; ?>
</label>				<div class="controls">                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_equipe" name="nom_equipe" value="<?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
" maxlength="45" class="span6 m-wrap popovers">				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group" id="sup2">        				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_equipe_grupo']; ?>
</label>				<div class="controls">                                    <select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="cod_equipe_superior" name="cod_equipe_superior"  maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][38]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][38]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>><option value=''>Selecione</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_equipe'],'selected' => $this->_tpl_vars['dados']['cod_equipe_superior']), $this);?>
</select>				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_equipe_superior']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group" id="sup3">        				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_equipe_filial']; ?>
</label>				<div class="controls">                                    <select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="cod_equipe_superior" name="cod_equipe_superior"  maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][38]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][38]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>><option value=''>Selecione</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_equipe'],'selected' => $this->_tpl_vars['dados']['cod_equipe_superior']), $this);?>
</select>				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_equipe_superior']; ?>
 </span>				</div>			    </div>			    			     <div class="control-group">        				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_proprietario']; ?>
</label>				<div class="controls">                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_proprietario" name="nom_proprietario" value="<?php echo $this->_tpl_vars['dados']['nom_proprietario']; ?>
" maxlength="45" class="span6 m-wrap popovers">				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_proprietario']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group">				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_num_telefone']; ?>
</label>				<div class="controls">                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="num_telefone" name="num_telefone" value="<?php echo $this->_tpl_vars['dados']['num_telefone']; ?>
" maxlength="15" class="span6 m-wrap popovers">				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['num_telefone']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group">        				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_gerente']; ?>
</label>				<div class="controls">                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_gerente" name="nom_gerente" value="<?php echo $this->_tpl_vars['dados']['nom_gerente']; ?>
" maxlength="45" class="span6 m-wrap popovers">				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_gerente']; ?>
 </span>				</div>			    </div>			    			    <div class="control-group">				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_num_celular_gerente']; ?>
</label>				<div class="controls">                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="num_celular_gerente" name="num_celular_gerente" value="<?php echo $this->_tpl_vars['dados']['num_celular_gerente']; ?>
" maxlength="15" class="span6 m-wrap popovers">				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['num_celular_gerente']; ?>
 </span>				</div>			    </div>			    			     <div class="control-group">				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_cadastro']; ?>
<span class="required">*</span> </label>				<div class="controls">				    <span class="text"><?php if ($this->_tpl_vars['dados']['dat_cadastro'] == ''):  echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  else:  echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  endif; ?></span>				</div>			    </div>			    			    <div class="control-group">				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_cancelamento']; ?>
</label>				<div class="controls">				    					<div class="input-prepend date date-picker" data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cancelamento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cancelamento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>					    <span class="add-on" ><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_cancelamento" name="dat_cancelamento" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cancelamento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" />					</div>					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cancelamento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </span>				</div>			    </div> 	                 </form>                 </div>            </div>            <!-- END VALIDATION STATES-->        </div>           </div>    <!-- END PAGE CONTENT-->         </div><?php echo '<script language="javascript" type="text/javascript">$(document).ready(function(){        $("#num_celular_gerente").mask("(99) 9999-9999");    $("#num_telefone").mask("(99) 9999-9999");	    $("#tip1").hide();	    $("#tip2").hide();	    $("#tip3").hide();        $("#sup2").hide();    $("#sup3").hide();	        $("#tip_empresa").change(function(){			if( $(this).val() == 1){	    $("#tip1").show();		    $("#tip2").hide();		    $("#tip3").hide();		    $("#bol_ambiente").val("2");	}else{	    if( $(this).val() == 2){		$("#tip1").hide();			$("#tip2").show();			$("#tip3").hide();				$("#sup2").show();		$("#sup3").hide();		$("#bol_ambiente").val("1");	    }else{		$("#tip1").hide();			$("#tip2").hide();			$("#tip3").show();				$("#sup2").hide();		$("#sup3").show();		$("#bol_ambiente").val("0");	    }	}    });});</script>'; ?>