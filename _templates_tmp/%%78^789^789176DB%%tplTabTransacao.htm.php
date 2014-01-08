<?php /* Smarty version 2.6.14, created on 2013-10-23 13:16:30
         compiled from tplTabTransacao.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'tplTabTransacao.htm', 58, false),array('function', 'html_options', 'tplTabTransacao.htm', 98, false),)), $this); ?>
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
				<input type="hidden" id="cod_transacao" name="cod_transacao" value="<?php echo $this->_tpl_vars['dados']['cod_transacao']; ?>
">

				<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>                            
				</div>
				<div class="alert alert-success hide">
				    <button class="close" data-dismiss="alert"></button>                            
				</div>								

				<div class="control-group">
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_pessoa']; ?>
</label>
				    <div class="controls">
					<input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
 alt="integer" id="cod_pessoa" name="cod_pessoa" value="<?php echo $this->_tpl_vars['dados']['cod_pessoa']; ?>
" maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][87]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][87]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_pessoa']; ?>
 </span>
				    </div>
				</div>	

				<div class="control-group">
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_compra']; ?>
</label>
				    <div class="controls">				    
					    <div class="input-prepend date date-picker" data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_compra'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_compra'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>
						<span class="add-on" ><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_compra" name="dat_compra" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_compra'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" />
					    </div>
					    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_importacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </span>
				    </div>
				</div>					

				<div class="control-group">
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_vlr_compra']; ?>
</label>
				    <div class="controls">
					<input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="vlr_compra" name="vlr_compra" value="<?php echo $this->_tpl_vars['dados']['vlr_compra']; ?>
" maxlength="20,10" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][89]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][89]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['vlr_compra']; ?>
 </span>
				    </div>
				</div>	

				<div class="control-group">    
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_tipo_pagamento']; ?>
</label>
				    <div class="controls">					
					<select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_tipo_pagamento" name="nom_tipo_pagamento"  maxlength="11" class="span6 m-wrap popovers" ><option value=''>Selecione</option><option value='Cartao da loja'>Cartao da Loja</option><option value='Cartao de credito - Rotativo'>Cartao de Credito - Rotativo</option><option value='Cartao de credito - Parcelado'>Cartao de Credito - Parcelado</option><option value='Cartao de debito'>Cartao de debito</option><option value='Dinheiro'>Dinheiro</option><option value='Voucher'>Voucher</option><option value='Cheque'>Cheque</option><option value='Outros'>Outros</option></select>       
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_tipo_pagamento']; ?>
 </span>
				    </div>
				</div>	
    

			<div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_importacao']; ?>
</label>
				<div class="controls">				    
					<div class="input-prepend date date-picker" data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_importacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_importacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>
					    <span class="add-on" ><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_importacao" name="dat_importacao" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_importacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" />
					</div>
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_importacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </span>
				</div>
			    </div>
    
			<?php if ($this->_tpl_vars['Revenda'] == 0): ?>
			<div class="control-group">				    
			    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_equipe']; ?>
<span class="required">*</span> </label>
			    <div class="controls">
				<select <?php echo $this->_tpl_vars['display_form']; ?>
 id="cod_usuario" name="cod_equipe"  maxlength="11" data-required="1" class="span6 m-wrap popovers required" <?php if ($this->_tpl_vars['TipAjuda'][158]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][158]; ?>
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
			    <input type="hidden" id="cod_usuario" name="cod_usuario" value="<?php echo $_SESSION['usr']['cod_usuario']; ?>
">
			<?php endif; ?>    
		
			<?php if ($this->_tpl_vars['Revenda'] == 0): ?>
			<div class="control-group">				    
			    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_cod_usuario']; ?>
<span class="required">*</span> </label>
			    <div class="controls">
				<select <?php echo $this->_tpl_vars['display_form']; ?>
 id="cod_usuario" name="cod_usuario"  maxlength="11" data-required="1" class="span6 m-wrap popovers required" <?php if ($this->_tpl_vars['TipAjuda'][158]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][158]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <option value=''>Selecione</option>
				    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_usuario'],'selected' => $this->_tpl_vars['dados']['cod_usuario']), $this);?>

				</select>
				<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_usuario']; ?>
 </span>					
			    </div>
			</div>
			<?php else: ?>
			    <input type="hidden" id="cod_usuario" name="cod_usuario" value="<?php echo $_SESSION['usr']['cod_usuario']; ?>
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