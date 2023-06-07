<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_barang_keluar/add");
$can_edit = ACL::is_allowed("tbl_barang_keluar/edit");
$can_view = ACL::is_allowed("tbl_barang_keluar/view");
$can_delete = ACL::is_allowed("tbl_barang_keluar/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Tbl Barang Keluar</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id_brg_keluar']) ? urlencode($data['id_brg_keluar']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_brg">
                                        <th class="title"> nama barang: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("tbl_barang/view/" . urlencode($data['id_brg'])) ?>">
                                                <i class="material-icons">visibility</i> <?php echo $data['tbl_barang_nama_barang'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-tgl_keluar">
                                        <th class="title"> Tgl Keluar: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y H:i:s', minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['tgl_keluar']; ?>" 
                                                data-pk="<?php echo $data['id_brg_keluar'] ?>" 
                                                data-url="<?php print_link("tbl_barang_keluar/editfield/" . urlencode($data['id_brg_keluar'])); ?>" 
                                                data-name="tgl_keluar" 
                                                data-title="Enter Tgl Keluar" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tgl_keluar']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-id_user">
                                        <th class="title"> dientry: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("user/view/" . urlencode($data['id_user'])) ?>">
                                                <i class="material-icons">visibility</i> <?php echo $data['user_username'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-jml_keluar">
                                        <th class="title"> Jml Keluar: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jml_keluar']; ?>" 
                                                data-pk="<?php echo $data['id_brg_keluar'] ?>" 
                                                data-url="<?php print_link("tbl_barang_keluar/editfield/" . urlencode($data['id_brg_keluar'])); ?>" 
                                                data-name="jml_keluar" 
                                                data-title="Enter Jml Keluar" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jml_keluar']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                        </div>
                        <?php
                        }
                        else{
                        ?>
                        <!-- Empty Record Message -->
                        <div class="text-muted p-3">
                            <i class="material-icons">block</i> No Record Found
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
