<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class CampusController extends BaseController
{
    public function index()
    {
        return view('setup/campus');
    }
    public function add()
    {
        $data = [
            'code' => $this->request->getPost('code'),
            'campus_name' => $this->request->getPost('campus_name'),
            'location' => $this->request->getPost('location'),
            'create_at' => date('Y-m-d H:i:s')  
        ];
        $db= Database::connect();
        $builder = $db->table('campus');
        $builder->insert($data);
        return $this->response->setJSON([
            'error' => false,
            'message' => 'Successfully added new post!'
        ]);
        return;
    }

    public function table(){
        $db = Database::connect();
        $builder = $db->table('campus');
        $query   = $builder->get();
        $campus = $query->getResult();
        $data['record'] = $campus;
        
        return view('setup/campus_table', $data);
    }

    public function getModal()
    {
        $data = array();

        $request = \Config\Services::request();
        $formFields = $request->getPost();
        if ($formFields['uid'] != "add") {
            $db = Database::connect();
            $builder = $db->table('campus')->where('id', $formFields['uid']);
            $query   = $builder->get();
            $data = $query->getResult();
            $data = $data[0];
            $data = json_decode(json_encode($data), true);
        }

        $data['uid'] = $formFields['uid'];

        return view('setup/campus_manage', $data);
    }

    public function saveData(){
        $return  = array('status' => 0,'title' => "Error", 'msg' => "Server Error");
        $request = \Config\Services::request();
        $formFields = $request->getPost();
        // echo "<pre>";
        // print_r($formFields);
        // die;
        $id = $formFields['uid'];
        
        unset($formFields['uid']);
        if($formFields['code'] == ""){
            $return  = array('status' => 2, 'title' => "Info", 'msg' => "Code is required");
            return $this->response->setJSON($return);
        }

        $db = Database::connect();
        $builder = $db->table('campus');

        if($id != "add"){
            $builder->where('id', $id);
            $queryChecker = $builder->update($formFields);
            $return  = array('status' => 1, 'title' => "Success", 'msg' => "Updated campus data");
        }else{
            $queryChecker = $builder->insert($formFields);
            $return  = array('status' => 1, 'title' => "Success", 'msg' => "Added campus data");
        }

        if(!$queryChecker){
            $return  = array('status' => 0, 'title' => "Error", 'msg' => "Database Error");
        }

        return $this->response->setJSON($return);
    }

    public function deleteData()
    {
        $return  = array('status' => 0, 'title' => "Error", 'msg' => "Server Error");
        $request = \Config\Services::request();
        $formFields = $request->getPost();
        // echo "<pre>";
        // print_r($formFields);
        // die;
        $id = $formFields['uid'];

        $db = Database::connect();
        $builder = $db->table('campus');

        $builder->where('id', $id);
        $queryChecker = $builder->delete();

        $return  = array('status' => 1, 'title' => "Success", 'msg' => "Deleted campus data");

        if (!$queryChecker) {
            $return  = array('status' => 0, 'title' => "Error", 'msg' => "Database Error");
        }

        return $this->response->setJSON($return);
    }

}
