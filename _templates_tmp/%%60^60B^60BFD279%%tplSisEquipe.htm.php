<?php /* Smarty version 2.6.14, created on 2013-11-22 16:50:42
         compiled from tplSisEquipe.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tplSisEquipe.htm', 1, false),array('modifier', 'date_format', 'tplSisEquipe.htm', 1, false),)), $this); ?>
<?php echo $this->_tpl_vars['xxajax']; ?>

                
</a>               
" name="frm_<?php echo $this->_tpl_vars['modulo']; ?>
" action="#" method="post" class="form-horizontal">
" />
" />                            
" />
" />
</label>
  id="tip_empresa" name="tip_empresa"  maxlength="11" class="span6 m-wrap popovers" ><option value=''>Selecione</option><option value='1'>Grupo</option><option value='2'>Lojista</option><option value='3'>Loja</option></select>
 class="text"><?php echo $this->_tpl_vars['dados']['tip_empresa']; ?>
 </span>
</label>
  id="nom_equipe" name="nom_equipe" value="<?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
" maxlength="45" class="span6 m-wrap popovers">
 class="text"><?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
 </span>
</label>
  id="nom_equipe" name="nom_equipe" value="<?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
" maxlength="45" class="span6 m-wrap popovers">
 class="text"><?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
 </span>
</label>
  id="nom_equipe" name="nom_equipe" value="<?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
" maxlength="45" class="span6 m-wrap popovers">
 class="text"><?php echo $this->_tpl_vars['dados']['nom_equipe']; ?>
 </span>
</label>
  id="cod_equipe_superior" name="cod_equipe_superior"  maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][38]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][38]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>><option value=''>Selecione</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_equipe'],'selected' => $this->_tpl_vars['dados']['cod_equipe_superior']), $this);?>
</select>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_equipe_superior']; ?>
 </span>
</label>
  id="cod_equipe_superior" name="cod_equipe_superior"  maxlength="11" class="span6 m-wrap popovers" <?php if ($this->_tpl_vars['TipAjuda'][38]): ?> data-content="<?php echo $this->_tpl_vars['TipAjuda'][38]; ?>
" data-original-title="Dica" data-trigger="hover" data-placement="top" <?php endif; ?>><option value=''>Selecione</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lstcod_equipe'],'selected' => $this->_tpl_vars['dados']['cod_equipe_superior']), $this);?>
</select>
 class="text"><?php echo $this->_tpl_vars['dados']['cod_equipe_superior']; ?>
 </span>
</label>
  id="nom_proprietario" name="nom_proprietario" value="<?php echo $this->_tpl_vars['dados']['nom_proprietario']; ?>
" maxlength="45" class="span6 m-wrap popovers">
 class="text"><?php echo $this->_tpl_vars['dados']['nom_proprietario']; ?>
 </span>
</label>
  id="num_telefone" name="num_telefone" value="<?php echo $this->_tpl_vars['dados']['num_telefone']; ?>
" maxlength="15" class="span6 m-wrap popovers">
 class="text"><?php echo $this->_tpl_vars['dados']['num_telefone']; ?>
 </span>
</label>
  id="nom_gerente" name="nom_gerente" value="<?php echo $this->_tpl_vars['dados']['nom_gerente']; ?>
" maxlength="45" class="span6 m-wrap popovers">
 class="text"><?php echo $this->_tpl_vars['dados']['nom_gerente']; ?>
 </span>
</label>
  id="num_celular_gerente" name="num_celular_gerente" value="<?php echo $this->_tpl_vars['dados']['num_celular_gerente']; ?>
" maxlength="15" class="span6 m-wrap popovers">
 class="text"><?php echo $this->_tpl_vars['dados']['num_celular_gerente']; ?>
 </span>
<span class="required">*</span> </label>
</label>
" data-date-format="dd/mm/yyyy" data-date-viewmode="years" data-date-startdate="<?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cancelamento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" <?php echo $this->_tpl_vars['display_form']; ?>
>
" />
 class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['dat_cancelamento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </span>