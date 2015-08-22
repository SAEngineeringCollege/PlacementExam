<?php

class model_event extends CI_Model{


	public function participantsCount($event){

		$table= $event."_attendee";

		 $query = $this->db->count_all($table);

			return $query;

	}


	public function participantsList($event){


		$table= $event."_attendee";

		$query=$this->db->query("SELECT * FROM $table ");

			return $query->result();

	}
		public function questionList(){


		$table= "exam_event";

		$query=$this->db->query("SELECT * from $table;");

			return $query->result();

	}


		public function wipeQuestion($qid){


		$table= "exam_event";

		$query=$this->db->query("DELETE from $table where id='$qid'; ");

			return 1;

	}


	public function questionCount(){

		$table= "exam_event";
		 $query = $this->db->count_all($table);

			return $query;

	}

	public function questionUpdate($id,$questionInfo)
	{
			$table= $event."exam_event";

			if($id=='new')
			{
				$query=$this->db->insert($table, $questionInfo);
				if($query)
				{
					return TRUE;
				}
	}
	else if($id!='new')
	{
		$this->db->where('id', $id);
	$query=$this->db->update($table, $questionInfo);
				if($query)
				{
					return TRUE;
				}


			}
		}


}
