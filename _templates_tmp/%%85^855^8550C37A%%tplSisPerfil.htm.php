<?php /* Smarty version 2.6.14, created on 2013-10-23 17:57:37
         compiled from tplSisPerfil.htm */ ?>
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
				<input type="hidden" id="cod_perfil" name="cod_perfil" value="<?php echo $this->_tpl_vars['dados']['cod_perfil']; ?>
">
				<input type="hidden" id="cod_equipe" name="cod_equipe" value="<?php echo $this->_tpl_vars['dados']['cod_equipe']; ?>
">

				<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>                            
				</div>
				<div class="alert alert-success hide">
				    <button class="close" data-dismiss="alert"></button>                            
				</div>	
				
				<div class="control-group">
				    <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_perfil']; ?>
<span class="required">*</span> </label>
				    <div class="controls">
					<input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_perfil" name="nom_perfil" value="<?php echo $this->_tpl_vars['dados']['nom_perfil']; ?>
" maxlength="225" data-required="1" class="span6 m-wrap popovers required" <?php if ($this->_tpl_vars['TipAjuda'][93]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][93]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_perfil']; ?>
 </span>
				    </div>
				</div>				
				
			<table class="table table-condensed table-hover">
			<tr>
			    <td colspan="5">
				<table class="table table-condensed table-hover">
				<tr>
				    <td></td>
				    <?php $_from = $this->_tpl_vars['lstAcoes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itAcoes']):
?>
				    <td><?php echo $this->_tpl_vars['itAcoes']; ?>
</td>
				    <?php endforeach; endif; unset($_from); ?>
				    <td><?php echo $this->_tpl_vars['lng']['txt_todas']; ?>
</td>
				</tr>

				<?php $_from = $this->_tpl_vars['lstPerm']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chPerm'] => $this->_tpl_vars['itPerm']):
?>
				<tr id="tr<?php echo $this->_tpl_vars['chPerm']; ?>
">
				    <td><?php echo $this->_tpl_vars['itPerm']; ?>
</td>
				    <?php $_from = $this->_tpl_vars['lstAcoes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chAcoes'] => $this->_tpl_vars['itAcoes']):
?>
				    <td>
					<?php if ($this->_tpl_vars['lstPermAcoes'][$this->_tpl_vars['chPerm']][$this->_tpl_vars['chAcoes']]): ?>
					<input type="checkbox" id="cod_permissao_<?php echo $this->_tpl_vars['chPerm']; ?>
_<?php echo $this->_tpl_vars['chAcoes']; ?>
" name="cod_permissao[<?php echo $this->_tpl_vars['chPerm']; ?>
][<?php echo $this->_tpl_vars['chAcoes']; ?>
]" value="<?php echo $this->_tpl_vars['chAcoes']; ?>
" <?php if ($this->_tpl_vars['lstPermissoes'][$this->_tpl_vars['chPerm']] & $this->_tpl_vars['chAcoes']): ?> checked="checked"<?php endif; ?> />
					<?php endif; ?>
				    </td>
				    <?php endforeach; endif; unset($_from); ?>
				    <td>
					<input type="checkbox" name="todos_<?php echo $this->_tpl_vars['chPerm']; ?>
" id="todos_<?php echo $this->_tpl_vars['chPerm']; ?>
" onclick="javascript: selTodas(<?php echo $this->_tpl_vars['chPerm']; ?>
);" >
				    </td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>
			    </td>
			</tr>
		    </table>
				
		</form> 
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>       
    </div>
    <!-- END PAGE CONTENT-->         
</div>
<?php echo '
<script language="javascript">
function selTodas(idPerm){
	
	var Marca = false;

	if($("#todos_"+idPerm).is(\':checked\')) 
	    Marca = true;

	var lstChecks = $( "#tr"+idPerm ).find( ":checkbox" );

	$.each(lstChecks, function(index, value) {	  
	    //alert(\'#cod_permissao_\'+idPerm+\'_\'+$(value).val());	    
	  //  var campo = $(\'#cod_permissao_\'+idPerm+\'_\'+$(value).val());	  
	  $(value).attr(\'checked\', Marca);
	  //$(\'#\'+value).attr( "alt", "Beijing Brush Seller" );
	  //alert(campo);
	  //$(\'#cod_permissao_\'+idPerm+\'_\'+$(value).val()).attr(\'checked\');
	});
}
</script>
'; ?>