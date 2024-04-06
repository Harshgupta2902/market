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

	public function index($category,$slug){

        $data['nav'] = $this->nav;
        $data['data'] = $this->db->where('slug', $slug)->get('blogs')->row(); 
        $data['metaData'] = array(
            'seo_title' => $data['data']->meta_title,
            'seo_desc' => $data['data']->meta_description,
            'seo_keys' => $data['data']->meta_keywords,
            'seo_canonicals' => base_url().'blogs/'.$category.'/'.$slug,
            'robots' => $data['data']->robots
        );

        $data['category'] = $this->getCategoryCount();
        $data['featured'] = $this->getFeatured($category, $slug);
        
		$this->load->view('blog/details', $data);
        if ($data['data']) {
            $this->db->set('views', 'views+1', FALSE)->where('slug', $slug)->update('blogs');
        }
	}

    public function blogs(){
        $data['metaData'] = $this->ViewsModel->getSeoDetails('Blogs');
        $data['nav'] = $this->nav;

        $query = $this->db->select('id, title, created_at, category, image, slug, alt_keyword, description')->where('published', 1)->order_by('views', 'DESC')->get('blogs')->result_array();
        $data['latestblogs'] = $query[0];
        $data['featuredblogs'] = array_slice($query, 1,3);
        $data['otherblogs'] = array_slice($query, 4);
        $data['otherblogs'] = $query;
        $data['category'] = $this->getCategoryCount();


		$this->load->view('blog/home', $data);
	}

    public function comment(){
        $blog_id = $this->input->post('blog_id');
        $category = $this->input->post('category');   
        $slug = $this->input->post('slug');
        $comment = $this->input->post('comment');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');

        $data = array(
            'blog_id' => $blog_id,
            'slug' => $slug,
            'comment' => $comment,
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
    
        
        $this->db->insert('comments', $data);
        redirect("blogs/$category/$slug");
    }

    private function getCategoryCount() {
        $this->db->select('category');
        $this->db->from('blogs');
        $this->db->group_by('category');
        $query = $this->db->get();
    
        $category_counts = array();
        foreach ($query->result() as $row) {
            $this->db->where('category', $row->category);
            $count = $this->db->count_all_results('blogs');
            $category_counts[$row->category] = $count;
        }
    
        return $category_counts;
    }

    private function getFeatured($category, $currentSlug){
        // Fetch 4 featured blogs excluding the current slug
        $this->db->select('*')
                 ->from('blogs')
                 ->where('category', $category)
                 ->where('slug !=', $currentSlug)
                 ->order_by('views', 'DESC')
                 ->limit(4);
        return $this->db->get()->result();
    }


}

