<?php /* Smarty version 2.6.14, created on 2013-10-22 17:19:14
         compiled from LayoutPrincipal.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "incSuperior.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- BEGIN BODY -->
<body class="fixed-top">

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "incTopo.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid"> <!--<div id="container">-->

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content">
            <?php echo $this->_tpl_vars['tplConteudo']; ?>

            <?php if ($this->_tpl_vars['formulario']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "barra_botoes.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        </div>
        <!------------------------------ END PAGE -->    
    </div>    

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "incInferior.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div id="debug"  style="display:<?php if ($this->_tpl_vars['isDebug'] > 0): ?>block<?php else: ?>none<?php endif; ?>"> <?php echo $this->_tpl_vars['t_debug'];  echo $this->_tpl_vars['debug']; ?>
</div>

</body>
</html>
<?php echo '
<script >    
    $(document).ready(function() {		
        App.setPage("';  echo $this->_tpl_vars['SETPAGE'];  echo '");  // set current page
        App.init(); // init the rest of plugins and elements
    });    
   
</script>
'; ?>
