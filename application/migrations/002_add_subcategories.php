<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_subcategories extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'reg_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
            ),
            'category_id' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'subcategory_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ),
            'stauts' => array(
                'type' => 'INT',
                'constraint' => 2,
                'default' => 1,
            ),
            'created' => array(
                'type' => 'timestamp',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ecom_sub_categories');
    }

    public function down()
    {
            $this->dbforge->drop_table('ecom_categories');
    }
}