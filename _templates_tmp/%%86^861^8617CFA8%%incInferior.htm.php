<?php /* Smarty version 2.6.14, created on 2013-10-22 17:19:14
         compiled from incInferior.htm */ ?>
<!-- BEGIN FOOTER -->
<div class="footer">2013 &copy; by projetosertao.com.br<a href="#" onClick="axDebug();" accesskey="7">.</a>
    <div class="span pull-right">
        <span class="go-top"><i class="icon-angle-up"></i></span>
    </div>
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="../_inc/assets/js/jquery-1.8.3.min.js"></script>	
<!--[if lt IE 9]>
<script src="../_inc/assets/js/excanvas.js"></script>
<script src="../_inc/assets/js/respond.js"></script>	
<![endif]-->	
<script src="../_inc/assets/breakpoints/breakpoints.js"></script>		
<script src="../_inc/assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>	
<script src="../_inc/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../_inc/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="../_inc/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../_inc/assets/js/jquery.blockui.js"></script>	
<script src="../_inc/assets/js/jquery.cookie.js"></script>

<!--<script src="../_inc/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>	
<script src="../_inc/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="../_inc/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="../_inc/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="../_inc/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="../_inc/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="../_inc/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>-->

<?php if (empty ( $this->_tpl_vars['modulo'] )): ?>
<script src="../_inc/assets/flot/jquery.flot.js"></script>
<script src="../_inc/assets/flot/jquery.flot.resize.js"></script>
<?php endif; ?>
    
<script type="text/javascript" src="../_inc/assets/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="../_inc/assets/uniform/jquery.uniform.min.js"></script>	
<!--<script type="text/javascript" src="../_inc/assets/js/jquery.pulsate.min.js"></script>-->

<!--BEGIN Lista.html-->
<script type="text/javascript" src="../_inc/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="../_inc/assets/data-tables/DT_bootstrap.js"></script>
<!--END Lista.html-->

<?php if (! empty ( $_GET['acao'] )): ?>
<!--BEGIN Visualiza.html-->
<script type="text/javascript" src="../_inc/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="../_inc/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="../_inc/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../_inc/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../_inc/assets/jquery-validation/dist/jquery.validate.js"></script>
<script type="text/javascript" src="../_inc/_js/jquery.maskedinput-1.1.4.pack.js"></script>
<!--END Visualiza.html-->
<?php endif; ?>
<script type="text/javascript" src="../_inc/_js/valid.js"></script>
<script src="../_inc/assets/js/app.js"></script>				
<!-- END JAVASCRIPTS -->
<script type="text/javascript">
<?php echo '

/**
 * Quando o usuário cria e continua editando um item, a hash tag é criada. 
 * Mas se ele der reload na página, vai receber vazio o id, isto resolve o problema redirecionando para uma url valida
 */
if(window.location.href.search(\'#id=\') != -1){
	var href = window.location.href;
	window.location = href.replace(\'#\',\'&\');
}
'; ?>

</script>