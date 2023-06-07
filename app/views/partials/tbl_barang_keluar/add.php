<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Tbl Barang Keluar</h4>
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
                <div class="col-md-10 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="tbl_barang_keluar-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="<?php print_link("tbl_barang_keluar/add?csrf_token=$csrf_token") ?>" method="post" >
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="id_brg">nama barang</label></th>
                                            <th class="bg-light"><label for="jml_keluar">Jml Keluar</label></th>
                                            <th class="bg-light"><label for="tgl_keluar">Tgl Keluar</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-id_brg-row<?php echo $row; ?>-holder" class="">
                                                    <select required=""  id="ctrl-id_brg-row<?php echo $row; ?>" name="row<?php echo $row ?>[id_brg]"  placeholder="Select a value ..."    class="custom-select" >
                                                        <option value="">Select a value ...</option>
                                                        <?php 
                                                        $id_brg_options = $comp_model -> tbl_barang_keluar_id_brg_option_list();
                                                        if(!empty($id_brg_options)){
                                                        foreach($id_brg_options as $option){
                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                        $selected = $this->set_field_selected('id_brg',$value, "");
                                                        ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                            <?php echo $label; ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="ctrl-jml_keluar-row<?php echo $row; ?>-holder" class="">
                                                    <input id="ctrl-jml_keluar-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('jml_keluar',"", $row); ?>" type="number" placeholder="Enter Jml Keluar" step="1"  required="" name="row<?php echo $row ?>[jml_keluar]"  class="form-control " />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="ctrl-tgl_keluar-row<?php echo $row; ?>-holder" class="input-group">
                                                        <input id="ctrl-tgl_keluar-row<?php echo $row; ?>" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('tgl_keluar',datetime_now(), $row); ?>" type="datetime"  name="row<?php echo $row ?>[tgl_keluar]" placeholder="Enter Tgl Keluar" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="d-m-Y H:i:s" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <th class="text-center">
                                                        <button type="button" class="close btn-remove-table-row">&times;</button>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="100" class="text-right">
                                                        <?php $template_id = "table-row-" . random_str(); ?>
                                                        <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-light btn-add-table-row"><i class="material-icons">add</i></button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                        <div class="form-ajax-status"></div>
                                        <button class="btn btn-primary" type="submit">
                                            Submit
                                            <i class="material-icons">send</i>
                                        </button>
                                    </div>
                                </form>
                                <!--[table row template]-->
                                <template id="<?php echo $template_id ?>">
                                    <tr class="input-row">
                                        <?php $row = 1; ?>
                                        <td>
                                            <div id="ctrl-id_brg-row<?php echo $row; ?>-holder" class="">
                                                <select required=""  id="ctrl-id_brg-row<?php echo $row; ?>" name="row<?php echo $row ?>[id_brg]"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php 
                                                    $id_brg_options = $comp_model -> tbl_barang_keluar_id_brg_option_list();
                                                    if(!empty($id_brg_options)){
                                                    foreach($id_brg_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = $this->set_field_selected('id_brg',$value, "");
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                        <?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="ctrl-jml_keluar-row<?php echo $row; ?>-holder" class="">
                                                <input id="ctrl-jml_keluar-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('jml_keluar',"", $row); ?>" type="number" placeholder="Enter Jml Keluar" step="1"  required="" name="row<?php echo $row ?>[jml_keluar]"  class="form-control " />
                                                </div>
                                            </td>
                                            <td>
                                                <div id="ctrl-tgl_keluar-row<?php echo $row; ?>-holder" class="input-group">
                                                    <input id="ctrl-tgl_keluar-row<?php echo $row; ?>" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('tgl_keluar',datetime_now(), $row); ?>" type="datetime"  name="row<?php echo $row ?>[tgl_keluar]" placeholder="Enter Tgl Keluar" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="d-m-Y H:i:s" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <th class="text-center">
                                                    <button type="button" class="close btn-remove-table-row">&times;</button>
                                                </th>
                                            </tr>
                                        </template>
                                        <!--[/table row template]-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
