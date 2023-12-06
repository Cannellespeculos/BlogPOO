<?php 
    class Blog {
        public $id;
        public $title;
        public $content;
        public $date;
        public $image;

        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function getContent() {
            return $this->content;
        }

        public function setContent($content) {
            $this->content = $content;
        }

        public function getImage() {
            return $this->image;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate($date) {
            $this->date = $date;
        }
    }
?>