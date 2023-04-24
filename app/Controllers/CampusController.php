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
            // $data['record'] = DB::table('branches')->where('id', $formFields['uid'])->get();
            // $data = $data['record'][0];
            // $data = json_decode(json_encode($data), true);

            $db = Database::connect();
            $builder = $db->table('campus')->where('id', $formFields['uid']);
            $query   = $builder->get();
            $data = $query->getResult();
        }

        $data['uid'] = $formFields['uid'];
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('setup/campus_manage', $data);
    }

    public function saveData(){
        $request = \Config\Services::request();
        $formFields = $request->getPost();

        echo "<pre>";
        print_r($formFields);
        die;
    }

    public function fetch()
    {
        $db= Database::connect();
        $builder = $db->table('campus');
        $query   = $builder->get();
        $campus = $query->getResult();
        $data = '<table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Campus Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
        if ($campus) {
            foreach ($campus as $dataCampus) {
                $data .= '
            <tr>    
            <td>' . $dataCampus->code . '</td>
            <td>' . $dataCampus->campus_name . '</td>
            <td>' . $dataCampus->location . '</td>
             <td>' . $dataCampus->create_at . '</td>    
                <td><a href="#" id="' . $dataCampus->id . '" data-bs-toggle="modal" data-bs-target="#edit_post_modal" class="btn btn-primary btn-sm post_edit_btn">Edit</a>&nbsp;<a href="#" id="' . $dataCampus->id . '" class="btn btn-danger btn-sm post_delete_btn">Delete</a></td>
                </tr>';
            }
            $data .= '</tbody>  
            </table>';

            return $this->response->setJSON([
                'error' => false,
                'message' => $data
            ]);
        } else {
            return $this->response->setJSON([
                'error' => false,
                'message' => '<div class="text-secondary text-center fw-bold my-5">No posts found in the database!</div>'
            ]);
        }
    }
    public function edit($id = null)
    {
        $request = \Config\Services::request();
        $data = $request->getPost();

        echo "<pre>"; print_r($data);die;
        $postModel = new \App\Models\PostModel();
        $post = $postModel->find($id);
        return $this->response->setJSON([
            'error' => false,
            'message' => $post
        ]);
    }
    public function update()
    {
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('file');
        $fileName = $file->getFilename();
        if ($fileName != 'campus') {
            $fileName = $file->getRandomName();
        }
        $data = [
            'code' => $this->request->getPost('code'),
            'campus_name' => $this->request->getPost('campus_name'),
            'location' => $this->request->getPost('location'),
            'create_at' => date('Y-m-d H:i:s')
        ];
        $postModel = new \App\Models\PostModel();
        $postModel->update($id, $data);
        return $this->response->setJSON([
            'error' => false,
            'message' => 'Successfully updated post!'
        ]);
    }
    public function delete($id = null)
    {
        $postModel = new \App\Models\PostModel();
        $postModel->find($id);
        $postModel->delete($id);
        return $this->response->setJSON([
            'error' => false,
            'message' => 'Successfully deleted post!'
        ]);
    }
    public function detail($id = null)
    {
        $postModel = new \App\Models\PostModel();
        $campus = $postModel->find($id);
        return $this->response->setJSON([
            'error' => false,
            'message' => $campus
        ]);
    }
}
