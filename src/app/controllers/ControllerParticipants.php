<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Models\ModelParticipants;

class ControllerParticipants extends Controller
{
    private $table = "users";

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::getInstance();
    }

    public function actionIndex()
    {
        $data['url'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $data["userCount"] = ModelParticipants::userСount();
        $this->view->generate("template", "participantsFomrs", $data);
    }

    public function actionRegister()
    {
        $data = [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'birthdate' => $_POST['birthdate'],
            'report_subject' => $_POST['reportsubject'],
            'country' => $_POST['country'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email']
        ];

        $isRegistered = ModelParticipants::isEmailExists($data['email']);

        if (!$isRegistered) {
            $result = $this->db->insert($this->table, $data);
            $id = ModelParticipants::isEmailExists($data['email']);
            $userID = $id[0]['id'];
            $count = ModelParticipants::userСount();
            echo json_encode([
                'status' => $result ? 'ok' : 'error',
                'id' => $userID,
                'count' => $count
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'massege' => "This email is already in use!"
            ]);
        }
    }

    public function actionUserCount()
    {
        $count = ModelParticipants::userСount();
        echo json_encode([
            'count' => $count
        ]);
    }

    public function actionOverwrite()
    {
        if (!empty($_FILES['photo'])) {
            $path = "/src/upload/" . substr(md5(microtime()), mt_rand(0, 30), 2) . "/";
            $tmpPath = $_SERVER["DOCUMENT_ROOT"] . $path;
            ModelParticipants::savePhoto($tmpPath, $_FILES);
            $path = $path . $_FILES['photo']['name'];
        } else {
            $path = "/src/upload/def.jpg";
        }

        $data = [
            'company' => $_POST['company'],
            'position' => $_POST['position'],
            'about_me' => $_POST['about_me'],
            'photo' => $path,
            'id' => $_POST['id']
        ];

        $where = "id = :id";

        $result = $this->db->update($this->table, $data, $where);

        echo json_encode([
            'status' => $result ? 'ok' : 'error'
        ]);
    }

    public function actionShowAllMembers()
    {
        if(ModelParticipants::userСount()) {
            $data['members'] = $this->db->select($this->table, [], ['photo', 'firstname', 'lastname', 'report_subject', 'email']);
            $this->view->generate("template", "allMembers", $data);
        } else {
            header('Location: /src/');
        }
    }
}
