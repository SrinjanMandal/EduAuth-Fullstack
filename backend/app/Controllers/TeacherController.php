<?php
namespace App\Controllers;
use App\Models\TeacherModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TeacherController extends ResourceController {
    private $jwtKey = 'supersecretkey';
    private function authUser() {
        $header = $this->request->getHeaderLine('Authorization');
        if (!$header) return null;
        $token = str_replace('Bearer ','',$header);
        try {
            $decoded = JWT::decode($token, new Key($this->jwtKey,'HS256'));
            return $decoded->sub;
        } catch(\Exception $e) { return null; }
    }
    public function create() {
        $userId = $this->authUser();
        if (!$userId) return $this->failUnauthorized('No token');
        $data = $this->request->getJSON(true);
        $teacherModel = new TeacherModel();
        $teacherModel->insert($data);
        return $this->respond(['status'=>'teacher_created']);
    }
    public function list() {
        $userId = $this->authUser();
        if (!$userId) return $this->failUnauthorized('No token');
        $teacherModel = new TeacherModel();
        return $this->respond($teacherModel->findAll());
    }
}