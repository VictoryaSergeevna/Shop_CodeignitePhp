<?php
#defined('BASEPATH') or exit ('No direct script access allowed');
class Home extends CI_Controller
{
public function __construct()
{
parent::__construct();
$this->load->model('home_model');
}
public function index()
{
$data['title']='Pages1';
$data['text']='The list of Items';
$data['items']=array('Ring Around the Sun','Time is the Simplest Thing', 'Way Station','All Flesh Is Grass','The Goblin Reservation','The Followship of the Talisman');
$this->load->view('page1',$data);
}
public function ItemsList()
{
	$data['items']=$this->home_model->getItems();
	$data['title']='List Of Items';
	$this->load->view('items',$data);
}

public function getItemInfo()
{
	$send=$this->input->post('send');
	if(!$send){
		$this->load->view('form_item_id');
	}
	else{
		$id=$this->input->post('itemid');
		$item=$this->home_model->getItemById($id);
		$data['item']=$item;
		$data['title']='Description Of Items'.$id;
		$this->load->view('item_info',$data);
	}
}

public function getItemInfo2()
{
	if(!$this->input->post('send')){
$data['list']=$this->home_model->getItems();
$this->load->view('form_item_id2',$data);
	}
	else{
		$id=$this->input->post('itemid');
		$item=$this->home_model->getItemById($id);
		$data['item']=$item;
		$data['title']='Description Of Items'.$id;
		$this->load->view('item_info',$data);
	}
}

public function selectImages()
{
	$send=$this->input->post('send');
	if(!$send){
		$this->load->view('form_upload');
	}
	else{
		$config['upload_path']='./assets/images/';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$config['max_size']=2048;
		$config['max_width']=1024;
		$config['max_height']=768;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('image')){
			$data=array('error'=>$this->upload->display_errors());
			$this->load->view('form_upload',$data);
		}
		else{
			$info=array('upload_data'=>$this->upload->data());
			//path to the uploaded images folder
            $path='assets/images/';
           //create array $data for model method
           $data=array('itemid'=>1, 'imagepath'=>$path.$info['upload_data']['file_name']);
           $itemid=$this->home_model->addImages($data);      
           $info = array('result' => 'Successfuly Inserted New Image With Id='.$itemid);
           $this->load->view('form_upload', $info);

		}
	}
}

public function selectMultipleImages()
{
$send=$this->input->post('send');
if(!$send)
$this->load->view('form_upload_multiple');
else
{
$config['upload_path'] = './assets/images/';
$config['allowed_types'] ='gif|jpg|png|jpeg';
$config['max_size'] = 2048;
$config['max_width'] = 1024;
$config['max_height'] = 768;
//now we initialize the upload library
$this->load->library('upload', $config);
//we retrieve the number of files that were uploaded
$number_of_files = sizeof($_FILES['upfile']['tmp_name']);
//we create array $files out of uploaded files
$files = $_FILES['upfile'];
$error = array();
$success = array();
//now, taking into account that there can be more than one file,
//we use loop to process all the files
for ($i = 0; $i < $number_of_files; $i++)
{
$_FILES['upfile']['name'] =$files['name'][$i];
$_FILES['upfile']['type'] =$files['type'][$i];
$_FILES['upfile']['tmp_name'] =$files['tmp_name'][$i];
$_FILES['upfile']['error'] = $files['error'][$i];
$_FILES['upfile']['size'] =$files['size'][$i];
if($_FILES['upfile']['error'][$i] != 0)
{
$error['msg'.$i]='Not uploaded file'.$_FILES['upfile']['name'][$i];
continue;
}
if (!$this->upload->do_upload('upfile'))
{
$error['msg'.$i]= 'Not uploaded file'.$_FILES['upfile']['name'][$i];
}
else
{
$final_files_data[] = $this->upload->data();
//Continue processing the uploaded data receive data about upload
$info = array('upload_data' =>$this->upload->data());
//path to the uploaded images folder
$path='assets/images/';
//create array for model method 
$data=array('itemid'=>2,'imagepath'=>$path.$info['upload_data']['file_name']);
$itemid=$this->home_model->addImages($data);
//create array for upload form with success message
$success['msg'.$i]= 'Successfuly Inserted New Image With Id='.$itemid;
}
}
var_dump($success);
echo '<br/>';
var_dump($error);
$result['error']=$error;
$result['success']=$success;
$this->load->view('form_upload_multiple',$result);
}
}


function registration()
{
$this->load->library('form_validation');
$this->form_validation->set_rules('login', 'User name',
'trim|required|min_length[4]|max_length[20]|is_unique[customers.login]',
array('required' => 'You have not filled %s.', 'is_unique' => 'Value %s already exists.')
);
          
$this->form_validation->set_rules('pass1', 'Password',                                         'trim|required|min_length[4]|max_length[12]'); 
          
$this->form_validation->set_rules('pass2', 'Password Confirmation','required|matches[pass1]');

$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

if ($this->form_validation->run() == FALSE)
{
$this->load->view('form_validation'); 
}
else
{
$data['success']='Form data passed the validation'; 

$data=array('login'=>$this->input->post('login'), 'pass'=>$this->input->post('pass1'), 'email'=>$this->input->post('email'));
$customers=$this->home_model->registration($data); 

$this->load->view('form_validation',$data);
}
}

function showMap()
{
$this->load->library('googlemaps');
$config['center'] = '51.5137415,-0.5514789';
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);
$marker = array();
$marker['position'] ='47.9406517,33.4124548';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();
$this->load->view('view_map', $data);
}

}
?>
