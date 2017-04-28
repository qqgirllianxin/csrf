<?php defined('BASEPATH') OR exit('No direct script access allowed');
   /**
   * 
   */
   class User_model extends CI_Model{
   	
   	public function get_insert($name,$pass){
			$query=$this->db->query("insert into user(uid,uname,upwd) values(null,'$name','$pass')");
			return $query;
		}
    public function get_check($name,$pass){
    	  $arr=array(
        'uname'=>$name,
        'upwd'=>$pass,
      );
      $query=$this->db->get_where('user',$arr);
      return $query->row();
    }  
    public function do_change($name,$pass){
        $query=$this->db->query("update user set upwd='$pass' where uname='$name'");
        return $query;
    }
}



?>