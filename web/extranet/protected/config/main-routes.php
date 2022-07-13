	<?php
    return array(
		'thumbnail/<tipo:\w+>/<dimensoes:\w+>/<model:\w+>/<img:\S+>'=>'thumbnail/redimensionar',
		'thumbnail/<model:\w+>/<img:\S+>'=>'thumbnail/original',
		'entrar' => 'site/login',
		
		'<action:(login|logout|recuperacao_senha|esqueci_senha)>' => 'site/<action>',
		'<controller:\w+>'=>'<controller>',
		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
		'<controller:\w+>?<id:\d+>'=>'<controller>/view',
	);
