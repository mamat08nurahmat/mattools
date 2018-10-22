<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_cicool extends CI_Migration {

        public function up()
        {
                //create table groups
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'definition' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('tabel_tes');



        }

        public function down()
        {
            $tables = $this->db->query('SHOW TABLES FROM '.$this->db->database)->result(); 
            foreach ($tables as $table) {
                $tab = array_values((array)$table)[0];
                $this->dbforge->drop_table($tab);
            }   
        }
}