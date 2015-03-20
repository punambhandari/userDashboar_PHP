<?php 

class User_Dashboard extends CI_Model
{

function create($data,$level)
{
 
 return $this->db->query("INSERT INTO Users (first_name,last_name,email,password,user_level,created_at) 
 	VALUES(?,?,?,?,?,NOW())",array($data['first_name'],$data['last_name'],$data['email'],$data['password'],$level));


}

function get_count()
{
 
 return $this->db->query("SELECT count(*) as count from users")->row_array();

}

function get_user($email,$password)
	{
		return $this->db->query("SELECT * from users where email=? and password=?",
		array($email,$password))->row_array();
	}

function get_profile($id)
	{
		return $this->db->query("SELECT * from users where id=?",array($id))->row_array();
	}

function update_profile_info($data)
	{
		return $this->db->query("UPDATE users set email=?,first_name=?,last_name=?,user_level=?,updated_at=NOW() where
			 id=?",array($data['email'],$data['first_name'],$data['last_name'],$data['user_level'],$data['user_id']));
	}

function update_profile_desc($data)
	{
		return $this->db->query("UPDATE users set description=?,updated_at=NOW() where
			 id=?",array($data['description'],$data['user_id']));
	}
function update_profile_password($data)
	{
		return $this->db->query("UPDATE users set password=?,updated_at=NOW() where
			 id=?",array($data['password'],$data['user_id']));
	}


function delete_user($id)
{
	return $this->db->query("DELETE from users where id=?",array($id));
}

function get_all()
{
	return $this->db->query("SELECT * from users")->result_array();
}

function get($id)
{
	return $this->db->query("SELECT * from users where id=?",array($id))->row_array();
}

function get_all_messages($id)
{
	return $this->db->query("SELECT m.id as message_id ,m.to_user_id as message_to_id, u.first_name as message_from_user,
	m.created_at message_date, message, v.first_name as comment_from_user , c.comment ,c.created_at comment_created
	from messages m left join comments c on m.id=c.message_id
	join users u on m.from_user_id=u.id left join users v on c.user_id=v.id 
	where m.to_user_id =? order by m.	id desc",array($id))->result_array();
}

function create_new_message($data,$from_user_id)
{
	return $this->db->query("INSERT INTO messages (to_user_id,from_user_id,message,created_at) 
 	VALUES(?,?,?,NOW())",array($data['to_user_id'],$from_user_id,$data['message']));

}
function create_new_comment($data,$from_user_id)
{
	return $this->db->query("INSERT INTO comments (user_id,message_id,comment,created_at) 
 	VALUES(?,?,?,NOW())",array($from_user_id,$data['message_id'],$data['comment']));

}
}

?>