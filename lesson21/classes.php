<?php
class Publication {
    public $id;
    public $title;
    public $date;
    public $short_content;
    public $content;
    public $preview;
    public $author_name;
    public $type;

    function __construct($row){
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->date = $row['date'];
        $this->short_content = $row['short_content'];
        $this->preview = $row['preview'];
        $this->author_name = $row['author_name'];
        $this->type = $row['type'];
    }
}

class NewsPublication extends Publication{
    public function printItem(){
        echo '<br/>Новость:'.$this->title;
        echo '<br/>Дата:'.$this->date;
    }
}

class ArticlePublication extends Publication{
    public function printItem(){
        echo '<br/>Новость:'.$this->title;
        echo '<br/>Автор:'.$this->author_name;
    }
}

class PhotoPublication extends Publication{
    public function printItem(){
        echo '<br/>Новость:'.$this->title;
        echo '<br/><img height="200px" width="200px" src="images/"'.$this->preview.'"/>';
    }
}