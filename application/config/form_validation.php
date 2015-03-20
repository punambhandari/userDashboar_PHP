<?php
$config = array(
                 'register' => array(
                                    array(
                                            'field' => 'first_name',
                                            'label' => 'First Name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'Last Name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email Address',
                                            'rules' => 'required|valid_email'
                                         ),
                                     array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required|min_length[8]'
                                         ),
                                    array(
                                            'field' => 'confirm_password',
                                            'label' => 'Password Confirmation',
                                            'rules' => 'required|matches[password]'
                                         ),
                                   
                                    ),
                 'login' => array(
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email Address',
                                            'rules' => 'required|valid_email|callback_login_password_exists'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required'
                                         ),
                                 
                                    ),   
                'profile-info' => array(

                                    array(
                                            'field' => 'first_name',
                                            'label' => 'First Name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'last_name',
                                            'label' => 'Last Name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email Address',
                                            'rules' => 'required|valid_email'
                                         ),
                                   
                                    ),



                'profile-password' =>array(
                                        array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required|min_length[8]'
                                         ),
                                    array(
                                            'field' => 'confirm_password',
                                            'label' => 'Password Confirmation',
                                            'rules' => 'required|matches[password]'
                                         ),
                                   
                                    ),
                'profile-desc' =>array(
                                        array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'required|max_length[500]'
                                         ),
                                   
                                    )                               
               );
?>