<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

  public function upload_file()
  {
    $file_element_name = 'file';
    $response = array();
    $config['upload_path'] = './public/assets/img/store/';
    $config['allowed_types'] = 'gif|jpg|png|doc|txt';
    $config['max_size'] = 1024 * 8;
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload($file_element_name))
    {
      $msg = $this->upload->display_errors('', '');
      $response = array(
        'status' => false,
        'msg' => $msg
      );
    }
    else
    {
      $data = $this->upload->data();
      if(isset($data['file_name']))
      {
        $response = array(
          'status' => true,
          'file_name' => $data['file_name']
        );
      }
      else
      {
        unlink($data['full_path']);
        $response = array(
          'status' => false,
          'msg' => 'Something went wrong when saving the file, please try again.'
        );
      }
    }
    @unlink($_FILES[$file_element_name]);
    echo json_encode($response);
  }
}
