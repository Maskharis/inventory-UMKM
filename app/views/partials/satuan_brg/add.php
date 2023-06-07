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
                    <h4 class="record-title">Add New Satuan Brg</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="satuan_brg-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="<?php print_link("satuan_brg/add?csrf_token=$csrf_token") ?>" method="post" >
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="nama_satuan">Nama Satuan</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-nama_satuan-row<?php echo $row; ?>-holder" class="">
                                                    <input id="ctrl-nama_satuan-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('nama_satuan',"", $row); ?>" type="text" placeholder="Enter Nama Satuan"  required="" name="row<?php echo $row ?>[nama_satuan]"  class="form-control " />
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
                                        <div id="ctrl-nama_satuan-row<?php echo $row; ?>-holder" class="">
                                            <input id="ctrl-nama_satuan-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('nama_satuan',"", $row); ?>" type="text" placeholder="Enter Nama Satuan"  required="" name="row<?php echo $row ?>[nama_satuan]"  class="form-control " />
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
