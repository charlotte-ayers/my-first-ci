<?php

/**
 * * Description of Todo 
 * * * @author richard_lovell 
 */
class Todo extends CI_Model {

    public $id;
    public $title;
    public $description;

    public function getTodos($limit, $offset) {
        $sql = "SELECT id, title, description FROM todo ORDER BY created_on DESC LIMIT $limit";
        if ($offset) {
            $sql .= " OFFSET $offset";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function countTodos() {
        $sql = "SELECT id FROM todo";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('todo');
    }

//    public function add_edit($id=null) {
//        $items = array(
//            'title' => $title,
//            'description' => $description,
//            'id' => $id
//        );
//        $query = mysql_query("SELECT * FROM todo WHERE id='$id'");
//        $count = mysql_num_rows($query);
//        If ($count != 0) {
//            // id exists
//            $this->db->update('todo', $items);
//        } else {
//            //id doesn't exsist
//            $this->db->insert('todo', $items);
//        }
//    }
    public function get_todo($id){
 $this -> db -> where ($id ,'id');
         //mysql_query("SELECT * FROM todo WHERE id=$id")
 //or die(mysql_error()); 
 $this-> db -> get -> ($todo, 'todo');
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
     $id = $row['id'];
 $title = $row['title'];
 $description = $row['description'];
 
 // show form
 renderForm($id, $title, $description, '');
 }
    }
}
