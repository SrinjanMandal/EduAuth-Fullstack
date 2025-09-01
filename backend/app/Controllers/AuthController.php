<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends ResourceController {
    private $jwtKey = 'supersecretkey';
    public function register() {
        $userModel = new UserModel();
        $data = $this->request->getJSON(true);
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $userModel->insert($data);
        return $this->respond(['status' => 'registered']);
    }
    public function login() {
        $userModel = new UserModel();
        $data = $this->request->getJSON(true);
        $user = $userModel->where('email',$data['email'])->first();
        if ($user && password_verify($data['password'], $user['password'])) {
            $payload = [
                'sub' => $user['id'],
                'email' => $user['email'],
                'iat' => time(),
                'exp' => time()+3600
            ];
            $jwt = JWT::encode($payload, $this->jwtKey, 'HS256');
            return $this->respond(['token'=>$jwt]);
        }
        return $this->failUnauthorized('Invalid credentials');
    }
}