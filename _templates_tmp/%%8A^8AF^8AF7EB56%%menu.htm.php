<?php /* Smarty version 2.6.14, created on 2013-10-23 17:54:12
         compiled from menu.htm */ ?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->        	
    <ul>
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <!--<li>-->
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!--<form class="sidebar-search">
                <div class="input-box">
                    <a href="javascript:;" class="remove"></a>
                    <input type="text" placeholder="Procurar..." />				
                    <input type="button" class="submit" value=" " />
                </div>
            </form>-->
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!--</li>-->
        <li class="start active ">
            <a href="index.php">
                <i class="icon-home"></i> 
                <span class="title">Home</span>
                <span class="selected"></span>
            </a>
        </li>

        <li class="has-sub">
            <a href="javascript:;">
                <i class="icon-group"></i> 
                <span class="title"><?php echo $this->_tpl_vars['lng']['txt_cliente']; ?>
</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub">
		<li class="">
		    <a href="Lista.php?modulo=10">			
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabPessoa']; ?>
</span>
		    </a>
		</li>		
		<li class="">
		    <a href="Lista.php?modulo=2">			
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabClassifPessoa']; ?>
</span>
		    </a>
		</li>				              
            </ul>
        </li>
	
	<li class="has-su">
            <a href="Lista.php?modulo=19">
                <i class="icon-barcode"></i> 
                <span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabTransacao']; ?>
</span>
            </a>
        </li>
	<li class="has-sub">
            <a href="javascript:;">
                <i class="icon-bullhorn"></i> 
                <span class="title"><?php echo $this->_tpl_vars['lng']['txt_crm']; ?>
</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub">
                <li class="">
		    <a href="Lista.php?modulo=14">			
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabSms']; ?>
</span>
		    </a>
		</li>
		<!--<li class="">
		    <a href="Lista.php?modulo=9">			
			<span class="title">TabEnvioSms</span>
		    </a>
		</li>-->
		<li class="">
		    <a href="Lista.php?modulo=6">			
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabEmail']; ?>
</span>
		    </a>
		</li>
                <!--<li class="">
		    <a href="Lista.php?modulo=8">			
			<span class="title">TabEnvioEmail</span>
		    </a>
		</li>-->
		 <li class="">
		    <a href="Lista.php?modulo=3">			
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabCupom']; ?>
</span>
		    </a>
		</li>
		<!--<li class="">
			<a href="Lista.php?modulo=15">			
			<span class="title">TabStatusCupom</span>
		    </a>
		</li>-->
		
            </ul>
        </li>
       


        <li class="has-sub">
            <a href="javascript:;">
                <i class="icon-cogs"></i> 
                <span class="title"><?php echo $this->_tpl_vars['lng']['txt_administracao']; ?>
</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub">
                <li>
                    <a href="Lista.php?modulo=26">
                        <?php echo $this->_tpl_vars['lng']['txt_nom_usuario']; ?>

                    </a>
                </li>
                <li>
                    <a href="Lista.php?modulo=23">
                        <?php echo $this->_tpl_vars['lng']['txt_nom_perfil']; ?>

                    </a>
                </li>                  
            </ul>
        </li>
	
	<li class="has-sub">
            <a href="javascript:;">
                <i class="icon-wrench"></i> 
                <span class="title"><?php echo $this->_tpl_vars['lng']['txt_PainelControle']; ?>
</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub"> 
		
		<li class="">
		    <a href="Lista.php?modulo=21">			
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_empresas']; ?>
</span>
		    </a>
		</li>
				
                <li class="">
		    <a href="Lista.php?modulo=11">			
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabPlanoContas']; ?>
</span>
		    </a>
		</li>
		<!--<li class="">
		    <a href="Lista.php?modulo=12">			
			<span class="title">TabPlanoPropriedades</span>
		    </a>
		</li>
		<li class="">
		    <a href="Lista.php?modulo=17">			 
			<span class="title"><?php echo $this->_tpl_vars['lng']['txt_TabTipoServico']; ?>
</span>
		    </a>
		</li>-->
            </ul>
        </li>



    </ul>
    <!-- END SIDEBAR MENU-->
</div>
<!-- END SIDEBAR-->