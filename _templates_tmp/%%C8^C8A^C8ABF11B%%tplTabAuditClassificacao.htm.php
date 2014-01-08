<?php /* Smarty version 2.6.14, created on 2013-10-22 17:27:57
         compiled from tplTabAuditClassificacao.htm */ ?>
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
				<input type="hidden" id="cod_audit_classificacao" name="cod_audit_classificacao" value="<?php echo $this->_tpl_vars['dados']['cod_audit_classificacao']; ?>
">

<div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>                            
        </div>
        <div class="alert alert-success hide">
            <button class="close" data-dismiss="alert"></button>                            
        </div><div class="control-group">                          <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_cod_propr_classif']; ?>
</label>
		<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
 alt="integer" id="cod_propr_classif" name="cod_propr_classif" value="<?php echo $this->_tpl_vars['dados']['cod_propr_classif']; ?>
" maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][0]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][0]; ?>
" data-original-title="Dica" <?php endif; ?>>
		<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_propr_classif']; ?>
 </span></div>"</div>	
<div class="control-group">                          <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_desativacao']; ?>
</label>
		<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
 alt="date" id="dat_desativacao" name="dat_desativacao" value="<?php echo $this->_tpl_vars['dados']['dat_desativacao']; ?>
" maxlength="60" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][1]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][1]; ?>
" data-original-title="Dica" <?php endif; ?>>
		<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['dat_desativacao']; ?>
 </span></div>"</div>	
<div class="control-group"><?php if ($this->_tpl_vars['Revenda'] == 0): ?>                          <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_cod_usuario']; ?>
</label>
		<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
 alt="integer" id="cod_usuario" name="cod_usuario" value="<?php echo $this->_tpl_vars['dados']['cod_usuario']; ?>
" maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][2]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][2]; ?>
" data-original-title="Dica" <?php endif; ?>>
		<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_usuario']; ?>
 </span></div>"<?php else: ?>
	<input type="hidden" id="cod_usuario" name="cod_usuario" value="<?php echo $this->_tpl_vars['dados']['cod_usuario']; ?>
">
	<?php endif; ?></div>	
 	 
                </form> 
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>       
    </div>
    <!-- END PAGE CONTENT-->         
</div>