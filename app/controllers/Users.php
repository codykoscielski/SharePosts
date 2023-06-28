<?php
    #[AllowDynamicProperties] class Users extends  Controller {
        public function __construct(){
            //Load the model
            $this->userModel = $this->model('User');
        }

        //Register the user
        public function register() {
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process the form
                //Sanitize the post data
                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_error' => ''
                ];

                //Validate the email
                if(empty($data['email'])) {
                    $data['email_error'] = 'Please enter an email';
                } else {
                    //Check email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_error'] = 'Email already used';
                    }
                }
                //Validate the name
                if(empty($data['name'])) {
                    $data['name_error'] = 'Please enter name';
                }
                //Validate the password
                if(empty($data['password'])) {
                    $data['password_error'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6) { //Check to see if the password is less than 6 characters
                    $data['password_error'] = 'Password must be at least 6 characters';
                }
                //Validate confirm password
                if(empty($data['confirmPassword'])) {
                    $data['confirm_error'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirmPassword']) {
                        $data['confirm_error'] = 'Password do not match';
                    }
                }

                //Make sure error are empty
                if(empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_error']) && empty($data['email_error'])) {
                    //Validated
                    die('SUCCESS');
                } else {
                    //Load the view
                    $this->view('users/register', $data);
                }
            } else {
                //Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_error' => ''
                ];

                //Load the view
                $this->view('users/register', $data);
            }
        }

        public function login() {
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process the form
                //Sanitize the data
                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => '',
                ];

                //Validate the email
                if(empty($data['email'])) {
                    $data['email_error'] = 'Please enter a email';
                }
                //Validate the password
                if(empty($data['password'])) {
                    $data['password_error'] = 'Please enter a password';
                }

                //Make sure all errors are empty, process the form
                if(empty($data['name_error']) && empty($data['password_error'])) {
                    die('SUCCESS');
                } else {
                    $this->view('users/login', $data);
                }

            } else {
                //Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => '',
                ];

                //Load the view
                $this->view('users/login', $data);
            }
        }
    }