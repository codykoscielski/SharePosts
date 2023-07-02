<?php
    class Pages extends Controller {
        private $postModel;
        public function __construct() {

        }

        public function index(): void {
            if(isLoggedIn()) {
                redirect('posts');
            }
            $data = [
                'title' => 'SharePosts',
                'desc' => 'Simple Social Network Built on a PHP MVC Framework'
            ];
            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About',
                'desc' => 'App to share posts with out users'
            ];
            $this->view('pages/about', $data);
        }
    }