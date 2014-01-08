<?php /* Smarty version 2.6.14, created on 2014-01-07 00:35:23
         compiled from tplTabPessoa.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tplTabPessoa.htm', 58, false),array('modifier', 'date_format', 'tplTabPessoa.htm', 107, false),)), $this); ?>
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
			    <input type="hidden" id="cod_pessoa" name="cod_pessoa" value="<?php echo $this->_tpl_vars['dados']['cod_pessoa']; ?>
">

			    <div class="alert alert-error hide">
			    <button class="close" data-dismiss="alert"></button>                            
			    </div>
			    <div class="alert alert-success hide">
				<button class="close" data-dismiss="alert"></button>                            
			    </div>

			     <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_cod_cpf']; ?>
</label>
				<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="cod_cpf" name="cod_cpf" value="<?php echo $this->_tpl_vars['dados']['cod_cpf']; ?>
" maxlength="15" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][40]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][40]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_cpf']; ?>
 </span>
				</div>
			    </div>

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_classif_cliente']; ?>
</label>	    
				<div class="controls">
				    <select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="cod_classif_pessoa" name="cod_classif_pessoa"  maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][38]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][38]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>><option value=''>Selecione</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_classif_pessoa'],'selected' => $this->_tpl_vars['dados']['cod_classif_pessoa']), $this);?>
</select>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_classif_pessoa']; ?>
 </span>
				</div>
			    </div>	

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_pessoa']; ?>
</label>
				<div class="controls">
				    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="nom_pessoa" name="nom_pessoa" value="<?php echo $this->_tpl_vars['dados']['nom_pessoa']; ?>
" maxlength="60" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][39]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][39]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_pessoa']; ?>
 </span>
				</div>
			    </div>	
			    
			     <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_des_sexo']; ?>
</label>
				<div class="controls">				    
				    <select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="des_sexo" name="des_sexo"  maxlength="11" class="span6 m-wrap popovers" ><option value=''>Selecione</option><option value='Feminino'>Feminino</option><option value='Masculino'>Masculino</option></select>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['des_sexo']; ?>
 </span>				    
				</div>
			    </div>			    			    	

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_qtd_filhos']; ?>
</label>
				<div class="controls">                                
				    <select  <?php echo $this->_tpl_vars['display_form']; ?>
  id="qtd_filhos" name="qtd_filhos"  maxlength="11" class="span6 m-wrap popovers" ><option value=''>Selecione</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>+4</option></select>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['qtd_filhos']; ?>
 </span>
				</div>
			    </div>
			   
			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_des_nro_celular']; ?>
</label>
				<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="des_nro_celular" name="des_nro_celular" value="<?php echo $this->_tpl_vars['dados']['des_nro_celular']; ?>
" maxlength="15" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][44]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][44]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['des_nro_celular']; ?>
 </span>
				</div>
			    </div>	

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_des_nro_celular_2']; ?>
</label>
				<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="des_nro_celular_2" name="des_nro_celular_2" value="<?php echo $this->_tpl_vars['dados']['des_nro_celular_2']; ?>
" maxlength="15" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][45]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][45]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['des_nro_celular_2']; ?>
 </span>
				</div>
			    </div>	

			    
			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_aniversario']; ?>
</label>
				<div class="controls">				    
					<div class="input-prepend date date-picker" data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_aniversario'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_aniversario'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>
					    <span class="add-on" ><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_aniversario" name="dat_aniversario" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_aniversario'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" />
					</div>
					<span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_finalizado'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </span>
				</div>
			    </div>
			    
			    <!--<div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_num_cep']; ?>
</label>
				<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="num_cep" name="num_cep" value="<?php echo $this->_tpl_vars['dados']['num_cep']; ?>
" maxlength="60" class="span6 m-wrap popovers" >
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['num_cep']; ?>
 </span>
				</div>
			    </div>-->

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_des_endereco']; ?>
</label>
				<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="des_endereco" name="des_endereco" value="<?php echo $this->_tpl_vars['dados']['des_endereco']; ?>
" maxlength="60" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][41]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][41]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['des_endereco']; ?>
 </span>
				</div>
			    </div>	

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_des_nro_endereco']; ?>
</label>
				<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
 alt="integer" id="des_nro_endereco" name="des_nro_endereco" value="<?php echo $this->_tpl_vars['dados']['des_nro_endereco']; ?>
" maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][42]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][42]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['des_nro_endereco']; ?>
 </span>
				</div>
			    </div>	

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_des_complemento']; ?>
</label>
				<div class="controls">
                                    <input type="text"  <?php echo $this->_tpl_vars['display_form']; ?>
  id="des_complemento" name="des_complemento" value="<?php echo $this->_tpl_vars['dados']['des_complemento']; ?>
" maxlength="50" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][43]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][43]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['des_complemento']; ?>
 </span>
				</div>
			    </div>	

			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_bol_utiliza_crm']; ?>
</label>
				<div class="controls">
                                    <input type='checkbox'  <?php echo $this->_tpl_vars['display_form']; ?>
 <?php if ($_GET['acao'] == 4): ?> checked=checked <?php endif; ?>  id="bol_utiliza_crm" name="bol_utiliza_crm" value="<?php echo $this->_tpl_vars['dados']['bol_utiliza_crm']; ?>
" maxlength="4" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][52]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][52]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['bol_utiliza_crm']; ?>
 </span>
				</div>
			    </div>
			    
			    <!--<div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_bol_ativo']; ?>
</label>
				<div class="controls">
                                    <input type='checkbox'  <?php echo $this->_tpl_vars['display_form']; ?>
 <?php if ($_GET['acao'] == 4): ?> checked=checked <?php endif; ?> id="bol_ativo" name="bol_ativo" value="<?php echo $this->_tpl_vars['dados']['bol_ativo']; ?>
" maxlength="4" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][48]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][48]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
				    <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['bol_ativo']; ?>
 </span>
				</div>
			    </div>-->
			    
			    <div class="control-group">
				<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_cadastro']; ?>
<span class="required">*</span> </label>
				<div class="controls">
				    <span class="text"><?php if ($this->_tpl_vars['dados']['dat_cadastro'] == ''):  echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  else:  echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %T") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %T"));  endif; ?></span>
				</div>
			    </div>
		
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
<?php echo '
<script language="javascript" type="text/javascript">
$(document).ready(function(){


    $("#cod_cpf").blur(function(){
        verificaCPF($(this).val());
    });


    $("#des_nro_celular_2").mask("(99) 99999-9999");
    $("#des_nro_celular").mask("(99) 99999-9999");	
    $("#cod_cpf").mask("999.999.999-99");

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

function buscarDadosPessoa(cpf) {
    var params = {
            modulo: \'';  echo $this->_tpl_vars['modulo'];  echo '\',
            method: \'YnVzY2FyRGFkb3NQZXNzb2E=\',
            args: { cpf: cpf}
    };


    $.ajax({
        type:\'POST\',
        url: \'../_ax/axRequest.php\',
        data:params,
        dataType:\'json\',
        success: function(r){
            console.log(r);
            if(r.response){
                $.each(r.response, function(i,v){
                    console.log(i, v);
                    $("#"+i).val(v);
                });
            }
        }
    });

}



    function verificaCPF(cpf){
    
        if(cpf != \'\'){

            var params = {
                modulo: \'';  echo $this->_tpl_vars['modulo'];  echo '\'
                ,method: \'dmVyaWZpY2FDUEY=\'
                ,args: { num_cpf_cnpj: cpf,cod_cliente:$(\'#cod_cliente\').val() }
            };

            $.ajax({
                type:\'POST\',
                url: \'../_ax/axRequest.php\',
                data:params,
                dataType:\'json\',
                success: function(r){
                    if(r.response){
//                        alert(\'Este CPF/CNPJ ja foi cadastrado!\');
//                        $(\'#num_cpf_cnpj\').val(\'\');

                        buscarDadosPessoa(cpf);

                    }
                }
            });
	    }
    }
</script>
'; ?>