<?php
class MY_Controller extends CI_Controller {
    public function __cunstruct() {
        parent::__cunstruct();

        $this->data['title'] = "Кинобаза - сайт о кино";

        $this ->load->model('News_model');
        $this->['news'] = $this->News_model->getNews();

        $this-load->model('Films_model');
        $this->data['films'] = $this->Films_model->getFilmsByRating(10);

        $this->data['category'] = "",
    }
}