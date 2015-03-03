<?php
class BloodGroup {
	public $name;
	public function bloodGroupNaming ( $blood_group ) {
		if( $blood_group == 'a_positive' ){
			return 'A+';
		}elseif( $blood_group == 'a_negative' ){
			return 'A-';
		}
		elseif( $blood_group == 'b_positive' ){
			return 'B+';
		}
		elseif( $blood_group == 'b_negative' ){
			return 'B-';
		}
		elseif( $blood_group == 'ab_positive' ){
			return 'AB+';
		}
		elseif( $blood_group == 'ab_negative' ){
			return 'AB-';
		}
		elseif( $blood_group == 'o_positive' ){
			return 'O+';
		}
		elseif( $blood_group == 'o_negative' ){
			return 'O-';
		}
	}
}
?>