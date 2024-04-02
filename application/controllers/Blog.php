<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('ViewsModel');
        $this->nav = $this->ViewsModel->nav();

    }

	public function index($slug){
        $data['metaData'] = $this->ViewsModel->getSeoDetails('Crypto');
        $data['nav'] = $this->nav;
		$this->load->view('blog/details', $data);
	}

    public function blogs(){
        $data['metaData'] = $this->ViewsModel->getSeoDetails('Crypto');
        $data['nav'] = $this->nav;
		$this->load->view('blog/home', $data);
	}


    	public function createPost() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('post_name', 'Post Name', 'required');
            $this->form_validation->set_rules('short_description', 'Short Description', 'required');
            $this->form_validation->set_rules('description', 'Post Body', 'required');
            $this->form_validation->set_rules('tags', 'Tags', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('alt_keyword', 'Alt Keyword', 'required');
            $this->form_validation->set_rules('poll', 'Post Type', 'required');
            $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
            $this->form_validation->set_rules('robots', 'Robots', 'required');
            $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
            $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'required');
            $this->form_validation->set_rules('slug', 'Post Slug', 'required');
			
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 4096;
				$config['file_name'] = $this->input->post('alt_keyword');
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $image_data = $this->upload->data();

					$Blogdata = array(
						'title' => $this->input->post('post_name'),
						'type' => $this->input->post('poll'),
						'description' => $this->input->post('short_description'),
						'blog' => $this->input->post('description'),
						'image' => base_url().'uploads/' . $this->input->post('alt_keyword') . $image_data['file_ext'],
						'alt_keyword' => $this->input->post('alt_keyword'),
						'tags' => $this->input->post('tags'),
						'category' => $this->input->post('category'),
						'featured' => $this->input->post('featured'),
                        'slug' => $this->input->post('slug')

					);
					$this->db->insert('blogs', $Blogdata);
					$blog_id = $this->db->insert_id();

					if($blog_id){
						$meta_description = $this->input->post('meta_description');
						$meta_title = $this->input->post('meta_title');
						$robots = $this->input->post('robots');
						$meta_keywords = $this->input->post('meta_keywords');

						$metaData = array(
							'meta_description' => $this->input->post('meta_description'),
							'meta_title' => $this->input->post('meta_title'),
							'blog_id' => $blog_id,
							'robots' => $this->input->post('robots'),
							'meta_keywords' => $this->input->post('meta_keywords'),

						);
						$this->db->insert('metadata', $metaData);

                        redirect('allBlogs');
					}

                } else {
                    $upload_error = $this->upload->display_errors();
                    echo "Image Upload Error: $upload_error";
                }
            } else {
                echo validation_errors();
            }
        } else {
            redirect('allBlogs');
        }
    }
}
