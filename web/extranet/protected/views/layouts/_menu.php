<?
error_reporting(22519);
$link = $_SERVER['REQUEST_URI'];
$array = explode("/",$link);
?>
<header>
    <div class="container">
        <div class="row-fluid">
            <div class="span3">
                <div class="main-logo"><?php /*?><a href="<?= Yii::app()->baseUrl . '/site' ?>"><img src="<?= Yii::app()->baseUrl ?>/img/logo_hub.png" alt="Plataforma Hub"></a><?php */?></div>
            </div>
            <div class="span6">
                <nav class="nav-icons">
                    <ul>
						<?	
						if (strpos($link, "site") || $array[2]=="") { 						
						?>					
                        <li class="active">  
								<span class="ptip_s">								
									<i class="icsw16-graph"></i>								
								</span>
                        </li>
						<?
						}else{
						?>
						<li>  
							<a href="<?= Yii::app()->baseUrl . '/site'; ?>" title="Dashboard">
								<span class="ptip_s">
									<i class="icsw16-graph"></i>
								</span>
							</a>
                        </li>
						<?						
						}
						if (strpos($link, "produtodepara")) { 	
						?>
						<li class="active">
							<span class="ptip_s">
								<i class="icsw16-price-tag"></i>
							</span>
                        </li>
						<?						
						}else{
						?>
						<li>
							<a href="<?= Yii::app()->baseUrl . '/produtodepara'; ?>" title="Produtos">
								<span class="ptip_s">
									<i class="icsw16-price-tag"></i>
								</span>
							</a>	
                        </li>
						<?
						}
						
						if (strpos($link, "pedidodepara")) { 
						?>
                        <li class="active">
							<span class="ptip_s">
								<i class="icsw16-shopping-cart-2"></i>
							</span>
                        </li>	
						<?						
						}else{
						?>
						<li>   
							<a href="<?= Yii::app()->baseUrl . '/pedidodepara'; ?>" title="Pedidos">
								<span class="ptip_s">
									<i class="icsw16-shopping-cart-2"></i>
								</span>  
							</a>			
                        </li>
						<?						
						}						
						?>		
                    </ul>
                </nav>
            </div>

            <div class="span3">
                <div class="user-box">
                    <div class="user-box-inner">
                        <?
                        if (Yii::app()->user->obj->empresa->logomarca) {
                            $file = Yii::app()->baseUrl . '/protected/uploads/Empresa/' . Yii::app()->user->obj->empresa->logomarca;
                        } else {
                            $file = Yii::app()->baseUrl . '/img/avatars/avatar.png';
                        }
                        ?>
                        <img class="user-avatar img-avatar" alt="" src="<?= $file ?>">
                        <div class="user-info">
                            Bem vindo, <strong><?= utf8_encode(Yii::app()->user->obj->name) ?></strong>
                            <ul class="unstyled">
                                <li><a href="<?= Yii::app()->baseUrl . '/usuario'; ?>">Configurações</a></li>
                                <li>&middot;</li>
                                <li><a href="<?= Yii::app()->baseUrl . '/logout'; ?>">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>