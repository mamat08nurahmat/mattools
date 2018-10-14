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
                        'Wilayah' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => TRUE,
                        ),
                        'KodeWilayah' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => TRUE,
                         ),
                         'MSO' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => TRUE,
                         ),
                            'Channel' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        )
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('mso_channel');



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