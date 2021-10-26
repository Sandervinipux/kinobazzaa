<?php

defined('BASEPATH') OR exit('No direc script access alowwed');

class Main extends MY_Controller {
    public function __contrast() {
        parent::__contrast();
    }

    public function index() {
        $this->data['title'] = "Главная страница";

        $this->load->model('Films_model');
        $this->data['movie'] = $this->Films_model->getFilms(FALSE, 8, 1);
        $this->data['serials'] = $this->Films_model->getFilms(FALSE, 8, 2);

        $this->load->model('Posts_model');
        $this->data['posts'] = $this->Posts_model->getPosts(FALSE);

        $this->load->view('templates/header', $this->data);
        $this->load->view('main/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function rating() {
        $this->data['title'] = "Рейтинг фильмов";

        $this->load->library('pagination');
        $offset = (int) $this->uri->segment(2);
        $row_count = 5;
        $count = count($this->Films_model->getMoviesOnPageByRating(0, 0));
        $P_config['base_url'] = '/rating';
        $this->data['movie'] = $this->Films_model->getMoviesOnPageByRating($row_count, $offset);

        $p_config['total_rows'] = $count;
        $p_config['per_page'] = $row_count;

        $p_config['full_tag_open'] = "<ul class ='pagination'>";
        $p_config['full_tag_close'] = "</ul>";
        $p_config[''] = "<>";
    }
}