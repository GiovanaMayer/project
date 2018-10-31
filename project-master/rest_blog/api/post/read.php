<?php
 	// if(!isset($_SERVER['PHP_AUTH_USER'])){
 	// 	header('WWW-Authenitcate: Basic realm="Página Restrita"');

 	// 	header('HTTP/1.0 401 Unauthorized');

 	// 	echo json_encode(["mensagem" => "Autenticação necessária"
 	// 		]);

 	// 	exit;
 	// }elseif (!($_SERVER['PHP_AUTH_USER'] == 'admin'
 	// 		 && $_SERVER['PHP_AUTH_PW']	== 'admin')){
 	// 			header('HTTP/1.0 401 Unauthorized');
		// 		echo json_encode(["mensagem" => "Usuário Inválido"]);
 	// }else{
 			

		header('Acess-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		
		require_once '../../config/Conexao.php';
		require_once '../../models/Post.php';

		$db = new Conexao();
		$con = $db->getConexao();

	    $post = new Post($con);

//1 - nao foi enviado um id, mostra todos os posts - read()
//2 - foi enviado um id de post, mostra os dados daquele post - read(id)
//3 - foi enviado um id de categoria, mostra os posts da categoria - readByCat(idcat)	    

	    $resultado = $post->read();

	    $qtde_posts = sizeof($resultado);

	    if($qtde_posts>0){
	        // $arr_posts = array();
	        // $arr_posts['data'] = array();

	        echo json_encode($resultado);
	    }else{
	        echo json_encode(array('mensagem' => 'nenhum post encontrado'));
	    }

   	// }