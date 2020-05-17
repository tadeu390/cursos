<?php
ini_set('display_errors', E_ALL);

class Category
{
    public $name;
}

class Post
{
    public $title;
    public $content;
    private $category;

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory() : Category
    {
        return $this->category;
    }

    public function getAll()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'category' => [
                'name' => $this->category->name,
            ]
        ];
    }
}

$php = new Category;
$php->name = "PHP";

$post01 = new Post;
$post01->title = 'PHP É legal';
$post01->content = '...';
$post01->setCategory($php);

echo '<pre>';
echo $post01->title;
echo '<br />';
echo $post01->content;
echo '<br />';
echo $post01->getCategory()->name;
echo '<br />';
print_r($post01->getAll());




$post02 = new Post;