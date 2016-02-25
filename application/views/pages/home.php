<section id="blog-content" class="col-md-8"> 
    <h2>Todos</h2> 
    <?php $tbl_tmpl = array( 'table_open' => '<table class="table">', 
 'heading_cell_start' => '<th>',);
    $this->table->set_template($tbl_tmpl);
    $this->table->set_heading($tbl_heading);
    //generate table 
    echo $this->table->generate($items);
    echo $this->pagination->create_links();
    ?>
</section>