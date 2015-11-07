<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snipp extends CI_Controller{
    function do_edit(){
        // set vars
        $id       = $this->input->post('id');
        $username = $this->input->post('username');
        $level    = $this->input->post('level');
        $phone    = $this->input->post('phone');
        $address  = $this->input->post('address');
        $company  = $this->input->post('company');
        $password = $this->input->post('password');

        // if avatar
        if ($this->input->post('u_avatar'))
        {
            $config = array(
                'upload_path' => '.uploads/user/avatar/',
                'allowed_types' => 'jpg|png|gif',
                'max_size' => 250,
                'encrypt_name' => TRUE
            );

            $this->load->library('upload');
            $this->upload->initialize($config);

            $field_name = "u_avatar";
            $this->upload->do_upload($field_name);

            // getting vars
            $a_avatar = $this->upload->data();
            $avatar = $a_avatar['file_name'];

            $data['s_avatar'] = $avatar;
        }

        // ion auth update
        $data = array(
            'username' => $username,
            'company'  => $company,
            'phone'    => $phone,
            'address'  => $address
        );

        //if ($this->input->post('password') == $this->input->password('password_confirm'))
        //{
        //    $data['password'] = $this->input->post('password');
        //}
        //else
        //{
            // set error message
        //}

        // update usergroup
        $groupData = $level;
        if (isset($groupData) && !empty($groupData)) {

            $this->ion_auth->remove_from_group('', $id);

            foreach ($groupData as $grp) {
                $this->ion_auth->add_to_group($grp, $id);
            }

        }

        //$this->ion_auth->update($id,$data);
        //redirect('admin/account','refresh');
        echo "<pre>";
		die(print_r($data, TRUE));

	}
}
