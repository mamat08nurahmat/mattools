<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_cicool extends CI_Migration {

        public function up()
        {
                //create table groups
                $this->dbforge->add_field(array(




                        'MID' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                        ),


                        'MERCHAN_DBA_NAME' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                            'null' => TRUE,
                    ),

                    'STATUS_EDC' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                    ),

                    'OPEN_DATE' => array(
                        'type' => 'DATE',
                    ),



                    'MSO' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                    ),


                    'SOURCE_CODE' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                        'null' => TRUE,
                    ),


                    'POS1' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                    ),

                    'IS_MATCH' => array(
                        'type' => 'INT',
                    ),         


                    'BatchID' => array(
                        'type' => 'INT',
                    ),         



                        'id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        )



                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('temp_upload_mismer');



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