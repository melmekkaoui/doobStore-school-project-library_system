<?php 
    require "database.php";
    class BookLib{
        public $booklist;
        public $database;

        public function __construct(){
            $this->database = new Database();
        }


        public function get_All_books(){
            $books = $this->database->SelectAll("books");
            $data = $books;
            return $data;
        }

        public function get_Book_By_Count($count){
            $books = $this->database->SelectAll("books",$count);
            $data = $books;
            return $data;
        }

        public function get_book_by_categories($category){


            $books = $this->database->Select('books','book_categ',$category);

            $data = $books;
            
            return $data;

        }
        public function get_book_by_id($id){
            $book = $this->database->Select('books','id',$id);
            $data = $book;
            return $data;
        }
        public function reserve($array){
            $columns=implode(', ' ,array_keys($array));
            $Values=implode(', ', array_values($array));
            $insertion = $this->database->insert('reservation',$columns,$Values);
            return $insertion;



        }

    }
   
?>

<?php 
             