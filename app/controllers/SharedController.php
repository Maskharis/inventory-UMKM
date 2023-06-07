<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * tbl_barang_masuk_id_brg_option_list Model Action
     * @return array
     */
	function tbl_barang_masuk_id_brg_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_brg AS value,nama_barang AS label FROM tbl_barang";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tbl_barang_keluar_id_brg_option_list Model Action
     * @return array
     */
	function tbl_barang_keluar_id_brg_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_brg AS value,nama_barang AS label FROM tbl_barang";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_masterbarang Model Action
     * @return Value
     */
	function getcount_masterbarang(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_barang";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_barangmasuk Model Action
     * @return Value
     */
	function getcount_barangmasuk(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_barang_masuk";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_barangkeluar Model Action
     * @return Value
     */
	function getcount_barangkeluar(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_barang_keluar";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_user Model Action
     * @return Value
     */
	function getcount_user(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM user";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_databarang Model Action
	* @return array
	*/
	function barchart_databarang(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  tb.id_brg, tb.kode_barang, tb.nama_barang, tb.photo, tb.jml FROM tbl_barang AS tb";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'jml');
		$dataset_labels =  array_column($dataset1, 'nama_barang');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
