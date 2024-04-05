<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('AdminModel');
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function process_login()
    {
        $staticUsername = 'harsh';
        $staticPassword = '123456';
        $name = 'Harsh Gupta';

        // Retrieve user input
        $inputUsername = $this->input->post('email');
        $inputPassword = $this->input->post('password');

        if ($inputUsername == $staticUsername && $inputPassword == $staticPassword) {
            $this->session->set_userdata('name', $name);
            redirect('dashboard');
        } else {
            $data['error'] = 'Invalid username or password';
            $this->load->view('login', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function dashboard()
    {
        $this->check_admin_session();
        $this->load->view('admin/dashboard');
    }

    public function addnavbarform()
    {
        $this->check_admin_session();
        if ($this->input->post()) {
            $this->set_navbar_form_validation();
            if ($this->form_validation->run() == true) {
                $data = $this->get_navbar_form_data();
                $insert_id = $this->AdminModel->insert_nav_data($data);
                if ($insert_id) {
                    redirect('allnavs');
                } else {
                    echo 'Error inserting data into the database.';
                }
            }
        }
        $this->load->view('admin/addnav');
    }

    public function makeFeatured($postId, $featured)
    {
        // $postId = $this->input->post('blogId');
        // $featured = $this->input->post('featured');
        if (!empty($postId)) {
            $data = ['published' => $featured];
            $this->db->where('id', $postId);
            $this->db->update('blogs', $data);
            redirect('allblogs');
        } else {
            echo 'Post ID is required.';
        }
    }

    public function allnavs()
    {
        $this->check_admin_session();
        $data['data'] = $this->AdminModel->get_nav_data();
        $this->load->view('admin/allnav', $data);
    }

    public function addseodetails()
    {
        $this->check_admin_session();
        if ($this->input->post()) {
            $this->set_seo_form_validation();

            if ($this->form_validation->run() == true) {
                $seoData = $this->get_seo_form_data();

                $insert_id = $this->db->insert('seo_details', $seoData);
                if ($insert_id) {
                    redirect('seolist');
                } else {
                    $this->show_error_message('Error inserting data into the database.');
                }
            }
        }
        $data['page_url'] = $this->db->get('nav')->result_array();
        $this->load->view('admin/addseo', $data);
    }

    public function seolist()
    {
        $this->check_admin_session();
        $data['seo_details'] = $this->AdminModel->get_seo_data();
        $this->load->view('admin/seolist', $data);
    }

    public function pageview()
    {
        $this->check_admin_session();
        $data['page'] = $this->AdminModel->get_page_view_data();
        $this->load->view('admin/pageview', $data);
    }

    public function ipolist()
    {
        $this->check_admin_session();
        $data = $this->AdminModel->get_ipo_data();
        $this->load->view('admin/ipodata', $data);
    }

    public function allblogs()
    {
        $this->check_admin_session();
        $data['allBlogs'] = $this->AdminModel->get_all_blogs();
        $this->load->view('admin/allblogs', $data);
    }

    public function addblogs()
    {
        $this->check_admin_session();
        $this->load->view('admin/addblog');
    }

    public function deleteblog()
    {
        $this->check_admin_session();

        $blogId = $this->input->get('id');
        if (!empty($blogId) && is_numeric($blogId)) {
            $this->db->where('id', $blogId);
            $this->db->delete('blogs');
            redirect('allblogs');
        } else {
            redirect('allblogs');
        }
    }

    public function editblogs()
    {
        $this->check_admin_session();

        $blogId = $this->input->get('id');

        if (!empty($blogId) && is_numeric($blogId)) {
            $query = $this->db->where('id', $blogId)->get('blogs');
            if ($query->num_rows() > 0) {
                $data['blog'] = $query->row_array();
                $this->load->view('admin/editblog', $data);
            } else {
                echo 'Blog not found'; // You can modify this part as per your application's logic
            }
        }
    }

    public function updateblog()
    {
        $id = $this->input->post('blog_id');
        if ($id) {
            $this->form_validation->set_rules('post_name', 'Post Name', 'required');
            $this->form_validation->set_rules('short_description', 'Short Description', 'required');
            $this->form_validation->set_rules('description', 'Post Body', 'required');
            $this->form_validation->set_rules('tags', 'Tags', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('alt_keyword', 'Alt Keyword', 'required');
            $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
            $this->form_validation->set_rules('robots', 'Robots', 'required');
            $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
            $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'required');

            if ($this->form_validation->run() == true) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 4096;
                $config['file_name'] = $this->input->post('alt_keyword');
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $image_data = $this->upload->data();

                    $Blogdata = [
                        'title' => $this->input->post('post_name'),
                        'type' => $this->input->post('poll'),
                        'description' => $this->input->post('short_description'),
                        'blog' => $this->input->post('description'),
                        'image' => base_url() . 'uploads/' . $this->input->post('alt_keyword') . $image_data['file_ext'],
                        'alt_keyword' => $this->input->post('alt_keyword'),
                        'tags' => $this->input->post('tags'),
                        'category' => $this->input->post('category'),
                        'featured' => $this->input->post('featured'),
                        'slug' => $this->create_slug($this->input->post('post_name')),
                        'meta_description' => $this->input->post('meta_description'),
                        'meta_title' => $this->input->post('meta_title'),
                        'robots' => $this->input->post('robots'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                    ];
                    $this->db->where('id', $id); // Assuming 'id' is the primary key column
                    $this->db->update('blogs', $Blogdata);
                    redirect('allblogs');
                } else {
                    $Blogdata = [
                        'title' => $this->input->post('post_name'),
                        'type' => $this->input->post('poll'),
                        'description' => $this->input->post('short_description'),
                        'blog' => $this->input->post('description'),
                        'alt_keyword' => $this->input->post('alt_keyword'),
                        'tags' => $this->input->post('tags'),
                        'category' => $this->input->post('category'),
                        'featured' => $this->input->post('featured'),
                        'slug' => $this->create_slug($this->input->post('post_name')),
                        'meta_description' => $this->input->post('meta_description'),
                        'meta_title' => $this->input->post('meta_title'),
                        'robots' => $this->input->post('robots'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                    ];
                    $this->db->where('id', $id); // Assuming 'id' is the primary key column
                    $this->db->update('blogs', $Blogdata);

                    redirect('allblogs');
                }
            } else {
                echo validation_errors();
            }
        } else {
            redirect('allblogs');
        }
    }

    public function createPost()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('post_name', 'Post Name', 'required');
            $this->form_validation->set_rules('short_description', 'Short Description', 'required');
            $this->form_validation->set_rules('description', 'Post Body', 'required');
            $this->form_validation->set_rules('tags', 'Tags', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('alt_keyword', 'Alt Keyword', 'required');
            $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
            $this->form_validation->set_rules('robots', 'Robots', 'required');
            $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
            $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');

            if ($this->form_validation->run() == true) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 4096;
                $config['file_name'] = $this->input->post('alt_keyword');
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $image_data = $this->upload->data();

                    $Blogdata = [
                        'title' => $this->input->post('post_name'),
                        'description' => $this->input->post('short_description'),
                        'blog' => $this->input->post('description'),
                        'image' => base_url() . 'uploads/' . str_replace(' ', '_', $this->input->post('alt_keyword')) . $image_data['file_ext'],
                        'alt_keyword' => $this->input->post('alt_keyword'),
                        'tags' => $this->input->post('tags'),
                        'category' => $this->input->post('category'),
                        'slug' => $this->create_slug($this->input->post('post_name')),
                        'meta_description' => $this->input->post('meta_description'),
                        'meta_title' => $this->input->post('meta_title'),
                        'robots' => $this->input->post('robots'),
                        'meta_keywords' => $this->input->post('meta_keywords'),
                        'author' => $this->input->post('author'),
                    ];
                    $this->db->insert('blogs', $Blogdata);
                    $blog_id = $this->db->insert_id();
                    redirect('allblogs');
                } else {
                    $upload_error = $this->upload->display_errors();
                    echo "Image Upload Error: $upload_error";
                }
            } else {
                echo validation_errors();
            }
        } else {
            redirect('allblogs');
        }
    }

    // ////////////////         PRIVATE FUNCTIONS         //////////////////////////

    private function create_slug($title)
    {
        $slug = strtolower($title);
        $slug = str_replace(' ', '-', $slug);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        return $slug;
    }

    private function set_seo_form_validation()
    {
        $this->form_validation->set_rules('seo_title', 'SEO Title', 'required');
        $this->form_validation->set_rules('seo_desc', 'SEO Description', 'required');
        $this->form_validation->set_rules('seo_keys', 'SEO Keywords', 'required');
        $this->form_validation->set_rules('seo_canonicals', 'SEO Canonicals', 'required');
    }

    private function get_seo_form_data()
    {
        $canonicals = $this->input->post('seo_canonicals');
        return [
            'seo_title' => $this->input->post('seo_title'),
            'seo_desc' => $this->input->post('seo_desc'),
            'seo_keys' => $this->input->post('seo_keys'),
            'seo_canonicals' => base_url($canonicals),
            'seo_page' => $canonicals,
        ];
    }

    private function check_admin_session()
    {
        if (!$this->session->userdata('name')) {
            redirect('admin/login');
        }
    }

    private function set_navbar_form_validation()
    {
        $this->form_validation->set_rules('subnav', 'Page Name', 'required');
        $this->form_validation->set_rules('url', 'Page Route', 'required');
        $this->form_validation->set_rules('nav', 'Main Nav', 'required');
    }

    private function get_navbar_form_data()
    {
        return [
            'subnav' => $this->input->post('subnav'),
            'url' => $this->input->post('url'),
            'nav' => $this->input->post('nav'),
            'status' => 1,
        ];
    }
}
