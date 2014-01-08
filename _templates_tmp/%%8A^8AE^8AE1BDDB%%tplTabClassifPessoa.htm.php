<?php /* Smarty version 2.6.14, created on 2013-10-23 11:52:41
         compiled from tplTabClassifPessoa.htm */ ?>
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
				<input type="hidden" id="cod_classif_pessoa" name="cod_classif_pessoa" value="<?php echo $this->_tpl_vars['dados']['cod_classif_pessoa']; ?>
">

<div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>                            
        </div>
        <div class="alert alert-success hide">
            <button class="close" data-dismiss="alert"></button>                            
        </div><div class="control-group">                          <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_classif_cliente']; ?>
</label>
		<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_classif_cliente" name="nom_classif_cliente" value="<?php echo $this->_tpl_vars['dados']['nom_classif_cliente']; ?>
" maxlength="45" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][3]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][3]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
		<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_classif_cliente']; ?>
 </span></div></div>	
 	 
                </form> 
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>       
    </div>
    <!-- END PAGE CONTENT-->         
</div>