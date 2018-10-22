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


                        'upload_date' => array(
                            'type' => 'DATETIME',
                            'null' => TRUE,
                        ),

                        'upload_remark' => array(
                        'type' => 'TEXT',
                        'null' => TRUE,
                        ),


                        'source' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),


                        'file_path' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),

                        'file_size' => array(
                            'type' => 'INT',
                        ),         
                                       
                        'row_data_count' => array(
                            'type' => 'INT',
                        ),         
                                       
                        'row_data_succeed' => array(
                            'type' => 'INT',
                        ),         
                                       
                        'row_data_failed' => array(
                            'type' => 'INT',
                        ),         
                                       
                        'is_approved' => array(
                            'type' => 'INT',
                        ),         
                                       
                        'upload_at' => array(
                            'type' => 'TIMESTAMP',
                        )
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('system_upload');



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