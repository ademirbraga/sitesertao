<?php /* Smarty version 2.6.14, created on 2013-10-22 17:27:57
         compiled from barra_botoes.htm */ ?>
<div class="span12">    
        <?php if ($this->_tpl_vars['acao'] != 1): ?>    
        <button type="button" class="btn blue" onclick="javascript: <?php echo 'if($(\'#frm_';  echo $this->_tpl_vars['modulo'];  echo '\').valid()) { FORM.enviaFrm(\'frm_';  echo $this->_tpl_vars['modulo'];  echo '\', \'new\', this); return false;} else return false; '; ?>
 ">Salvar e adicionar outro</button>
        <button type="button" class="btn green" onclick="javascript: <?php echo 'if($(\'#frm_';  echo $this->_tpl_vars['modulo'];  echo '\').valid()) { FORM.enviaFrm(\'frm_';  echo $this->_tpl_vars['modulo'];  echo '\', \'edit\', this); return false;} else return false; '; ?>
 ">Salvar e continuar editando</button>
        <button type="button" class="btn purple" onclick="javascript: <?php echo 'if($(\'#frm_';  echo $this->_tpl_vars['modulo'];  echo '\').valid()) { FORM.enviaFrm(\'frm_';  echo $this->_tpl_vars['modulo'];  echo '\', \'redirect\', this); return false;} else return false; '; ?>
 ">Salvar</button>        
        <?php endif; ?>
        <button type="button" class="btn" onclick="javascript:history.go(-1);">Voltar</button>        
</div>