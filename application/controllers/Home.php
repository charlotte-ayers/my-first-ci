<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $per_page = 5;

    /**
     * * Index Page for this controller. Displays a list of Todos. /
     */
    public function index($offset = null) {
        $this->load->model('Todo');
        $this->load->library('table');
        $this->load->helper('url');
        $this->output->set_template('default');
        $this->output->set_title("Home | My First Codeigniter");
        $this->output->set_meta("description", "This is my first COdeigniter project.");
        $this->output->set_meta("keywords", "Codeigniter");
        $this->load->css('assets/css/main.css');
//$this->load->js('assets/js/main.js');
        $data = $this->_list_items();

        $this->load->view('pages/home', $data);
    }

    /*     * */

    public function add_edit($id = null) {
        $this->load->model('Todo');
        $this->load->helper('url');
        $this->output->set_template('default');
        $this->output->set_title("Add/edit a Todo | Dashboard");
        $this->output->set_meta("description", "Dashboard for Todos.");
        $this->load->css('assets/css/main.css');
        $this->load->js('assets/js/main.js');
        $data = array('id' => $id);
        $this->load->view('pages/add-edit');

            // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
//create method
     //edit
     
     $todo = $this->Todo->get_todo($id);
        } else {
            //add
            $this-> Todo -> 
            
        }
    }

    private function _list_items() {
        $this->load->helper('url');
        $data = $this->_get_list_data();
//pagination (including styling for bootstrap) 
        $this->load->library('pagination');
        $config['base_url'] = base_url() . '/home';
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 2;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //get total row from db
        $config['total_rows'] = $this->Todo->countTodos();
        //config variable passed by reference
        $rows = $this->_get_items($config);
        $config["num_links"] = round($config["total_rows"] / $config["per_page"]);
        $this->pagination->initialize($config);
        $items = array();
        foreach ($rows as $row) {
            $items = $this->_process_items($items, $row);
        } $data['items'] = $items;
        return $data;
    }

    private function _get_items(&$config) {
        $offset = $this->uri->segment($config['uri_segment']);
        return $this->Todo->getTodos($config['per_page'], $offset);
    }

    private function _get_list_data() {
        $tbl_heading = array('0' => array('data' => 'Title', 'class' => 'col-sm-4'), '1' => array('data' => 'Description', 'class' => 'col-sm-5'), '2' => array('data' => 'Action', 'class' => 'col-sm-3'));
        return array('tbl_heading' => $tbl_heading);
    }

    private function _process_items($items, $row) {
        $anchor = anchor('home/add_edit/' . $row->id, 'Edit');
        $anchor .= ' | ' . anchor('home/delete/' . $row->id, 'Delete', array('onclick' => "return confirm('Are you sure you want delete this Todo?')"));
        $items[] = array($row->title, $row->description, $anchor);
        return $items;
    }

    public function delete($id) {
        $this->load->helper('url');
        $this->load->model('Todo');
        $this->Todo->delete($id);
        redirect(base_url('home'));
    }

}
