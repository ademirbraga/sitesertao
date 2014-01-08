<?php /* Smarty version 2.6.14, created on 2014-01-07 01:12:01
         compiled from tplTabPlanoContas.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tplTabPlanoContas.htm', 68, false),array('modifier', 'date_format', 'tplTabPlanoContas.htm', 93, false),)), $this); ?>
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
"/>
                        <input type="hidden" name="f_mod" id="f_mod" value="<?php echo $this->_tpl_vars['modulo']; ?>
"/>
                        <input type="hidden" id="cod_plano_contas" name="cod_plano_contas"
                               value="<?php echo $this->_tpl_vars['dados']['cod_plano_contas']; ?>
">

                        <div class="alert alert-error hide">
                            <button class="close" data-dismiss="alert"></button>
                        </div>
                        <div class="alert alert-success hide">
                            <button class="close" data-dismiss="alert"></button>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_plano_contas']; ?>
<span class="required">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" <?php echo $this->_tpl_vars['display_form']; ?>
 id="nom_plano_contas" name="nom_plano_contas"
                                value="<?php echo $this->_tpl_vars['dados']['nom_plano_contas']; ?>
" maxlength="45" data-required="1" class="span6 m-wrap
                                popovers required" <?php if ($this->_tpl_vars['TipAjuda'][53]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][53]; ?>
"
                                data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
                                <span <?php echo $this->_tpl_vars['display_info']; ?>
 class="text"><?php echo $this->_tpl_vars['dados']['nom_plano_contas']; ?>
 </span>
                            </div>
                        </div>

                        <div class="controls controls-row">
                            <!--<label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_nom_tipo_servico']; ?>
<span class="required">*</span></label>-->

                                <select <?php echo $this->_tpl_vars['display_form']; ?>
 id="cod_tipo_servico" name="cod_tipo_servico" maxlength="11"
                                class="span4 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][58]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][58]; ?>
"
                                data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>
                                <option value=''>Tipo de Plano</option>
                                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_tipo_servico'],'selected' => $this->_tpl_vars['dados']['cod_tipo_servico']), $this);?>
</select>


                                <input placeholder="<?php echo $this->_tpl_vars['lng']['txt_qtd_itens_servico']; ?>
"
                                       type="text" <?php echo $this->_tpl_vars['display_form']; ?>
 alt="integer" id="qtd_itens_servico"
                                name="qtd_itens_servico" value="<?php echo $this->_tpl_vars['dados']['qtd_itens_servico']; ?>
" maxlength="11" class="span4
                                m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][59]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][59]; ?>
"
                                data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>


                                <input placeholder="<?php echo $this->_tpl_vars['lng']['txt_vlr_plano']; ?>
"
                                       type="text" <?php echo $this->_tpl_vars['display_form']; ?>
 id="vlr_plano" name="vlr_plano"
                                value="<?php echo $this->_tpl_vars['dados']['vlr_plano']; ?>
" maxlength="10,2" class="span4 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][60]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][60]; ?>
" data-original-title="Dica"
                                data-trigger="hover" data-placement="top" <?php endif; ?>>

                        </div>

                        <div style="padding-top: 15px;"></div>

                        <div class="controls controls-row">
                            <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_dat_inicio_plano']; ?>
</label>


                                <div class="input-prepend date date-picker"
                                     data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_inicio_plano'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"
                                     data-date-format="dd/mm/yyyy" data-date-viewmode="years"
                                     data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_inicio_plano'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"
                                <?php echo $this->_tpl_vars['display_form']; ?>
>
                                <span class="add-on"><i class="icon-calendar"></i></span><input
                                    class="m-wrap m-ctrl-medium" size="16" type="text" id="dat_inicio_plano"
                                    name="dat_inicio_plano" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_inicio_plano'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"/>

                        <div class="input-prepend date date-picker"
                             data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_fim_plano'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" data-date-format="dd/mm/yyyy"
                             data-date-viewmode="years"
                             data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_fim_plano'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"
                        <?php echo $this->_tpl_vars['display_form']; ?>
>
                        <span class="add-on"><i class="icon-calendar"></i></span><input class="m-wrap m-ctrl-medium"
                                                                                        size="16" type="text"
                                                                                        id="dat_fim_plano"
                                                                                        name="dat_fim_plano"
                                                                                        value="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_fim_plano'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"/>


                <label class="control-label"><?php echo $this->_tpl_vars['lng']['txt_bol_ativo']; ?>
<span class="required">*</span> </label>
                    <input type='checkbox' <?php echo $this->_tpl_vars['display_form']; ?>
 <?php if ($_GET['acao'] == 4): ?> checked=checked <?php endif; ?>
                    id="bol_ativo" name="bol_ativo" value="<?php echo $this->_tpl_vars['dados']['bol_ativo']; ?>
" maxlength="4" data-required="1"
                    class="span6 m-wrap popovers required" <?php if ($this->_tpl_vars['TipAjuda'][54]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][54]; ?>
"
                    data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>>

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