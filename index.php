<?php
	include('AboutModel.php');
	include('AboutController.php');
	include('AboutView.php');
	include('ProfileModel.php');
	include('ProfileController.php');
	include('ProfileView.php');

	$page = $_GET['page'];

	if(!empty($page)) {
		$pageData = array(
			'about' => array(
				'model' => 'AboutModel',
				'view' => 'AboutView',
				'controller' => 'AboutController'
			),
			'profile' => array(
				'model' => 'ProfileModel',
				'view' => 'ProfileView',
				'controller' => 'ProfileController'
			)
		);

		foreach ($pageData as $pageName => $pageComponents) {
			if($page == $pageName) {
				$model = $pageComponents['model'];
				$view = $pageComponents['view'];
				$controller = $pageComponents['controller'];
			}
		}

		if(isset($model)) {
			$m = new $model();
			$c = new $controller($m);
			$v = new $view($c, $m);

			echo $v->output();
		}
	}
?>