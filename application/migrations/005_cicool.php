<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_cicool extends CI_Migration {

        public function up()
        {
                //create table groups
                $this->dbforge->add_field(array(

                        'RowID' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        ),

                        'BatchID' => array(
                            'type' => 'INT',
                        ),         

                        'OPEN_DATE' => array(
                            'type' => 'DATE',
                        ),
    
    
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



                    'WILAYAH' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                    ),


                    'CHANNEL' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                    ),


                    'TYPE_MID' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                    ),


                    
                    'IS_MATCH' => array(
                        'type' => 'INT',
                    ),
                    
                    
                    'created_at' => array(
                        'type' => 'TIMESTAMP',
                    ),

                    'updated_at' => array(
                            'type' => 'DATETIME',
                    )


    
    


                        
                ));
                $this->dbforge->add_key('RowID', TRUE);
                $this->dbforge->create_table('mismer_detail');



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