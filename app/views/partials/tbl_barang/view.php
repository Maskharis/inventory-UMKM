<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tbl_barang/add");
$can_edit = ACL::is_allowed("tbl_barang/edit");
$can_view = ACL::is_allowed("tbl_barang/view");
$can_delete = ACL::is_allowed("tbl_barang/delete");
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
                    <h4 class="record-title">View  Tbl Barang</h4>
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
                        $rec_id = (!empty($data['id_brg']) ? urlencode($data['id_brg']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-kode_barang">
                                        <th class="title"> Kode Barang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kode_barang']; ?>" 
                                                data-pk="<?php echo $data['id_brg'] ?>" 
                                                data-url="<?php print_link("tbl_barang/editfield/" . urlencode($data['id_brg'])); ?>" 
                                                data-name="kode_barang" 
                                                data-title="Enter Kode Barang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['kode_barang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama_barang">
                                        <th class="title"> Nama Barang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_barang']; ?>" 
                                                data-pk="<?php echo $data['id_brg'] ?>" 
                                                data-url="<?php print_link("tbl_barang/editfield/" . urlencode($data['id_brg'])); ?>" 
                                                data-name="nama_barang" 
                                                data-title="Enter Nama Barang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_barang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-photo">
                                        <th class="title"> Photo: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['photo']; ?>" 
                                                data-pk="<?php echo $data['id_brg'] ?>" 
                                                data-url="<?php print_link("tbl_barang/editfield/" . urlencode($data['id_brg'])); ?>" 
                                                data-name="photo" 
                                                data-title="Browse..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['photo']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jml">
                                        <th class="title"> Jml: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jml']; ?>" 
                                                data-pk="<?php echo $data['id_brg'] ?>" 
                                                data-url="<?php print_link("tbl_barang/editfield/" . urlencode($data['id_brg'])); ?>" 
                                                data-name="jml" 
                                                data-title="Enter Jml" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jml']; ?> 
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
