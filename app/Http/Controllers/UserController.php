<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\JwtAuth;
use App\Usuarios;

class UserController extends Controller
{	

	public function Register(Request $request){
    	
    	// Recibir parametros POST
    	$json = $request->input('json', null);
    	
    	// Se valida si llega el parametro json.
    	if(is_null($json)){
    		$data = array(
					'status' => 'error',
					'code' => 400,
					'message' => 'no llego el parametro json'
				);
    		return response()->json($data,400);
    	}

    	// Se codifican los parametros.
    	$params = json_decode($json);

    	//Se reciben los parametros
		$email                  = (!is_null($json) && isset($params->email)) ? $params->email : null;
		$idRol                  = (!is_null($json) && isset($params->idRol)) ? $params->idRol : null;
		$usuarioSistema         = (!is_null($json) && isset($params->usuarioSistema)) ? $params->usuarioSistema : null;
		$contrasena             = (!is_null($json) && isset($params->contrasena)) ? $params->contrasena : null;
		$confirmacionContrasena = (!is_null($json) && isset($params->confirmacionContrasena)) ? $params->confirmacionContrasena : null;
		
    	// Se validan los parametros de entrada.
    	$errores = '';
    	
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    $errores.= "email invalido,";
		}
		
		if (!filter_var($idRol, FILTER_VALIDATE_INT)) {
		    $errores.=("idRol debe ser tipo entero,");
		}

		$usuarioSistema = strtoupper($usuarioSistema);

		if (!preg_match("/([A-Z])\w+/", $usuarioSistema)) {
			$errores.=("usuarioSistema incorrecto,");
		}
		/*validacion password
			Minimo 8 caracteres	Maximo 15
			Al menos una letra mayúscula
			Al menos una letra minucula
			Al menos un dígito
			No espacios en blanco
			Al menos 1 caracter especial*/

		if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$\_])[A-Za-z\d$@$!%*?&#.$($)$-$\_]{8,15}$/",$contrasena)) {
			$errores.=("contrasena incorrecta,");
		}

		# Se elimina la ultima coma (,)
		$errores = trim($errores, ',');

		# Si hay errores se retorna error 400.
		if(strcasecmp($errores,'') != 0){
			$data = array(
					'status' => 'error',
					'code' => 400,
					'message' => $errores
				);
    		return response()->json($data,400);
		}

		#validar confirmación de contraseñas.
		if (strcmp($contrasena, $confirmacionContrasena) !== 0) {
		    $data = array(
					'status' => 'error',
					'code' => 400,
					'message' => 'Las contrasenas no coinciden'
				);
    		return response()->json($data,400);
		}

		// Se ingresa el usuario nuevo.		
		$user           = new Usuarios();
		$user->idRol                  = $idRol;
		$user->usuarioSistema         = $usuarioSistema;		
		$user->correoelectronico      = $email;
		$user->indicadorPrimerIngreso = 'SI';
		$user->AuditoriaUsuario       = 1;
		$user->fechaCreacion          = date("Y-m-d H:i:s");
		
		//Se encripta la contraseña.
		$pwd = hash('sha256', $contrasena);
		$user->contrasena = $pwd;

		// comprobar que usuario no este creado.
		$isset_user = Usuarios::where('usuarioSistema', $usuarioSistema)->first();
		if( count((array) $isset_user) == 0){
			$user->save();
			$data = array(
				'status' => 'success',
				'code' => 200,
				'message' => 'Usuario registrado correctamente'
			);
		}else{
			$data = array(
				'status' => 'error',
				'code' => 400,
				'message' => 'Usuario ya se encuentra creado'
			);
		}
		return response()->json($data,200);
    }

    public function Login(Request $request){
    	$jwtauth = new JwtAuth();

    	echo($request->input('email'));

    	//recibir POST
		// $json   = $request->input('json',null);
		// $params = json_decode($json);



		// $email    = (!is_null($json) && isset($params->email)) ? $params->email : null;
		// $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
		// $getToken = (!is_null($json) && isset($params->gettoken)) ? $params->gettoken : null;

  //   	//cifrar pass
  //   	$pwd = hash('sha256',$password);

  //   	if(!is_null($email) && !is_null($password) && (is_null($getToken) || $getToken == 'false') ){
  //   		$singup = $jwtauth->singup($email, $pwd);
  //   	}elseif ($getToken != null) {
  //   		$singup = $jwtauth->singup($email, $pwd, $getToken);
  //   	}else{
  //   		$singup = array(
  //   			'status' => 'error',
  //   			'message' => 'enviar tus datos por post'
  //   		);  
  //   	}
  //   	return response()->json($singup,200);
    }
}
