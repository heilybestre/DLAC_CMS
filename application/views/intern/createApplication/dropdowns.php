<?php 

if($use=='opposingparty'){
	echo '<select id="appopposing" name="appopposing" class="form-control">';
	foreach($opposingpartylist as $row){
		echo '<option value="' . $row->personID . '"';
		if($row->firstname==$firstname && $row->middlename==$middlename && $row->lastname==$lastname) echo 'selected';
		echo '>';
		echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
		echo '</option>';
	}
	echo '</select>';
}

else if($use=='doctestify'){
	echo '<select id="doctestify" name="doctestify" class="form-control">';
	foreach($externals as $row){
		if($row->personID!=$this->session->userdata('clientid')){
			echo '<option value="' . $row->personID . '">';
			echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
			echo '</option>';
		}
	}
	echo '</select>';
}

else if($use=='objtestify'){
	echo '<select id="objtestify" name="objtestify" class="form-control">';
	foreach($externals as $row){
		if($row->personID!=$this->session->userdata('clientid')){
			echo '<option value="' . $row->personID . '">';
			echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
			echo '</option>';
		}
	}
	echo '</select>';
}

else if($use=='tesname'){
	echo '<select id="tesname" name="tesname" class="form-control">';
	foreach($externals as $row){
		if($row->personID!=$this->session->userdata('clientid')){
			echo '<option value="' . $row->personID . '">';
			echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
			echo '</option>';
		}
	}
	echo '</select>';
}

else if($use=='doctestifyadd'){
	echo '<select id="doctestify" name="doctestify" class="form-control">';
	foreach($externals as $row){
		if($row->personID!=$this->session->userdata('clientid')){
			echo '<option value="' . $row->personID . '"';
			if($row->firstname==$firstname && $row->middlename==$middlename && $row->lastname==$lastname) echo 'selected';
			echo '>';
			echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
			echo '</option>';
		}
	}
	echo '</select>';
}

else if($use=='objtestifyadd'){
	echo '<select id="objtestify" name="objtestify" class="form-control">';
	foreach($externals as $row){
		if($row->personID!=$this->session->userdata('clientid')){
			echo '<option value="' . $row->personID . '"';
			if($row->firstname==$firstname && $row->middlename==$middlename && $row->lastname==$lastname) echo 'selected';
			echo '>';
			echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
			echo '</option>';
		}
	}
	echo '</select>';
}

else if($use=='tesnameadd'){
	echo '<select id="tesname" name="tesname" class="form-control">';
	foreach($externals as $row){
		if($row->personID!=$this->session->userdata('clientid')){
			echo '<option value="' . $row->personID . '"';
			if($row->firstname==$firstname && $row->middlename==$middlename && $row->lastname==$lastname) echo 'selected';
			echo '>';
			echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
			echo '</option>';
		}
	}
	echo '</select>';
}

else if($use=='opposing'){
	echo '<select id="appopposing" name="appopposing" class="form-control">';
	foreach($externals as $row){
		if($row->personID!=$this->session->userdata('clientid')){
			echo '<option value="' . $row->personID . '">';
			echo $row->lastname . ', ' . $row->firstname . ' ' . substr($row->middlename, 0, 1) . '.';
			echo '</option>';
		}
	}
	echo '</select>';
}

?>
